<?php
  include "funcs.php";
  header("Content-type: text/html");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>SVG Test: <?php echo $_SERVER['SERVER_NAME'], $_SERVER['REQUEST_URI'] ?></title>
    <link rel="stylesheet" type="text/css" href="index.css.php"/>
    <script type="text/javascript" src="index.js"></script>
  </head>
  <body>
    <h1>SVG Security Test Suite</h1>
    <?php include "nav.php"; ?>
    <p>
      <strong>Last Tested</strong>: 2014-12-07<br/>
      <strong>Firefox</strong>: 36.0a2 aurora<br/>
      <strong>Chrome</strong>: 41.0.2241.0 canary<br />
      <strong>Internet Explorer</strong>: 11.0.9879.0 (Windows 10 Technical Preview)
    </p>
    <p>
      Each page loads SVGs from different sources under different X-Frame-Options (XFO) and 
      content-security-policy (CSP) settings.  Pages contain several related test cases, and each 
      test case is a row of SVGs loaded in different ways.  The base of each test case is a gray 
      SVG circle.  Some test cases attempt to apply a stylesheet (either in-line in the SVG or 
      external), which changes the colour of the SVG to orange.  Some test cases attempt to run 
      a script (again, either in-line or external) which adds a red border to the SVG and attempts 
      to call a function on the parent document that changes the border from solid to dashed.  
      Embedded image cases attempt to load a second image from within a gray circle SVG (scaled to 
      50%, in the bottom-right corner), with scripts and styles applied to the child.  Recursion 
      test cases attempt to load a single SVG recursively.
    </p>
    <p>
      Some test cases will intentionally fail to load because they aren't meaningful, such as 
      in-line and data URI images in the different-origin pages.  Others should fail to load in 
      certain cases due to the security policies applied to the page.  In many cases, only part of 
      an image will load, such as the gray circle loading but its styesheet not being applied or 
      its child images not loading.  Compare the images as rendered in your browser to the expected 
      results listed below the images.
    </p>
    <p>
      There may be errors in the expected results.  If you find one, please point it out and 
      explain why it is incorrect.  Ideally, back up your arguments with relevant standards.
    </p>
    <p>
      These test cases cover some areas which seem to be poorly specified, or at least not 
      consistently implemented by browsers.  In these cases, my expected results are based on my 
      analyses rather than directly on the standards.  If you have a good argument why my analysis 
      is incorrect, preferrably one backed up by relevant standards, please point it out.
    </p>
    <ul>
      <li>It is unclear whether in-line SVG should be treated as images which should be blockable 
        by CSP or as something else.  I am taking the position that they should be covered by CSP, 
        since <code>data:</code> URIs are also considered images that need to be specifically 
        permitted in CSP.  In-line SVGs are not static images, so covering them under <code>img-src
        </code> would not be appropriate; treating them like <code>data:</code> URIs to <code>object
        </code> tags seems most fitting.</li>
      <li>If one document with a CSP loads a child document with a more permissive CSP, and only 
        the child document's CSP applies to the child document, then the child document may be able 
        to interact with the parent in ways that violates its CSP (for instance, loading a script 
        that manipulates the parent document from a source that is not allowed by the parent 
        document).  Consequently, my position is that CSPs on nested documents must be composed: 
        parent document CSPs must apply to all child documents in addition to their own CSPs.  An 
        argument might be made that this is unnecessary if the parent and child are loaded from 
        different origins.</li>
    </ul>
    <h2>Known security model violations</h2>
    <ul>
      <li>Internet Explorer always loads and applies external CSS on static images, regardless of 
        its origin.  The 11.0.9879.0 technical preview build does so even when the CSS source is 
        banned by CSP.  REPRO CASE?  REPORT STATUS?</li>
      <li>Old Chrome builds always loaded and applied external CSS on static images, even if banned 
        by CSP, but only if the CSS came from a different origin than the image.  This was fixed in 
        build 37.0.2054.0.  <a href="http://dom1.chromebug2.test/">Reproduction case</a>.  <a 
        href="https://code.google.com/p/chromium/issues/detail?id=384527">Bug tracker</a>.</li>
      <li>Internet Explorer always loads external images, even from a static image context (though 
        CSP blocks them correctly in the 11.0.9879.0 technical preview build).  REPRO CASE?  It 
        never loads a document as a child of itself, but as long as the URI changes at every 
        iteration, they can be nested to an arbitrary depth.  Scripts don't run in static images, 
        so a deeply nested SVG requires a server-side script or a very large number of images 
        stored on the server.  Using <a href="http://recurse.svg.test/recursive-image.js"> this 
        node.js script</a> to serve identical SVGs with different names, IE 11 will load it a few 
        hundred thousand times until it runs out of memory and crashes.  This issue was reported to 
        Microsoft in summer 2014; they closed it as "not a security bug".</li>
      <li>Chrome and Internet Explorer both crash when loading a recursive SVG that loads itself 
        using a <code>html:object</code> tag inside an <code>svg:foreignObject</code> tag, with a 
        script that appends a counter as a query parameter to the nested SVG's URI so that every 
        iteration's URI is unique.  Internet Explorer 11 is documented as <a 
        href="http://msdn.microsoft.com/en-us/library/hh834675(v=vs.85).aspx"> not supporting</a> 
        <code>svg:foreignObject</code> and it indeed does not render <code>foreignObject</code> 
        contents, but it does run scripts and load external documents from within <code>
        foreignObject</code>, which is all that is necessary for this attack.  <a 
        href="http://recurse.svg.test/recursive-foreignobject.svg?0">Reproduction case.</a>  A <a 
        href="https://code.google.com/p/chromium/issues/detail?id=383180">Chrome bug</a> is open.  
        Microsoft rejected my bug report as "not a security bug".  Both browsers should take a 
        lesson from Firefox on this one, which is to stop loading nested documents at 10 levels.
        </li>
      <li>Chrome applies in-line CSS to static images in violation of CSP.  <a 
        href="http://dom1.chromebug.test/">Reproduction case</a>.  <a 
        href="https://code.google.com/p/chromium/issues/detail?id=378500">Bug tracker</a>.</li>
      <li>Prior to version 28.0, Firefox did not apply CSP to sandboxed iframes.  This appears to 
        have been due to wider problems with sandboxed iframes.</li>
      <li>All browsers display in-line SVG even under CSP <code>default-src 'none';</code>.  As 
        described above, there don't seem to be any clear rules for how to apply CSP to in-line 
        SVG.  <a href="https://bugzilla.mozilla.org/show_bug.cgi?id=1018310">Firefox bug</a>.  <a 
        href="https://code.google.com/p/chromium/issues/detail?id=378500">Chrome bug</a>.</li>
    </ul>
    <h2>Known non-security issues</h2>
    <ul>
      <li>Chrome applies both CSP <code>object-src</code> and <code>frame-source</code> to nested 
        browsing contexts created from <code>object</code> and <code>embed</code> tags, rather than 
        only <code>object-src</code>.  <code>frame-src</code> is only supposed to apply to <code>
        iframe</code> tags, though I'm not sure why the designers of CSP thought that iframes 
        needed to be handled differently than objects and embeds.  <a 
        href="https://code.google.com/p/chromium/issues/detail?id=400840">Bug tracker</a>.</li>
      <li>Chrome doesn't apply <code>style-src</code> correctly to sandboxed iframes.  If an SVG in 
        a sandboxed iframe tries to load an external stylesheet from the same origin, it will be 
        blocked by CSP unless the origin is explicitly listed in <code>style-src</code>; Chrome 
        blocks it even under <code>style-src 'self';</code>.  SAME WITH IMG-SRC?  BUG REFERENCE</li>
      <li>No browsers ever load external stylesheets for in-line SVG.  The <code>
        &lt;?xml-stylesheet?&gt;</code> directive doesn't seem to be valid in HTML, so I'm not sure 
        if there is a valid way to do this.</li>
      <li>Internet Explorer 11.0.9879.0 fails to load SVGs that contain <code>foreignObject</code> 
        blocks as static images.  It does load them as nested documents, though it does not render 
        the <code>foreignObject</code> contents.</li>
      <li>Neither Firefox nor Chrome seem render foreignObjects in in-line SVG.  MORE DETAILS.</li>
      <li>Chrome doesn't render objects (though it does render images) within foreignObjects in 
        sandboxed iframes.  This used to work in really old builds like 27.  MORE DETAILS.</li>
    </ul>
    <h2>Future work</h2>
    <ul>
      <li>Mobile browsers</li>
      <li>HTML and embedded SVG with different CSPs, especially if they're same-origin.</li>
      <li>SVG's <code>use</code> element and anything else that takes a URI argument</li>
      <li>SVG 2.0: <code>iframe</code> and <code>canvas</code> and other stuff</li>
      <li>IE12's CSP implementation</li>
      <li>CSP 2</li>
    </ul>
  </body>
</html>

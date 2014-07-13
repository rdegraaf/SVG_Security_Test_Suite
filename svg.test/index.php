<?php
header("Content-type: text/html");

function getFile($url)
{
    if (0 === strpos($url, "http://"))
    {
        // We only get an HTTP URL for different-origin objects, which it doesn't make sense to 
        // in-line.  So return a dummy object.
        return "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"68\" height=\"68\" version=\"1.1\"></svg>";
    }
    else
    {
        // Force an HTTP retrieval to execute any PHP in the object.
        return file_get_contents("http://" . $_SERVER['SERVER_NAME'] . "/" . $url);
    }
}

function writeBlock($url, $style, $results)
{
    echo "<p>Expected: ",$results[$_SERVER['SERVER_NAME']],"</p>";
    echo "<p>";
    echo "<span class=\"image\"><img src=\"", $url, "\" alt=\"circle\" width=\"68\" height=\"68\"/></span>";
    echo "<span class=\"image\"><img width=\"68\" height=\"68\" alt=\"circle\" src=\"data:image/svg+xml;base64,",base64_encode(getFile($url)),"\"/></span>";
    echo "<span class=\"image ", $style,"\"></span>";
    echo "<object data=\"", $url, "\" type=\"image/svg+xml\" width=\"68\" height=\"68\"></object>";
    echo "<embed src=\"", $url, "\" type=\"image/svg+xml\" width=\"68\" height=\"68\"></embed>";
    echo "<iframe src=\"", $url, "\" width=\"68\" height=\"68\"></iframe>";
    echo "<iframe src=\"", $url, "\" width=\"68\" height=\"68\" sandbox=\"\"></iframe>";
    echo "<span class=\"image\">",getFile($url),"</span>";
    echo "</p>";
}

function altHostName($hostName)
{
    $prefix = substr($hostName, 0, strlen($hostName) - 9);
    $suffix = substr($hostName, -9);
    return $prefix . "_a" . $suffix;
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>SVG Test: <?php echo $_SERVER['SERVER_NAME']?></title>
    <link rel="stylesheet" type="text/css" href="index.css.php"/>
    <script type="text/javascript" src="index.js"></script>
  </head>
  <body>
    <div id="navigation">
      <a href="http://base.svg.test">base.svg.test</a>
      <a href="http://xfo1.svg.test">xfo1.svg.test</a>
      <a href="http://xfo2.svg.test">xfo2.svg.test</a>
      <a href="http://csp1.svg.test">csp1.svg.test</a>
      <a href="http://csp2.svg.test">csp2.svg.test</a>
      <a href="http://csp3.svg.test">csp3.svg.test</a>
      <a href="http://csp4.svg.test">csp4.svg.test</a>
      <a href="http://csp5.svg.test">csp5.svg.test</a>
    </div>
    <dl>
      <dt>Base case</dt>
      <dd>solid gray circle with no border</dd>
      <dt>CSS</dt>
      <dd>changes the circle's colour to orange</dd>
      <dt>JavsScript</dt>
      <dd>adds a 2-pixel red border</dd>
      <!--<dt>Parent document CSS</dt>
      <dd>changes the border width to 5 pixels</dd>
      <dt>Parent document JavaScript</dt>
      <dd>changes the border width to 5 pixels</dd>-->
      <dt>Callback to parent document JavaScript</dt>
      <dd>make the border dashed</dd>
    </dl>
    <p>
        Each row shows the same SVG loaded 8 different ways:
    </p>
    <ol>
        <li>HTML &lt;img&gt;</li>
        <li>HTML &lt;img&gt; using a data URI</li>
        <li>CSS background-image</li>
        <li>HTML &lt;object&gt;</li>
        <li>HTML &lt;embed&gt;</li>
        <li>HTML &lt;iframe&gt;</li>
        <li>HTML sandboxed &lt;iframe&gt;</li>
        <li>In-line SVG</li>
    </ol>
    <h2>Policy:</h2>
    <ul>
      <?php
        $config = [
            "base.svg.test"  => ["none", "none"],
            "nocsp.svg.test" => ["none", "none"],
            "xfo1.svg.test"  => ["none", "DENY"],
            "xfo2.svg.test"  => ["none", "SAMEORIGIN"],
            "csp1.svg.test"  => ["default-src 'none'; script-src 'self'; style-src 'self'; img-src 'self'", "none"],
            "csp2.svg.test"  => ["default-src 'none'; script-src 'self'; style-src 'self'; object-src 'self'", "none"],
            "csp3.svg.test"  => ["default-src 'none'; script-src 'self'; style-src 'self'; frame-src 'self'", "none"],
            "csp4.svg.test"  => ["default-src 'none'; script-src 'self'; style-src 'self'; img-src 'self'; object-src 'self'; frame-src 'self'", "none"],
            "csp5.svg.test"  => ["default-src 'none'; script-src 'self' http://*.svg.test; style-src 'self' http://*.svg.test; img-src 'self' data: http://*.svg.test; object-src 'self' http://*.svg.test; frame-src 'self' http://*.svg.test;"]
        ];
        echo "<li>CSP: ", $config[$_SERVER['SERVER_NAME']][0], "</li>";
        echo "<li>XFO: ", $config[$_SERVER['SERVER_NAME']][1], "</li>";
      ?>
    </ul>
    <div class="column" id="same-origin">
      <h2>Same-origin SVG</h2>
      <h3>SVG circle</h3>
      <?php
        $results = [
            "base.svg.test" => "8 gray",
            "xfo1.svg.test" => "3 gray; 4 load failure; 1 gray",
            "xfo2.svg.test" => "8 gray",
            "csp1.svg.test" => "1 gray; 1 load failure; 1 gray; 4 load failure; 1 gray",
            "csp2.svg.test" => "1 gray; 1 load failure; 3 gray; 2 load failure; 1 gray",
            "csp3.svg.test" => "1 gray; 1 load failure; 1 gray; 2 load failure; 3 gray",
            "csp4.svg.test" => "1 gray; 1 load failure; 6 gray",
            "csp5.svg.test" => "8 gray",
        ];
        $url = "circle.svg";
        $style = "circle";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "8 orange",
            "xfo1.svg.test" => "3 orange; 4 load failure; 1 orange",
            "xfo2.svg.test" => "8 orange",
            "csp1.svg.test" => "1 gray; 1 load failure; 1 gray; 4 load failure; 1 gray",
            "csp2.svg.test" => "1 gray; 1 load failure; 3 gray; 2 load failure; 1 gray",
            "csp3.svg.test" => "1 gray; 1 load failure; 1 gray; 2 load failure; 3 gray",
            "csp4.svg.test" => "1 gray; 1 load failure; 6 gray",
            "csp5.svg.test" => "8 gray",
        ];
        $url = "circle-css.svg";
        $style = "circle-css";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with same-origin external CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "3 gray; 5 orange",
            "xfo1.svg.test" => "3 gray; 4 load failure; 1 orange",
            "xfo2.svg.test" => "3 gray; 5 orange",
            "csp1.svg.test" => "1 gray; 1 load failure; 1 gray; 4 load failure; 1 orange",
            "csp2.svg.test" => "1 gray; 1 load failure; 1 gray; 2 orange; 2 load failure; 1 orange",
            "csp3.svg.test" => "1 gray; 1 load failure; 1 gray; 2 load failure; 3 orange",
            "csp4.svg.test" => "1 gray; 1 load failure; 1 gray; 5 orange",
            "csp5.svg.test" => "3 gray; 5 orange",
        ];
        $url = "circle-css-so.svg";
        $style = "circle-css-so";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with different-origin external CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "3 gray; 5 orange",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "1 gray; 1 load failure; 6 gray",
            "csp5.svg.test" => "",
        ];
        $url = "circle-css-do.svg.php";
        $style = "circle-css-do";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "3 gray; 3 gray with dashed red border; 1 gray; 1 gray with dashed red border",
            "xfo1.svg.test" => "3 gray; 4 load failure; 1 gray with dashed red border",
            "xfo2.svg.test" => "3 gray; 3 gray with dashed red border; 1 gray; 1 gray with dashed red border",
            "csp1.svg.test" => "1 gray; 1 load failure; 1 gray; 4 load failure; 1 gray",
            "csp2.svg.test" => "1 gray; 1 load failure; 3 gray; 2 load failure; 1 gray",
            "csp3.svg.test" => "1 gray; 1 load failure; 1 gray; 2 load failure; 3 gray",
            "csp4.svg.test" => "1 gray; 1 load failure; 6 gray",
            "csp5.svg.test" => "8 gray",
        ];
        $url = "circle-js.svg";
        $style = "circle-js";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with same-origin external JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "3 gray; 3 gray with dashed red border; 1 gray; 1 gray with dashed red border",
            "xfo1.svg.test" => "3 gray; 4 load failure; 1 gray with dashed red border",
            "xfo2.svg.test" => "3 gray; 3 gray with dashed red border; 1 gray; 1 gray with dashed red border",
            "csp1.svg.test" => "1 gray; 1 load failure; 1 gray; 4 load failure; 1 gray with dashed red border",
            "csp2.svg.test" => "1 gray; 1 load failure; 1 gray; 2 gray with dashed red border; 2 load failure; 1 gray with dashed red border",
            "csp3.svg.test" => "1 gray; 1 load failure; 1 gray; 2 load failure; 1 gray with dashed red border; 1 gray; 1 gray with dashed red border",
            "csp4.svg.test" => "1 gray; 1 load failure; 1 gray; 3 gray with dashed red border; 1 gray; 1 gray with dashed red border",
            "csp5.svg.test" => "3 gray; 3 gray with dashed red border; 1 gray; 1 gray with dashed red border",
        ];
        $url = "circle-js-so.svg";
        $style = "circle-js-so";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with different-origin external JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "3 gray; 3 gray with dashed red border; 1 gray; 1 gray with dashed red border",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "1 gray; 1 load failure; 5 gray, 1 gray with dashed red border (due to script bug; should be gray)",
            "csp5.svg.test" => "",
        ];
        $url = "circle-js-do.svg.php";
        $style = "circle-js-do";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external CSS and JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "3 gray; 3 orange with dashed red border; 1 orange; 1 orange with dashed red border",
            "xfo1.svg.test" => "3 gray; 4 load failure; 1 orange with dashed red border",
            "xfo2.svg.test" => "3 gray; 3 orange with dashed red border; 1 orange; 1 orange with dashed red border",
            "csp1.svg.test" => "1 gray; 1 load failure; 1 gray; 4 load failure; 1 orange with dashed red border",
            "csp2.svg.test" => "1 gray; 1 load failure; 1 gray; 2 orange with dashed red border; 2 load failure; 1 orange with dashed red border",
            "csp3.svg.test" => "1 gray; 1 load failure; 1 gray; 2 load failure; 1 orange with dashed red border; 1 orange; 1 orange with dashed red border",
            "csp4.svg.test" => "1 gray; 1 load failure; 1 gray; 3 orange with dashed red border; 1 orange; 1 orange with dashed red border",
            "csp5.svg.test" => "3 gray; 3 orange with dashed red border; 1 orange; 1 orange with dashed red border",
        ];
        $url = "circle-css-js-external.svg";
        $style = "circle-css-js-external";
        writeBlock($url, $style, $results);
      ?>
    </div>

    <div class="column" id="different-origin">
      <h2>Different-origin SVG</h2>
      <h3>SVG circle</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle.svg";
        $style = "circle";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css.svg";
        $style = "circle-css";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with same-origin external CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css-so.svg";
        $style = "circle-css-so";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with different-origin external CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css-do.svg.php";
        $style = "circle-css-do";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-js.svg";
        $style = "circle-js";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with same-origin external JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-js-so.svg";
        $style = "circle-js-so";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with different-origin external JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-js-do.svg.php";
        $style = "circle-js-do";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external CSS and JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css-js-external.svg";
        $style = "circle-css-js-external";
        writeBlock($url, $style, $results);
      ?>
    </div>
      
    <div class="column" id="non-CSP-origin">
      <!--
      Serve this file with the following CSP to test this section:
      "default-src 'none'; script-src 'self'; style-src 'self'; img-src 'self' http://nocsp.svg.test; object-src 'self' http://nocsp.svg.test; frame-src 'self' http://nocsp.svg.test;"
      -->
      <h2>Cross-origin (non-CSP) SVG</h2>
      <h3>SVG circle</h3>
      <?php
        $results = [
            "base.svg.test" => "1 gray; 1 load failure; 5 gray; 1 load failure",
            "xfo1.svg.test" => "1 gray; 1 load failure; 5 gray; 1 load failure",
            "xfo2.svg.test" => "1 gray; 1 load failure; 5 gray; 1 load failure",
            "csp1.svg.test" => "8 load failure",
            "csp2.svg.test" => "8 load failure",
            "csp3.svg.test" => "8 load failure",
            "csp4.svg.test" => "8 load failure",
            "csp5.svg.test" => "1 gray; 1 load failure; 5 gray; 1 load failure",
        ];
        $url = "http://nocsp.svg.test/circle.svg";
        $style = "circle";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "1 orange; 1 load failure; 5 orange; 1 load failure",
            "xfo1.svg.test" => "1 orange; 1 load failure; 5 orange; 1 load failure",
            "xfo2.svg.test" => "1 orange; 1 load failure; 5 orange; 1 load failure",
            "csp1.svg.test" => "8 load failure",
            "csp2.svg.test" => "8 load failure",
            "csp3.svg.test" => "8 load failure",
            "csp4.svg.test" => "8 load failure",
            "csp5.svg.test" => "1 gray; 1 load failure; 5 gray; 1 load failure",
        ];
        $url = "http://nocsp.svg.test/circle-css.svg";
        $style = "circle-css";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "1 gray; 1 load failure; 1 gray; 4 orange; 1 load failure",
            "xfo1.svg.test" => "1 gray; 1 load failure; 1 gray; 4 orange; 1 load failure",
            "xfo2.svg.test" => "1 gray; 1 load failure; 1 gray; 4 orange; 1 load failure",
            "csp1.svg.test" => "8 load failure",
            "csp2.svg.test" => "8 load failure",
            "csp3.svg.test" => "8 load failure",
            "csp4.svg.test" => "8 load failure",
            "csp5.svg.test" => "1 gray; 1 load failure; 5 gray; 1 load failure",
        ];
        $url = "http://nocsp.svg.test/circle-css-so.svg";
        $style = "circle-css-so";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "1 gray; 1 load failure; 1 gray; 3 gray with solid red border; 1 gray; 1 load failure",
            "xfo1.svg.test" => "1 gray; 1 load failure; 1 gray; 3 gray with solid red border; 1 gray; 1 load failure",
            "xfo2.svg.test" => "1 gray; 1 load failure; 1 gray; 3 gray with solid red border; 1 gray; 1 load failure",
            "csp1.svg.test" => "8 load failure",
            "csp2.svg.test" => "8 load failure",
            "csp3.svg.test" => "8 load failure",
            "csp4.svg.test" => "8 load failure",
            "csp5.svg.test" => "1 gray; 1 load failure; 5 gray; 1 load failure",
        ];
        $url = "http://nocsp.svg.test/circle-js.svg";
        $style = "circle-js";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "1 gray; 1 load failure; 1 gray; 3 gray with solid red border; 1 gray; 1 load failure",
            "xfo1.svg.test" => "1 gray; 1 load failure; 1 gray; 3 gray with solid red border; 1 gray; 1 load failure",
            "xfo2.svg.test" => "1 gray; 1 load failure; 1 gray; 3 gray with solid red border; 1 gray; 1 load failure",
            "csp1.svg.test" => "8 load failure",
            "csp2.svg.test" => "8 load failure",
            "csp3.svg.test" => "8 load failure",
            "csp4.svg.test" => "8 load failure",
            "csp5.svg.test" => "1 gray; 1 load failure; 5 gray; 1 load failure",
        ];
        $url = "http://nocsp.svg.test/circle-js-so.svg";
        $style = "circle-js-so";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external CSS and JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "1 gray; 1 load failure; 1 gray; 3 orange with solid red border; 1 orange; 1 load failure",
            "xfo1.svg.test" => "1 gray; 1 load failure; 1 gray; 3 orange with solid red border; 1 orange; 1 load failure",
            "xfo2.svg.test" => "1 gray; 1 load failure; 1 gray; 3 orange with solid red border; 1 orange; 1 load failure",
            "csp1.svg.test" => "8 load failure",
            "csp2.svg.test" => "8 load failure",
            "csp3.svg.test" => "8 load failure",
            "csp4.svg.test" => "8 load failure",
            "csp5.svg.test" => "1 gray; 1 load failure; 5 gray; 1 load failure",
        ];
        $url = "http://nocsp.svg.test/circle-css-js-external.svg";
        $style = "circle-css-js-external";
        writeBlock($url, $style, $results);
      ?>
    </div>

    <div class="column">
      <h2>Recursive SVG</h2>
      <h3>Singly-recursive SVG</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "recurse.svg";
        $style = "recurse";
        writeBlock($url, $style, $results);
      ?>
      <h3>Mutually-recursive SVG</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "recurse2_1.svg";
        $style = "recurse2_1";
        writeBlock($url, $style, $results);
      ?>
      <h3>Multiply-recursive SVG</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "recurse10_0.svg";
        $style = "recurse10_0";
        writeBlock($url, $style, $results);
      ?>
      <h3>Singly-recursive SVG using HTML img</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "recurse-html-img.svg";
        $style = "recurse-html-img";
        writeBlock($url, $style, $results);
      ?>
      <h3>Singly-recursive SVG using HTML object</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "recurse-html-embed.svg";
        $style = "recurse-html-embed";
        writeBlock($url, $style, $results);
      ?>
      <h3>Multiply-recursive SVG using HTML object</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "recurse-html-object-10_0.svg";
        $style = "recurse-html-object-10_0";
        writeBlock($url, $style, $results);
      ?>
    </div>

    <div class="column">
      <h2>Same-origin SVG that loads a same-origin SVG</h2>
      <h3>SVG circle</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-circle.svg";
        $style = "circle-emb-circle";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-circle-css.svg";
        $style = "circle-emb-circle-css";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-circle-css-external.svg";
        $style = "circle-emb-circle-css-external";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-circle-js.svg";
        $style = "circle-emb-circle-js";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-circle-js-external.svg";
        $style = "circle-emb-circle-js-external";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external CSS and JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-circle-css-js-external.svg";
        $style = "circle-emb-circle-css-js-external";
        writeBlock($url, $style, $results);
      ?>
    </div>

    <div class="column">
      <h2>Same-origin SVG that loads a different-origin SVG</h2>
      <h3>SVG circle</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-xd-circle.svg.php";
        $style = "circle-emb-xd-circle";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-xd-circle-css.svg.php";
        $style = "circle-emb-xd-circle-css";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-xd-circle-css-external.svg.php";
        $style = "circle-emb-xd-circle-css-external";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-xd-circle-js.svg.php";
        $style = "circle-emb-xd-circle-js";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-xd-circle-js-external.svg.php";
        $style = "circle-emb-xd-circle-js-external";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external CSS and JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-xd-circle-css-js-external.svg.php";
        $style = "circle-emb-xd-circle-css-js-external";
        writeBlock($url, $style, $results);
      ?>
    </div>
    
    <div class="column">
      <h2>Same-origin SVG that loads a same-origin SVG through HTML object</h2>
      <h3>SVG circle</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-html-circle.svg";
        $style = "circle-emb-html-circle";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-html-circle-css.svg";
        $style = "circle-emb-html-circle-css";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-html-circle-css-external.svg";
        $style = "circle-emb-html-circle-css-external";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-html-circle-js.svg";
        $style = "circle-emb-html-circle-js";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-html-circle-js-external.svg";
        $style = "circle-emb-html-circle-js-external";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external CSS and JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-html-circle-css-js-external.svg";
        $style = "circle-emb-html-circle-css-js-external";
        writeBlock($url, $style, $results);
      ?>
    </div>

    <div class="column">
      <h2>Same-origin SVG that loads a different-origin SVG through HTML object</h2>
      <h3>SVG circle</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-html-xd-circle.svg.php";
        $style = "circle-emb-html-xd-circle";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-html-xd-circle-css.svg.php";
        $style = "circle-emb-html-xd-circle-css";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external CSS</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-html-xd-circle-css-external.svg.php";
        $style = "circle-emb-html-xd-circle-css-external";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with in-line JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-html-xd-circle-js.svg.php";
        $style = "circle-emb-html-xd-circle-js";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-html-xd-circle-js-external.svg.php";
        $style = "circle-emb-html-xd-circle-js-external";
        writeBlock($url, $style, $results);
      ?>
      <h3>SVG circle with external CSS and JavaScript</h3>
      <?php
        $results = [
            "base.svg.test" => "",
            "xfo1.svg.test" => "",
            "xfo2.svg.test" => "",
            "csp1.svg.test" => "",
            "csp2.svg.test" => "",
            "csp3.svg.test" => "",
            "csp4.svg.test" => "",
            "csp5.svg.test" => "",
        ];
        $url = "circle-emb-html-xd-circle-css-js-external.svg.php";
        $style = "circle-emb-html-xd-circle-css-js-external";
        writeBlock($url, $style, $results);
      ?>
    </div>
  </body>
</html>

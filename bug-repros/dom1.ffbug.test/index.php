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

function writeRow($url, $style)
{
    echo "<p>";
    echo "<iframe src=\"", $url, "\" width=\"68\" height=\"68\"></iframe>";
    echo "<iframe src=\"", $url, "\" width=\"68\" height=\"68\" sandbox=\"\"></iframe>";
    echo "<span class=\"image\">",getFile($url),"</span>";
    echo "</p>";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Firefox CSP Violations</title>
    <link rel="stylesheet" type="text/css" href="index.css"/>
  </head>
  <body>
    <h1>Firefox CSP Violations</h1>
    <p>
      <code>Content-Security-Policy: default-src 'none'; script-src 'self'; style-src 'self'; frame-src 'self'</code>
    </p>
    <h3>SVG circle with in-line CSS</h3>
    <p>Expected: 2 gray circles; 1 load failure.  CSS blocked by <code>style-src</code>; in-line SVG blocked by <code>img-src</code>.</p>
    <?php
      $url = "circle-css.svg";
      $style = "circle-css";
      writeRow($url, $style);
    ?>
    <h3>SVG circle with cross-domain CSS</h3>
    <p>Expected: 2 gray circles; 1 load failure.  CSS blocked by <code>style-src</code>; in-line SVG blocked by <code>img-src</code>.</p>
    <?php
      $url = "circle-css-cross-domain.svg";
      $style = "circle-css-cross-domain";
      writeRow($url, $style);
    ?>
    <h3>SVG circle that embeds a same-origin SVG</h3>
    <p>Expected: 2 gray circles; 1 load failure.  CSS blocked by <code>style-src</code>; child SVG and in-line SVG blocked by <code>img-src</code>.</p>
    <?php
      $url = "circle-emb-circle.svg";
      $style = "circle-emb-circle";
      writeRow($url, $style);
    ?>
    <h3>SVG circle that embeds a cross-origin SVG</h3>
    <p>Expected: 2 gray circles; 1 load failure.  CSS blocked by <code>style-src</code>; child SVG and in-line SVG blocked by <code>img-src</code>.</p>
    <?php
      $url = "circle-emb-xd-circle.svg";
      $style = "circle-emb-xd-circle";
      writeRow($url, $style);
    ?>
    <h3>SVG circle that embeds a cross-origin SVG with in-line CSS through HTML</h3>
    <p>Expected: 2 gray circles; 1 load failure.  CSS blocked by <code>style-src</code>; child SVG and in-line SVG blocked by <code>img-src</code>.</p>
    <?php
      $url = "circle-emb-html-xd-circle-css.svg";
      $style = "circle-emb-html-xd-circle-css";
      writeRow($url, $style);
    ?>
    <h3>SVG circle that embeds a cross-origin SVG with external CSS through HTML</h3>
    <p>Expected: 2 gray circles; 1 load failure.  CSS blocked by <code>style-src</code>; child SVG and in-line SVG blocked by <code>img-src</code>.</p>
    <?php
      $url = "circle-emb-html-xd-circle-css-external.svg";
      $style = "circle-emb-html-xd-circle-css-external";
      writeRow($url, $style);
    ?>
  </body>
</html>


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
    echo "<span class=\"image\"><img src=\"", $url, "\" alt=\"circle\" width=\"68\" height=\"68\"/></span>";
    echo "<span class=\"image ", $style,"\"></span>";
    echo "<object data=\"", $url, "\" type=\"image/svg+xml\" width=\"68\" height=\"68\"></object>";
    echo "<embed src=\"", $url, "\" type=\"image/svg+xml\" width=\"68\" height=\"68\"></embed>";
    echo "<iframe src=\"", $url, "\" width=\"68\" height=\"68\"></iframe>";
    echo "<iframe src=\"", $url, "\" width=\"68\" height=\"68\" sandbox=\"\"></iframe>";
    echo "<span class=\"image\"><img width=\"68\" height=\"68\" alt=\"circle\" src=\"data:image/svg+xml;base64,",base64_encode(getFile($url)),"\"/></span>";
    echo "<span class=\"image\">",getFile($url),"</span>";
    echo "</p>";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Chrome CSP Violations</title>
    <link rel="stylesheet" type="text/css" href="index.css"/>
  </head>
  <body>
    <h1>Chrome CSP Violations</h1>
    <p>
      <code>Content-Security-Policy: default-src 'none'; script-src 'self'; style-src 'self'; img-src 'self' data:; object-src 'self'; frame-src 'self'</code>
    </p>
      <h3>SVG circle with in-line CSS</h3>
      <p>Expected: 8 gray circles; CSS blocked by <code>style-src</code>.</p>
      <?php
        $url = "circle-css.svg";
        $style = "circle-css";
        writeRow($url, $style);
      ?>
      <h3>SVG circle with cross-domain CSS</h3>
      <p>Expected: 8 gray circles; CSS blocked by <code>style-src</code>.</p>
      <?php
        $url = "circle-css-cross-domain.svg";
        $style = "circle-css-cross-domain";
        writeRow($url, $style);
      ?>

  </body>
</html>


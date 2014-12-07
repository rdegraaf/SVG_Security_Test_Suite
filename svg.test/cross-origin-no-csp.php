<?php
header("Content-type: text/html");

include "funcs.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>SVG Test: <?php echo $_SERVER['SERVER_NAME'], $_SERVER['REQUEST_URI'] ?></title>
    <link rel="stylesheet" type="text/css" href="index.css.php"/>
    <script type="text/javascript" src="index.js"></script>
  </head>
  <body id="non-CSP-origin">
    <?php include "nav.php"; ?>
    <h1>SVG from a different origin with empty policies</h1>
    <?php include "policy.php"; ?>
    <h2>SVG circle</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
    ];
    $url = "http://nocsp.svg.test/circle.svg";
    $style = "circle";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line CSS</h2>
    <?php
    $results = [
        "base.svg.test" => ["orange", "empty", "orange", "orange", "orange", "orange", "orange", "empty"],
        "xfo1.svg.test" => ["orange", "empty", "orange", "orange", "orange", "orange", "orange", "empty"],
        "xfo2.svg.test" => ["orange", "empty", "orange", "orange", "orange", "orange", "orange", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
    ];
    $url = "http://nocsp.svg.test/circle-css.svg";
    $style = "circle-css";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external CSS</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "orange", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "orange", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "orange", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "orange", "empty"],
    ];
    $url = "http://nocsp.svg.test/circle-css-so.svg";
    $style = "circle-css-so";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external CSS</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "orange", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "orange", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "orange", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "orange", "empty"],
    ];
    $url = "http://nocsp.svg.test/circle-css-do.svg.php";
    $style = "circle-css-do";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line JavaScript</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
    ];
    $url = "http://nocsp.svg.test/circle-js.svg";
    $style = "circle-js";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external JavaScript</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
    ];
    $url = "http://nocsp.svg.test/circle-js-so.svg";
    $style = "circle-js-so";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external JavaScript</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
    ];
    $url = "http://nocsp.svg.test/circle-js-do.svg.php";
    $style = "circle-js-do";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with external CSS and JavaScript</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "empty", "gray", "orange with solid red border", "orange with solid red border", "orange with solid red border", "orange", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "orange with solid red border", "orange with solid red border", "orange with solid red border", "orange", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "orange with solid red border", "orange with solid red border", "orange with solid red border", "orange", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "orange with solid red border", "orange with solid red border", "orange with solid red border", "orange", "empty"],
    ];
    $url = "http://nocsp.svg.test/circle-css-js-external.svg";
    $style = "circle-css-js-external";
    writeBlock($url, $style, $results);
    ?>
  </body>
</html>

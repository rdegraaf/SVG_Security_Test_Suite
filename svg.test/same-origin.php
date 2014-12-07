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
  <body id="same-origin">
    <?php include "nav.php"; ?>
    <h1>SVG from the current origin</h1>
    <?php include "policy.php"; ?>
    <h2>SVG circle</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"],
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "empty"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "empty"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
        "csp5.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"],
    ];
    $url = "circle.svg";
    $style = "circle";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line CSS</h2>
    <?php
    $results = [
        "base.svg.test" => ["orange", "orange", "orange", "orange", "orange", "orange", "orange", "orange"], 
        "xfo1.svg.test" => ["orange", "orange", "orange", "empty", "empty", "empty", "empty", "orange"], 
        "xfo2.svg.test" => ["orange", "orange", "orange", "orange", "orange", "orange", "orange", "orange"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "empty"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "empty"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
        "csp5.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"],
    ];
    $url = "circle-css.svg";
    $style = "circle-css";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external CSS</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "orange", "orange", "orange", "orange", "orange"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "orange"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "orange", "orange", "orange", "orange", "orange"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp2.svg.test" => ["gray", "empty", "gray", "orange", "orange", "empty", "empty", "empty"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "orange", "orange", "empty"],
        "csp4.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "gray", "empty"],
        "csp5.svg.test" => ["gray", "gray", "gray", "orange", "orange", "orange", "orange", "orange"], 
    ];
    $url = "circle-css-so.svg";
    $style = "circle-css-so";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external CSS</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "orange", "orange", "orange", "orange", "orange"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "orange"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "orange", "orange", "orange", "orange", "orange"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "empty"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "empty"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
        "csp5.svg.test" => ["gray", "gray", "gray", "orange", "orange", "orange", "orange", "orange"], 
    ];
    $url = "circle-css-do.svg.php";
    $style = "circle-css-do";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line JavaScript</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with dashed red border", "gray with dashed red border", "gray with dashed red border", "gray", "gray with dashed red border"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with dashed red border"],
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with dashed red border", "gray with dashed red border", "gray with dashed red border", "gray", "gray with dashed red border"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "empty"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "empty"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
        "csp5.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"],
    ];
    $url = "circle-js.svg";
    $style = "circle-js";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external JavaScript</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with dashed red border", "gray with dashed red border", "gray with dashed red border", "gray", "gray with dashed red border"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with dashed red border"],
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with dashed red border", "gray with dashed red border", "gray with dashed red border", "gray", "gray with dashed red border"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with dashed red border", "gray with dashed red border", "empty", "empty", "empty"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray with dashed red border", "gray", "empty"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with dashed red border", "gray with dashed red border", "gray with dashed red border", "gray", "empty"],
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with dashed red border", "gray with dashed red border", "gray with dashed red border", "gray", "gray with dashed red border"],
    ];
    $url = "circle-js-so.svg";
    $style = "circle-js-so";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external JavaScript</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with dashed red border", "gray with dashed red border", "gray with dashed red border", "gray", "gray with dashed red border"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with dashed red border"],
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with dashed red border", "gray with dashed red border", "gray with dashed red border", "gray", "gray with dashed red border"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp2.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "empty"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with dashed red border", "gray with dashed red border", "gray with dashed red border", "gray", "gray with dashed red border"],
    ];
    $url = "circle-js-do.svg.php";
    $style = "circle-js-do";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with external CSS and JavaScript</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "orange with dashed red border", "orange with dashed red border", "orange with dashed red border", "orange", "orange with dashed red border"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "orange with dashed red border"],
        "xfo2.svg.test" => ["gray", "gray", "gray", "orange with dashed red border", "orange with dashed red border", "orange with dashed red border", "orange", "orange with dashed red border"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp2.svg.test" => ["gray", "gray", "gray", "orange with dashed red border", "orange with dashed red border", "empty", "empty", "empty"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "orange with dashed red border", "orange", "empty"],
        "csp4.svg.test" => ["gray", "empty", "gray", "orange with dashed red border", "orange with dashed red border", "orange with dashed red border", "orange", "empty"],
        "csp5.svg.test" => ["gray", "gray", "gray", "orange with dashed red border", "orange with dashed red border", "orange with dashed red border", "orange", "orange with dashed red border"],
    ];
    $url = "circle-css-js-external.svg";
    $style = "circle-css-js-external";
    writeBlock($url, $style, $results);
    ?>
  </body>
</html>

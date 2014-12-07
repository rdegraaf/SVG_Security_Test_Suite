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
    <h1>SVG with a different-origin child embedded using svg:image</h1>
    <?php include "policy.php"; ?>
    <h2>SVG circle</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
    ];
    $url = "circle-emb-xd-circle.svg.php";
    $style = "circle-emb-xd-circle";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line CSS</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with orange child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
    ];
    $url = "circle-emb-xd-circle-css.svg.php";
    $style = "circle-emb-xd-circle-css";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external CSS</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
    ];
    $url = "circle-emb-xd-circle-css-so.svg.php";
    $style = "circle-emb-xd-circle-css-so";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external CSS</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
    ];
    $url = "circle-emb-xd-circle-css-do.svg.php";
    $style = "circle-emb-xd-circle-css-do";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line JavaScript</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
    ];
    $url = "circle-emb-xd-circle-js.svg.php";
    $style = "circle-emb-xd-circle-js";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external JavaScript</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
    ];
    $url = "circle-emb-xd-circle-js-so.svg.php";
    $style = "circle-emb-xd-circle-js-so";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external JavaScript</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
    ];
    $url = "circle-emb-xd-circle-js-do.svg.php";
    $style = "circle-emb-xd-circle-js-do";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with external CSS and JavaScript</h2>
    <?php
    $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
    ];
    $url = "circle-emb-xd-circle-css-js-external.svg.php";
    $style = "circle-emb-xd-circle-css-js-external";
    writeBlock($url, $style, $results);
    ?>
  </body>
</html>

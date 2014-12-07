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
  <body id="same-origin">
    <?php include "nav.php"; ?>
    <h1>SVG with a same-origin child embedded using svg:image</h1>
    <?php printPolicies(); ?>
    <h2>SVG circle</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray with gray child", "gray with gray child", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
      ];
      $url = "circle-emb-circle.svg";
      $style = "circle-emb-circle";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line CSS</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with orange child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray with gray child", "gray with gray child", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
      ];
      $url = "circle-emb-circle-css.svg";
      $style = "circle-emb-circle-css";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external CSS</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray with gray child", "gray with gray child", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
      ];
      $url = "circle-emb-circle-css-so.svg";
      $style = "circle-emb-circle-css-so";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external CSS</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray with gray child", "gray with gray child", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
      ];
      $url = "circle-emb-circle-css-do.svg";
      $style = "circle-emb-circle-css-do";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray with gray child", "gray with gray child", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
      ];
      $url = "circle-emb-circle-js.svg";
      $style = "circle-emb-circle-js";
    writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray with gray child", "gray with gray child", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
      ];
      $url = "circle-emb-circle-js-so.svg";
      $style = "circle-emb-circle-js-so";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray with gray child", "gray with gray child", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
      ];
      $url = "circle-emb-circle-js-do.svg";
      $style = "circle-emb-circle-js-do";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with external CSS and JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray with gray child"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray with gray child", "gray with gray child", "empty"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "empty"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
      ];
      $url = "circle-emb-circle-css-js-external.svg";
      $style = "circle-emb-circle-css-js-external";
      writeBlock($url, $style, $results);
    ?>
  </body>
</html>

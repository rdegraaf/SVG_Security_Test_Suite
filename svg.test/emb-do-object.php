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
    <?php echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://", altHostName($_SERVER['SERVER_NAME']), "/c001.css", "\"/>" ?>
    <link rel="stylesheet" type="text/css" href="c002.css"/>
    <link rel="stylesheet" type="text/css" href="c003.css"/>
    <script type="text/javascript" src="index.js"></script>
  </head>
  <body id="same-origin">
    <?php include "nav.php"; ?>
    <h1>SVG with a different-origin child embedded using html:object</h1>
    <?php printPolicies(); ?>
    <h2>SVG circle</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "gray"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"],
      ];
      $url = "circle-emb-html-xd-circle.svg.php";
      $style = "circle-emb-html-xd-circle";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line CSS</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "gray"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"],
      ];
      $url = "circle-emb-html-xd-circle-css.svg.php";
      $style = "circle-emb-html-xd-circle-css";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external CSS</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "gray"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"],
      ];
      $url = "circle-emb-html-xd-circle-css-so.svg.php";
      $style = "circle-emb-html-xd-circle-css-so";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external CSS</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "gray"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"],
      ];
      $url = "circle-emb-html-xd-circle-css-do.svg.php";
      $style = "circle-emb-html-xd-circle-css-do";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with red-solid bordered gray child", "gray with red-solid bordered gray child", "gray with red-solid bordered gray child", "gray with gray child", "gray with red-solid bordered gray child"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "gray"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"],
      ];
      $url = "circle-emb-html-xd-circle-js.svg.php";
      $style = "circle-emb-html-xd-circle-js";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with red-solid bordered gray child", "gray with red-solid bordered gray child", "gray with red-solid bordered gray child", "gray with gray child", "gray with red-solid bordered gray child"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "gray"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with red-solid bordered gray child", "gray with red-solid bordered gray child", "gray with red-solid bordered gray child", "gray with gray child", "gray with red-solid bordered gray child"],
      ];
      $url = "circle-emb-html-xd-circle-js-so.svg.php";
      $style = "circle-emb-html-xd-circle-js-so";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with red-solid bordered gray child", "gray with red-solid bordered gray child", "gray with red-solid bordered gray child", "gray with gray child", "gray with red-solid bordered gray child"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "gray"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with red-solid bordered gray child", "gray with red-solid bordered gray child", "gray with red-solid bordered gray child", "gray with gray child", "gray with red-solid bordered gray child"],
      ];
      $url = "circle-emb-html-xd-circle-js-do.svg.php";
      $style = "circle-emb-html-xd-circle-js-do";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with external CSS and JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with red-solid bordered orange child", "gray with red-solid bordered orange child", "gray with red-solid bordered orange child", "gray with orange child", "gray with red-solid bordered orange child"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "gray"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"], 
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with red-solid bordered orange child", "gray with red-solid bordered orange child", "gray with red-solid bordered orange child", "gray with orange child", "gray with red-solid bordered orange child"],
      ];
      $url = "circle-emb-html-xd-circle-css-js-external.svg.php";
      $style = "circle-emb-html-xd-circle-css-js-external";
      writeBlock($url, $style, $results);
    ?>
  </body>
</html>

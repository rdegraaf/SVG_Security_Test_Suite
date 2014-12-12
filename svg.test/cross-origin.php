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
  <body id="different-origin">
    <?php include "nav.php"; ?>
    <h1>SVG from a different origin with the same policies</h1>
    <?php printPolicies() ?>
    <h2>SVG circle</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
      ];
      $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle.svg";
      $style = "circle";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line CSS</h2>
    <?php
      $results = [
        "base.svg.test" => ["orange", "empty", "orange", "orange", "orange", "orange", "orange", "empty"],
        "xfo1.svg.test" => ["orange", "empty", "orange", "empty", "empty", "empty", "empty", "empty"],
        "xfo2.svg.test" => ["orange", "empty", "orange", "empty", "empty", "empty", "empty", "empty"],
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
      ];
      $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css.svg";
      $style = "circle-css";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external CSS</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "orange", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "orange", "empty"],
      ];
      $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css-so.svg";
      $style = "circle-css-so";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external CSS</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "orange", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "orange", "empty"],
      ];
      $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css-do.svg.php";
      $style = "circle-css-do";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "empty"],
      ];
      $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-js.svg";
      $style = "circle-js";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
      ];
      $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-js-so.svg";
      $style = "circle-js-so";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "gray with solid red border", "gray with solid red border", "gray with solid red border", "gray", "empty"],
      ];
      $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-js-do.svg.php";
      $style = "circle-js-do";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with external CSS and JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "empty", "gray", "orange with solid red border", "orange with solid red border", "orange with solid red border", "orange", "empty"],
        "xfo1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "xfo2.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "empty"],
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"],
        "csp1.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp2.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp3.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp4.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "empty"], 
        "csp5.svg.test" => ["gray", "empty", "gray", "orange with solid red border", "orange with solid red border", "orange with solid red border", "orange", "empty"],
      ];
      $url = "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css-js-external.svg";
      $style = "circle-css-js-external";
      writeBlock($url, $style, $results);
    ?>
  </body>
</html>

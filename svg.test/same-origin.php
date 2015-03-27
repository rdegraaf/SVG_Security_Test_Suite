<?php /*
  This file is part of the SVG Security Test Suite (SSTS).

  SSTS is free software: you can redistribute it and/or modify it under 
  the terms of version 2 of of the GNU General Public License as 
  published by the Free Software Foundation.

  Foobar is distributed in the hope that it will be useful, but WITHOUT 
  ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
  FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License 
  for more details.

  You should have received a copy of the GNU General Public License 
  along with SSTS.  If not, see <http://www.gnu.org/licenses/>.
*/ ?>
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
    <h1>SVG from the current origin</h1>
    <?php printPolicies(); ?>
    <h2>SVG circle</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"],
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"],
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray", "gray", "gray", "gray", "gray"],
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"],
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "gray"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"],
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
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"],
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "gray"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"],
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
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "orange"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "orange"],
        "csp2.svg.test" => ["gray", "empty", "gray", "orange", "orange", "empty", "empty", "orange"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "orange", "orange", "orange"],
        "csp4.svg.test" => ["gray", "empty", "gray", "orange", "orange", "orange", "orange", "orange"],
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
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"],
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "gray"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"],
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
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"],
        "csp2.svg.test" => ["gray", "empty", "gray", "gray", "gray", "empty", "empty", "gray"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"],
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
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray with dashed red border"],
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with dashed red border", "gray with dashed red border", "empty", "empty", "gray with dashed red border"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray with dashed red border", "gray", "gray with dashed red border"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with dashed red border", "gray with dashed red border", "gray with dashed red border", "gray", "gray with dashed red border"],
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
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"],
        "csp2.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray", "gray", "gray", "gray", "gray"],
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
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "orange"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "orange with dashed red border"],
        "csp2.svg.test" => ["gray", "gray", "gray", "orange with dashed red border", "orange with dashed red border", "empty", "empty", "orange with dashed red border"],
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "orange with dashed red border", "orange", "orange with dashed red border"],
        "csp4.svg.test" => ["gray", "empty", "gray", "orange with dashed red border", "orange with dashed red border", "orange with dashed red border", "orange", "orange with dashed red border"],
        "csp5.svg.test" => ["gray", "gray", "gray", "orange with dashed red border", "orange with dashed red border", "orange with dashed red border", "orange", "orange with dashed red border"],
      ];
      $url = "circle-css-js-external.svg";
      $style = "circle-css-js-external";
      writeBlock($url, $style, $results);
    ?>
  </body>
</html>

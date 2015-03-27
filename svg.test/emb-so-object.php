<?php /*
  This file is part of the SVG Security Test Suite (SSTS).

  SSTS is free software: you can redistribute it and/or modify it under the 
  terms of version 2 of of the GNU General Public License as published by the 
  Free Software Foundation.

  Foobar is distributed in the hope that it will be useful, but WITHOUT ANY 
  WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR 
  A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

  You should have received a copy of the GNU General Public License along with 
  SSTS.  If not, see <https://www.gnu.org/licenses/gpl-2.0.html>.
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
    <h1>SVG with a same-origin child embedded using html:object</h1>
    <?php printPolicies(); ?>
    <h2>SVG circle</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "empty", "empty", "gray with gray child"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
      ];
      $url = "circle-emb-html-circle.svg";
      $style = "circle-emb-html-circle";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line CSS</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "empty", "empty", "gray with gray child"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
      ];
      $url = "circle-emb-html-circle-css.svg";
      $style = "circle-emb-html-circle-css";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external CSS</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with orange child", "gray with orange child", "empty", "empty", "gray with orange child"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"], 
      ];
      $url = "circle-emb-html-circle-css-so.svg";
      $style = "circle-emb-html-circle-css-so";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external CSS</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "empty", "empty", "gray with gray child"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child", "gray with orange child"], 
      ];
      $url = "circle-emb-html-circle-css-do.svg";
      $style = "circle-emb-html-circle-css-do";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with in-line JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with gray child", "gray with red-dash bordered gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with gray child", "gray with red-dash bordered gray child"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "empty", "empty", "gray with gray child"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
      ];
      $url = "circle-emb-html-circle-js.svg";
      $style = "circle-emb-html-circle-js";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with same-origin external JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with gray child", "gray with red-dash bordered gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with gray child", "gray with red-dash bordered gray child"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with red-dash bordered child", "gray with red-dashed bordered child", "empty", "empty", "gray with red-dash bordered child"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with gray child", "gray with red-dash bordered gray child"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with gray child", "gray with red-dash bordered gray child"], 
      ];
      $url = "circle-emb-html-circle-js-so.svg";
      $style = "circle-emb-html-circle-js-so";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with different-origin external JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with gray child", "gray with red-dash bordered gray child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with gray child", "gray with red-dash bordered gray child"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "empty", "empty", "gray with gray child"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child", "gray with gray child"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with red-dash bordered gray child", "gray with gray child", "gray with red-dash bordered gray child"], 
      ];
      $url = "circle-emb-html-circle-js-do.svg";
      $style = "circle-emb-html-circle-js-do";
      writeBlock($url, $style, $results);
    ?>
    <h2>SVG circle with external CSS and JavaScript</h2>
    <?php
      $results = [
        "base.svg.test" => ["gray", "gray", "gray", "gray with red-dash bordered orange child", "gray with red-dash bordered orange child", "gray with red-dash bordered orange child", "gray with orange child", "gray with red-dash bordered orange child"], 
        "xfo1.svg.test" => ["gray", "gray", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "xfo2.svg.test" => ["gray", "gray", "gray", "gray with red-dash bordered orange child", "gray with red-dash bordered orange child", "gray with red-dash bordered orange child", "gray with orange child", "gray with red-dash bordered orange child"], 
        "csp0.svg.test" => ["empty", "empty", "empty", "empty", "empty", "empty", "empty", "gray"],
        "csp1.svg.test" => ["gray", "empty", "gray", "empty", "empty", "empty", "empty", "gray"], 
        "csp2.svg.test" => ["gray", "empty", "gray", "gray with red-dash bordered orange child", "gray with red-dash bordered orange child", "empty", "empty", "gray with red-dash bordered orange child"], 
        "csp3.svg.test" => ["gray", "empty", "gray", "empty", "empty", "gray", "gray", "gray"],
        "csp4.svg.test" => ["gray", "empty", "gray", "gray with red-dash bordered orange child", "gray with red-dash bordered orange child", "gray with red-dash bordered orange child", "gray with orange child", "gray with red-dash bordered orange child"], 
        "csp5.svg.test" => ["gray", "gray", "gray", "gray with red-dash bordered orange child", "gray with red-dash bordered orange child", "gray with red-dash bordered orange child", "gray with orange child", "gray with red-dash bordered orange child"], 
      ];
      $url = "circle-emb-html-circle-css-js-external.svg";
      $style = "circle-emb-html-circle-css-js-external";
      writeBlock($url, $style, $results);
    ?>
  </body>
</html>

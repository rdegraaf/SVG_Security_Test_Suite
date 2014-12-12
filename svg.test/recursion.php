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
  <body>
    <?php include "nav.php"; ?>
    <h1>Recursive SVG</h1>
    <?php printPolicies(); ?>
    <h2>Singly-recursive SVG using svg:image</h2>
    <?php
      $results = [
        "base.svg.test" => ["one", "one", "one", "two", "two", "two", "two", "two"], 
        "xfo1.svg.test" => ["one", "one", "one", "zero", "zero", "zero", "zero", "two"], 
        "xfo2.svg.test" => ["one", "one", "one", "two", "two", "two", "two", "two"], 
        "csp0.svg.test" => ["zero", "zero", "zero", "zero", "zero", "zero", "zero", "one"], 
        "csp1.svg.test" => ["one", "zero", "one", "zero", "zero", "zero", "zero", "two"], 
        "csp2.svg.test" => ["one", "zero", "one", "two", "two", "zero", "zero", "two"], 
        "csp3.svg.test" => ["one", "zero", "one", "zero", "zero", "two", "two", "two"], 
        "csp4.svg.test" => ["one", "zero", "one", "two", "two", "two", "two", "two"], 
        "csp5.svg.test" => ["one", "one", "one", "two", "two", "two", "two", "two"], 
      ];
      $url = "recurse.svg";
      $style = "recurse";
      writeBlock($url, $style, $results);
    ?>
    <h2>Mutually-recursive SVG using svg:image</h2>
    <?php
      $results = [
        "base.svg.test" => ["one", "one", "one", "two", "two", "two", "two", "two"], 
        "xfo1.svg.test" => ["one", "one", "one", "zero", "zero", "zero", "zero", "two"], 
        "xfo2.svg.test" => ["one", "one", "one", "two", "two", "two", "two", "two"], 
        "csp0.svg.test" => ["zero", "zero", "zero", "zero", "zero", "zero", "zero", "one"], 
        "csp1.svg.test" => ["one", "zero", "one", "zero", "zero", "zero", "zero", "two"], 
        "csp2.svg.test" => ["one", "zero", "one", "two", "two", "zero", "zero", "two"], 
        "csp3.svg.test" => ["one", "zero", "one", "zero", "zero", "two", "two", "two"], 
        "csp4.svg.test" => ["one", "zero", "one", "two", "two", "two", "two", "two"], 
        "csp5.svg.test" => ["one", "one", "one", "two", "two", "two", "two", "two"], 
      ];
      $url = "recurse2_1.svg";
      $style = "recurse2_1";
      writeBlock($url, $style, $results);
    ?>
    <h2>Multiply-recursive SVG using svg:image</h2>
    <?php
      $results = [
        "base.svg.test" => ["one", "one", "one", "two", "two", "two", "two", "two"], 
        "xfo1.svg.test" => ["one", "one", "one", "zero", "zero", "zero", "zero", "two"], 
        "xfo2.svg.test" => ["one", "one", "one", "two", "two", "two", "two", "two"], 
        "csp0.svg.test" => ["zero", "zero", "zero", "zero", "zero", "zero", "zero", "one"], 
        "csp1.svg.test" => ["one", "zero", "one", "zero", "zero", "zero", "zero", "two"], 
        "csp2.svg.test" => ["one", "zero", "one", "two", "two", "zero", "zero", "two"], 
        "csp3.svg.test" => ["one", "zero", "one", "zero", "zero", "two", "two", "two"], 
        "csp4.svg.test" => ["one", "zero", "one", "two", "two", "two", "two", "two"], 
        "csp5.svg.test" => ["one", "one", "one", "two", "two", "two", "two", "two"], 
      ];
      $url = "recurse10_0.svg";
      $style = "recurse10_0";
      writeBlock($url, $style, $results);
    ?>
    <h2>Singly-recursive SVG using html:img</h2>
    <?php
      $results = [
        "base.svg.test" => ["one", "one", "one", "two", "two", "two", "two", "two"], 
        "xfo1.svg.test" => ["one", "one", "one", "zero", "zero", "zero", "zero", "one"], 
        "xfo2.svg.test" => ["one", "one", "one", "two", "two", "two", "two", "two"], 
        "csp0.svg.test" => ["zero", "zero", "zero", "zero", "zero", "zero", "zero", "one"], 
        "csp1.svg.test" => ["one", "zero", "one", "zero", "zero", "zero", "zero", "two"], 
        "csp2.svg.test" => ["one", "zero", "one", "two", "two", "zero", "zero", "two"], 
        "csp3.svg.test" => ["one", "zero", "one", "zero", "zero", "two", "two", "two"], 
        "csp4.svg.test" => ["one", "zero", "one", "two", "two", "two", "two", "two"], 
        "csp5.svg.test" => ["one", "one", "one", "two", "two", "two", "two", "two"], 
      ];
      $url = "recurse-html-img.svg";
      $style = "recurse-html-img";
      writeBlock($url, $style, $results);
    ?>
    <h2>Singly-recursive SVG using html:object</h2>
    <?php
      $results = [
        "base.svg.test" => ["one", "one", "one", "one", "one", "one", "one", "one"], 
        "xfo1.svg.test" => ["one", "one", "one", "zero", "zero", "zero", "zero", "one"], 
        "xfo2.svg.test" => ["one", "one", "one", "one", "one", "one", "one", "one"], 
        "csp0.svg.test" => ["zero", "zero", "zero", "zero", "zero", "zero", "zero", "one"], 
        "csp1.svg.test" => ["one", "zero", "one", "zero", "zero", "zero", "zero", "one"], 
        "csp2.svg.test" => ["one", "zero", "one", "one", "one", "zero", "zero", "two"], 
        "csp3.svg.test" => ["one", "zero", "one", "zero", "zero", "one", "one", "one"], 
        "csp4.svg.test" => ["one", "zero", "one", "one", "one", "one", "one", "two"], 
        "csp5.svg.test" => ["one", "one", "one", "one", "one", "one", "one", "one"], 
      ];
      $url = "recurse-html-object.svg";
      $style = "recurse-html-object";
      writeBlock($url, $style, $results);
    ?>
    <h2>Multiply-recursive SVG using html:object</h2>
    <?php
      $results = [
        "base.svg.test" => ["one", "one", "one", "ten", "ten", "ten", "ten", "ten"], 
        "xfo1.svg.test" => ["one", "one", "one", "zero", "zero", "zero", "zero", "one"], 
        "xfo2.svg.test" => ["one", "one", "one", "ten", "ten", "ten", "ten", "ten"], 
        "csp0.svg.test" => ["zero", "zero", "zero", "zero", "zero", "zero", "zero", "one"], 
        "csp1.svg.test" => ["one", "zero", "one", "zero", "zero", "zero", "zero", "one"], 
        "csp2.svg.test" => ["one", "zero", "one", "ten", "ten", "zero", "zero", "ten"], 
        "csp3.svg.test" => ["one", "zero", "one", "zero", "zero", "one", "one", "one"], 
        "csp4.svg.test" => ["one", "zero", "one", "ten", "ten", "ten", "ten", "ten"], 
        "csp5.svg.test" => ["one", "one", "one", "ten", "ten", "ten", "ten", "ten"], 
      ];
      $url = "recurse-html-object-10_0.svg";
      $style = "recurse-html-object-10_0";
      writeBlock($url, $style, $results);
    ?>
  </body>
</html>

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
  <body>
    <?php include "nav.php"; ?>
    <dl>
      <dt>Base case</dt>
      <dd>solid gray circle with no border</dd>
      <dt>CSS</dt>
      <dd>changes the circle's colour to orange</dd>
      <dt>JavsScript</dt>
      <dd>adds a 2-pixel red border</dd>
      <!--<dt>Parent document CSS</dt>
      <dd>changes the border width to 5 pixels</dd>
      <dt>Parent document JavaScript</dt>
      <dd>changes the border width to 5 pixels</dd>-->
      <dt>Callback to parent document JavaScript</dt>
      <dd>make the border dashed</dd>
    </dl>
  </body>
</html>

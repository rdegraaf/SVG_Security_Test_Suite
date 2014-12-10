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
  </head>
  <body>
    <h1>SVG Security Test Suite</h1>
    <?php include "nav.php"; ?>
    <p>See the README that came with this package for documentation.</p>
  </body>
</html>

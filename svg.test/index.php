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
  </head>
  <body>
    <h1>SVG Security Test Suite</h1>
    <?php include "nav.php"; ?>
    <p>See the README that came with this package for documentation.</p>
  </body>
</html>

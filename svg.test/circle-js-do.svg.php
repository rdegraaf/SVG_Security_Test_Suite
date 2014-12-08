<?php
header("Content-type: image/svg+xml");

include "funcs.php";

echo "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>"
?>
<svg
   xmlns="http://www.w3.org/2000/svg"
   xmlns:xlink="http://www.w3.org/1999/xlink"
   width="68"
   height="68"
   viewBox="-34 -34 68 68"
   version="1.1">
  <?php
    echo "<script type=\"text/javascript\" xlink:href=\"", "http://", altHostName($_SERVER['SERVER_NAME']), "/c006.js", "\"></script>";
  ?>
  <circle
     cx="0"
     cy="0"
     r="24"
     fill="#c8c8c8"
     id="c006"/>
</svg>

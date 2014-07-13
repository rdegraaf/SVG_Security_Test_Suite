<?php
header("Content-type: image/svg+xml");

function altHostName($hostName)
{
    $prefix = substr($hostName, 0, strlen($hostName) - 9);
    $suffix = substr($hostName, -9);
    return $prefix . "_a" . $suffix;
}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>"
?>
<svg
   xmlns="http://www.w3.org/2000/svg"
   xmlns:xlink="http://www.w3.org/1999/xlink"
   width="68"
   height="68"
   viewBox="-34 -34 68 68"
   version="1.1">
  <circle
     cx="0"
     cy="0"
     r="24"
     fill="#c8c8c8"/>
  <?php
    echo "<image x=\"0\" y=\"0\" width=\"34\" height=\"34\" xlink:href=\"", "http://", altHostName($_SERVER['SERVER_NAME']), "/circle-css.svg", "\" />";
  ?>
</svg>

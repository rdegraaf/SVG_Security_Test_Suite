<?php
header("Content-type: image/svg+xml");

function altHostName($hostName)
{
    $prefix = substr($hostName, 0, 4);
    $suffix = substr($hostName, -9);
    return $prefix . "_b" . $suffix;
}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>"
?>
<?php
echo "<?xml-stylesheet type=\"text/css\" href=\"", "http://", altHostName($_SERVER['SERVER_NAME']), "/circle.css", "\"?>";
?>
<svg
   xmlns="http://www.w3.org/2000/svg"
   xmlns:xlink="http://www.w3.org/1999/xlink"
   width="68"
   height="68"
   id="svg2"
   version="1.1">
  <circle
     cx="34"
     cy="34"
     r="24"
     fill="#c8c8c8"
     fill-opacity="1"
     stroke-width="2"
     stroke-miterlimit="4"
     stroke-dasharray="none"
     id="path0007"/>
</svg>

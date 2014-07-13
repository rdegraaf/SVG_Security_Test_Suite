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
   xmlns:xhtml="http://www.w3.org/1999/xhtml"
   width="68"
   height="68"
   viewBox="-34 -34 68 68"
   version="1.1">
  <circle
     cx="0"
     cy="0"
     r="24"
     fill="#c8c8c8"/>
  <foreignObject x="0" y="0" width="34" height="34">
    <xhtml:html>
      <xhtml:head>
        <xhtml:title></xhtml:title>
        <xhtml:link rel="stylesheet" type="text/css" href="foreignobject.css"/>
      </xhtml:head>
      <xhtml:body>
        <xhtml:p>
          <?php
            echo "<xhtml:object width=\"34\" height=\"34\" type=\"image/svg+xml\" data=\"", "http://", altHostName($_SERVER['SERVER_NAME']), "/circle-css-so.svg", "\" >circle</xhtml:object>";
          ?>
        </xhtml:p>
      </xhtml:body>
    </xhtml:html>
  </foreignObject>
</svg>

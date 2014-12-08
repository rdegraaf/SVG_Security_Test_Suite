<?php 
function getFile($url)
{
    if (0 === strpos($url, "http://")) {
        // We only get an HTTP URL for different-origin objects, which it doesn't make sense to 
        // in-line.  So return a dummy object.
        return "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"68\" height=\"68\" version=\"1.1\"></svg>";
    } else {
        // Force an HTTP retrieval to execute any PHP in the object.
        return file_get_contents("http://" . $_SERVER['SERVER_NAME'] . "/" . $url);
    }
}

function writeBlock($uri, $style, $results)
{
    echo "<table class=\"testcase\"><thead><tr>";
    echo "<td><code>img</code></td>";
    echo "<td><code>img</code> with <code>data:</code> URI</td>";
    echo "<td>CSS <code>background-image</code></td>";
    echo "<td><code>object</code></td>";
    echo "<td><code>embed</code></td>";
    echo "<td><code>iframe</code></td>";
    echo "<td>Sandboxed <code>iframe</code></td>";
    echo "<td>In-line</td>";
    echo "</tr></thead><tbody><tr>";
    echo "<td><img src=\"", $uri, "\" alt=\"\" width=\"68\" height=\"68\"/></td>";
    echo "<td><img width=\"68\" height=\"68\" alt=\"\" src=\"data:image/svg+xml;base64,",base64_encode(getFile($uri)),"\"/></td>";
    echo "<td class=\"", $style,"\"></td>";
    echo "<td><object data=\"", $uri, "\" type=\"image/svg+xml\" width=\"68\" height=\"68\"></object></td>";
    echo "<td><embed src=\"", $uri, "\" type=\"image/svg+xml\" width=\"68\" height=\"68\"></embed></td>";
    echo "<td><iframe src=\"", $uri, "\" width=\"68\" height=\"68\"></iframe></td>";
    echo "<td><iframe src=\"", $uri, "\" width=\"68\" height=\"68\" sandbox=\"\"></iframe></td>";
    echo "<td><span class=\"image\">",getFile($uri),"</span></td>";
    echo "</tr></tbody><tfoot><tr>";
    foreach ($results[$_SERVER['SERVER_NAME']] as $exp) {
        echo "<td>$exp</td>";
    }
    echo "</tr></tfoot></table>";
}

function altHostName($hostName)
{
    $pos = strpos($hostName, ".");
    $prefix = substr($hostName, 0, $pos);
    $suffix = substr($hostName, $pos);

    $pos = strpos($prefix, "_");
    if (false !== $pos) {
        $prefix = substr($prefix, 0, $pos);
        return $prefix . "_b" . $suffix;
    }

    return $prefix . "_a" . $suffix;
}

function printPolicies()
{
    $policies = [
        "base.svg.test"  => [NULL, NULL],
        "nocsp.svg.test" => [NULL, NULL],
        "xfo1.svg.test"  => [NULL, "DENY"],
        "xfo2.svg.test"  => [NULL, "SAMEORIGIN"],
        "csp0.svg.test"  => ["default-src 'none'; style-src 'self';", NULL],
        "csp1.svg.test"  => ["default-src 'none'; script-src 'self'; style-src 'self'; img-src 'self'", NULL],
        "csp2.svg.test"  => ["default-src 'none'; script-src 'self'; style-src 'self'; object-src 'self'", NULL],
        "csp3.svg.test"  => ["default-src 'none'; script-src 'self'; style-src 'self'; frame-src 'self'", NULL],
        "csp4.svg.test"  => ["default-src 'none'; script-src 'self'; style-src 'self'; img-src 'self'; object-src 'self'; frame-src 'self'", NULL],
        "csp5.svg.test"  => ["default-src 'none'; script-src 'self' http://*.svg.test; style-src 'self' http://*.svg.test; img-src 'self' data: http://*.svg.test; object-src 'self' data: http://*.svg.test; frame-src 'self' data: http://*.svg.test;", NULL]
    ];

    echo "<h2>Policy:</h2>";
    echo "<ul>";
    echo "<li>CSP: <code>", $policies[$_SERVER['SERVER_NAME']][0], "</code></li>";
    echo "<li>XFO: <code>", $policies[$_SERVER['SERVER_NAME']][1], "</code></li>";
    echo "</ul>";
}
?>

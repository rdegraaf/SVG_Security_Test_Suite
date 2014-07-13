<?php
header("Content-type: text/css");

function altHostName($hostName)
{
    $prefix = substr($hostName, 0, strlen($hostName) - 9);
    $suffix = substr($hostName, -9);
    return $prefix . "_a" . $suffix;
}

?>

embed, object {
    display: inline-block;
    border: 1px solid black;
}

.column {
    display: inline-block;
    width: 600px;
}

iframe {
    border: 1px solid black;
}

/*#path2985 {stroke-width: 5 !important; }*/
#path0003, #path0006 {fill: orange;}

span.image {
    display: inline-block;
    height: 68px;
    width: 68px;
    border: 1px solid black;
}

#same-origin span.circle {
    background-image: url('circle.svg');
}
#different-origin span.circle {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle.svg", "');";
    ?>
}
#non-CSP-origin span.circle {
    background-image: url('http://nocsp.svg.test/circle.svg');
}

#same-origin span.circle-css {
    background-image: url('circle-css.svg');
}
#different-origin span.circle-css {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css.svg", "');";
    ?>
}
#non-CSP-origin span.circle-css {
    background-image: url('http://nocsp.svg.test/circle-css.svg');
}

#same-origin span.circle-css-so {
    background-image: url('circle-css-so.svg');
}
#different-origin span.circle-css-so {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css-so.svg", "');";
    ?>
}
#non-CSP-origin span.circle-css-so {
    background-image: url('http://nocsp.svg.test/circle-css-so.svg');
}

#same-origin span.circle-js {
    background-image: url('circle-js.svg');
}
#different-origin span.circle-js {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-js.svg", "');";
    ?>
}
#non-CSP-origin span.circle-js {
    background-image: url('http://nocsp.svg.test/circle-js.svg');
}

#same-origin span.circle-js-so {
    background-image: url('circle-js-so.svg');
}
#different-origin span.circle-js-so {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-js-so.svg", "');";
    ?>
}
#non-CSP-origin span.circle-js-so {
    background-image: url('http://nocsp.svg.test/circle-js-so.svg');
}

#same-origin span.circle-css-js-external {
    background-image: url('circle-css-js-external.svg');
}
#different-origin span.circle-css-js-external {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css-js-external.svg", "');";
    ?>
}
#non-CSP-origin span.circle-css-js-external {
    background-image: url('http://nocsp.svg.test/circle-css-js-external.svg');
}

span.circle-css-do {
    background-image: url('circle-css-do.svg.php');
}
span.circle-js-do {
    background-image: url('circle-js-do.svg.php');
}

span.circle-emb-circle {
    background-image: url('circle-emb-circle.svg');
}
span.circle-emb-circle-css {
    background-image: url('circle-emb-circle-css.svg');
}
span.circle-emb-circle-css-external {
    background-image: url('circle-emb-circle-css-external.svg');
}
span.circle-emb-circle-js {
    background-image: url('circle-emb-circle-js.svg');
}
span.circle-emb-circle-js-external {
    background-image: url('circle-emb-circle-js-external.svg');
}
span.circle-emb-circle-css-js-external {
    background-image: url('circle-emb-circle-css-js-external.svg');
}

span.circle-emb-xd-circle {
    background-image: url('circle-emb-xd-circle.svg.php');
}
span.circle-emb-xd-circle-css {
    background-image: url('circle-emb-xd-circle-css.svg.php');
}
span.circle-emb-xd-circle-css-external {
    background-image: url('circle-emb-xd-circle-css-external.svg.php');
}
span.circle-emb-xd-circle-js {
    background-image: url('circle-emb-xd-circle-js.svg.php');
}
span.circle-emb-xd-circle-js-external {
    background-image: url('circle-emb-xd-circle-js-external.svg.php');
}
span.circle-emb-xd-circle-css-js-external {
    background-image: url('circle-emb-xd-circle-css-js-external.svg.php');
}

span.circle-emb-html-circle {
    background-image: url('circle-emb-html-circle.svg');
}
span.circle-emb-html-circle-css {
    background-image: url('circle-emb-html-circle-css.svg');
}
span.circle-emb-html-circle-css-external {
    background-image: url('circle-emb-html-circle-css-external.svg');
}
span.circle-emb-html-circle-js {
    background-image: url('circle-emb-html-circle-js.svg');
}
span.circle-emb-html-circle-js-external {
    background-image: url('circle-emb-html-circle-js-external.svg');
}
span.circle-emb-html-circle-css-js-external {
    background-image: url('circle-emb-html-circle-css-js-external.svg');
}

span.circle-emb-html-xd-circle {
    background-image: url('circle-emb-html-xd-circle.svg.php');
}
span.circle-emb-html-xd-circle-css {
    background-image: url('circle-emb-html-xd-circle-css.svg.php');
}
span.circle-emb-html-xd-circle-css-external {
    background-image: url('circle-emb-html-xd-circle-css-external.svg.php');
}
span.circle-emb-html-xd-circle-js {
    background-image: url('circle-emb-html-xd-circle-js.svg.php');
}
span.circle-emb-html-xd-circle-js-external {
    background-image: url('circle-emb-html-xd-circle-js-external.svg.php');
}
span.circle-emb-html-xd-circle-css-js-external {
    background-image: url('circle-emb-html-xd-circle-css-js-external.svg.php');
}

span.recurse {
    background-image: url('recurse.svg');
}
span.recurse2_1 {
    background-image: url('recurse2_1.svg');
}
span.recurse10_0 {
    background-image: url('recurse10_0.svg');
}
span.recurse-html-img {
    background-image: url('recurse-html-img.svg');
}
span.recurse-html-embed {
    background-image: url('recurse-html-embed.svg');
}
span.recurse-html-object-10_0 {
    background-image: url('recurse-html-object-10_0.svg');
}

span.circle-css2 {
    background-image: url('circle-css2.svg');
}
span.circle-js2 {
    background-image: url('circle-js2.svg');
}

#navigation {
    position: fixed;
    top: 0px;
    left: 0px;
    background: white;
}

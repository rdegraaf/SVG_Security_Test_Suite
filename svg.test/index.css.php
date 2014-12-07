<?php
header("Content-type: text/css");

include "funcs.php";
?>

/*#navigation {
    position: fixed;
    top: 0px;
    left: 0px;
    background: white;
}*/

#nav>thead td {
    font-weight: bold;
}

#nav>tbody th {
    text-align: right;
}

#nav>tbody td {
    text-align: center;
}

#nav td.current {
    background-color: #90ee90;
}

table.testcase {
    table-layout: fixed;
    width: 560px;
}
table.testcase>thead td {
    width: 66px;
    text-align: center;
    font-weight: bold;
    overflow: hidden;
    padding: 2px;
}
table.testcase>tbody tr {
    line-height: 0;
}
table.testcase>tbody td {
    width: 68px;
    height: 68px;
    border: 1px solid black;
    padding: 0px;
}
table.testcase>tbody img {
    display: block;
}
table.testcase>tbody iframe {
    border-width: 0px;
}
table.testcase>tfoot td {
    width: 66px;
    text-align: left;
    vertical-align: top;
    overflow: hidden;
    padding: 2px;
}

#same-origin td.circle {
    background-image: url('circle.svg');
}
#different-origin td.circle {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle.svg", "');";
    ?>
}
#non-CSP-origin td.circle {
    background-image: url('http://nocsp.svg.test/circle.svg');
}

#same-origin td.circle-css {
    background-image: url('circle-css.svg');
}
#different-origin td.circle-css {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css.svg", "');";
    ?>
}
#non-CSP-origin td.circle-css {
    background-image: url('http://nocsp.svg.test/circle-css.svg');
}

#same-origin td.circle-css-so {
    background-image: url('circle-css-so.svg');
}
#different-origin td.circle-css-so {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css-so.svg", "');";
    ?>
}
#non-CSP-origin td.circle-css-so {
    background-image: url('http://nocsp.svg.test/circle-css-so.svg');
}

#same-origin td.circle-js {
    background-image: url('circle-js.svg');
}
#different-origin td.circle-js {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-js.svg", "');";
    ?>
}
#non-CSP-origin td.circle-js {
    background-image: url('http://nocsp.svg.test/circle-js.svg');
}

#same-origin td.circle-js-so {
    background-image: url('circle-js-so.svg');
}
#different-origin td.circle-js-so {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-js-so.svg", "');";
    ?>
}
#non-CSP-origin td.circle-js-so {
    background-image: url('http://nocsp.svg.test/circle-js-so.svg');
}

#same-origin td.circle-css-js-external {
    background-image: url('circle-css-js-external.svg');
}
#different-origin td.circle-css-js-external {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css-js-external.svg", "');";
    ?>
}
#non-CSP-origin td.circle-css-js-external {
    background-image: url('http://nocsp.svg.test/circle-css-js-external.svg');
}

#same-origin td.circle-css-do {
    background-image: url('circle-css-do.svg.php');
}
#different-origin td.circle-css-do {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-css-do.svg.php", "');";
    ?>
}
#non-CSP-origin td.circle-css-do {
    background-image: url('http://nocsp.svg.test/circle-css-do.svg.php');
}


#same-origin td.circle-js-do {
    background-image: url('circle-js-do.svg.php');
}
#different-origin td.circle-js-do {
    <?php
        echo "background-image: url('", "http://" . altHostName($_SERVER['SERVER_NAME']) . "/circle-js-do.svg.php", "');";
    ?>
}
#non-CSP-origin td.circle-js-do {
    background-image: url('http://nocsp.svg.test/circle-js-do.svg.php');
}


td.circle-emb-circle {
    background-image: url('circle-emb-circle.svg');
}
td.circle-emb-circle-css {
    background-image: url('circle-emb-circle-css.svg');
}
td.circle-emb-circle-css-so {
    background-image: url('circle-emb-circle-css-so.svg');
}
td.circle-emb-circle-css-do {
    background-image: url('circle-emb-circle-css-do.svg');
}
td.circle-emb-circle-js {
    background-image: url('circle-emb-circle-js.svg');
}
td.circle-emb-circle-js-so {
    background-image: url('circle-emb-circle-js-so.svg');
}
td.circle-emb-circle-js-do {
    background-image: url('circle-emb-circle-js-do.svg');
}
td.circle-emb-circle-css-js-external {
    background-image: url('circle-emb-circle-css-js-external.svg');
}

td.circle-emb-xd-circle {
    background-image: url('circle-emb-xd-circle.svg.php');
}
td.circle-emb-xd-circle-css {
    background-image: url('circle-emb-xd-circle-css.svg.php');
}
td.circle-emb-xd-circle-css-so {
    background-image: url('circle-emb-xd-circle-css-so.svg.php');
}
td.circle-emb-xd-circle-css-do {
    background-image: url('circle-emb-xd-circle-css-do.svg.php');
}
td.circle-emb-xd-circle-js {
    background-image: url('circle-emb-xd-circle-js.svg.php');
}
td.circle-emb-xd-circle-js-so {
    background-image: url('circle-emb-xd-circle-js-so.svg.php');
}
td.circle-emb-xd-circle-js-do {
    background-image: url('circle-emb-xd-circle-js-do.svg.php');
}
td.circle-emb-xd-circle-css-js-external {
    background-image: url('circle-emb-xd-circle-css-js-external.svg.php');
}

td.circle-emb-html-circle {
    background-image: url('circle-emb-html-circle.svg');
}
td.circle-emb-html-circle-css {
    background-image: url('circle-emb-html-circle-css.svg');
}
td.circle-emb-html-circle-css-so {
    background-image: url('circle-emb-html-circle-css-so.svg');
}
td.circle-emb-html-circle-css-do {
    background-image: url('circle-emb-html-circle-css-do.svg');
}
td.circle-emb-html-circle-js {
    background-image: url('circle-emb-html-circle-js.svg');
}
td.circle-emb-html-circle-js-so {
    background-image: url('circle-emb-html-circle-js-so.svg');
}
td.circle-emb-html-circle-js-do {
    background-image: url('circle-emb-html-circle-js-do.svg');
}
td.circle-emb-html-circle-css-js-external {
    background-image: url('circle-emb-html-circle-css-js-external.svg');
}

td.circle-emb-html-xd-circle {
    background-image: url('circle-emb-html-xd-circle.svg.php');
}
td.circle-emb-html-xd-circle-css {
    background-image: url('circle-emb-html-xd-circle-css.svg.php');
}
td.circle-emb-html-xd-circle-css-so {
    background-image: url('circle-emb-html-xd-circle-css-so.svg.php');
}
td.circle-emb-html-xd-circle-css-do {
    background-image: url('circle-emb-html-xd-circle-css-do.svg.php');
}
td.circle-emb-html-xd-circle-js {
    background-image: url('circle-emb-html-xd-circle-js.svg.php');
}
td.circle-emb-html-xd-circle-js-so {
    background-image: url('circle-emb-html-xd-circle-js-so.svg.php');
}
td.circle-emb-html-xd-circle-js-do {
    background-image: url('circle-emb-html-xd-circle-js-do.svg.php');
}
td.circle-emb-html-xd-circle-css-js-external {
    background-image: url('circle-emb-html-xd-circle-css-js-external.svg.php');
}

td.recurse {
    background-image: url('recurse.svg');
}
td.recurse2_1 {
    background-image: url('recurse2_1.svg');
}
td.recurse10_0 {
    background-image: url('recurse10_0.svg');
}
td.recurse-html-img {
    background-image: url('recurse-html-img.svg');
}
td.recurse-html-object {
    background-image: url('recurse-html-object.svg');
}
td.recurse-html-object-10_0 {
    background-image: url('recurse-html-object-10_0.svg');
}

td.circle-css2 {
    background-image: url('circle-css2.svg');
}
td.circle-js2 {
    background-image: url('circle-js2.svg');
}


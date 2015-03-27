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
    function addLink($uri)
    {
        echo "<td";
        if ('/' != $_SERVER['REQUEST_URI'] && false !== strpos($uri, $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']))
        {
            echo " class=\"current\"";
        }
        echo "><a href=\"".$uri."\">Link</a></td>";
    }
?>
    <table id="nav">
      <thead>
        <tr>
          <th><a href="http://svg.test">Index</a></th>
          <td>Base</td>
          <td>XFO1</td>
          <td>XFO2</td>
          <td>CSP0</td>
          <td>CSP1</td>
          <td>CSP2</td>
          <td>CSP3</td>
          <td>CSP4</td>
          <td>CSP5</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>Same-origin</th>
          <?php
            addLink("http://base.svg.test/same-origin.php");
            addLink("http://xfo1.svg.test/same-origin.php");
            addLink("http://xfo2.svg.test/same-origin.php");
            addLink("http://csp0.svg.test/same-origin.php");
            addLink("http://csp1.svg.test/same-origin.php");
            addLink("http://csp2.svg.test/same-origin.php");
            addLink("http://csp3.svg.test/same-origin.php");
            addLink("http://csp4.svg.test/same-origin.php");
            addLink("http://csp5.svg.test/same-origin.php");
          ?>
        </tr>
        <tr>
          <th>Different-origin</th>
          <?php
            addLink("http://base.svg.test/cross-origin.php");
            addLink("http://xfo1.svg.test/cross-origin.php");
            addLink("http://xfo2.svg.test/cross-origin.php");
            addLink("http://csp0.svg.test/cross-origin.php");
            addLink("http://csp1.svg.test/cross-origin.php");
            addLink("http://csp2.svg.test/cross-origin.php");
            addLink("http://csp3.svg.test/cross-origin.php");
            addLink("http://csp4.svg.test/cross-origin.php");
            addLink("http://csp5.svg.test/cross-origin.php");
          ?>
        </tr>
        <tr>
          <th>Different-origin with no policies</th>
          <?php
            addLink("http://base.svg.test/cross-origin-no-csp.php");
            addLink("http://xfo1.svg.test/cross-origin-no-csp.php");
            addLink("http://xfo2.svg.test/cross-origin-no-csp.php");
            addLink("http://csp0.svg.test/cross-origin-no-csp.php");
            addLink("http://csp1.svg.test/cross-origin-no-csp.php");
            addLink("http://csp2.svg.test/cross-origin-no-csp.php");
            addLink("http://csp3.svg.test/cross-origin-no-csp.php");
            addLink("http://csp4.svg.test/cross-origin-no-csp.php");
            addLink("http://csp5.svg.test/cross-origin-no-csp.php");
          ?>
        </tr>
        <tr>
          <th>Same-origin embedded svg:image</th>
          <?php
            addLink("http://base.svg.test/emb-so-image.php");
            addLink("http://xfo1.svg.test/emb-so-image.php");
            addLink("http://xfo2.svg.test/emb-so-image.php");
            addLink("http://csp0.svg.test/emb-so-image.php");
            addLink("http://csp1.svg.test/emb-so-image.php");
            addLink("http://csp2.svg.test/emb-so-image.php");
            addLink("http://csp3.svg.test/emb-so-image.php");
            addLink("http://csp4.svg.test/emb-so-image.php");
            addLink("http://csp5.svg.test/emb-so-image.php");
          ?>
        </tr>
        <tr>
          <th>Different-origin embedded svg:image</th>
          <?php
            addLink("http://base.svg.test/emb-do-image.php");
            addLink("http://xfo1.svg.test/emb-do-image.php");
            addLink("http://xfo2.svg.test/emb-do-image.php");
            addLink("http://csp0.svg.test/emb-do-image.php");
            addLink("http://csp1.svg.test/emb-do-image.php");
            addLink("http://csp2.svg.test/emb-do-image.php");
            addLink("http://csp3.svg.test/emb-do-image.php");
            addLink("http://csp4.svg.test/emb-do-image.php");
            addLink("http://csp5.svg.test/emb-do-image.php");
          ?>
        </tr>
        <tr>
          <th>Same-origin embedded html:object</th>
          <?php
            addLink("http://base.svg.test/emb-so-object.php");
            addLink("http://xfo1.svg.test/emb-so-object.php");
            addLink("http://xfo2.svg.test/emb-so-object.php");
            addLink("http://csp0.svg.test/emb-so-object.php");
            addLink("http://csp1.svg.test/emb-so-object.php");
            addLink("http://csp2.svg.test/emb-so-object.php");
            addLink("http://csp3.svg.test/emb-so-object.php");
            addLink("http://csp4.svg.test/emb-so-object.php");
            addLink("http://csp5.svg.test/emb-so-object.php");
          ?>
        </tr>
        <tr>
          <th>Different-origin embedded html:object</th>
          <?php
            addLink("http://base.svg.test/emb-do-object.php");
            addLink("http://xfo1.svg.test/emb-do-object.php");
            addLink("http://xfo2.svg.test/emb-do-object.php");
            addLink("http://csp0.svg.test/emb-do-object.php");
            addLink("http://csp1.svg.test/emb-do-object.php");
            addLink("http://csp2.svg.test/emb-do-object.php");
            addLink("http://csp3.svg.test/emb-do-object.php");
            addLink("http://csp4.svg.test/emb-do-object.php");
            addLink("http://csp5.svg.test/emb-do-object.php");
          ?>
        </tr>
        <tr>
          <th>Recursion</th>
          <?php
            addLink("http://base.svg.test/recursion.php");
            addLink("http://xfo1.svg.test/recursion.php");
            addLink("http://xfo2.svg.test/recursion.php");
            addLink("http://csp0.svg.test/recursion.php");
            addLink("http://csp1.svg.test/recursion.php");
            addLink("http://csp2.svg.test/recursion.php");
            addLink("http://csp3.svg.test/recursion.php");
            addLink("http://csp4.svg.test/recursion.php");
            addLink("http://csp5.svg.test/recursion.php");
          ?>
        </tr>
      </tbody>
    </table>

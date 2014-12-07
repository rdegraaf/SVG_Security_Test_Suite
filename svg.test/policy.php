    <h2>Policy:</h2>
    <ul>
      <?php
        $config = [
            "base.svg.test"  => ["none", "none"],
            "nocsp.svg.test" => ["none", "none"],
            "xfo1.svg.test"  => ["none", "DENY"],
            "xfo2.svg.test"  => ["none", "SAMEORIGIN"],
            "csp1.svg.test"  => ["default-src 'none'; script-src 'self'; style-src 'self'; img-src 'self'", "none"],
            "csp2.svg.test"  => ["default-src 'none'; script-src 'self'; style-src 'self'; object-src 'self'", "none"],
            "csp3.svg.test"  => ["default-src 'none'; script-src 'self'; style-src 'self'; frame-src 'self'", "none"],
            "csp4.svg.test"  => ["default-src 'none'; script-src 'self'; style-src 'self'; img-src 'self'; object-src 'self'; frame-src 'self'", "none"],
            "csp5.svg.test"  => ["default-src 'none'; script-src 'self' http://*.svg.test; style-src 'self' http://*.svg.test; img-src 'self' data: http://*.svg.test; object-src 'self' http://*.svg.test; frame-src 'self' http://*.svg.test;"]
        ];
        echo "<li>CSP: ", $config[$_SERVER['SERVER_NAME']][0], "</li>";
        echo "<li>XFO: ", $config[$_SERVER['SERVER_NAME']][1], "</li>";
      ?>
    </ul>

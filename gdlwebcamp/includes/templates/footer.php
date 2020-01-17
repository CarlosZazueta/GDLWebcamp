<footer class="site-footer">
  <div class="contenedor clearfix">
    <div class="footer-informacion">
      <h3>Sobre <span>gdlwebcamp</span></h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, vero? Est repudiandae numquam deleniti harum
        suscipit. Ullam, inventore. Ut iure voluptatum error magnam inventore dolorum, fugit debitis? Numquam, tempore
        magnam!</p>
    </div>
    <!--.footer-informacion-->

    <div class="ultimos-tweets">
      <h3>últimos <span>tweets</span></h3>
      <ul>
        <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos saepe asperiores vitae recusandae quas
          nesciunt </li>
        <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos saepe asperiores vitae recusandae quas
          nesciunt </li>
        <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos saepe asperiores vitae recusandae quas
          nesciunt </li>
      </ul>
    </div>
    <!--.ultimos-tweets-->

    <div class="menu">
      <h3>redes <span>sociales</span></h3>
      <nav class="redes-sociales">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-pinterest"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </nav>
    </div>
    <!--.menu-->
  </div>
  <!--.contenedor-->

  <p class="copyright ">Todos los derechos Reservados GDLWEBCAMP 2016.</p>
  <!-- Begin Mailchimp Signup Form -->
  <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
  <style type="text/css">
    #mc_embed_signup {
      background: #fff;
      clear: left;
      font: 14px Helvetica, Arial, sans-serif;
    }

    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
  </style>
  <div style="display:none;">
    <div id="mc_embed_signup">
      <form action="https://hotmail.us20.list-manage.com/subscribe/post?u=4811a0ac40bc0dbc423d234fe&amp;id=22f6f44e5c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
          <h2>Suscribete al Newsletter y no te pierdas de ningún detalle</h2>
          <div class="indicates-required"><span class="asterisk">*</span> es obligatorio</div>
          <div class="mc-field-group">
            <label for="mce-EMAIL">Correo Electrónico <span class="asterisk">*</span>
            </label>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
          </div>
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_4811a0ac40bc0dbc423d234fe_22f6f44e5c" tabindex="-1" value=""></div>
          <div class="clear"><input type="submit" value="Suscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
        </div>
      </form>
    </div>
    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
    <script type='text/javascript'>
      (function($) {
        window.fnames = new Array();
        window.ftypes = new Array();
        fnames[0] = 'EMAIL';
        ftypes[0] = 'email';
        fnames[1] = 'FNAME';
        ftypes[1] = 'text';
        fnames[2] = 'LNAME';
        ftypes[2] = 'text';
        fnames[3] = 'ADDRESS';
        ftypes[3] = 'address';
        fnames[4] = 'PHONE';
        ftypes[4] = 'phone';
        fnames[5] = 'BIRTHDAY';
        ftypes[5] = 'birthday';
      }(jQuery));
      var $mcj = jQuery.noConflict(true);
    </script>
    <!--End mc_embed_signup-->
  </div>
</footer>
<!--.site-footer-->


<script src="js/vendor/modernizr-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>
<script src="js/plugins.js"></script>
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
<script src="js/jquery.animateNumber.js"></script>
<script src="js/jquery.countdown.js"></script>
<script src="js/jquery.lettering.js"></script>
<script src="js/jquery.waypoints.min.js"></script>

<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script>
<script type="text/javascript">
  window.dojoRequire(["mojo/signup-forms/Loader"], function(L) {
    L.start({
      "baseUrl": "mc.us20.list-manage.com",
      "uuid": "4811a0ac40bc0dbc423d234fe",
      "lid": "22f6f44e5c",
      "uniqueMethods": true
    })
  })
</script>

<?php
$archivo = basename($_SERVER['PHP_SELF']);
$pagina = str_replace(".php", "", $archivo);

if ($pagina == "invitados" || $pagina == "index") {
  echo '<script src="js/jquery.colorbox-min.js"></script>';
} else if ($pagina == "conferencia") {
  echo '<script src="js/lightbox.js"></script>';
}
?>

<script src="js/main.js"></script>
</body>

</html>

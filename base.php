<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=361268240872381";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>

    <?php include Wrapper\template_path(); ?>

    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>

    <script src="https://www.gstatic.com/firebasejs/3.6.1/firebase.js"></script>
    <script>
      // Initialize Firebase
      var config = {
        apiKey: "AIzaSyAzj0q9gUT9iO1mvuX_nWFRZMrrFgKZEUI",
        authDomain: "unacasa-149912.firebaseapp.com",
        databaseURL: "https://unacasa-149912.firebaseio.com",
        storageBucket: "unacasa-149912.appspot.com",
        messagingSenderId: "445651774863"
      };
      firebase.initializeApp(config);
    </script>
    
  </body>
</html>

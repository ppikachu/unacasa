<footer id="footer_pagina" class="content-info bg-grisclaro">
  <div class="container">
  <div class="row">
  	<div class="col-xs-6 col-sm-12 col-md-9">
  		<?php if (has_nav_menu('footer_navigation')) :
        wp_nav_menu([
          'menu'            => 'footer',
          'theme_location'  => 'footer_navigation',
          'container'       => 'div',
          'container_id'    => 'footer_navigation',
          'container_class' => 'collapse navbar-toggleable-sm',
          'menu_id'         => false,
          'menu_class'      => 'nav navbar-nav pull-sm-left',
          'depth'           => 2
        ]);
        endif; ?>
  	</div>
  	<div class="col-xs-6 col-sm-12 col-md-3">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  	</div>

</footer>

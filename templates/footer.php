<footer id="footer_pagina" class="content-info bg-grisclaro">
  <div class="container">
    <div class="row">
    	<div class="col-md-10 text-xs-center">
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
    	<div class="col-md-2 text-xs-center">
      <?php dynamic_sidebar('sidebar-footer'); ?>
    	</div>
    </div>
    <div class="text-xs-center">+54 11 5236 0196<br>Edificio SAFICO<br>Av. Corrientes 456, 5º Piso. CABA.<br><a href="mailto:info@unacasa.com.ar">info@unacasa.com.ar</a></div>
  </div>
</footer>

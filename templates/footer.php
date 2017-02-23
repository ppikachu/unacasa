<footer id="footer_pagina" class="content-info bg-grisclaro py-2 mt-3">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xs-12 col-md text-center text-md-left mb-1">
        <a class="align-top" href="<?= esc_url(home_url('/')); ?>"><img width="100" src="<?php echo get_template_directory_uri ().'/dist/images/logo_nuevo_n.svg'; ?>" alt="<?php bloginfo('name'); ?>"></a>
        <br class="hidden-sm-down"><span class="small align-bottom"><?php bloginfo('description'); ?></span>
    	</div>
    	<div class="col-xs-12 col-md-80 text-center text-md-left0 mb-1">

    		<?php if (has_nav_menu('footer_navigation')) :
          wp_nav_menu([
            'menu'            => 'footer',
            'theme_location'  => 'footer_navigation',
            'container'       => 'div',
            'container_id'    => 'footer_navigation',
            'container_class' => 'collapse navbar-toggleable-sm',
            'menu_id'         => false,
            'menu_class'      => 'nav navbar-nav d-inline-block',
            'depth'           => 2
          ]);
          endif; ?>
    	</div>
    	<div class="col-xs-12 col-md-1 text-center">
      <?php dynamic_sidebar('sidebar-footer'); ?>
    	</div>
    </div>

    <div class="text-center">
      <img width="48" class="mb-1" src="<?php echo get_template_directory_uri ().'/dist/images/U.png'; ?>">
      <p><a href="tel:+54 11 5236 0196">+54 11 5236 0196</a><br>
        Edificio SAFICO<br>
        Av. Corrientes 456, 5º Piso. CABA.<br>
        <a target="_blank" href="mailto:info@unacasa.com.ar">info@unacasa.com.ar</a>
      </p>
    </div>
  </div>
</footer>

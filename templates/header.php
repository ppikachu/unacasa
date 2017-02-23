  <nav class="navbar fixed-top navbar-toggleable-sm navbar-inverse bg-navbar text-uppercase">
    <div class="container">

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#nav_principal" aria-controls="nav_principal" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri ().'/dist/images/logo_nuevo.svg'; ?>" width="180" class="d-inline-block align-top" alt="<?php bloginfo('name'); ?>"></a>
    <span class="text-white descripcion hidden-lg-down"><?php bloginfo('description'); ?></span>
    <div class="collapse navbar-collapse justify-content-lg-end" id="nav_principal">
      <?php if (has_nav_menu('primary_navigation')) :
          wp_nav_menu([
            'menu'            => 'primary',
            'theme_location'  => 'primary_navigation',
            'container'       => 'div',
            'container_id'    => 'nav_principal',
            'container_class' => 'collapse navbar-toggleable-sm',
            'menu_id'         => false,
            'menu_class'      => 'nav navbar-nav',
            'depth'           => 2,
            'fallback_cb'     => 'bs4navwalker::fallback',
            'walker'          => new bs4navwalker()
          ]);
        endif; ?>
      <?php dynamic_sidebar('sidebar-primary'); ?>
    </div>

</div>
  </nav>

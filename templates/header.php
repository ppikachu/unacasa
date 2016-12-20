<nav class="navbar navbar-fixed-top navbar-dark bg-navbar text-uppercase">

<div class="container">
  <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2"></button>
<a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri ().'/dist/images/logo_nuevo.svg'; ?>" alt="<?php bloginfo('name'); ?>"></a>
<span class="text-white descripcion hidden-lg-down"><?php bloginfo('description'); ?></span>
  <div class="collapse navbar-toggleable-sm" id="exCollapsingNavbar2">
      <div class="float-lg-right">
        <?php if (has_nav_menu('primary_navigation')) :
                //wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
                wp_nav_menu([
                  'menu'            => 'primary',
                  'theme_location'  => 'primary_navigation',
                  'container'       => 'div',
                  'container_id'    => 'exCollapsingNavbar2',
                  'container_class' => 'collapse navbar-toggleable-sm',
                  'menu_id'         => false,
                  'menu_class'      => 'nav navbar-nav float-sm-left',
                  'depth'           => 2,
                  'fallback_cb'     => 'bs4navwalker::fallback',
                  'walker'          => new bs4navwalker()
                ]);
              endif; ?>
        <?php dynamic_sidebar('sidebar-primary'); ?>
      </div>
  </div>
</div>
</nav>

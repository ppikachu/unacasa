<?php while (have_posts()) : the_post(); ?>

<div class="entry-content">
  <div class="page-header"></div>
  <div class="container-video">
    <?php the_content(); ?>
  </div>
  <div class="container">
  	<p><?php echo get_the_title();?></p>
    <p><?php if (is_user_logged_in()) echo "Votá este video:"; else echo "Para votar debes estar registrado."; ?></p>
    <?php do_action( 'wordpress_social_login' ); ?>
    <?php gdrts_posts_render_rating(array('echo' => true)); ?>
      <footer>
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        <div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
      </footer>
  </div>
</div>
<?php endwhile; ?>

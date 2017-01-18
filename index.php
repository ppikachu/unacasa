<div class="container">
  <?php get_template_part('templates/page', 'header'); ?>
  <?php if (!have_posts()) : ?>
    <div class="alert alert-warning mb-3">
      No hay publicaciones.
    </div>
  <?php endif; ?>

  <div class="card-group">
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
    <?php endwhile; ?>
  </div>
</div>

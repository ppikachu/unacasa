<div class="page-header jumbotron bg-primary">
	<div class="container text-xs-center">
		<h1 class="display-3 text-default"><?php echo $wp_the_query->post_count; ?> DISEÑOS <span class="text-white">Múltiples combinaciones</span></h1>
	</div>
</div>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

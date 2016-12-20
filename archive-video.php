<div class="page-header bg-primary text-white">
	<div class="container">
		<h1>Finalistas del Casting Embajadores Unacasa</h1>
		3 ganadores ya fueron seleccionados por el jurado, estos son los votos de nuestros usuarios:
	</div>
</div>
<br><br>

<div class="container d-inline-block0">
	<?php if (!have_posts()) : ?>
	  <div class="alert alert-warning">
	    <?php _e('Sorry, no results were found.', 'sage'); ?>
	  </div>
	  <?php get_search_form(); ?>
	<?php endif; ?>
	<div class="card-group videos">
		<?php while (have_posts()) : the_post(); ?>
		  <?php get_template_part('templates/content-video'); ?>
		<?php endwhile; ?>
		<div class="clearfix">...</div>
		<?php the_posts_navigation(); ?>
	</div>
</div>

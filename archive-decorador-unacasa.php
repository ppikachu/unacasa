<div class="poster jumbotron jumbotron-fluid" <?php poster(2645); ?>>
</div>

<div class="jumbotron bg-primary">
	<div class="container text-xs-center">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h1 class="display-3 text-default">Decoradores</h1>
				<?php $obj = get_post_type_object( 'decorador-unacasa' ); echo $obj->description; ?>
			</div>
		</div>
	</div>
</div>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div class="bg-faded py-1">
	<div class="container">
		<?php echo do_shortcode('[searchandfilter slug="filtro-decoradores-unacasa"]'); ?>
	</div>
</div>


<div class="container">
	<div id="main">
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
		<?php endwhile; ?>
	</div>
</div>

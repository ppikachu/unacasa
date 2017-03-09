<div class="poster jumbotron jumbotron-fluid" <?php poster(559); ?>>
</div>

<div class="jumbotron bg-primary">
	<div class="container text-xs-center">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h1 class="display-3 text-default">Sistemas</h1>
				<?php $obj = get_post_type_object( 'sistema' ); echo $obj->description; ?>
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

<div class="container">
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>
<?php the_posts_navigation(); ?>
</div>

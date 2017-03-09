<div class="poster jumbotron jumbotron-fluid" <?php poster(559); ?>>
</div>

<div class="jumbotron bg-primary">
	<div class="container text-xs-center">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h1 class="display-3 text-default">Arquitectos</h1>
				<?php $obj = get_post_type_object( 'arquitecto-unacasa' ); echo $obj->description; ?>
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
	<form class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		<label class="mr-sm-2" for="inlineFormCustomSelect">Localidad</label>
		<?php $args = array(
			'orderby'            => 'name',
			'show_count'         => 0,
			'selected'           => 0,
			'hierarchical'       => 0,
			'name'               => 'localidad',
			'id'                 => '',
			'class'              => 'form-control mr-sm-2',
			'depth'              => 0,
			'tab_index'          => 0,
			'taxonomy'           => 'localidad',
			'value_field'	     => 'slug',
		); wp_dropdown_categories( $args ); ?>
		<button type="submit" class="btn btn-default">Buscar</button>
	</form>
	</div>
</div>

<div class="container">
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>
<?php the_posts_navigation(); ?>
</div>

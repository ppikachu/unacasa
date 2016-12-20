<?php get_template_part('templates/content-single', get_post_type()); ?>

<div class="container">
	<h3 class="text-uppercase">Ver más ideas</h3>
	<div class="card-group">

	<?php $args = array('post_type' => 'idea');
		// The Query
		$the_query = new WP_Query( $args );
		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
			$the_query->the_post();
			get_template_part('templates/content','finalista');
			}
		} /* Restore original Post Data */ wp_reset_postdata(); ?>
	</div>
</div>
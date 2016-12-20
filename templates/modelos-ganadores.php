<br><br>
<h3>Ver más Modelos Ganadores</h3>
<div class="card-group">
<?php $args = array('post_type' => 'modelo','posts_per_page'=> '12','category_name'=>'proyectos-ganadores');
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
		$the_query->the_post();
		get_template_part('templates/content','ganador');
		}
	} wp_reset_postdata(); ?>
</div>
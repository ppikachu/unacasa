<!-- CALU -->
<?php $args = array('pagename' => 'inicio'); $the_query = new WP_Query( $args ); $the_query->the_post(); ?>
<div class="poster jumbotron jumbotron-fluid flex-items-xs-middle0" <?php poster_bg(); ?>>
	<div class="container poster" >
		<div class="row poster align-items-center text-white">
			<div class="col-md-6 offset-md-3"><?php the_content(); wp_reset_postdata(); ?></div>
		</div>
	</div>
</div>

<?php $args = array('pagename' => 'unacasa'); $the_query = new WP_Query( $args ); $the_query->the_post(); ?>
<div class="jumbotron jumbotron-fluid bg-primary">
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<?php the_content(); wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>

<!-- GANADORES -->
<?php $no_proyectos = 10;
$args = array('post_type'=>'modelo','tax_query'=>array(array('taxonomy'=>'categoria-modelo','field'=>'slug','terms'=>'destacado-inicio',),),'posts_per_page'=>$no_proyectos,'orderby'=>'rand');
$the_query = new WP_Query( $args ); ?>

<div class="jumbotron jumbotron-fluid bg-inverse text-white my-1">
	<div class="container">
		<h6 class="display-4 text-center text-white"><span class="text-primary"><?php echo $the_query->post_count; ?> DISEÑOS |</span> Múltiples combinaciones</h6>
	</div>
</div>

<div id="ganadores" class="card-group mb-3">

	<?php // The Loop
	$counter=1; $i=1;
	while ( $the_query->have_posts() ) {
		$the_query->the_post(); ?>
		<?php get_template_part('templates/content-modelo-card'); ?>
	<?php } wp_reset_postdata(); ?>
</div>

<div class="container-fluid text-center">
<!-- <div class="row"> -->
	<!-- <div class="col-md-6 offset-md-3"> -->
	<img class="img-fluid" src="<?php echo get_template_directory_uri ().'/dist/images/cuadro1.png'; ?>">
	<!-- </div> -->
<!-- </div> -->
</div>

<!-- PREVENTA -->
<?php $args = array('pagename' => 'preventa'); $the_query = new WP_Query( $args ); $the_query->the_post(); ?>
<div class="container-fluid my-1">
	<div class="row bg-preventa0 bg-primary">
		<div class="col-xs-12 col-md poster" <?php poster_bg(); ?>>
		</div>
		<div class="col-xs-12 col-md jumbotron">
			<div class="row">
				<div class="col-md-6">
					<?php the_content();
					wp_reset_postdata(); ?>
				</div>
				<div class="col-md-6">
					<?php
					// echo do_shortcode('[contact-form-7 id="165" title="Formulario Preventa"]');
					echo do_shortcode('[contact-form-7 id="1537" title="Formulario Preventa 2017"]');
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="jumbotron jumbotron-fluid bg-inverse text-white mt-1">
	<div class="container text-center">
		<p class="h3 display-4">Cada modelo está diseñado para brindar espacios flexibles, confort y eficiencia energética. Sistema de construcción en 120 días.</p>
		<p class="mt-3"><img src="<?php echo get_template_directory_uri ().'/dist/images/3iconos.svg'; ?>" width="100"></p>
		<a href="<?php echo site_url(); ?>/cotizar" class="btn btn-lg btn-default" style="color:#000">Cotizá on-line</a>
	</div>
</div>

<!-- TEASER CALU -->
<?php $args = array('pagename' => 'teaser-calu'); $the_query = new WP_Query( $args ); $the_query->the_post(); ?>
<div class="card-group mt-1">
	<div class="card bg-inverse text-white">
		<div class="jumbotron">
		<?php the_content();?>
		</div>
	</div>
	<div class="card">
		<div class="embed-responsive embed-responsive-16by9">
			<?php $url = types_render_field("video");
			$args = array('width'=>'');
			echo wp_oembed_get( $url, $args );
			wp_reset_postdata(); ?>
		</div>
	</div>
</div>

<!-- Evento Lanzamientos -->
<?php $args = array('pagename' => 'evento-lanzamientos'); $the_query = new WP_Query( $args ); $the_query->the_post(); ?>
<div class="card-group mt-1">
	<div class="card">
		<div class="embed-responsive embed-responsive-16by9">
			<?php $url = types_render_field("video");
			$args = array('width'=>'');
			echo wp_oembed_get( $url, $args ); ?>
		</div>
	</div>
	<div class="card bg-inverse text-white">
		<div class="jumbotron">
		<?php the_content();
		wp_reset_postdata(); ?>
		</div>
	</div>
</div>

<!-- DONDE ENCONTRARNOS -->
<?php $args = array('pagename' => 'donde-encontrarnos'); $the_query = new WP_Query( $args ); $the_query->the_post(); ?>
<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<?php the_content(); wp_reset_postdata(); ?>
	</div>
</div>

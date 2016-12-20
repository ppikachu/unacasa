<!-- CALU -->
<?php $args = array('pagename' => 'inicio'); $the_query = new WP_Query( $args ); $the_query->the_post(); ?>
<div class="poster jumbotron jumbotron-fluid flex-items-xs-middle0" <?php poster_bg(); ?>>
	<div class="container poster" >
		<div class="row poster flex-items-xs-middle text-white">
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
<div class="jumbotron jumbotron-fluid bg-inverse text-white spacer-y">
	<div class="container">
		<h6 class="display-4 text-xs-center text-white"><span class="text-primary">3 DISEÑOS |</span> Múltiples combinaciones</h6>
	</div>
</div>

<div id="ganadores" class="card-group">
	<?php $args = array('post_type' => 'modelo','category_name'=>'proyectos-ganadores','orderby'=>'rand');
	$the_query = new WP_Query( $args );
	// The Loop
	while ( $the_query->have_posts() ) {
		$the_query->the_post(); ?>
		<div class="card">
		 <a href="<?php the_permalink(); ?>" class="card-poster-notas" <?php poster_bg(); ?> ></a>
		 <div class="card-block">

			<div class="media">
			  <p class="media-left">
					<?php echo types_render_field( "icono", array( "class"=>"media-object","width"=>"32"));?>
			  </p>
			  <div class="media-body">
					AUTOR<br><?php the_title('<h4 class="display-1">','</h4>'); ?>
			    <p>Arquitectos: <?php echo types_render_field("autores"); ?></p>
			  </div>
			</div>

		 </div>
	 </div>
	<?php } wp_reset_postdata(); ?>
</div>

<div class="container-fluid">
<div class="row">
	<div class="col-md-6 offset-md-3">
	<img class="img-fluid" src="<?php echo get_template_directory_uri ().'/dist/images/cuadro1.png'; ?>">
	</div>
</div>
</div>

<!-- PREVENTA -->
<?php $args = array('pagename' => 'preventa'); $the_query = new WP_Query( $args ); $the_query->the_post(); ?>
<div class="container-fluid spacer-y">
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

<div class="jumbotron jumbotron-fluid bg-inverse text-white spacer-y">
	<div class="container text-xs-center">
		<p class="h3 display-4">Cada modelo está diseñado para brindar espacios flexibles, confort y eficiencia energética. Sistema de construcción en 120 días.</p>
		<br><a href="/www/cotizar" class="btn btn-default" style="color:#000">Cotizá on-line</a>
	</div>
</div>

<!-- TEASER CALU -->
<?php $args = array('pagename' => 'teaser-calu'); $the_query = new WP_Query( $args ); $the_query->the_post(); ?>
<div class="card-group spacer-y">
	<div class="card bg-inverse text-white">
		<div class="jumbotron">
		<?php the_content();?>
		</div>
	</div>
	<div class="card">
		<div class="embed-responsive embed-responsive-16by9">
			<?php $url = types_render_field("video");
			//echo $url;
			$args = array('width'=>'');
			echo wp_oembed_get( $url, $args );
			//echo wp_oembed_get( $url ); ?>
			<?php wp_reset_postdata(); ?>
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

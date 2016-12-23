<?php if (types_render_field( "galeria-modelo")) : ?>
<div id="carousel-<?php echo $post->post_name; ?>" class="carousel slide" data-flickity='{ "wrapAround": true, "autoPlay": 4000,"prevNextButtons": false, "pauseAutoPlayOnHover": false }'>
	<?php $imgs = get_post_meta(get_the_ID(), 'wpcf-galeria-modelo'); $x = count($imgs);
	for ($i=0;$i<$x;$i++) {
		echo '<div class="carousel-cell"><div class="carousel-item-modelo" style="background-image:url('.types_render_field( "galeria-modelo", array( "size"=>"large","index"=>$i,"raw"=>"true") ).')"></div></div>';
	} ?>
</div>
<?php endif; ?>

<div class="container mb-3">
<div class="media mt-2">
	<p class="media-left" >
		<?php echo types_render_field( "icono", array( "class"=>"media-object","width"=>"28"));?>
	</p>
	<div class="media-body">
		<div class="row">
			<div class="col-lg-2">
				AUTOR:<br>
				<?php the_title('<h4 class="display-1">','</h4>'); ?>
			</div>

			<div class="col-lg-7">
				<p>ARQUITECTOS: <?php echo types_render_field("autores"); ?></p>
				<div class="row">
				<div class="col-xs">
					<p><?php $personas = types_render_field( "personas-modelo", array( "raw"=>"true"));
					$personas_max = types_render_field( "personas-max-modelo", array( "raw"=>"true"));
					for ($i=0;$i<$personas;$i++) {
						echo '<i class="fa fa-male" aria-hidden="true"></i>';
					}
					for ($i=0;$i<$personas_max-$personas;$i++) {
						echo '<i class="fa fa-male text-primary" aria-hidden="true"></i>';
					}
					echo "<br>".$personas." - ".$personas_max." personas"; ?></p>
				</div>
					<div class="col-xs">
						<?php $dormitorios = types_render_field( "dormitorios-modelo", array("raw"=>"true")); echo '<span class="text-primary">'.$dormitorios.'</span>'; if ($dormitorios>1) echo " Dormitorios"; else echo " Dormitorio"; ?><br>
						<?php $banos = types_render_field( "banos-modelo", array("raw"=>"true")); echo '<span class="text-primary">'.$banos.'</span>'; if ($banos>1) echo " Baños"; else echo " Baño"; ?><br>
					</div>
					<div class="col-xs">
						<?php $superficie = types_render_field( "superficies-modelo", array()); echo 'Superficie<br><span class="text-primary">'.$superficie.'</span>'; ?>
					</div>
				</div>

			</div>

			<div class="col-lg-3" >
				<p>Desde<br><span class="font-weight-bold text-primary">$<?php echo number_format(types_render_field("desde-modelo"), 0, ',', '.' ); ?> + IVA (10.5%)</span></p>
				<div class="text-xs-center text-md-left">
					<a class="btn btn-default btn-lg" href="<?php the_permalink(); ?>">Ver las casas</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

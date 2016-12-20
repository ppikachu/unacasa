<?php if (types_render_field( "galeria-modelo")) : ?>
<div id="carousel-<?php echo $post->post_name; ?>" class="carousel slide" data-ride="carousel">

	<ol class="carousel-indicators">
		<?php $imgs = get_post_meta(get_the_ID(), 'wpcf-galeria-modelo'); $x = count($imgs);
		for ($i=0;$i<$x;$i++) {
			if ($i==0) $slide_active="active"; else $slide_active="";
			echo '<li data-target="#carousel-'.$post->post_name.'" data-slide-to="'.$i.'" class="'.$slide_active.'"></li>';
		} ?>
	</ol>

	<div class="carousel-inner" role="listbox">
		<div class="carousel-item active">
			<?php echo types_render_field( "galeria-modelo", array( "size"=>"large","class"=>"img-fluid", "separator" => "</div><div class='carousel-item'>") ); ?>
		</div>
	</div>

</div>
<?php endif; ?>

<div class="container">
<div class="media spacer-y">
	<p class="media-left" >
		<?php echo types_render_field( "icono", array( "class"=>"media-object","width"=>"32"));?>
	</p>
	<div class="media-body">
		<div class="row">
			<div class="col-md-2">
				AUTOR:<br>
				<?php the_title('<h4 class="display-1">','</h4>'); ?>
			</div>

			<div class="col-md-7">
				<p>ARQUITECTOS: <?php echo types_render_field("autores"); ?></p>
				<div class="row">
				<div class="col-xs">
					<p><?php $personas = types_render_field( "personas-modelo", array( "raw"=>"true"));
					$personas_max = types_render_field( "personas-max-modelo", array( "raw"=>"true"));
					for ($i=0;$i<$personas;$i++) {
						echo '<i class="fa fa-male" aria-hidden="true"></i>';
					}
					for ($i=0;$i<$personas_max-$personas;$i++) {
						echo '<i class="fa fa-male text-default" aria-hidden="true"></i>';
					}
					echo "<br>".$personas." - ".$personas_max." personas"; ?></p>
				</div>
					<div class="col-xs">
						<?php $dormitorios = types_render_field( "dormitorios-modelo", array("raw"=>"true")); echo '<span class="text-default">'.$dormitorios.'</span>'; if ($dormitorios>1) echo " Dormitorios"; else echo " Dormitorio"; ?><br>
						<?php $banos = types_render_field( "banos-modelo", array("raw"=>"true")); echo '<span class="text-default">'.$banos.'</span>'; if ($banos>1) echo " Baños"; else echo " Baño"; ?><br>
					</div>
					<div class="col-xs">
						<?php $superficie = types_render_field( "superficies-modelo", array()); echo 'Superficie<br><span class="text-default">'.$superficie.'</span>'; ?>
					</div>
				</div>

			</div>

			<div class="col-md-3" >
				<p>Desde<br><span class="text-default">$<?php echo number_format(types_render_field("desde-modelo")); ?> + IVA (10.5%)</span></p>
				<a class="btn btn-default" href="<?php the_permalink(); ?>">Ver las casas</a>
				<br><br>
			</div>
		</div>
	</div>
</div>
</div>

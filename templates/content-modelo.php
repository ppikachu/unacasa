<!-- <?php if (types_render_field( "galeria-modelo")) : ?>
<div id="carousel-<?php echo $post->post_name; ?>" class="carousel slide" data-flickity='{ "wrapAround": true, "autoPlay": 4000,"prevNextButtons": false, "pauseAutoPlayOnHover": false }'>
	<?php $imgs = get_post_meta(get_the_ID(), 'wpcf-galeria-modelo'); $x = count($imgs);
	for ($i=0;$i<$x;$i++) {
		echo '<div class="carousel-cell"><div class="carousel-item-modelo" style="background-image:url('.types_render_field( "galeria-modelo", array( "size"=>"large","index"=>$i,"raw"=>"true") ).')"></div></div>';
	} ?>
</div>
<?php endif; ?> -->

<?php the_post_thumbnail( 'large', array('class' => 'img-fluid')); ?>

<?php

$sistema_id = wpcf_pr_post_get_belongs( get_the_ID(), 'sistema' );
$sistema_post = get_post( $sistema_id );
$sistema_logo = types_render_field( 'logo', array( 'post_id' => $sistema_id,'class'=>'media-object','width'=>'28'));
$sistema_name = $sistema_post->post_title;

$arq_id = wpcf_pr_post_get_belongs( get_the_ID(), 'arquitecto-unacasa' );
$arq_post = get_post( $arq_id );
$arq_logo = types_render_field( 'logo', array( 'post_id' => $sistema_id,'class'=>'media-object','width'=>'28'));
$arq_name = $arq_post->post_title;
?>

<div class="container mb-3"><?php echo get_the_title();?>
	<div class="row">
		<div class="col">
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
		<div class="col">
			<?php $dormitorios = types_render_field( "dormitorios-modelo", array("raw"=>"true")); echo '<span class="text-primary">'.$dormitorios.'</span>'; if ($dormitorios>1) echo " Dormitorios"; else echo " Dormitorio"; ?><br>
			<?php $banos = types_render_field( "banos-modelo", array("raw"=>"true")); echo '<span class="text-primary">'.$banos.'</span>'; if ($banos>1) echo " Baños"; else echo " Baño"; ?><br>
		</div>
		<div class="col">
			Superficie<br>
			<?php $superficie = types_render_field( "superficies-modelo", array()); echo '<span class="text-primary">'.$superficie.'</span>'; ?>
		</div>
		<div class="col">
			Sistema: <?php echo $sistema_name; ?><br>
			Materiales: <?php $materiales = types_render_field( "materiales", array("raw"=>"true")); echo '<span class="text-primary">'.$materiales.'</span>'; ?>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="media mt-2">
				<p class="media-left mr-1" >
					<?php echo types_render_field( "icono", array( "class"=>"media-object","width"=>"28"));?>
				</p>
				<div class="media-body">
					ARQ:<br><h4 class="display-1"><?php echo $arq_name; ?></h4>
				</div>
			</div>
		</div>
		<div class="col">
			CONSTRUCTOR<br><?php echo $sistema_logo; ?>
		</div>
		<div class="col">
			<?php if (types_render_field("desde-modelo")) : ?><p>Desde<br><span class="font-weight-bold text-primary">$<?php echo number_format(types_render_field("desde-modelo"), 0, ',', '.' ); ?> + IVA (10.5%)</span></p><?php endif; ?>
			<p>Tiempo de ejecución:</p>
		</div>
	</div>

	<div class="row">
		<div class="col text-xs-center text-md-right" >
			<a class="btn btn-default btn-lg" href="<?php the_permalink(); ?>">Ver las casas</a>
		</div>
	</div>

</div>

<?php the_post_thumbnail( 'large', array('class' => 'img-fluid')); ?>

<?php
$sistema_id = wpcf_pr_post_get_belongs( get_the_ID(), 'sistema' );
$sistema_post = get_post( $sistema_id );
//$sistema_logo = types_render_field( 'logo', array( 'post_id' => $sistema_id,'class'=>'media-object',"size"=>"thumbnail"));
$sistema_name = $sistema_post->post_title;

$constructor_id = wpcf_pr_post_get_belongs( get_the_ID(), 'constructor' );
$constructor_post = get_post( $constructor_id );
$constructor_logo = types_render_field( 'logo', array( 'post_id' => $constructor_id,'class'=>'media-object',"size"=>"thumbnail"));
$constructor_name = $constructor_post->post_title;

$arq_id = wpcf_pr_post_get_belongs( get_the_ID(), 'arquitecto-unacasa' );
$arq_post = get_post( $arq_id );
$arq_logo = types_render_field( 'logo', array( 'post_id' => $arq_id,'class'=>'media-object',"size"=>"thumbnail"));
$arq_name = $arq_post->post_title;
?>

<div class="container-fluid my-2">
	<div class="row">
		<div class="col-sm-6 col-md-2">
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
		<div class="col-sm-6 col-md-2">
			<p>
				<?php $dormitorios = types_render_field( "dormitorios-check", array("separator"=>"-")); echo '<span class="text-primary">'.$dormitorios.'</span>'; if (substr($dormitorios,-1)>1) echo " Dormitorios"; else echo " Dormitorio"; ?><br>
				<?php $banos = types_render_field( "banos-check", array("separator"=>"-")); echo '<span class="text-primary">'.$banos.'</span>'; if (substr($banos,-1)>1) echo " Baños"; else echo " Baño"; ?><br>
			</p>
		</div>
		<div class="col-sm-6 col-md-4">
			<p>Superficie<br>
				<?php
				$mt2_cubiertos_min = types_render_field( "mt2-cubiertos-min", array("raw"=>"true"));
				$mt2_cubiertos_max = types_render_field( "mt2-cubiertos-max", array("raw"=>"true"));
				$mt2_semicubiertos_min = types_render_field( "mt2-semicubiertos-min", array("raw"=>"true"));
				$mt2_semicubiertos_max = types_render_field( "mt2-semicubiertos-max", array("raw"=>"true"));
				echo '<span class="text-primary">'.$mt2_cubiertos_min.' a '.$mt2_cubiertos_max.' mt<sup>2</sup></span> cubiertos<br>';
				echo '<span class="text-primary">'.$mt2_semicubiertos_min.' a '.$mt2_semicubiertos_max.' mt<sup>2</sup></span> semicubiertos'; ?>
			</p>
		</div>
		<div class="col-sm-6 col-md-4">
			<p>
				<?php if ($sistema_id) : ?>Sistema: <?php echo $sistema_name; ?><br><?php endif; ?>
				<?php $materiales = types_render_field( "materiales", array("raw"=>"true")); if ($materiales) : ?>Materiales: <?php echo $materiales; ?><?php endif; ?>
			</p>
		</div>
	</div>

	<div class="row">
		<?php if ($arq_id) : ?>
		<div class="col-sm-6 col-md-4">
			<div class="media">
				<p class="media-left mr-1" >
					<?php echo $arq_logo; ?>
				</p>
				<div class="media-body">
					ARQ.<br><h4 class="display-2"><?php if ($arq_id) echo $arq_name; ?></h4>
					<?php gdrts_render_rating(array('echo' => true, 'entity' => 'posts', 'name' => 'arquitecto-unacasa', 'id' => $arq_id)); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php if ($constructor_id) : ?>
		<div class="col-sm-6 col-md-4">
			<div class="media">
				<p class="media-left mr-1" ><?php echo $constructor_logo; ?></p>
				<div class="media-body">
					CONSTRUCTOR<br><h4 class="display-2"><?php echo $constructor_name; ?></h4>
					<?php gdrts_render_rating(array('echo' => true, 'entity' => 'posts', 'name' => 'constructor', 'id' => $constructor_id)); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="col-sm-12 col-md-4">
			<?php if (types_render_field("desde-modelo")) : ?><p>Desde<br><span class="font-weight-bold text-primary">$<?php echo number_format(types_render_field("desde-modelo"), 0, ',', '.' ); ?> + IVA (10.5%)</span></p><?php endif; ?>
			<?php $tiempo_de_ejecucion = types_render_field( "tiempo-de-ejecucion-meses", array("raw"=>"true")); if ($tiempo_de_ejecucion) : ?><p>Tiempo de ejecución: <span class="display-2"><?php echo $tiempo_de_ejecucion; ?> meses</span></p><?php endif; ?>
		</div>
	</div>

	<div class="row justify-content-end">
		<div class="col-md-4 text-xs-center" >
			<a class="btn btn-default" href="<?php the_permalink(); ?>">Ver las casas</a>
		</div>
	</div>

</div>

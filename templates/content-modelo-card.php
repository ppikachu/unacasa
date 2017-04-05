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
<div class="col-modelo d-flex flex-column">
  <a href="<?php the_permalink(); ?>" class="card-poster-casas" <?php poster_bg('medium_large'); ?> ></a>

  <div class="card-block">
		<div class="row">
			<div class="col-lg-6">
		    <div class="media">
		      <?php if (types_render_field("icono")) echo types_render_field( "icono", array( "class"=>"" ));?>
		      <div class="media-body">
						ARQ.<br><?php if ($arq_id) echo $arq_name; ?>
						<?php gdrts_render_rating(array('echo' => true, 'entity' => 'posts', 'name' => 'arquitecto-unacasa', 'id' => $arq_id)); ?>
		      </div>
		    </div>
			</div>

			<?php if ($constructor_id) : ?>
			<div class="col-lg-6">
				<div class="media">
					<p class="media-left mr-1" ><?php echo $constructor_logo; ?></p>
					<div class="media-body">
						CONSTRUCTOR<br><?php echo $constructor_name; ?>
						<?php gdrts_render_rating(array('echo' => true, 'entity' => 'posts', 'name' => 'constructor', 'id' => $constructor_id)); ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
  	</div>
		<div class="row">
			<div class="col-lg-6">
				<p>
					<?php $tiempo_de_ejecucion = types_render_field( "tiempo-de-ejecucion", array("raw"=>"true")); if ($tiempo_de_ejecucion) : ?>Tiempo de ejecución: <?php echo $tiempo_de_ejecucion; ?> días<br><?php endif; ?>
					<?php if (types_render_field("desde-modelo")) : ?>Precio desde: $<?php echo number_format(types_render_field("desde-modelo"), 0, ',', '.' ); ?> + IVA (10.5%)<br><?php endif; ?>
				</p>
			</div>
			<div class="col-lg-6">
				<p>
					<?php if ($sistema_id) : ?>Sistema: <?php echo $sistema_name; ?><br><?php endif; ?>
					<?php $materiales = types_render_field( "materiales", array("raw"=>"true")); if ($materiales) : ?>Materiales: <?php echo $materiales; ?><?php endif; ?>
				</p>
			</div>
		</div>
	</div>
</div>

<div class="col-modelo">
 <a href="<?php the_permalink(); ?>" class="card-poster-casas" <?php poster_bg(); ?> ></a>
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

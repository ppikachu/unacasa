<div class="row no-gutters mt-1">
	<div class="col">
  	<a href="<?php the_permalink(); ?>" class="card-poster-casas" <?php poster_bg('medium_large'); ?>></a>
	</div>
  <div class="col bg-faded p-1">
    <div class="media">
			<a href="<?php the_permalink(); ?>"><?php if (types_render_field("logo")) echo types_render_field( "logo", array( "class"=>"d-flex mr-1","size"=>"thumbnail" )); ?></a>
			<div class="media-body">
				<a href="<?php the_permalink(); ?>"><?php the_title('<h4 class="display-1">','</h4>'); ?></a>
				<?php gdrts_render_rating(array('echo' => true, 'entity' => 'posts', 'name' => 'decorador-unacasa', 'id' => $post->ID)); ?>
			</div>
		</div>
		<?php the_excerpt(); ?>
		<?php if (types_render_field("tel")) echo '<i class="fa fa-phone fa-lg" aria-hidden="true"></i> '.types_render_field( "tel", array( "separator" => " | ")); ?>
		<?php $terms = wp_get_post_terms( $post->ID, 'localidad'); if ($terms) echo '<i class="ml-3 fa fa-map-marker fa-lg" aria-hidden="true"></i> '.$terms[0]->name; #displays the output  ?>

  </div>

</div>

<?php while (have_posts()) : the_post(); ?>
  <?php the_post_thumbnail( 'large', array('class' => 'img-fluid')); ?>
<div class="bg-primary">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php if (types_render_field("logo")) echo types_render_field( "logo", array( "class"=>"d-flex mr-1","size"=>"medium" )); ?>
				<?php gdrts_render_rating(array('echo' => true, 'entity' => 'posts', 'name' => 'arquitecto-unacasa', 'id' => $post->ID)); ?>

				<?php if (types_render_field("tel")) { ?>
					<p>
						<?php echo types_render_field("tel"); ?><br>
						<span class="small">teléfono</span>
					</p>
				<?php } ?>

				<?php if (types_render_field("e-mail")) { ?>
					<p>
						<?php echo types_render_field("e-mail"); ?><br>
						<span class="small">e-mail</span>
					</p>
				<?php } ?>

				<?php $terms = wp_get_post_terms($post->ID, 'localidad');
					if ($terms) { ?>
						<p>
						<?php echo $terms[0]->name; ?><br>
						<span class="small">ubicación</span>
						</p>
				<?php } ?>

				<?php if (types_render_field("site")) { ?>
					<p>
						<?php echo types_render_field("site"); ?><br>
						<span class="small">site</span>
					</p>
				<?php } ?>

				<a href="#" class="btn btn-primary">CONTACTAR</a>
			</div>
			<div class="col">
				<h2 class="entry-title"><?php echo get_the_title();?></h2>
				<?php the_content(); ?>
			</div>
			<?php $direccion = types_render_field("direccion");
				$direccion = str_replace(' ', '+', $direccion);
				$zoom = types_render_field("zoom");
				$options = get_option('lsv_options');
				if ($direccion) {	?>
					<div class="iframe-container mb-3">
						<iframe class="maps-frame" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $direccion; ?>&zoom=<?php echo $zoom; ?>&key=<?php echo of_get_option('maps_api'); ?>" allowfullscreen></iframe>
					</div>
			<?php }	?>
		</div>
	</div>
</div>
<?php endwhile; ?>
<div class="container">

	<h1 class="text-center mt-3">PROYECTOS</H1>

</div>
	<?php
	$tabs=1;
	$childargs = array(
		'post_type' => 'variante',
		'numberposts' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
		'meta_query' => array(array('key' => '_wpcf_belongs_modelo_id', 'value' => get_the_ID()))
	);
	$child_posts = get_posts($childargs);
	if ($child_posts) : ?>
			<?php foreach ($child_posts as $child_post) { ?>
				<li class="nav-item">
					<a class="small nav-link <?php if ($tabs==1) echo "active "; echo $child_post->post_name; ?>" data-toggle="tab" href="#<?php echo $child_post->post_name; ?>" role="tab"><?php echo $child_post->post_title; ?></a>
				</li>
				<?php $tabs++; } ?>

		<?php endif; ?>
			<br>
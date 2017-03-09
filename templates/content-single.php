<?php while (have_posts()) : the_post(); ?>
<div class="entry-content">
      <?php the_post_thumbnail( 'large', array('class' => 'img-fluid')); ?>
<div class="container">
	<h2 class="entry-title"><?php echo get_the_title();?></h2>
	<div class="row">
		<div class="col">
    	<?php the_content(); ?>
		</div>
		<div class="col">

		</div>
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

    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
</div>
</div>
<?php endwhile; ?>

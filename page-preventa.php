<?php while (have_posts()) : the_post(); ?>
<div class="bottom poster texto_sobre_foto" <?php poster_bg(); ?> >
	<div class="container">
		<div class="texto_abajo text-blanco">
			<?php
			the_title('<h1 class="display-2 hidden-xs-down">', '</h1>');
			the_title('<h1 class="display-4 hidden-sm-up">', '</h1>');
			?>
		</div>
	</div>
	<div id="one"></div>
	<div id="two"></div>

</div>
<!-- the gray area -->
<div class="bg-preventa">
	<div class="container">
		<div class="row">
		<div class="col-md-6">
			<?php the_content();
			wp_reset_postdata(); ?>
		</div>
		<div class="col-md-6">
			<?php echo do_shortcode('[contact-form-7 id="165" title="Contact form 1"]'); ?>
		</div>
	</div>
	</div>
</div>
<?php endwhile; ?>

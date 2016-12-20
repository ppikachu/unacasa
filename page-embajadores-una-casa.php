<?php while (have_posts()) : the_post(); ?>
<?php if(strpos(get_the_content(),'id="more-')) :
global $more; $more = 0; // Set (inside the loop) to display content above the more tag. ?>
<div class="poster texto_sobre_foto" <?php poster_bg(); ?> >
	<div class="container">
		<div class="row">
			<div class="col-md-5 bg-gris">
				<div class="jumbotron">
					<?php the_content(''); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- the gray area -->
<div class="arrow-down-azul-a"></div>
<div class="container text-white">
	<?php $more = 1;
	the_content('', true ); // Set to hide content above the more tag.
	else : the_content();
	endif; ?>
<?php endwhile; ?>
</div>
<div class="arrow-down-azul-b"></div>
<!-- the gray area -->
<?php $args = array('pagename' => 'preventa'); $the_query = new WP_Query( $args ); $the_query->the_post(); ?>
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

<?php
/**
 * Template Name: Buscar Arquitectos Unacasa
 */
?>
<div class="poster jumbotron jumbotron-fluid" <?php poster(559); ?>>
</div>

<div class="jumbotron bg-primary">
	<div class="container text-xs-center">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h1 class="display-3 text-default">Arquitectos</h1>
				<?php $obj = get_post_type_object( 'arquitecto-unacasa' ); echo $obj->description; ?>
			</div>
		</div>
	</div>
</div>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div class="bg-faded py-1">
	<div class="container">
		<?php echo do_shortcode('[searchandfilter id="2588"]'); ?>
	</div>
</div>


<div class="container">
	<?php echo do_shortcode('[searchandfilter id="2588" show="results"]'); ?>
</div>

<?php
/**
 * Template Name: Casas Template
 */
?>

<div class="page-header jumbotron bg-primary">
	<div class="container text-center">
		<h1 class="display-3 text-default">CIENTOS DE DISEÑOS <span class="text-white">Múltiples combinaciones</span></h1>
	</div>
</div>

<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
	<?php
		if( $terms = get_terms( 'category', 'orderby=name' ) ) : // to make it simple I use default categories
			echo '<select name="categoryfilter"><option>Select category...</option>';
			foreach ( $terms as $term ) :
				echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
			endforeach;
			echo '</select>';
		endif;
	?>
	<input type="text" name="price_min" placeholder="Min price" />
	<input type="text" name="price_max" placeholder="Max price" />
	<label>
		<input type="radio" name="date" value="ASC" /> Date: Ascending
	</label>
	<label>
		<input type="radio" name="date" value="DESC" selected="selected" /> Date: Descending
	</label>
	<label>
		<input type="checkbox" name="featured_image" /> Only posts with featured image
	</label>
	<button>Apply filter</button>
	<input type="hidden" name="action" value="myfilter">
</form>
<div id="response"></div>

<?php $args = array('post_type'=>'modelo','tax_query'=>array('posts_per_page'=>10));
$the_query = new WP_Query( $args ); ?>

<?php if (!$the_query->have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div class="card-group">
<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
  <?php get_template_part('templates/content-modelo-card'); ?>
<?php endwhile; ?>
</div>

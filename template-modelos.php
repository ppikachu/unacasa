<?php
/**
 * Template Name: Modelos Template
 */
?>

<?php $no_proyectos = 3;
$args = array('post_type'=>'modelo','tax_query'=>array(array('taxonomy'=>'categoria-modelo','field'=>'slug','terms'=>'proyecto-ganador',),),'posts_per_page'=>$no_proyectos,'orderby'=>'rand');
$the_query = new WP_Query( $args ); ?>

<div class="page-header jumbotron bg-primary">
	<div class="container text-center">
		<h1 class="display-3 text-default"><?php echo $the_query->post_count; ?> DISEÑOS DESTACADOS <span class="text-white">Múltiples combinaciones</span></h1>
	</div>
</div>

<?php if (!$the_query->have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div class="">
<?php $counter=1; $i=1;
  while ($the_query->have_posts()) : $the_query->the_post(); ?>
  <?php get_template_part('templates/content-modelo'); ?>
  <?php
  if ($counter==$no_proyectos) {
    if ($i % 2 == 0) echo '<div class="card bg-faded"></div>';
    if ($i == 1) echo '<div class="card bg-faded"></div><div class="card bg-faded"></div>';
  }
  if ($counter % 3 == 0) { echo '</div><div class="card-group">'; $i=0; }
  $counter++;
  $i++; ?>
<?php endwhile; ?>
</div>

<?php $args = array('post_type'=>'modelo','tax_query'=>array(array('taxonomy'=>'categoria-modelo','field'=>'slug','terms'=>'proyecto-ganador','operator'=>'NOT IN'),),'posts_per_page'=>-1,'orderby'=>'rand');
$the_query = new WP_Query( $args );
$no_proyectos = $the_query->post_count; ?>

<div class="bg-inverse text-white text-center py-2 mb-3">
	<div class="container text-xs-center">
		<h3 class=""><?php echo $the_query->post_count; ?> DISEÑOS Múltiples combinaciones</h3>
	</div>
</div>

<div class="card-group">
<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
  <?php get_template_part('templates/content-modelo-card'); ?>
<?php endwhile; ?>
</div>

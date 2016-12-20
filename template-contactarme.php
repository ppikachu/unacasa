<?php
/**
 * Template Name: Contactarme Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php // get_template_part('templates/page', 'header'); ?>
  <div class="bg-primary">
    <div class="container">
  <div class="page-header h1">Deseo ser contactado</div>
  <?php get_template_part('templates/content', 'page'); ?>
  <br><br>
  </div></div>
<?php endwhile; ?>

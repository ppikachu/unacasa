<?php while (have_posts()) : the_post(); ?>
<div class="bottom poster texto_sobre_foto" <?php poster_bg(); ?> >
</div>

<div class="container py-3">
	<?php //get_template_part('templates/page', 'header'); ?>
	<?php get_template_part('templates/content', 'page'); ?>
</div>
<?php endwhile; ?>

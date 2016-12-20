<?php while (have_posts()) : the_post(); ?>
<div class="bottom poster texto_sobre_foto" <?php poster_bg(); ?> >
</div>

<div class="container mb-3">
	<?php //get_template_part('templates/page', 'header'); ?><br><br>
	<?php get_template_part('templates/content', 'page'); ?>
</div>
<?php endwhile; ?>

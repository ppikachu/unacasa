<?php while (have_posts()) : the_post(); ?>
<div class="entry-content">
      <?php the_post_thumbnail( 'large', array('class' => 'img-fluid')); ?>
<div class="container">
	<h2 class="entry-title"><?php echo get_the_title();?></h2>
    <?php the_content(); ?>

    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
</div>
</div>
<?php endwhile; ?>

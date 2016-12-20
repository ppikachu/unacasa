<?php while (have_posts()) : the_post(); ?>
<div class="entry-content">
      <?php the_post_thumbnail( 'large', array('class' => 'img-fluid')); ?>
<div class="container">
	<p style="font-weight:700; font-size:35px; line-height:38px; padding:2rem 0;"><?php echo get_the_title();?></p>
    <?php the_content(); ?>

    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
</div>
</div>
<?php endwhile; ?>

 <?php if(!isset($GLOBALS['counter'])) $GLOBALS['counter'] = 0; $GLOBALS['counter']++; ?>

 <div class="card">
  <a href="<?php the_permalink(); ?>" class="card-poster-notas" <?php poster_bg(); ?> ></a>
  <div class="card-block">
    <h5><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h5>
    <?php if (get_post_type() === 'post') { get_template_part('templates/entry-meta'); } ?>
    <?php the_excerpt(); ?>
  </div>
</div>

<?php if ($GLOBALS['counter'] == 4) { echo '</div><div class="card-group">'; $GLOBALS['counter'] = 0; } ?>

<?php if(!isset($GLOBALS['counter'])) $GLOBALS['counter'] = 0; $GLOBALS['counter']++; ?>

<div class="card">
  <a href="<?php the_permalink(); ?>" class="">
    <div class="card-block card-poster-notas" <?php poster_bg(); ?> >
      <?php $postvideoid = $post->ID; gdrts_render_rating(array('echo' => true, 'entity' => 'posts', 'name' => 'video', 'id' => $post->ID)); ?>
    </div>
  </a>
  <div class="card-block">
    <a class="h5" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
    <?php get_template_part('templates/entry-meta'); ?>
    <?php the_excerpt(); ?>
  </div>
</div>

<?php if ($GLOBALS['counter'] == 4) { echo '</div><div class="card-group">'; $GLOBALS['counter'] = 0; } ?>

 <div class="col-modelo">
  <a href="<?php the_permalink(); ?>" class="card-poster-notas" <?php poster_bg('medium_large'); ?> ></a>
  <div class="card-block">
    <h5><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h5>
    <?php if (get_post_type() === 'post') { get_template_part('templates/entry-meta'); } ?>
    <?php the_excerpt(); ?>
  </div>
</div>

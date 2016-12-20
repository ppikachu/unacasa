
<div class="card0 video">
  <a href="<?php the_permalink(); ?>" class="">
    <div class="card-block card-poster-videos" <?php poster_bg(); ?> >
      <?php if (types_render_field("ganador")==1) echo "<img class='img-fluid' src='".get_template_directory_uri()."/dist/images/ganador-01.png'>"; ?>
    </div>
  </a>
  <div class="card-block">
    <a class="h5" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
    <?php if (types_render_field("ganador")!=1) gdrts_render_rating(array('echo' => true, 'entity' => 'posts', 'name' => 'video', 'id' => $post->ID)); ?>
    <?php get_template_part('templates/entry-meta'); ?>
    <?php the_excerpt(); ?>
  </div>
</div>

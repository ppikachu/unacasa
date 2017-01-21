<div class="col-modelo d-flex flex-column">
  <a href="<?php the_permalink(); ?>" class="card-poster-casas" <?php poster_bg('medium_large'); ?> ></a>

  <div class="card-block">
    <div class="media">
        <?php if (types_render_field("icono")) echo types_render_field( "icono", array( "class"=>"" ));?>
      <div class="media-body">
        AUTOR
        <?php the_title('<h4 class="display-1">','</h4>'); ?>
        <p>Arquitectos: <?php echo types_render_field("autores"); ?></p>
      </div>
    </div>
  </div>
  <div class="align-items-end mb-1 ml-1 mr-1">
    <a class="btn btn-default btn-block" href="<?php echo esc_url( add_query_arg( 'id', get_the_ID(), get_permalink( get_page_by_path( 'cotizar-modelo' ) ) ) )?>">Cotizá on-line</a>
  </div>
</div>

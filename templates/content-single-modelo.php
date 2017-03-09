<?php while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>
    <div class="entry-content">

      <?php if (types_render_field( "galeria-modelo")) : ?>
        <div id="carousel-<?php echo $post->post_name; ?>" class="carousel slide" data-flickity='{ "wrapAround": true, "autoPlay": 4000,"prevNextButtons": false, "pauseAutoPlayOnHover": false }'>
          <?php $imgs = get_post_meta(get_the_ID(), 'wpcf-galeria-modelo'); $x = count($imgs);
          for ($i=0;$i<$x;$i++) {
            echo '<div class="carousel-cell"><div class="carousel-item-modelo" style="background-image:url('.types_render_field( "galeria-modelo", array( "size"=>"large","index"=>$i,"raw"=>"true") ).')"></div></div>';
          } ?>
        </div>
      <?php endif; ?>

      <div class="bg-primary">
        <div class="container pb-1"><br>
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <?php the_title('<h4 class="display-1">','</h4>'); ?>
              <?php echo types_render_field( "descripcion-modelo"); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="container"><br>
        <?php
        $tabs=1;
        $childargs = array(
          'post_type' => 'variante',
          'numberposts' => -1,
          'orderby' => 'title',
          'order' => 'ASC',
          'meta_query' => array(array('key' => '_wpcf_belongs_modelo_id', 'value' => get_the_ID()))
        );
        $child_posts = get_posts($childargs);
        if ($child_posts) : ?>
        <div class="panel with-nav-tabs panel-success">
          <ul class="nav nav-tabs" role="tablist">
            <?php foreach ($child_posts as $child_post) { ?>
              <li class="nav-item">
                <a class="small nav-link <?php if ($tabs==1) echo "active "; echo $child_post->post_name; ?>" data-toggle="tab" href="#<?php echo $child_post->post_name; ?>" role="tab"><?php echo $child_post->post_title; ?></a>
              </li>
              <?php $tabs++; } ?>
            </ul>
            <div class="tab-content">
              <?php $tabs=1; foreach ($child_posts as $child_post) { ?>
                <div class="tab-pane fade<?php if ($tabs==1) echo " show in active"; ?>" id="<?php echo $child_post->post_name; ?>" role="tabpanel">
                  <div class="row flex-items-xs-middle">
                    <div class="col-md-7"><a href="<?php echo types_render_field( "plano", array( "post_id"=>$child_post->ID,"raw"=>"true")); ?>" rel="lightbox[<?php echo $child_post->post_name;?>]"><?php echo types_render_field( "plano", array( "post_id"=>$child_post->ID,"class"=>"mt-2")); ?></a></div>
                    <div class="col-md-5 small">
                      <p>Desde:<br><span class="font-weight-bold text-primary">$<?php echo number_format(types_render_field( "precio", array( "post_id"=>$child_post->ID,"raw"=>"true")), 0, ',', '.'); ?> + IVA (10.5%)</span></p>
                      <p><?php $personas = types_render_field( "personas-modelo", array( "raw"=>"true"));
                      $personas_max = types_render_field( "personas-max-modelo", array( "raw"=>"true"));
                      for ($i=0;$i<$personas;$i++) {
                        echo '<i class="fa fa-male" aria-hidden="true"></i>';
                      }
                      for ($i=0;$i<$personas_max-$personas;$i++) {
                        echo '<i class="fa fa-male text-primary" aria-hidden="true"></i>';
                      }
                      echo "<br>".$personas." - ".$personas_max." personas"; ?></p>
                      <hr>
                      <div class="row">
                        <div class="col-xs">
                          <?php $dormitorios = types_render_field( "dormitorios", array( "post_id"=>$child_post->ID,"raw"=>"true")); echo '<span class="text-primary">'.$dormitorios.'</span>'; if ($dormitorios>1) echo " Dormitorios"; else echo " Dormitorio"; ?><br>
                          <?php $banos = types_render_field( "banos", array( "post_id"=>$child_post->ID,"raw"=>"true")); echo '<span class="text-primary">'.$banos.'</span>'; if ($banos>1) echo " Baños"; else echo " Baño"; ?><br>
                          <?php $patios = types_render_field( "patios", array( "post_id"=>$child_post->ID,"raw"=>"true")); echo '<span class="text-primary">'.$patios.'</span>'; if ($patios>1) echo " Patios"; else echo " Patio"; ?><br>
                          <?php $living = types_render_field( "living", array( "post_id"=>$child_post->ID,"raw"=>"true")); echo '<span class="text-primary">'.$living."</span> Living"; ?><br>
                        </div>
                        <div class="col-xs">
                          <?php $superficie = types_render_field( "superficie", array( "post_id"=>$child_post->ID)); echo 'Superficie<br><span class="text-primary">'.$superficie.'</span>'; ?>
                        </div>
                      </div>
                      <br>
                      <div class="text-xs-center text-md-left">
                        <a class="btn btn-default btn-lg" href="<?php echo site_url ();?>/cotizar">Presupuestar y elegir forma de pago</a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php $tabs++; } ?>
              </div>
            </div>
          <?php endif; ?>
            <br>
            <?php the_content(); ?>
          </div>
        </div>
      </article>
    <?php endwhile; ?>

    <?php if (types_render_field( "recorrido-virtual")) : ?>
      <div class="container text-xs-center mb-3">
        <h2>Recorrido virtual</h2>
        <p>Paseá por tu próxima casa.</p>
        <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="<?php $tour = types_render_field( "recorrido-virtual", array( "raw"=>"true")); echo $tour; ?>" allowfullscreen></iframe></div>
      </div>
    <?php endif; ?>

    <?php the_post_thumbnail( 'large', array('class' => 'img-fluid')); ?>
    <div class="container mb-3"><br>
      <p class="text-center small">*Las imágenes son simples ejemplos sobre la terminación externa de la casa. Los modelos comercializados y su imagen  nal responden a la memoria descriptiva detallada en el contrato.</p>
    </div>

    <div class="bg-inverse text-white text-center pb-2">
      <div class="container"><br>
        <p class="h4 display-4">Cada modelo está diseñado para brindar espacios flexibles, confort y eficiencia energética. Sistema de construcción en 120 días.</p><br>
        <a class="btn btn-default btn-lg" href="<?php echo site_url(); ?>/cotizar">Cotizá on-line</a>
      </div>
    </div>

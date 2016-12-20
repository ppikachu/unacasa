<?php while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>

  <div class="entry-content">
      <?php the_post_thumbnail( 'large', array('class' => 'img-fluid')); ?>
      <div class="bg-primary">
        <div class="container"><br>
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <?php the_title('<h4 class="display-1">','</h4>'); ?>
              <?php echo types_render_field( "descripcion-modelo"); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="container"><br>
        <div class="panel with-nav-tabs panel-success">
            <ul class="nav nav-tabs" role="tablist">
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
              foreach ($child_posts as $child_post) { ?>
                <li class="nav-item">
                  <a class="nav-link <?php if ($tabs==1) echo "active "; echo $child_post->post_name; ?>" data-toggle="tab" href="#<?php echo $child_post->post_name; ?>" role="tab"><?php echo $child_post->post_title; ?></a>
                </li>
                <?php $tabs++; } ?>
              </ul>
            <div class="tab-content">
              <?php $tabs=1; foreach ($child_posts as $child_post) { ?>
              <div class="tab-pane fade<?php if ($tabs==1) echo " in active"; ?>" id="<?php echo $child_post->post_name; ?>" role="tabpanel">
                <div class="row flex-items-xs-middle">
                  <div class="col-sm-7"><a href="<?php echo types_render_field( "plano", array( "post_id"=>$child_post->ID,"raw"=>"true")); ?>" rel="lightbox[<?php echo $child_post->post_name;?>]"><?php echo types_render_field( "plano", array( "post_id"=>$child_post->ID)); ?></a></div>
                  <div class="col-sm-5 small">
                  <p>Desde:<br><span class="text-default">$<?php echo number_format(types_render_field( "precio", array( "post_id"=>$child_post->ID,"raw"=>"true"))); ?> + IVA (10.5%)</span></p>
                  <p><?php $personas = types_render_field( "personas-modelo", array( "raw"=>"true"));
            			$personas_max = types_render_field( "personas-max-modelo", array( "raw"=>"true"));
            			for ($i=0;$i<$personas;$i++) {
            				echo '<i class="fa fa-male" aria-hidden="true"></i>';
            			}
            			for ($i=0;$i<$personas_max-$personas;$i++) {
            				echo '<i class="fa fa-male text-default" aria-hidden="true"></i>';
            			}
            			echo "<br>".$personas." - ".$personas_max." personas"; ?></p>
                  <hr>
                  <div class="row">
                    <div class="col-xs">
                      <?php $dormitorios = types_render_field( "dormitorios", array( "post_id"=>$child_post->ID,"raw"=>"true")); echo '<span class="text-default">'.$dormitorios.'</span>'; if ($dormitorios>1) echo " Dormitorios"; else echo " Dormitorio"; ?><br>
                      <?php $banos = types_render_field( "banos", array( "post_id"=>$child_post->ID,"raw"=>"true")); echo '<span class="text-default">'.$banos.'</span>'; if ($banos>1) echo " Baños"; else echo " Baño"; ?><br>
                      <?php $patios = types_render_field( "patios", array( "post_id"=>$child_post->ID,"raw"=>"true")); echo '<span class="text-default">'.$patios.'</span>'; if ($patios>1) echo " Patios"; else echo " Patio"; ?><br>
                      <?php $living = types_render_field( "living", array( "post_id"=>$child_post->ID,"raw"=>"true")); echo '<span class="text-default">'.$living."</span> Living"; ?><br>
                    </div>
                    <div class="col-xs">
                      <?php $superficie = types_render_field( "superficie", array( "post_id"=>$child_post->ID)); echo 'Superficie<br><span class="text-default">'.$superficie.'</span>'; ?>
                    </div>
                  </div>
                  <br>
                  <a class="btn btn-default" href="/www/cotizar">Presupuestar y elegir forma de pago</a><br>
                  </div>
                </div>
              </div>
              <?php $tabs++; } ?>
            </div>
          </div>
        <br>
      <?php the_content(); ?>
      </div>
  </div>

  </article>
<?php endwhile; ?>

<br>
<?php if (types_render_field( "recorrido-virtual")) : ?>
<div class="container text-xs-center">
  <h2>Recorrido virtual</h2>
  <p>Paseá por tu próxima casa.</p>
  <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="<?php $tour = types_render_field( "recorrido-virtual", array( "raw"=>"true")); echo $tour; ?>" allowfullscreen></iframe></div>
</div>
<br><br>
<?php endif; ?>
<?php if (types_render_field( "galeria-modelo")) : ?>
<div id="carousel-<?php echo $post->post_name; ?>" class="carousel slide" data-ride="carousel">

	<ol class="carousel-indicators">
		<?php $imgs = get_post_meta(get_the_ID(), 'wpcf-galeria-modelo'); $x = count($imgs);
		for ($i=0;$i<$x;$i++) {
			if ($i==0) $slide_active="active"; else $slide_active="";
			echo '<li data-target="#carousel-'.$post->post_name.'" data-slide-to="'.$i.'" class="'.$slide_active.'"></li>';
		} ?>
	</ol>

	<div class="carousel-inner" role="listbox">
		<div class="carousel-item active">
			<?php echo types_render_field( "galeria-modelo", array( "size"=>"large","class"=>"img-fluid", "separator" => "</div><div class='carousel-item'>") ); ?>
		</div>
	</div>

</div>
<?php endif; ?>
<div class="container"><br>
  <p class="text-xs-center small">*Las imágenes son simples ejemplos sobre la terminación externa de la casa. Los modelos comercializados y su imagen  nal responden a la memoria descriptiva detallada en el contrato.</p>
</div>

<div class="bg-inverse text-white text-xs-center">
  <div class="container"><br>
    <p class="h4 display-4">Cada modelo está diseñado para brindar espacios flexibles, confort y eficiencia energética. Sistema de construcción en 120 días.</p><br>
    <a class="btn btn-default" href="/www/cotizar">Cotizá on-line</a>
    <br><br>
  </div>
</div>

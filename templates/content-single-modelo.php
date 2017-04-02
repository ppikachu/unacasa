<?php while (have_posts()) : the_post(); ?>
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
			<div class="container py-2">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<?php the_title('<h4 class="display-1">','</h4>'); ?>
						<?php echo types_render_field( "descripcion-modelo"); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="container my-1">
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
							<a class="nav-link <?php if ($tabs==1) echo "active "; echo $child_post->post_name; ?>" data-toggle="tab" href="#<?php echo $child_post->post_name; ?>" role="tab"><?php echo $child_post->post_title; ?></a>
						</li>
						<?php $tabs++; } ?>
					</ul>

					<div class="tab-content mt-2">
						<?php $tabs=1; foreach ($child_posts as $child_post) { ?>
							<div class="tab-pane fade<?php if ($tabs==1) echo " show in active"; ?>" id="<?php echo $child_post->post_name; ?>" role="tabpanel">
								<div class="row flex-items-xs-middle">
									<div class="col-md-7"><a href="<?php echo types_render_field( "plano", array( "post_id"=>$child_post->ID,"raw"=>"true")); ?>" rel="lightbox[<?php echo $child_post->post_name;?>]"><?php echo types_render_field( "plano", array( "post_id"=>$child_post->ID,"class"=>"img-fluid")); ?></a></div>
									<div class="col-md-5">
										<h4 class="display-1"><?php echo $child_post->post_title; ?></h4>
										<p>Desde:<br><span class="font-weight-bold text-primary">$<?php echo number_format(types_render_field( "precio", array( "post_id"=>$child_post->ID,"raw"=>"true")), 0, ',', '.'); ?> + IVA (10.5%)</span></p>

										<div class="row">
											<div class="col">
												<?php $personas = types_render_field( "personas", array( "post_id"=>$child_post->ID,"raw"=>"true"));
												for ($i=0;$i<$personas;$i++) { echo '<i class="fa fa-male" aria-hidden="true"></i>'; }
												echo "<br>".$personas." personas"; ?>
											</div>
											<div class="col">
												<?php $plantas = types_render_field( "plantas", array( "post_id"=>$child_post->ID,"raw"=>"true"));
												if ($plantas) : ?>
												<span class="display-1"><?php echo $plantas; if ($plantas>1) echo " Plantas"; else echo " Planta"; ?></span>
											<?php endif; ?>
											<?php $ambientes = types_render_field( "ambientes", array( "post_id"=>$child_post->ID,"raw"=>"true"));
											if ($ambientes) : ?>
											<br>
											<span class="display-1"><?php echo $ambientes; if ($ambientes>1) echo " ambientes"; else echo " ambiente"; ?></span>
										<?php endif; ?>
									</div>
								</div>
								<hr/>

								<div class="row">
									<div class="col">
										<?php $dormitorios = types_render_field( "dormitorios", array( "post_id"=>$child_post->ID,"raw"=>"true")); echo '<span class="text-primary">'.$dormitorios.'</span>'; if ($dormitorios>1) echo " Dormitorios"; else echo " Dormitorio"; ?><br>
										<?php $banos = types_render_field( "banos", array( "post_id"=>$child_post->ID,"raw"=>"true")); echo '<span class="text-primary">'.$banos.'</span>'; if ($banos>1) echo " Baños"; else echo " Baño"; ?><br>
										<?php $patios = types_render_field( "patios", array( "post_id"=>$child_post->ID,"raw"=>"true")); echo '<span class="text-primary">'.$patios.'</span>'; if ($patios>1) echo " Patios"; else echo " Patio"; ?><br>
										<?php $living = types_render_field( "living", array( "post_id"=>$child_post->ID,"raw"=>"true")); echo '<span class="text-primary">'.$living."</span> Living"; ?><br>
										<?php $cochera = types_render_field( "cochera", array( "post_id"=>$child_post->ID)); if ($cochera==1) echo '&nbsp;&nbsp;&nbsp;Cochera'; ?>
									</div>
									<div class="col">
										<?php $superficie = types_render_field( "superficie", array( "post_id"=>$child_post->ID)); echo 'Superficie<br><span class="text-primary">'.$superficie.'</span>'; ?>
									</div>
								</div>
								<div class="my-1">
									<?php
									$sistema_id = wpcf_pr_post_get_belongs( $child_post->ID, 'sistema' );
									$sistema_post = get_post( $sistema_id );
									$sistema_logo = types_render_field( 'logo', array( 'post_id' => $sistema_id,'class'=>'media-object','width'=>'28'));
									$sistema_name = $sistema_post->post_title;
									if ($sistema_id) : ?><span class="text-primary">Sistema:</span> <?php echo $sistema_name; ?><?php endif; ?>
									<?php $entrega = types_render_field( "entrega", array( "post_id"=>$child_post->ID,"raw"=>"true"));
									if ($entrega) : ?>
									<br><span class="text-primary">Entrega:</span> <?php echo $entrega;?> días.
								<?php endif; ?>
								<?php $garantia = types_render_field( "garantia", array( "post_id"=>$child_post->ID,"raw"=>"true"));
								if ($garantia) : ?>
								<br><span class="text-primary">Garantia:</span> <?php echo $garantia;?> meses.
							<?php endif; ?>
						</div>

						<div class="text-xs-center text-md-left">
							<?php $url_cotizar = esc_url( add_query_arg( 'id', $child_post->ID, get_permalink( get_page_by_path( 'cotizar-modelo' ) ) ) ); ?>
							<a class="btn btn-default btn-block" href="<?php echo $url_cotizar; ?>">Cotizá on-line</a>
						</div>
					</div>
				</div>
			</div>
			<?php $tabs++; } ?>
		</div>
	</div>
	<?php endif; ?>
</div>

<?php if (types_render_field( "recorrido-virtual")) : ?>
	<div class="container text-xs-center mb-3">
		<h2>Recorrido virtual</h2>
		<p>Paseá por tu próxima casa.</p>
		<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="<?php $tour = types_render_field( "recorrido-virtual", array( "raw"=>"true")); echo $tour; ?>" allowfullscreen></iframe></div>

		<div class="my-3">
			<h4 class="text-primary">Descripción</h4>
			<?php the_content(); ?>
		</div>

		<table class="table table-striped0">
			<thead>
				<tr class="display-2">
					<th class="text-primary">Terminaciones Exteriores</th>
					<th class="text-primary text-center">Obra Gris</th>
					<th class="text-primary text-center">Llave en mano</th>
					<th class="text-primary text-center">Editor</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th class="text-primary" scope="row">Pintura antióxido / exterior. Colores a elección</th>
					<td class="text-center"><?php echo types_render_field( "pintura-a", array( "raw"=>"true")); ?></td>
					<td class="text-center"><?php echo types_render_field( "pintura-b", array( "raw"=>"true")); ?></td>
					<td class="text-center"><?php echo types_render_field( "pintura-c", array( "raw"=>"true")); ?></td>
				</tr>
				<tr>
					<th class="text-primary" scope="row">Tratamiento impermeabilizante con pintura asfáltica</th>
					<td class="text-center"><?php if (types_render_field( "tratamiento-pintura", array( "option"=>0))==1) echo "x"; else echo "-"; ?></td>
					<td class="text-center"><?php if (types_render_field( "tratamiento-pintura", array( "option"=>1))==1) echo "x"; else echo "-"; ?></td>
					<td class="text-center"><?php if (types_render_field( "tratamiento-pintura", array( "option"=>2))==1) echo "x"; else echo "-"; ?></td>
				</tr>
			</tbody>
			<thead>
				<tr class="display-2">
					<th class="text-primary">Terminaciones Interiores</th>
					<th class="text-primary text-center">Obra Gris</th>
					<th class="text-primary text-center">Llave en mano</th>
					<th class="text-primary text-center">Editor</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th class="text-primary" scope="row">Aislante térmico / acústico / contra el fuego</th>
					<td class="text-center"><?php if (types_render_field( "aislante", array( "option"=>0))==1) echo "x"; else echo "-"; ?></td>
					<td class="text-center"><?php if (types_render_field( "aislante", array( "option"=>1))==1) echo "x"; else echo "-"; ?></td>
					<td class="text-center"><?php if (types_render_field( "aislante", array( "option"=>2))==1) echo "x"; else echo "-"; ?></td>
				</tr>
				<tr>
					<th class="text-primary" scope="row">Pisos</th>
					<td class="text-center"><?php echo types_render_field( "pisos-a", array( "raw"=>"true")); ?></td>
					<td class="text-center"><?php echo types_render_field( "pisos-b", array( "raw"=>"true")); ?></td>
					<td class="text-center"><?php echo types_render_field( "pisos-c", array( "raw"=>"true")); ?></td>
				</tr>
			</tbody>
		</table>

		<div class="text-center my-3">
			<h4 class="text-primary">Nuestros Provedores</h4>
			<p>Contamos con los mejores proveedores y materiales para tener la mayor calidad en tu hogar.</p>
			<p>(imagen)</p>
		</div>

	</div>
<?php endif; ?>

<?php the_post_thumbnail( 'large', array('class' => 'img-fluid')); ?>
<div class="container my-3">
	<p class="text-center small">*Las imágenes son simples ejemplos sobre la terminación externa de la casa. Los modelos comercializados y su imagen  nal responden a la memoria descriptiva detallada en el contrato.</p>
</div>

<div class="bg-inverse text-white text-center py-2">
	<div class="container">
		<p class="h4 display-4">Cada modelo está diseñado para brindar espacios flexibles, confort y eficiencia energética. Sistema de construcción en 120 días.</p><br>
		<a class="btn btn-default btn-lg" href="<?php echo site_url(); ?>/cotizar">Cotizá on-line</a>
	</div>
</div>
</div>
<?php endwhile; ?>

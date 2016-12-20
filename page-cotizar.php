<div class="container">
	<div class="page-header">

		<div id="elegi-modelo">
			<div class="alert bg-grisclaro text-white">1- Elegí el modelo de tu casa</div>

			<ul class="card-group nav nav-tabs0" role="tablist">
			<?php
			$args = array(
				'post_type'              => array( 'modelo' ),
				'category_name'          => 'proyectos-ganadores',
			);
			// The Query
			$query = new WP_Query( $args );
			// The Loop
			$tabs_principal=2;
			while ( $query->have_posts() ) {
					$query->the_post(); ?>
						<a class="elije-modelo card nav-item nav-link<?php if ($tabs_principal==1) echo " active"; ?>" data-toggle="tab" role="tab" href="#<?php echo $post->post_name; ?>">

								<?php the_post_thumbnail( 'medium_large', array('class' => 'img-fluid')); ?>

							<div class="card-block">
								<div class="media">
									<span class="media-left" href="#">
										<?php echo types_render_field( "icono", array( "class"=>"media-object","width"=>"32"));?>
									</span>
									<div class="media-body">
										Autor<br>
										<strong class="text-uppercase"><?php the_title('<h4 class="display-1">', '</h4>'); ?></strong>
									</div>
								</div>
							</div>
						</a>
						<?php	$tabs_principal++; } wp_reset_postdata(); ?>
			</ul>
		</div>

		<div id="elegi-superficie">
			<div class="alert bg-grisclaro text-white">2- Seleccioná la superficie</div>

			<div class="tab-content">
				<?php $tabs_variante=1;
				while ( $query->have_posts() ) {
					$query->the_post(); ?>
					<div class="tab-pane fade<?php if ($tabs_variante==1) echo " in active"; ?>" id="<?php echo $post->post_name; ?>" role="tabpanel" >
						<ul class="nav nav-tabs" role="tablist">
							<?php
							$childargs = array(
								'post_type' => 'variante',
								'numberposts' => -1,
								'orderby' => 'title',
								'order' => 'ASC',
								'meta_query' => array(array('key' => '_wpcf_belongs_modelo_id', 'value' => get_the_ID()))
							);
							//print_r ($childargs);
							$child_posts = get_posts($childargs);
							$tabs=1;
							foreach ($child_posts as $child_post) { ?>
								<li class="nav-item">
									<a class="nav-link precio <?php if ($tabs==1) echo "active "; echo $child_post->post_name; ?>" precio="<?php echo types_render_field( "precio", array( "post_id"=>$child_post->ID,"raw"=>"true")); ?>" data-toggle="tab" href="#<?php echo $child_post->post_name; ?>" role="tab"><?php echo $child_post->post_title; ?></a>
								</li>
								<?php $tabs++; } ?>
							</ul>
							<div class="tab-content">
								<?php $tabs=1; foreach ($child_posts as $child_post) { ?>
									<div class="tab-pane fade<?php if ($tabs==1) echo " in active"; ?>" id="<?php echo $child_post->post_name; ?>" role="tabpanel">
										<div class="row">
											<div class="col-sm-7"><a href="<?php echo types_render_field( "plano", array( "post_id"=>$child_post->ID,"raw"=>"true")); ?>" rel="lightbox[<?php echo $child_post->post_name;?>]"><?php echo types_render_field( "plano", array( "class"=>"img-fluid","post_id"=>$child_post->ID)); ?></a></div>
											<div class="col-sm-5">
												<p><br>Desde:<br><span class="text-default">$<?php echo number_format(types_render_field( "precio", array( "post_id"=>$child_post->ID,"raw"=>"true"))); ?> + IVA (10.5%)</span></p>
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
												<?php if (types_render_field( "memoria-descriptiva")) : ?><a class="btn btn-info" target="_blank" href="<?php echo types_render_field( "memoria-descriptiva", array( "post_id"=>$child_post->ID,"raw"=>"true"));?>">Ver memoria descriptiva</a><?php endif; ?>
											</div>
										</div>
									</div>
									<?php $tabs++; } ?>
								</div>
							</div>
							<?php
							$tabs_variante++;
						}
						wp_reset_postdata(); ?>
					</div>
		</div>
		<br><br>
		<div id="calcula-cuotas">
			<div class="alert bg-grisclaro text-white">3- Calculá el valor de las cuotas</div>

			<?php $args = array('pagename' => 'cotizar'); $the_query = new WP_Query( $args ); $the_query->the_post(); ?>
			<div class="text-xs-center"><?php the_content(); wp_reset_postdata(); ?></div>

			<form class="form-inline0">

				<div class="form-group row">
				  <label for="monto_a_financiar" class="col-xs-3 col-form-label">Valor Total</label>
					<div class="col-xs-9">
					<div class="input-group">
			      <div class="input-group-addon">$</div>
			      <input class="form-control" type="text" value="" id="valor_total" disabled>
			    </div>
					</div>
				</div>

				<div class="form-group row">
				  <label for="monto_a_financiar" class="col-xs-3 col-form-label">Monto a financiar</label>
					<div class="col-xs-9">
					<div class="input-group">
			      <div class="input-group-addon">$</div>
			      <input class="form-control" type="text" value="" id="monto_a_financiar">
			    </div>
					</div>
				</div>

				<div class="form-group row">
				  <label for="example-text-input" class="col-xs-3 col-form-label">Número de cuotas</label>
				  <div class="col-xs-9">
						<select class="custom-select" id="no_cuotas">
						  <option value="1" porcentaje="1" selected>Elegí el número de cuotas</option>
							<option value="12" porcentaje="1.17">12 cuotas</option>
						  <option value="24" porcentaje="1.35">24 cuotas</option>
						  <option value="36" porcentaje="1.53">36 cuotas</option>
							<option value="48" porcentaje="1.73">48 cuotas</option>
							<option value="60" porcentaje="1.95">60 cuotas</option>
						</select>
				  </div>
				</div>

				<div class="form-group row">
				  <label for="example-text-input" class="col-xs-3 col-form-label"></label>
				  <div class="col-xs-9">
						<a  id="limpiar" class="btn btn-default">Recalcular</a>
				  </div>
				</div>


				<hr>
				<div class="form-group row">
				  <label for="monto_de_cuota" class="col-xs-3 col-form-label font-weight-bold">Monto estimado de cuota *</label>
				  <div class="col-xs-9">
						<div class="input-group">
				      <div class="input-group-addon">$</div>
				    	<input class="form-control font-weight-bold" type="text" value="" id="monto_de_cuota" disabled>
						</div>
				  </div>
				</div>

			</form>

		</div>

		<!-- <div id="precalificacion">
			<div class="alert bg-grisclaro text-white">4- Precalificación</div>

			<div class="form-group row">
				<label for="valor_del_lote" class="col-xs-3 col-form-label">Valor del Lote</label>
				<div class="col-xs-9">
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input class="form-control" type="text" value="" id="valor_del_lote">
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="lo_pagaste_en_cuotas" class="col-xs-3 col-form-label">Lo pagaste en cuotas?</label>
				<div class="col-xs-9">
					<label class="custom-control custom-radio">
					  <input id="radio1" name="radio" type="radio" class="custom-control-input">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">Si</span>
					</label>
					<label class="custom-control custom-radio">
					  <input id="radio2" name="radio" type="radio" class="custom-control-input">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">No</span>
					</label>
				</div>
			</div>

			<div class="form-group row">
				<label for="valor_de_las_cuotas" class="col-xs-3 col-form-label">Valor de las Cuotas</label>
				<div class="col-xs-9">
					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input class="form-control" type="text" value="" id="valor_de_las_cuotas">
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="contactar" class="col-xs-3 col-form-label"></label>
				<div class="col-xs-9">
					<div class="input-group">
						<a class="btn btn-default" href="">Deseo ser contactado</a>
					</div>
				</div>
			</div>

			<p class="text-xs-center">Te estaremos contactando a la brevedad para coordinar una reunión personal.</p>
		</div> -->
		<div class="text-xs-center">
			<br>
		<!-- <p class="text-xs-center">Te estaremos contactando a la brevedad para coordinar una reunión personal.</p> -->
		<a class="btn btn-default" href="/www/contactarme">Deseo ser contactado</a>
	</div>
</div>
</div>

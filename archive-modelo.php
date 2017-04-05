<div class="page-header jumbotron bg-primary">
	<div class="container text-center">
		<h1 class="display-3 text-white">CIENTOS DE DISEÑOS <span class="text-default">Múltiples combinaciones</span></h1>
	</div>
</div>

<div class="container-fluid">
<div class="row">
	<div class="col-3 mt-3">
		<?php dynamic_sidebar('sidebar-buscador'); ?>
	</div>
	<div id="resultados" class="col">
		<?php if (!have_posts()) : ?>
		  <div class="alert alert-warning mt-3">
		    No se encontraron modelos con las características elegidas.
		  </div>
		<?php endif; ?>
		<?php while (have_posts()) : the_post(); ?>
		  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
		<?php endwhile; ?>
	</div>
</div>
</div>

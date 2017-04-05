<?php
/**
 * Template Name: Buscar Modelo
 */
?>
<div class="page-header jumbotron bg-primary">
	<div class="container text-center">
		<h1 class="display-3 text-white">CIENTOS DE DISEÑOS <span class="text-default">Múltiples combinaciones</span></h1>
	</div>
</div>

<div class="container-fluid">
<div class="row">
	<div class="col-3 mt-3">
		<?php echo do_shortcode('[searchandfilter id="2577"]'); ?>
	</div>
	<div id="resultados" class="col">
		<?php echo do_shortcode('[searchandfilter id="2577" show="results"]'); ?>
	</div>
</div>
</div>

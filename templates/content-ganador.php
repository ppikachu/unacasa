 <?php if(!isset($GLOBALS['counter'])) $GLOBALS['counter'] = 0; $GLOBALS['counter']++; ?>

 <div class="card">
	<a class="rollover card-poster-notas" href="<?php the_permalink(); ?>" <?php poster_bg(); ?> >
		<div class="bracket over card-block text-xs-center">
			<h5 class="font-weight-bold text-uppercase"><?php the_title();?></h5>
		</div>
	</a>
  <div class="card-block">
    <p><?php echo types_render_field("autores"); ?></p>
  </div>
</div>

<?php if ($GLOBALS['counter'] == 4) { echo '</div><div class="card-group">'; $GLOBALS['counter'] = 0; } ?>

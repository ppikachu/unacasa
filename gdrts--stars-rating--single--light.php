<?php // GDRTS Template: Light // ?>

<div class="<?php gdrtsm_stars_rating()->loop()->render()->classes(); ?>">
    <div class="gdrts-inner-wrapper">

        <?php do_action('gdrts-template-rating-block-before'); ?>

        <?php gdrtsm_stars_rating()->loop()->render()->stars(); ?>

        <div class="gdrts-rating-text">
            <?php

            if (gdrtsm_stars_rating()->loop()->has_votes()) {
              $_text_args = array(
                'show_votes' => true,
                'show_max' => false,
                'tpl_rating' => '',
                'tpl_votes' => array('singular' => '%s voto.', 'plural' => '%s votos')
              );
              gdrtsm_stars_rating()->loop()->render()->text($_text_args);
            } else {
              _e("Sin votos.", "gd-rating-system");
            }

            ?>
        </div>

        <?php

        if (gdrts_single()->is_loop_save()) {

        ?>

            <div class="gdrts-rating-thanks">
                <?php _e("Gracias por el voto!", "gd-rating-system"); ?>
            </div>

        <?php

        }

        if (gdrts_single()->is_loop()) {
            gdrtsm_stars_rating()->loop()->please_wait();
        }

        gdrts_single()->json();

        do_action('gdrts-template-rating-block-after');
        do_action('gdrts-template-rating-rich-snippet');

        ?>

    </div>
</div>

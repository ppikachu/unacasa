<?php

//show_admin_bar(false);


function remove_dashboard_meta() {
        //remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        //remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        //remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        // remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );

define('GOOGLE_FONTS', 'PT+Sans:300,300i,700,700i|Open+Sans:300,400,700');
function load_google_fonts() {
	if( ! defined( 'GOOGLE_FONTS' ) ) return;
	echo '<link href="http://fonts.googleapis.com/css?family=' . GOOGLE_FONTS . '" rel="stylesheet" type="text/css" />'."\n";
}

add_action( 'wp_head', 'load_google_fonts' , 1);

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {
    if ( is_page( 'cotizar-modelo' ) ) {
        $classes[] = 'cotizar';
    }
    return $classes;
}

function wpdocs_all_posts_on_videos( $query ) {
    if ( is_post_type_archive( 'video' )  ) {
        $query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'wpdocs_all_posts_on_videos' );

function bootstrap_wrap_oembed( $html ){
  $html = preg_replace( '/(width|height)="\d*"\s/', "", $html ); // Strip width and height #1
  return'<div class="embed-responsive embed-responsive-16by9">'.$html.'</div>'; // Wrap in div element and return #3 and #4
}
add_filter( 'embed_oembed_html','bootstrap_wrap_oembed',10,1);

function poster( $media_id ) {
	$poster = wp_get_attachment_image_src( $media_id, 'large' , false );
	echo 'style="background-image:url('.$poster[0].'); background-size:cover; background-position:center;"';
}

function poster_bg( $size="large",$post_id="post") {
	global $post;
	if ("post" === $post_id) $post_id = $post->ID;
	$poster = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size , false );
	echo 'style="background-image:url('.$poster[0].'); background-size:cover; background-position:center;"';
}

function hex2rgb($hexColor) {
	$shorthand = (strlen($hexColor) == 4);
	list($r, $g, $b) = $shorthand? sscanf($hexColor, "#%1s%1s%1s") : sscanf($hexColor, "#%2s%2s%2s");
	return [
		"r" => hexdec($shorthand? "$r$r" : $r),
		"g" => hexdec($shorthand? "$g$g" : $g),
		"b" => hexdec($shorthand? "$b$b" : $b)
	];
}

// formato titulos trabajo
add_action( 'init', 'wptuts_buttons' );
function wptuts_buttons() {
    add_filter( "mce_external_plugins", "wptuts_add_buttons" );
    add_filter( 'mce_buttons', 'wptuts_register_buttons' );
}
function wptuts_add_buttons( $plugin_array ) {
    $plugin_array['wptuts'] = get_template_directory_uri() . '/lib/titulos-plugin.js';
    return $plugin_array;
}
function wptuts_register_buttons( $buttons ) {
    array_push( $buttons, 'col_texto_izq', 'col_texto_der' ); // importante
    return $buttons;
}

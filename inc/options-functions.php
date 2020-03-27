<?php
/** Functions for implementing options */

/** Returns individual array items from the "aniline-theme" option */
function aniline_get_option( $name, $default = false ) {
	if ( get_option('aniline-theme') ) {
		$options = get_option('aniline-theme'); }
	if ( isset( $options[$name] ) ) {
		return $options[$name];
	} else { return $default; }
}

/** Muestra footer */
function aniline_return_footer_text() {
    return $footer_text;}

function aniline_footer_text() {
    $footer_text = aniline_get_option( 'footer_text', aniline_return_footer_text() );
    echo $footer_text;}

add_action( 'aniline_footer_text', 'aniline_footer_text' );
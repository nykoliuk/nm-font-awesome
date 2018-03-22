<?php

/**
 * Protect direct access
 */
if ( ! defined( 'ABSPATH' ) ) die( NM_FONTAWESOME_MSG );

/**
 * Registers Shortcode
 */

add_filter('widget_text', 'do_shortcode');

add_shortcode( 'nm_fa', 'nm_fa_shortcode' );

function nm_fa_shortcode( $atts ) {
	if (is_array($atts) && $atts['name']) {
		$class = $atts['name'];
	}
	
	return "<i class='".$class."'></i>";
}

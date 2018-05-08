<?php
/*
Plugin Name: NM Font Awesome
Plugin URI: https://wordpress.org/plugins/nm-font-awesome/
Description: Wordpress plugin that adds the latest version 5 of <a href="https://fontawesome.com/">Font Awesome</a> into your WordPress project.
Version: 0.1.4
Author: Mykhailo Nykoliuk
Author URI: https://profiles.wordpress.org/nykoliuk/
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
GitHub Plugin URI: https://github.com/nykoliuk/nm-font-awesome
*/

if( ! defined( 'NM_FONTAWESOME_MSG' ) ) define( 'NM_FONTAWESOME_MSG', __( 'Cannot access pages directly.', 'nm-font-awesome' ) );
if ( ! defined( 'ABSPATH' ) ) die( NM_FONTAWESOME_MSG );

if( ! defined( 'NM_FONTAWESOME_PLUGIN_DIR' ) ) define( 'NM_FONTAWESOME_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
if( ! defined( 'NM_FONTAWESOME_PLUGIN_URI' ) ) define( 'NM_FONTAWESOME_PLUGIN_URI', plugins_url( '', __FILE__ ) );

require_once NM_FONTAWESOME_PLUGIN_DIR . 'includes/nm-font-awesome-init.php';
require_once NM_FONTAWESOME_PLUGIN_DIR . 'includes/nm-font-awesome-shortcode.php';

// Enqueue Font Awesome.
add_action( 'wp_enqueue_scripts', 'nm_font_awesome' );
function nm_font_awesome() {
    wp_enqueue_script( 'nm-fontawesome', 'https://use.fontawesome.com/releases/v5.0.12/js/all.js', array(), null );
}

add_filter( 'script_loader_tag', 'add_nm_defer_attribute', 10, 3 );

function add_nm_defer_attribute( $tag, $handle, $src ) {
    if ( 'nm-fontawesome' === $handle ) {
        $tag = '<script defer src="' . esc_url( $src ) . '" crossorigin="anonymous"></script>';
    }

    return $tag;
}

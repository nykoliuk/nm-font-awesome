<?php

add_action('admin_head', 'nm_fontawesome_mce_button');

 function nm_fontawesome_mce_button() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') || !current_user_can('edit_pages') ) {
    return;
    }
    // check if WYSIWYG is enabled
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "nm_fontawesome_add_mce_plugin");
        add_filter('mce_buttons', 'nm_fontawesome_register_mce_button');
    }
}

function nm_fontawesome_add_mce_plugin($plugin_array) {
    $plugin_array['nm_fontawesome_btn'] = plugins_url( 'public/js/nm_mce_btn.js', dirname(__FILE__) );
    return $plugin_array;
}

function nm_fontawesome_register_mce_button($buttons) {
   array_push($buttons, "nm_fontawesome_btn");
   return $buttons;
}

function nm_fontawesome_admin_style() {
    wp_enqueue_style( 'font-awesome-5', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' );
    wp_enqueue_style( 'font-awesome-mce', plugins_url( 'public/css/nm_mce_style.css', dirname(__FILE__) ) );
}

add_action('admin_enqueue_scripts', 'nm_fontawesome_admin_style');

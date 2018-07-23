<?php
/**
 * Register a plugin menu page.
 */
function nm_fontwesome_menu() {
    add_menu_page(
        'NM Font Awesome',
        'Font Awesome',
        'manage_options',
        'nm_fontawesome',
        'nm_fontwesome_options',
        plugins_url( 'public/images/menu-icon.png', dirname(__FILE__) ),
        80
    );
}
add_action( 'admin_menu', 'nm_fontwesome_menu' );

/**
 * Display a custom menu page
 */
 function nm_fontwesome_options() {
    echo '<h1>NM Font Awesome</h1>';
 	echo '<div class="wrap">';
 	echo '<p>NM Font Awersome makes it easy to add vector icons and social logos from the latest version of <a href="https://fontawesome.com/">Font Awesome v5</a> to your website.</p>';
    echo '<h3 style="margin-bottom: 10px;">USAGE</h3>';
    echo '<p style="margin: 0;">Font Awesome icons can be any of 4 different styles, each with its own prefix.</p>';
    echo '<p style="margin: 0;">In the free version of the plugin, you can use only 2 styles:</p>';
    echo '<ul style="list-style-type: circle;padding-left:30px;">';
    echo '<li><b>Solid</b>, with style prefix <code>fas</code>';
    echo '<li><b>Brands</b>, with style prefix <code>fab</code>';
    echo '</ul>';
    echo '<p style="margin: 0;">Read the documentation <a href="https://fontawesome.com/how-to-use/svg-with-js#additional-styling" target="_blank">Additional Styling Classes</a> to use the plug-in\'s features 100%.</p>';
    echo '<p style="margin: 0 0 10px;">NM Font Awersome gives you 3 ways of usage:</p>';
    echo '<h4 style="margin: 10px 0 0;">1) SHORTCODE</h4>';
    echo '<pre>';
    echo '<code>';
    echo '[nm_fa name="fas fa-camera-retro"]';
    echo '</code>';
    echo '</pre>';
    echo '<pre>';
    echo '<code>';
    echo '[nm_fa name="fas fa-camera-retro fa-2x"]';
    echo '</code>';
    echo '</pre>';
    echo '<pre>';
    echo '<code>';
    echo '[nm_fa name="fas fa-cog fa-spin"]';
    echo '</code>';
    echo '</pre>';
    echo '<p style="margin: 10px 0;">Where the name is the name of the class of the icon that you want to add.</p>';
    echo '<p style="margin: 0 0 10px;">A complete list of icons you can find on <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a>.</p>';
    echo '<h4 style="margin: 10px 0 0;">2) TINYMCE</h4>';
    echo '<p style="margin: 5px 0 0;">Select the desired icon in the drop-down menu.</p>';
    echo '<h4 style="margin: 10px 0 0;">3) HTML</h4>';
    echo '<p style="margin: 5px 0 0;">To access the HTML editor, click on the "HTML" link on the tab at the top right of the text editor window in WordPress.<br /> If you don\'t know how to use Font Awesome in HTML, you can read <a href="https://fontawesome.com/how-to-use/svg-with-js#basic-use" target="_blank">Font Awesome Basic Use</a>.</p>';
    echo '<h3 style="margin: 40px 0 10px;">COMING SOON</h3>';
    echo '<p style="margin: 0 0 10px;">In the near future there will be a PRO version, where you can use all Awesome Icons.</p>';
    echo '<p style="margin: 0 0 10px;">If you want to see PRO version faster or just support me <a href="https://www.paypal.me/MykhailoNykoliuk" target="_blank">Donate Link</a>.</p>';
 	echo '</div>';
 }

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
    wp_enqueue_style( 'font-awesome-5', 'https://use.fontawesome.com/releases/v5.1.1/css/all.css' );
    wp_enqueue_style( 'font-awesome-mce', plugins_url( 'public/css/nm_mce_style.css', dirname(__FILE__) ) );
}

add_action('admin_enqueue_scripts', 'nm_fontawesome_admin_style');

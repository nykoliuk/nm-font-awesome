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
    echo '<p style="margin: 0 0 10px;">NM Font Awersome gives you 2 ways of usage:</p>';
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
    echo '<h4 style="margin: 10px 0 0;">2) HTML</h4>';
    echo '<p style="margin: 5px 0 0;">To access the HTML editor, click on the "HTML" link on the tab at the top right of the text editor window in WordPress.<br /> If you don\'t know how to use Font Awesome in HTML, you can read <a href="https://fontawesome.com/how-to-use/svg-with-js#basic-use" target="_blank">Font Awesome Basic Use</a>.</p>';
    echo '<h3 style="margin: 40px 0 10px;">COMING SOON</h3>';
    echo '<p style="margin: 0 0 10px;">In the near future there will be a PRO version, where you can use all Awesome Icons.</p>';
    echo '<p style="margin: 0 0 10px;">If you want to see PRO version faster or just support me <a href="https://www.paypal.me/MykhailoNykoliuk" target="_blank">Donate Link</a>.</p>';
 	echo '</div>';
 }

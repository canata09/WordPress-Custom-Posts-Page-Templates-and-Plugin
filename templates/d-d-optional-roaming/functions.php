<?php 


/**
 * Enqueues custom template styles.
 *
 * @since Custom Template
 *
 * @return void
 */
function custom_styles() {
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/css/custom-styles.css');
}
add_action('wp_enqueue_scripts', 'custom_styles');

function custom_scripts() {
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'custom_scripts');

?>
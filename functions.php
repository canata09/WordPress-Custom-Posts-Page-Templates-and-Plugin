<?php 

// Show "Daha Fazla Göster" button
$total_posts = wp_count_posts('post')->publish;

function load_more_posts() {
	$current_page = $_POST['current_page'];
	$posts_per_page = $_POST['posts_per_page'];

	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => $posts_per_page,
		'paged' => $current_page
	);

	$the_query = new WP_Query($args);

	if ($the_query->have_posts()) {
		while ($the_query->have_posts()) {
			$the_query->the_post();
			the_title('<h2>', '</h2>');
		}
	}

	wp_die();
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');




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
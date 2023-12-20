<?php
add_action('admin_menu', 'custom_category_posts_page');

function custom_category_posts_page() {
    add_menu_page(
        'Custom Category Posts',
        'Category Posts',
        'manage_options',
        'category_posts',
        'custom_category_posts_callback'
    );
}

function custom_category_posts_callback() {
    $args = array(
        'category_name' => 'your_category_slug', // Replace with your category slug
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Display post information as needed
            the_title('<h2>', '</h2>');
            the_content();
        }
    } else {
        // No posts found
        echo 'No posts found';
    }

    wp_reset_postdata();
}

?>
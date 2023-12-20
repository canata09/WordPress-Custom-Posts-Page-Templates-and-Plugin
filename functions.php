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
    // Add a "Create New Post" button at the top of the page
    // Get all categories
    $categories = get_categories();

    echo '<form method="GET" action="' . admin_url('post-new.php') . '">';
    echo '<select name="post_category">';
    foreach ($categories as $category) {
        echo '<option value="' . $category->term_id . '">' . $category->name . '</option>';
    }
    echo '</select>';
    echo '<input type="submit" value="Create New Post" class="page-title-action">';
    echo '</form>';

    $args = array(
        'category_name' => 'urunler', // Replace with your category slug
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

// Add a function to handle the post_category parameter
function set_post_category($post_id) {
    if (isset($_GET['post_category']) && is_numeric($_GET['post_category'])) {
        wp_set_post_categories($post_id, array($_GET['post_category']));
    }
}
add_action('save_post', 'set_post_category');
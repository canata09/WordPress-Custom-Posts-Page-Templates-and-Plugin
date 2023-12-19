<?php



function create_gallery_post_type() {

    $labels = array(
        'name'               => 'Galleries',
        'singular_name'      => 'Gallery',
        'menu_name'          => 'Galleries',
        'name_admin_bar'     => 'Gallery',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Gallery',
        'new_item'           => 'New Gallery',
        'edit_item'          => 'Edit Gallery',
        'view_item'          => 'View Gallery',
        'all_items'          => 'All Galleries',
        'search_items'       => 'Search Galleries',
        'parent_item_colon'  => 'Parent Galleries:',
        'not_found'          => 'No galleries found.',
        'not_found_in_trash' => 'No galleries found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'gallery' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' )
    );

    register_post_type( 'gallery', $args );
}
add_action( 'init', 'create_gallery_post_type' );


function create_gallery_taxonomies() {
    $labels = array(
        'name'              => 'Gallery Categories',
        'singular_name'     => 'Gallery Category',
        'search_items'      => 'Search Gallery Categories',
        'all_items'         => 'All Gallery Categories',
        'parent_item'       => 'Parent Gallery Category',
        'parent_item_colon' => 'Parent Gallery Category:',
        'edit_item'         => 'Edit Gallery Category',
        'update_item'       => 'Update Gallery Category',
        'add_new_item'      => 'Add New Gallery Category',
        'new_item_name'     => 'New Gallery Category Name',
        'menu_name'         => 'Gallery Categories',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );

    register_taxonomy( 'gallery_category', 'gallery', $args );
}
add_action( 'init', 'create_gallery_taxonomies', 0 );


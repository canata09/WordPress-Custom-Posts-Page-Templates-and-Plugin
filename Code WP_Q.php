<?php 

// Our custom post type function
function create_posttype() {
  
    register_post_type( 'movies',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-format-gallery', // İsteğe bağlı: İkon seçimi için
            'supports' => array('title', 'editor', 'thumbnail'), // Resim ekleme özelliğini destekler
            'rewrite' => array('slug' => 'movies'),
            'show_in_rest' => true,
  
        )
    );
}

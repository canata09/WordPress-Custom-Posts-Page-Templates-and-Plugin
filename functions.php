<?php
function custom_menu_page(){
    add_menu_page( 
        'Custom Menu Title', 
        'Custom Menu', 
        'manage_options', 
        'custompage', 
        'custom_menu_page_render', 
        'dashicons-admin-site', 
        6 
    ); 
}

function custom_menu_page_render(){
    echo 'This is the page content';
}

add_action( 'admin_menu', 'custom_menu_page' );
?>
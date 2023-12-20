<?php 
/*
Theme Name: My GPL Theme
Theme URI: https://example.com/my-gpl-theme
Description: A simple example of a GPL-licensed WordPress theme.
Author: Your Name
Author URI: https://example.com/your-website
Version: 1.0
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: my-gpl-theme
*/



// Display the content
function my_gpl_theme_content() {
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            the_title('<h2>', '</h2>');
            the_content();
        }
    }
}

// Display the header
function my_gpl_theme_header() {
    echo '<header><h1>' . get_bloginfo('name') . '</h1></header>';
}

// Display the footer
function my_gpl_theme_footer() {
    echo '<footer>&copy; ' . date('Y') . ' ' . get_bloginfo('name') . '</footer>';
}




 ?>
<?php
/* Add child CSS style */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri().'/style.css' );
}
// get_template_directory_uri()   -> parent dir     aka parent CSS
// get_stylesheet_directory_uri() -> current dir    aka child CSS
?>
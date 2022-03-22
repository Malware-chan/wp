<?php
/* ref = http://wiki.multiplicalia.com/doku.php?id=desarrollo:conocimiento:wordpress:incluir-css-y-js */
/* Añadir fichero CSS */
wp_enqueue_style( 'customcss', get_stylesheet_directory_uri() . '/custom.css',false, '1.1', 'all');
/* Añadir fichero JS */
wp_enqueue_script( 'customjs',  get_stylesheet_directory_uri() . '/custom.js', array ( 'jquery' ), 1.1, false);




add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri().'/style.css' );
}
?>
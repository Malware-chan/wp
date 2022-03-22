<?php
/* Área de widgets header.php */ // -> Ver header.php 40...47
register_sidebar( array(
    'name' => __( 'In Header Widget Area', 'rmccollin' ),
    'id' => 'in-header-widget-area',
    'description' => __( 'A widget area located to the right hand side of the header, next to the site title and description.', 'rmccollin' ),
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
   ) );





/* Add child CSS style */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri().'/style.css' );
}




   
/* Área de widgets footer.php */ // -> Ver footer.php 27-33, marcador en 25
// -> https://www.collectiveray.com/wordpress-widget-area-footer
// -> http://wiki.multiplicalia.com/doku.php?id=desarrollo:conocimiento:wordpress:crear-e-insertar-widget
function dcms_agregar_nueva_zona_widgets() {

	register_sidebar( array(
		'name'          => 'Nueva Zona Widget',
		'id'            => 'id-nueva-zona',
		'description'   => 'Descripción de la nueva Zona de Widgets',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'dcms_agregar_nueva_zona_widgets' );



/* Create new widget -> available on Dashboard.Appearance.Widgets */
// CSS Style for 'Countdown'
wp_enqueue_style( 'widget', get_stylesheet_directory_uri() . '/widget.countdown.css', false, '1.1', 'all');
/* Widget : 'Countdown' */// ref = https://www.delftstack.com/howto/php/php-countdown-timer/
function countdown_register_widget() {
    register_widget( 'Countdown' );
}
    
add_action( 'widgets_init', 'countdown_register_widget' );

class Countdown extends WP_Widget {
    function __construct() {
        parent::__construct(
        // widget ID
        'countdown',
        // widget name
        __($this->name, $this->domain),
        // widget description
        array( 'description' => __( $this->name, $this->domain ), ));
    }

    public function widget( $args, $instance ) {
        $target = 1655818200;
        $time_left = $target - time();
        $days = floor($time_left / (60  *60 * 24));
        $time_left %= (60 * 60 * 24);
        $hours = floor($time_left / (60 * 60));
        $time_left %= (60 * 60);
        $min = floor($time_left / 60);
        $time_left %= 60;
        $sec = $time_left;

        $time_left = "<p class='widget_countdown'>Remaing time: $days days - $hours h - $min m - $sec s left</p>";
        echo __( $time_left, $this->domain );
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = __( 'Default Title', $this->domain );
    }

    public $name = 'Countdown';
    public $domain = 'countdown_widget_domain';
}
?>
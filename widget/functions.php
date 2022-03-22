<?php
/* Create new widget -> available on Dashboard.Appearance.Widgets */
// CSS Style for the second widget
wp_enqueue_style( 'widget', get_stylesheet_directory_uri() . '/widget.countdown.css', false, '1.1', 'all');

/* Widget : 'Hola, mundo' */
function test_register_widget() {
    register_widget( 'Test_Widget' );
}
    
add_action( 'widgets_init', 'test_register_widget' );

class Test_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
        // widget ID
        'test_widget',
        // widget name
        __($this->name, $this->domain),
        // widget description
        array( 'description' => __( `Muestra el mensaje: "Hola, mundo"`, 'test_widget_domain' ), ));
    }

    public function widget( $args, $instance ) {
        echo __( '<h5>'.$this->name.'</h5>', $this->domain );
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = __( 'Default Title', $domain );
    }

    public $name = "Hola, mundo";
    public $domain = 'test_widget_domain';
}

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
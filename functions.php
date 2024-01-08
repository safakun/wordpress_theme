<?php 

if ( ! function_exists('carvilla_digital_setup')) {
    function carvilla_digital_setup() {
        add_theme_support('custom-logo', [
            'height'      => 70,
            'width'       => 143,
            'flex-width'  => false,
            'flex-height' => false,
            'header-text' => '',
            'unlink-homepage-logo' => false,
        ]);
    }
    add_action('after_setup_theme', 'carvilla_digital_setup');
}

/*
Подключение стилей и скриптов
*/ 

// правильный способ подключить стили и скрипты
add_action( 'wp_enqueue_scripts', 'carvilla_digital_scripts' );
// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
function carvilla_digital_scripts() {
	wp_enqueue_style( 'main', get_stylesheet_uri() );
// font awesome
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array('main'));
    // linear icons
    wp_enqueue_style('linearicons', get_template_directory_uri() . '/assets/css/linearicons.css', array('fontawesome'));
    // flaticon
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/css/flaticon.css', array('linearicons'));
    // animate 
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array('flaticon'));
    // owl carousel assets/css/owl.carousel.min.css"
    wp_enqueue_style('owlcarousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array('animate'));
    // owl theme assets/css/owl.theme.default.min.css
    wp_enqueue_style('owltheme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array('owlcarousel'));
    // bootstrap assets/css/bootstrap.min.css
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array('owltheme'));
    // bootsnav assets/css/bootsnav.css 
    wp_enqueue_style('bootsnav', get_template_directory_uri() . '/assets/css/bootsnav.css', array('bootstrap'));
// style.css
    wp_enqueue_style('carvilladigital', get_template_directory_uri() . '/assets/css/style.css', array('bootsnav'));
   // responsive assets/css/responsive.css
   wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', array('carvilladigital'));
	// wp_enqueue_script( 'carvilla-digital', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );

    // переподключаем Jquery 
    wp_deregister_script('jquery');
   // wp_register_script('jquery', '');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.js', '2.2.4', true);
    // bootstrap js
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), 'v.1.2', true);
    // bootsnav assets/js/bootsnav.js
    wp_enqueue_script('bootsnav', get_template_directory_uri() . '/assets/js/bootsnav.js', array('bootstrap'), 'v.1.2', true);
    // owlcarousel  assets/js/owl.carousel.min.js
    wp_enqueue_script('owlcarousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('bootsnav'), '2.2.0', true);
    // easing https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js
    wp_enqueue_script('easing', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js', array('owlcarousel'), '1.4.1', true);
    // custom assets/js/custom.js
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array('easing'), '1.0', true);


}
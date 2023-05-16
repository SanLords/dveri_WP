<?php 
add_action( 'wp_enqueue_scripts' , 'add_scripts_and_styles' );
add_action( 'after_setup_theme' , 'add_featuers' );
add_action( 'after_setup_theme' , 'add_menu' );
function add_scripts_and_styles() {
if(is_page_template( 'templates/portfolio.php' ) || is_single()){
    wp_enqueue_style( 'baguetteBox' , get_template_directory_uri() . '/assets/css/baguetteBox.min.css' );
    wp_enqueue_script( 'baguetteBox' , get_template_directory_uri() . '/assets/js/baguetteBox.min.js', null, null, true );
} 
if(is_page_template('templates/contacts.php')){
    wp_enqueue_script( 'list' , get_template_directory_uri() . '/assets/js/list.min.js', null, null, true );
}

if(is_category('doors')) {
    wp_enqueue_script( 'mixiput' , get_template_directory_uri() . '/assets/js/mixiput.min.js', null, null, true );
}

wp_enqueue_style( 'style' , get_stylesheet_uri() ); }

function add_featuers() {
    add_theme_support( 'post-thumbnails' , array('post') );
    add_theme_support( 'custom-logo', array(
        'height'               => 50,
        'width'                => 100,
        'flex-height'          => false,
        'flex-width'           => false,
        'header-text'          => '',
        'unlink-homepage-logo' => false,
    ) );
    add_image_size( 'adv_thumbnails' , 100, 100, true  );
}
function add_menu() {
    register_nav_menu( 'top' , 'Главное меню сайта' );
    register_nav_menu( 'bottom' , 'Политика конфиденциальности' );
}
add_filter( 'navigation_markup_template' , 'my_navigation_template' , 10 , 2 );
function my_navigation_template ( $template, $class ){
    return '
    <nav class="navigation %1$s" role="navigation">
        <div class="nav-links">%3$s</div>
    </nav>    
';
}
?>

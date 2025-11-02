<?php
/**
 * Eigen Thema Functions
 * 
 * Dit bestand bevat alle custom WordPress functies voor het eigen-thema.
 * Het bevat menu registratie, stylesheet enqueue en sidebar setup.
 */

/**
 * Thema Setup Functie
 * 
 * Registreert navigatiemenu's voor het thema.
 * Het 'hoofdmenu' wordt gebruikt in header.php voor de main navigation.
 * 
 * @return void
 */
function mijn_thema_setup() {
    // Registreer het hoofdmenu
    register_nav_menus(array(
        'hoofdmenu' => __('Hoofdmenu')
    ));
}
// Hook deze functie aan het 'after_setup_theme' action
add_action('after_setup_theme', 'mijn_thema_setup');

/**
 * Enqueue Stylesheets
 * 
 * Laadt het main stylesheet (style.css) in het frontend.
 * Dit bevat alle styling voor het thema inclusief records layout.
 * 
 * @return void
 */
function mijn_thema_enqueue_styles() {
    // Voeg het thema stylesheet in met get_stylesheet_uri()
    wp_enqueue_style('mijn-thema-style', get_stylesheet_uri());
}
// Hook deze functie aan het 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'mijn_thema_enqueue_styles');

/**
 * Register Sidebars (Widget Areas)
 * 
 * Registreert een primaire sidebar voor widgets.
 * Deze sidebar wordt gebruikt in sidebar-primary.php
 * 
 * @return void
 */
add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
    // Registreer de primary sidebar
    register_sidebar(
        array(
            'id'            => 'primary',                              // Unieke ID voor deze sidebar
            'name'          => __( 'Primary Sidebar' ),               // Naam in WordPress admin
            'description'   => __( 'A short description of the sidebar.' ), // Beschrijving
            'before_widget' => '<div id="%1$s" class="widget %2$s">', // HTML voor widget wrapper
            'after_widget'  => '</div>',                              // Closing widget wrapper
            'before_title'  => '<h3 class="widget-title">',           // Widget titel wrapper
            'after_title'   => '</h3>',                               // Closing titel wrapper
        )
    );
}
?>


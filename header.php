<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    
    <!-- WordPress head hook: voegt stylesheets, scripts en andere metadata toe -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- Navigatie menu -->
    <nav>
        <?php 
            // Geef het eerder geregistreerde 'hoofdmenu' weer
            wp_nav_menu(array('theme_location' => 'hoofdmenu')); 
        ?>
    </nav>

    <!-- Header sectie met logo en site informatie -->
    <header>
        <div class="header-image-wrap">
            <!-- Site logo/header afbeelding -->
            <img class="site-header-image" 
                 src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/wr-100m.jpg" 
                 alt="Header image">
        </div>
        <!-- Site titel -->
        <h1><?php bloginfo('name'); ?></h1>
        <!-- Site beschrijving/tagline -->
        <p><?php bloginfo('description'); ?></p>
    </header>
    
    <!-- Custom action hook: kan door plugins gebruikt worden voor content na de header -->
    <?php do_action('after_theme_header'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <nav>
    <?php wp_nav_menu(array('theme_location' => 'hoofdmenu')); ?>
    </nav>


<header>
    <div class="header-image-wrap">
        <img class="site-header-image" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/wr-100m.jpg" alt="Header image">
    </div>
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>
</header>
<?php do_action('after_theme_header'); ?>
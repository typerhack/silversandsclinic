<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <div class="container">
        <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
        <p><?php bloginfo('description'); ?></p>
    </div>

    <nav>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'div',
            'container_class' => 'main-navigation',
            'fallback_cb' => 'silversandsclinic_default_menu', // Fallback function
        ));
        ?>
    </nav>
</header>

<div id="content" class="site-content">

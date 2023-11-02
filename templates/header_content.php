<header>
    <nav>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'div',
            'container_class' => 'main-navigation',
            'fallback_cb' => array('SilversandsClinicTheme', 'default_menu'), // Updated fallback function
        ));
        ?>
    </nav>
</header>

<?php
// Include the core theme class.
require_once get_template_directory() . '/inc/classes/class-silversandsclinic.php';

// Initialize the theme.
new SilversandsClinic();

function silversandsclinic_customize_preview_js() {
    wp_enqueue_script( 'silversandsclinic-customizer-preview', get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview' ), '1.0.0', true );
}

add_action( 'customize_preview_init', 'silversandsclinic_customize_preview_js' );
function silversandsclinic_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Main Sidebar', 'silversandsclinic' ),
        'id'            => 'main-sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'silversandsclinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'silversandsclinic_widgets_init' );

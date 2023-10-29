<?php
// Include the core theme class.
require_once get_template_directory() . '/inc/classes/class-silversandsclinic.php';

// Initialize the theme.
new SilversandsClinic();

function silversandsclinic_customize_preview_js() {
    wp_enqueue_script( 'silversandsclinic-customizer-preview', get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'silversandsclinic_customize_preview_js' );

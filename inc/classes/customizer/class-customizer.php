<?php
class SilversandsClinic_Customizer {

    public function __construct() {
        add_action('customize_register', [$this, 'customize_options']);
    }

    public function customize_options($wp_customize) {
        // Add a section for theme colors.
        $wp_customize->add_section('silversandsclinic_colors', [
            'title' => __('Theme Colors', 'silversandsclinic'),
            'priority' => 30,
        ]);

        // Add a setting for the background color.
        $wp_customize->add_setting('background_color', [
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage',
        ]);

        // Add a color control for the background color setting.
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', [
            'label' => __('Background Color', 'silversandsclinic'),
            'section' => 'silversandsclinic_colors',
            'settings' => 'background_color',
        ]));
    }

}

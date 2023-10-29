<?php
require_once get_template_directory() . '/inc/classes/template/class-header.php';
require_once get_template_directory() . '/inc/classes/template/class-footer.php';
require_once get_template_directory() . '/inc/classes/class-cpt.php';
require_once get_template_directory() . '/inc/classes/customizer/class-customizer.php';
class SilversandsClinic {

    public function __construct() {
        // Actions and filters will be added here.
        add_action('after_setup_theme', [$this, 'setup_theme']);
        $this->cpt = new SilversandsClinic_CPT();
        $this->customizer = new SilversandsClinic_Customizer();

    }

    public function setup_theme(): void
    {
        // Theme setup functions will be added here.
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        register_nav_menus([
            'primary' => __('Primary Menu', 'silversandsclinic'),
        ]);

        // Initialize template classes.
        $this->header = new SilversandsClinic_Header();
        $this->footer = new SilversandsClinic_Footer();
    }
}

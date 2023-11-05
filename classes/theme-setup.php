<?php
// File: theme-setup.php

class SilversandsClinicTheme {

    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
        add_action('after_setup_theme', array($this, 'create_pages'));
        add_filter('template_include', array($this, 'include_page_templates'));
        add_action('after_setup_theme', array($this, 'setup_theme'));
        // Adding jquery to the theme
        add_action('wp_enqueue_scripts', array($this, 'enqueue_custom_script'));
    }

    public function enqueue_styles() {
        wp_enqueue_style('silversandsclinic-reset', get_template_directory_uri() . '/assets/css/reset.css');
        wp_enqueue_style('silversandsclinic-fonts', get_template_directory_uri() . '/assets/css/fonts.css');
        wp_enqueue_style('silversandsclinic-style', get_stylesheet_uri());
        wp_enqueue_style('silversandsclinic-fonts', get_template_directory_uri() . '/assets/css/responsive.css');
    }

    // This adds the jquery v3.7.1
    public function enqueue_custom_script() {
        // Enqueue custom jQuery
        wp_enqueue_script('custom-jquery', get_template_directory_uri() . '/assets/js/jquery-3.7.1.min.js', array(), null, true);
        // Adding theme js script
        wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js//script.js', array(), null, true);
    }
    public function create_pages() {
        $pages = array(
            'خانه' => array('content' => 'Description or content for home page.', 'slug' => 'home'),
            'خدمات ما' => array('content' => 'Description or content for Doctors page.', 'slug' => 'services'),
            'پزشکان' => array('content' => 'Description or content for Doctors page.', 'slug' => 'doctors'),
            'تعرفه خدمات' => array('content' => 'Description or content for Tariff page.', 'slug' => 'tariff'),
            'مقالات' => array('content' => 'Description or content for articles page.', 'slug' => 'articles'),
            'درباره ما' => array('content' => 'Description or content for about us page.', 'slug' => 'about-us'),
            'تماس با ما' => array('content' => 'Description or content for contact us page.', 'slug' => 'contact-us'),
        );

        foreach ($pages as $title => $page) {
            $query = new WP_Query(array('post_type' => 'page', 'post_status' => 'publish', 'title' => $title, 'posts_per_page' => 1));
            if (!$query->have_posts()) {
                wp_insert_post(array('post_title' => $title, 'post_content' => $page['content'], 'post_status' => 'publish', 'post_type' => 'page', 'post_name' => $page['slug']));
            }
            wp_reset_postdata();
        }
    }

    public function include_page_templates($template) {
        $custom_templates = array(
            'home' => '/templates/home.php',
            'services' => '/templates/page-services.php',
            'doctors' => '/templates/page-doctors.php',
            'tariff' => '/templates/page-tariff.php',
            'articles' => '/templates/page-articles.php',
            'about-us' => '/templates/page-about-us.php',
            'contact-us' => '/templates/page-contact-us.php',
            'sample-page' => '/templates/page-sample-page.php'
        );

        $post = get_post();
        if ($post) {
            $page_slug = $post->post_name;
            $query = new WP_Query(array('post_type' => 'page', 'post_status' => 'publish', 'name' => $page_slug, 'posts_per_page' => 1));
            if ($query->have_posts() && array_key_exists($page_slug, $custom_templates)) {
                $new_template = locate_template($custom_templates[$page_slug]);
                if ('' != $new_template) {
                    return $new_template;
                }
            }
            wp_reset_postdata();
        }
        return $template;
    }

    public function setup_theme() {
        register_nav_menus(array('primary' => __('Primary Menu', 'silversandsclinic')));
    }

    public static function default_menu() {
        echo '<ul>';
        echo '<li><a href="' . home_url() . '">کلینیک شن&zwnj;های نقره&zwnj;ای</a></li>';
        echo '<li><a href="' . home_url('/services') . '">خدمات ما</a></li>';
        echo '<li><a href="' . home_url('/doctors') . '">پزشکان</a></li>';
        echo '<li><a href="' . home_url('/tariff') . '">تعرفه خدمات</a></li>';
        echo '<li><a href="' . home_url('/articles') . '">مقالات</a></li>';
        echo '<li><a href="' . home_url('/about-us') . '">درباره ما</a></li>';
        echo '<li><a href="' . home_url('/contact-us') . '">تماس با ما</a></li>';
        echo '</ul>';
    }
}

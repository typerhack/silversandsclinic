<?php
// functions.php
function silversandsclinic_enqueue_styles() {
    // Enqueue the reset stylesheet
    wp_enqueue_style('silversandsclinic-reset', get_template_directory_uri() . '/assets/css/reset.css');
    // Enqueue the fonts
    wp_enqueue_style('silversandsclinic-fonts', get_template_directory_uri() . '/assets/css/fonts.css');
    // Enqueue the main stylesheet
    wp_enqueue_style('silversandsclinic-style', get_stylesheet_uri());

    // Enqueue additional stylesheets
}

add_action('wp_enqueue_scripts', 'silversandsclinic_enqueue_styles');

// Adding all pages
// functions.php
function silversandsclinic_create_pages() {
    $pages = array(
        'خانه' => array(
            'content' => 'Description or content for home page.',
            'slug' => 'home' // Custom URL
        ),
        'خدمات ما' => array(
            'content' => 'Description or content for Doctors page.',
            'slug' => 'services' // Custom URL
        ),
        'پزشکان' => array(
            'content' => 'Description or content for Doctors page.',
            'slug' => 'doctors' // Custom URL
        ),
        'تعرفه خدمات' => array(
            'content' => 'Description or content for Tariff page.',
            'slug' => 'tariff' // Custom URL
        ),
        'مقالات' => array(
            'content' => 'Description or content for articles page.',
            'slug' => 'articles' // Custom URL
        ),
        'درباره ما' => array(
            'content' => 'Description or content for about us page.',
            'slug' => 'about-us' // Custom URL
        ),
        'تماس با ما' => array(
            'content' => 'Description or content for contact us page.',
            'slug' => 'contact-us' // Custom URL
        ),
    );

    foreach ($pages as $title => $page) {
        // Check if the page exists
        $query = new WP_Query(array(
            'post_type' => 'page',
            'post_status' => 'publish',
            'title' => $title,
            'posts_per_page' => 1,
        ));

        // If the page doesn't exist, create it
        if (!$query->have_posts()) {
            wp_insert_post(array(
                'post_title'    => $title,
                'post_content'  => $page['content'],
                'post_status'   => 'publish',
                'post_type'     => 'page',
                'post_name'     => $page['slug'] // Set the custom URL
            ));
        }

        // Reset post data
        wp_reset_postdata();
    }
}
add_action('after_setup_theme', 'silversandsclinic_create_pages');



// Adding navigation menu support
// functions.php
function silversandsclinic_default_menu() {
    echo '<ul>';
    echo '<li><a href="' . home_url() . '">Home</a></li>';
    echo '<li><a href="' . get_permalink(get_option('page_for_posts')) . '">Blog</a></li>';
    echo '<li><a href="' . admin_url('nav-menus.php') . '">Set Up Your Menu</a></li>';
    echo '</ul>';
}

function silversandsclinic_setup() {
    // Register navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'silversandsclinic'),
        // You can register additional menus here
    ));
}
add_action('after_setup_theme', 'silversandsclinic_setup');

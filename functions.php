<?php
// This part of the code adds the stylesheet in order to load
function silversandsclinic_enqueue_styles() {
    // Enqueue the reset stylesheet which resets the browser's defualt
    wp_enqueue_style('silversandsclinic-reset', get_template_directory_uri() . '/assets/css/reset.css');
    // Enqueue the fonts adding new fonts from the font directory
    wp_enqueue_style('silversandsclinic-fonts', get_template_directory_uri() . '/assets/css/fonts.css');
    // Enqueue the main stylesheet
    wp_enqueue_style('silversandsclinic-style', get_stylesheet_uri());

    // Enqueue additional stylesheets
}

add_action('wp_enqueue_scripts', 'silversandsclinic_enqueue_styles');

// Adding all pages using this part of the file we add static pages which should be included inside the theme.
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

// Making WordPress load custom templates from custom folder. Make note that the code will not load header and footer via this sub-folder.
function silversandsclinic_include_page_templates($template) {
    $custom_templates = array(
        'home' => 'templates/home.php',
        'services' => 'templates/page-services.php',
        'doctors' => 'templates/page-doctors.php',
        'tariff' => 'templates/page-tariff.php',
        'articles' => 'templates/page-articles.php',
        'about-us' => 'templates/page-about-us.php',
        'contact-us' => 'templates/page-contact-us.php',
    );

    $post = get_post();
    if ($post) {
        $page_slug = $post->post_name;

        // Use WP_Query to check if the page exists
        $query = new WP_Query(array(
            'post_type' => 'page',
            'post_status' => 'publish',
            'name' => $page_slug,
            'posts_per_page' => 1,
        ));

        if ($query->have_posts() && array_key_exists($page_slug, $custom_templates)) {
            $new_template = locate_template($custom_templates[$page_slug]);
            if ('' != $new_template) {
                return $new_template;
            }
        }

        // Reset post data
        wp_reset_postdata();
    }

    return $template;
}
add_filter('template_include', 'silversandsclinic_include_page_templates');



// Adding navigation menu support. This is the fall back that if user does not declare the navigation it will be loaded.
function silversandsclinic_default_menu() {
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

function silversandsclinic_setup() {
    // Register navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'silversandsclinic'),
        // You can register additional menus here
    ));
}
add_action('after_setup_theme', 'silversandsclinic_setup');

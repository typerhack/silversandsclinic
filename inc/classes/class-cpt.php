<?php
class SilversandsClinic_CPT {

    public function __construct() {
        add_action('init', [$this, 'register_custom_post_types']);
        add_action('add_meta_boxes', [$this, 'add_doctor_meta_boxes']);
        add_action('save_post', [$this, 'save_doctor_details']);
    }

    public function register_custom_post_types() {
        $labels = array(
            'name'               => _x('Doctors', 'post type general name', 'silversandsclinic'),
            'singular_name'      => _x('Doctor', 'post type singular name', 'silversandsclinic'),
            'menu_name'          => _x('Doctors', 'admin menu', 'silversandsclinic'),
            'name_admin_bar'     => _x('Doctor', 'add new on admin bar', 'silversandsclinic'),
            'add_new'            => _x('Add New', 'Doctor', 'silversandsclinic'),
            'add_new_item'       => __('Add New Doctor', 'silversandsclinic'),
            'new_item'           => __('New Doctor', 'silversandsclinic'),
            'edit_item'          => __('Edit Doctor', 'silversandsclinic'),
            'view_item'          => __('View Doctor', 'silversandsclinic'),
            'all_items'          => __('All Doctors', 'silversandsclinic'),
            'search_items'       => __('Search Doctors', 'silversandsclinic'),
            'parent_item_colon'  => __('Parent Doctor:', 'silversandsclinic'),
            'not_found'          => __('No Doctor found.', 'silversandsclinic'),
            'not_found_in_trash' => __('No Doctor found in Trash.', 'silversandsclinic')
        );

        $args = array(
            'labels'             => $labels,
            'menu_icon'          => 'dashicons-groups',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'doctor'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
        );

        register_post_type('doctor', $args);
    }

    public function add_doctor_meta_boxes() {
        add_meta_box(
            'doctor_details_meta_box',
            'Doctor Details',
            [$this, 'display_doctor_details_meta_box'],
            'doctor',
            'normal',
            'high'
        );
    }

    public function display_doctor_details_meta_box($post) {
        $specialization = get_post_meta($post->ID, '_doctor_specialization', true);
        $experience = get_post_meta($post->ID, '_doctor_experience', true);
        $contact = get_post_meta($post->ID, '_doctor_contact', true);

        echo '<label for="doctor_specialization">Specialization:</label>';
        wp_editor($specialization, 'doctor_specialization', array(
            'textarea_name' => 'doctor_specialization',
            'media_buttons' => true,
            'textarea_rows' => 10,
            'editor_class'  => 'custom-editor',
            'tinymce'       => true,
            'quicktags'     => true
        ));

        echo '<label for="doctor_experience">Years of Experience:</label>';
        echo '<input type="number" id="doctor_experience" name="doctor_experience" value="' . esc_attr($experience) . '"><br>';

        echo '<label for="doctor_contact">Contact Number:</label>';
        echo '<input type="text" id="doctor_contact" name="doctor_contact" value="' . esc_attr($contact) . '"><br>';
    }

    public function save_doctor_details($post_id) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        if ($parent_id = wp_is_post_revision($post_id)) {
            $post_id = $parent_id;
        }

        if (isset($_POST['doctor_specialization'])) {
            update_post_meta($post_id, '_doctor_specialization', wp_kses_post($_POST['doctor_specialization']));
        }

        if (isset($_POST['doctor_experience'])) {
            update_post_meta($post_id, '_doctor_experience', sanitize_text_field($_POST['doctor_experience']));
        }

        if (isset($_POST['doctor_contact'])) {
            update_post_meta($post_id, '_doctor_contact', sanitize_text_field($_POST['doctor_contact']));
        }
    }

}

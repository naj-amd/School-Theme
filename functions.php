<?php
function dream_code_enqueues()
{
    // Load style.css on the front-end
    wp_enqueue_style(
        'dream_code_style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version'),
        'all'
    );

    // Load normalize.css
    wp_enqueue_style(
        'dream_code_normalize',
        'https://unpkg.com/@csstools/normalize.css',
        array(),
        '12.1.0'
    );
}
add_action('wp_enqueue_scripts', 'dream_code_enqueues');

function enqueue_lightgallery_scripts()
{
    if (is_page(52)) {
        // Enqueue lightGallery CSS
        wp_enqueue_style(
            'lightgallery-css',
            get_theme_file_uri('assets/css/lightgallery-bundle.min.css'),
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );

        // Enqueue lightGallery JS
        wp_enqueue_script(
            'lightgallery-js',
            get_theme_file_uri('assets/js/lightgallery.min.js'),
            array(),
            wp_get_theme()->get('Version'),
            array('strategy' => 'defer')
        );

        // Enqueue lightGallery thumbnail plugin
        wp_enqueue_script(
            'lg-thumbnail-js',
            get_theme_file_uri('assets/js/lg-thumbnail.min.js'),
            array('lightgallery-js'),
            wp_get_theme()->get('Version'),
            array('strategy' => 'defer')
        );

        // Enqueue lightGallery settings file
        wp_enqueue_script(
            'lightgallery-settings',
            get_theme_file_uri('assets/js/lightgallery-settings.js'),
            array('lightgallery-js'),
            wp_get_theme()->get('Version'),
            array('strategy' => 'defer')
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_lightgallery_scripts');

function dream_code_setup()
{
    // Loads style.css on the back-end editor
    add_editor_style(get_stylesheet_uri());

    // New image sizes
    // Crop images to 400px by 600px
    add_image_size('400x600', 400, 600, true);

    // Crop images to 800px by 1200px
    add_image_size('800x1200', 800, 1200, true);
}
add_action('after_setup_theme', 'dream_code_setup');

// Add new images to WordPress admin
function dream_code_custom_image_sizes($size_names)
{
    $new_sizes = array(
        '400x600'  => __('400x600', 'school-site'),
        '800x1200' => __('800x1200', 'school-site'),
    );
    return array_merge($size_names, $new_sizes);
}
add_filter('image_size_names_choose', 'dream_code_custom_image_sizes');

//Changing the placeholder of title in student post type.
function school_demo_change_title_placeholder($title, $post){
    if($post->post_type =="fwd-student"){
        return "Add student name";
    }
    return $title;
}
add_filter('enter_title_here', 'school_demo_change_title_placeholder', 10, 2);

/**
* Custom Post Types & Custom Taxonomies
*/
require get_template_directory() . '/inc/post-type-taxonomies.php';

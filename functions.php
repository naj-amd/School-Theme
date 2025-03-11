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

function dream_code_setup()
{
    // Loads style.css on the back-end editor
    add_editor_style(get_stylesheet_uri());
}
<?php
function school_demo_register_custom_post_types() {
    $labels = array(
        'name'                     => _x( 'Students', 'post type general name', 'School-Theme' ),
        'singular_name'            => _x( 'Student', 'post type singular name', 'School-Theme' ),
        'add_new'                  => _x( 'Add New', 'student', 'School-Theme' ),
        'add_new_item'             => __( 'Add New Student', 'School-Theme' ),
        'edit_item'                => __( 'Edit Student', 'School-Theme' ),
        'new_item'                 => __( 'New Student', 'School-Theme' ),
        'view_item'                => __( 'View Student', 'School-Theme' ),
        'view_items'               => __( 'View Students', 'School-Theme' ),
        'search_items'             => __( 'Search Students', 'School-Theme' ),
        'not_found'                => __( 'No students found.', 'School-Theme' ),
        'not_found_in_trash'       => __( 'No students found in Trash.', 'School-Theme' ),
        'parent_item_colon'        => __( 'Parent Students:', 'School-Theme' ),
        'all_items'                => __( 'All Students', 'School-Theme' ),
        'archives'                 => __( 'Student Archives', 'School-Theme' ),
        'attributes'               => __( 'Student Attributes', 'School-Theme' ),
        'insert_into_item'         => __( 'Insert into student', 'School-Theme' ),
        'uploaded_to_this_item'    => __( 'Uploaded to this student', 'School-Theme' ),
        'featured_image'           => __( 'Student featured image', 'School-Theme' ),
        'set_featured_image'       => __( 'Set student featured image', 'School-Theme' ),
        'remove_featured_image'    => __( 'Remove student featured image', 'School-Theme' ),
        'use_featured_image'       => __( 'Use as featured image', 'School-Theme' ),
        'menu_name'                => _x( 'Students', 'admin menu', 'School-Theme' ),
        'filter_items_list'        => __( 'Filter students list', 'School-Theme' ),
        'items_list_navigation'    => __( 'Students list navigation', 'School-Theme' ),
        'items_list'               => __( 'Students list', 'School-Theme' ),
        'item_published'           => __( 'Student published.', 'School-Theme' ),
        'item_published_privately' => __( 'Student published privately.', 'School-Theme' ),
        'item_reverted_to_draft'  => __( 'Student reverted to draft.', 'School-Theme' ),
        'item_trashed'             => __( 'Student trashed.', 'School-Theme' ),
        'item_scheduled'           => __( 'Student scheduled.', 'School-Theme' ),
        'item_updated'             => __( 'Student updated.', 'School-Theme' ),
        'item_link'                => __( 'Student link.', 'School-Theme' ),
        'item_link_description'    => __( 'A link to a student.', 'School-Theme' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'students' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array( 'title', 'editor', 'thumbnail' ), //thumbnail is for featured images
        'template'           => array(
            array( 'core/paragraph', array(
                'placeholder' => 'Write a short biography here...'
            ) ),
            array('core/button', array(
                'text'=> 'See My Portfolio',
                'url' => '#',
                'align' => 'center'
            ))
            ),
        'template_lock'      => 'all'  //preventing user from moving/ removing theme.
    );
    register_post_type( 'fwd-student', $args );
}
add_action( 'init', 'school_demo_register_custom_post_types' );

//We can have the register_taxonomy inside the same function as the custom post type 
// or in a separate function. For organization purposes, we will create a separate function.
function school_demo_register_taxonomies() {
    // Add Work Category taxonomy
    $labels = array(
        'name'                  => _x( 'Student Categories', 'taxonomy general name', 'School-Theme' ),
        'singular_name'         => _x( 'Student Category', 'taxonomy singular name', 'School-Theme' ),
        'search_items'          => __( 'Search Student Categories', 'School-Theme' ),
        'all_items'             => __( 'All Student Category', 'School-Theme' ),
        'parent_item'           => __( 'Parent Student Category', 'School-Theme' ),
        'parent_item_colon'     => __( 'Parent Student Category:', 'School-Theme' ),
        'edit_item'             => __( 'Edit Student Category', 'School-Theme' ),
        'view_item'             => __( 'View Student Category', 'School-Theme' ),
        'update_item'           => __( 'Update Student Category', 'School-Theme' ),
        'add_new_item'          => __( 'Add New Student Category', 'School-Theme' ),
        'new_item_name'         => __( 'New Student Category Name', 'School-Theme' ),
        'template_name'         => __( 'Student Category Archives', 'School-Theme' ),
        'menu_name'             => __( 'Student Category', 'School-Theme' ),
        'not_found'             => __( 'No student categories found.', 'School-Theme' ),
        'no_terms'              => __( 'No student categories', 'School-Theme' ),
        'items_list_navigation' => __( 'Student Categories list navigation', 'School-Theme' ),
        'items_list'            => __( 'Student Categories list', 'School-Theme' ),
        'item_link'             => __( 'Student Category Link', 'School-Theme' ),
        'item_link_description' => __( 'A link to a student category.', 'School-Theme' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'student-categories' ),
    );
    register_taxonomy( 'fwd-student-category', array( 'fwd-student' ), $args );
}
add_action( 'init', 'school_demo_register_taxonomies' );

// Adding flush_rewrite_rules() function to make sure that the custom post type is registered properly withoutneed to fluch amnualy.
function mindset_rewrite_flush() {
    school_demo_register_custom_post_types();
    school_demo_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'mindset_rewrite_flush' );
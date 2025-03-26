<?php
function school_demo_register_custom_post_types() {
    //registering student custom post type
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

    //registering stuff custom post type
    $labels = array(
        'name'                     => _x( 'Staff', 'post type general name', 'School-Theme' ),
        'singular_name'            => _x( 'Staff', 'post type singular name', 'School-Theme' ),
        'add_new'                  => _x( 'Add New', 'staff', 'School-Theme' ),
        'add_new_item'             => __( 'Add New Staff', 'School-Theme' ),
        'edit_item'                => __( 'Edit Staff', 'School-Theme' ),
        'new_item'                 => __( 'New Staff', 'School-Theme' ),
        'view_item'                => __( 'View Staff', 'School-Theme' ),
        'view_items'               => __( 'View Staff', 'School-Theme' ),
        'search_items'             => __( 'Search Staff', 'School-Theme' ),
        'not_found'                => __( 'No staff found.', 'School-Theme' ),
        'not_found_in_trash'       => __( 'No staff found in Trash.', 'School-Theme' ),
        'parent_item_colon'        => __( 'Parent Staff:', 'School-Theme' ),
        'all_items'                => __( 'All Staff', 'School-Theme' ),
        'archives'                 => __( 'Staff Archives', 'School-Theme' ),
        'attributes'               => __( 'Staff Attributes', 'School-Theme' ),
        'insert_into_item'         => __( 'Insert into staff', 'School-Theme' ),
        'uploaded_to_this_item'    => __( 'Uploaded to this staff', 'School-Theme' ),
        'featured_image'           => __( 'Staff featured image', 'School-Theme' ),
        'set_featured_image'       => __( 'Set staff featured image', 'School-Theme' ),
        'remove_featured_image'    => __( 'Remove staff featured image', 'School-Theme' ),
        'use_featured_image'       => __( 'Use as featured image', 'School-Theme' ),
        'menu_name'                => _x( 'Staff', 'admin menu', 'School-Theme' ),
        'filter_items_list'        => __( 'Filter staff list', 'School-Theme' ),
        'items_list_navigation'    => __( 'Staff list navigation', 'School-Theme' ),
        'items_list'               => __( 'Staff list', 'School-Theme' ),
        'item_published'           => __( 'Staff published.', 'School-Theme' ),
        'item_published_privately' => __( 'Staff published privately.', 'School-Theme' ),
        'item_reverted_to_draft'  => __( 'Staff reverted to draft.', 'School-Theme' ),
        'item_trashed'             => __( 'Staff trashed.', 'School-Theme' ),
        'item_scheduled'           => __( 'Staff scheduled.', 'School-Theme' ),
        'item_updated'             => __( 'Staff updated.', 'School-Theme' ),
        'item_link'                => __( 'Staff link.', 'School-Theme' ),
        'item_link_description'    => __( 'A link to a staff.', 'School-Theme' ),
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
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title', 'editor', 'thumbnail' ), //thumbnail is for featured images
        'template'           => array(
            array( 'core/paragraph', array(
                'placeholder' => 'Job title...'
            ) ),
            array('core/paragraph', array(
                'placeholder' => 'Email...'
            ) ),
            ),
        'template_lock'      => 'all'  //preventing user from moving/ removing theme.
    );
    register_post_type( 'fwd-staff', $args );
}
add_action( 'init', 'school_demo_register_custom_post_types' );

//We can have the register_taxonomy inside the same function as the custom post type 
// or in a separate function. For organization purposes, we will create a separate function.
function school_demo_register_taxonomies() {
    // Add Student Category taxonomy
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

    // Add Staff Category taxonomy
    $labels = array(
        'name'                  => _x( 'Staff Categories', 'taxonomy general name', 'School-Theme' ),
        'singular_name'         => _x( 'Staff Category', 'taxonomy singular name', 'School-Theme' ),
        'search_items'          => __( 'Search Staff Categories', 'School-Theme' ),
        'all_items'             => __( 'All Staff Category', 'School-Theme' ),
        'parent_item'           => __( 'Parent Staff Category', 'School-Theme' ),
        'parent_item_colon'     => __( 'Parent Staff Category:', 'School-Theme' ),
        'edit_item'             => __( 'Edit Staff Category', 'School-Theme' ),
        'view_item'             => __( 'View Staff Category', 'School-Theme' ),
        'update_item'           => __( 'Update Staff Category', 'School-Theme' ),
        'add_new_item'          => __( 'Add New Staff Category', 'School-Theme' ),
        'new_item_name'         => __( 'New Staff Category Name', 'School-Theme' ),
        'template_name'         => __( 'Staff Category Archives', 'School-Theme' ),
        'menu_name'             => __( 'Staff Category', 'School-Theme' ),
        'not_found'             => __( 'No staff categories found.', 'School-Theme' ),
        'no_terms'              => __( 'No staff categories', 'School-Theme' ),
        'items_list_navigation' => __( 'Staff Categories list navigation', 'School-Theme' ),
        'items_list'            => __( 'Staff Categories list', 'School-Theme' ),
        'item_link'             => __( 'Staff Category Link', 'School-Theme' ),
        'item_link_description' => __( 'A link to a staff category.', 'School-Theme' ),
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
        'rewrite'           => array( 'slug' => 'staff-category' ),
        //Restricting managing, editing, and deleting terms.
        'capabilities' => array(
            'manage_terms' => 'do_not_allow',   //Prevent adding/editing/deleting terms.
            'edit_terms' => 'do_not_allow',
            'delete_terms' => 'do_not_allow',
            'assign_terms' => 'edit_posts',     //Allowing only to assign terms to posts.
        ),
        'map_meta_cap' => true,     //Enable the 'do_not_allow' capabilities work coreectly.
    );
    register_taxonomy( 'fwd-staff-category', array( 'fwd-staff' ), $args );
}
add_action( 'init', 'school_demo_register_taxonomies' );

// Adding flush_rewrite_rules() function to make sure that the custom post type is registered properly withoutneed to fluch amnualy.
function mindset_rewrite_flush() {
    school_demo_register_custom_post_types();
    school_demo_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'mindset_rewrite_flush' );
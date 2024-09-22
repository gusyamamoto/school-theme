<?php
function school_theme_register_custom_post_types() {

    $labels = array(
        'name'               => _x( 'Staff', 'post type general name' ),
        'singular_name'      => _x( 'Staff', 'post type singular name'),
        'menu_name'          => _x( 'Staff', 'admin menu' ),
        'name_admin_bar'     => _x( 'Staff', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'staff' ),
        'add_new_item'       => __( 'Add New Staff' ),
        'new_item'           => __( 'New Staff' ),
        'edit_item'          => __( 'Edit Staff' ),
        'view_item'          => __( 'View Staff' ),
        'all_items'          => __( 'All Staff' ),
        'search_items'       => __( 'Search Staff' ),
        'parent_item_colon'  => __( 'Parent Staff:' ),
        'not_found'          => __( 'No Staff found.' ),
        'not_found_in_trash' => __( 'No Staff found in Trash.' ),
        'archives'           => __( 'Work Archives'),
        'insert_into_item'   => __( 'Insert into work'),
        'uploaded_to_this_item' => __( 'Uploaded to this work'),
        'filter_item_list'   => __( 'Filter Staff list'),
        'items_list_navigation' => __( 'Staff list navigation'),
        'items_list'         => __( 'Staff list'),
        'featured_image'     => __( 'Staff featured image'),
        'set_featured_image' => __( 'Set staff featured image'),
        'remove_featured_image' => __( 'Remove staff featured image'),
        'use_featured_image' => __( 'Use as featured image'),
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
        'menu_icon'          => 'dashicons-buddicons-buddypress-logo',
        'supports'           => array( 'title' ),
    );
    register_post_type( 'school-theme-staff', $args );

    $labels = array(
        'name'                  => _x('Students', 'post type general name'),
        'singular_name'         => _x('Student', 'post type singular name'),
        'menu_name'             => _x('Students', 'admin menu'),
        'name_admin_bar'        => _x('Student', 'add new on admin bar'),
        'add_new'               => _x('Add New', 'student'),
        'add_new_item'          => __('Add New Student'),
        'new_item'              => __('New Student'),
        'edit_item'             => __('Edit Student'),
        'view_item'             => __('View Student'),
        'all_items'             => __('All Students'),
        'search_items'          => __('Search Students'),
        'parent_item_colon'     => __('Parent Students:'),
        'not_found'             => __('No students found.'),
        'not_found_in_trash'    => __('No students found in Trash.'),
        'archives'              => __('Service Archives'),
        'insert_into_item'      => __('Insert into service'),
        'uploaded_to_this_item' => __('Uploaded to this service'),
        'filter_item_list'      => __('Filter students list'),
        'items_list_navigation' => __('Student list navigation'),
        'items_list'            => __('Student list'),
        'featured_image'        => __('Student featured image'),
        'set_featured_image'    => __('Set student featured image'),
        'remove_featured_image' => __('Remove student featured image'),
        'use_featured_image'    => __('Use as featured image'),
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'students'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array('title','editor', 'thumbnail'),
        'template'           => array(
            array('core/paragraph', array(
                'placeholder' => 'Short Biography',
            )),
            array('core/button', array(
                'placeholder' => 'Student Name Portfolio',
                'url' => '#', 
                'className' => 'portfolio-button'
            )),
    ),
    
    // Optional: Lock the template to prevent users from adding/removing blocks
    'template_lock'      => 'all',
    );
    register_post_type('school-theme-student', $args);

}
add_action( 'init', 'school_theme_register_custom_post_types' );


function school_theme_register_taxonomies() {
    // Add Staff Category taxonomy
    $labels = array(
        'name'              => _x( 'Staff Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Staff Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Staff Categories' ),
        'all_items'         => __( 'All Staff Category' ),
        'parent_item'       => __( 'Parent Staff Category' ),
        'parent_item_colon' => __( 'Parent Staff Category:' ),
        'edit_item'         => __( 'Edit Staff Category' ),
        'view_item'         => __( 'View Staff Category' ),
        'update_item'       => __( 'Update Staff Category' ),
        'add_new_item'      => __( 'Add New Staff Category' ),
        'new_item_name'     => __( 'New Staff Category Name' ),
        'menu_name'         => __( 'Staff Category' ),
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
        'rewrite'           => array( 'slug' => 'staff-categories' ),
    );
    register_taxonomy( 'school-theme-staff-category', array( 'school-theme-staff' ), $args );

    //Add Students Category Taxonomy
    $labels = array(
        'name'              => _x( 'Students Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Student Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Students Categories' ),
        'all_items'         => __( 'All Students Category' ),
        'parent_item'       => __( 'Parent Student Category' ),
        'parent_item_colon' => __( 'Parent Student Category:' ),
        'edit_item'         => __( 'Edit Student Category' ),
        'view_item'         => __( 'View Student Category' ),
        'update_item'       => __( 'Update Student Category' ),
        'add_new_item'      => __( 'Add New Student Category' ),
        'new_item_name'     => __( 'New Student Category Name' ),
        'menu_name'         => __( 'Student Category' ),
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
        'rewrite'           => array( 'slug' => 'students-categories' ),
    );
    register_taxonomy( 'school-theme-student-category', array( 'school-theme-student' ), $args );

}
add_action( 'init', 'school_theme_register_taxonomies');


function school_theme_change_title_text( $title ){
    $screen = get_current_screen();
  
    if  ( 'school-theme-student' == $screen->post_type ) {
         $title = 'Add student name';
    }
  
    return $title;
}
  
add_filter( 'enter_title_here', 'school_theme_change_title_text' );

// Function to change the labels to "News" in the backend
function change_post_labels() {
    global $wp_post_types;

    if ( isset( $wp_post_types['post'] ) ) {
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'News';
        $labels->singular_name = 'News';
        $labels->add_new = 'Add News';
        $labels->add_new_item = 'Add News';
        $labels->edit_item = 'Edit News';
        $labels->new_item = 'News';
        $labels->view_item = 'View News';
        $labels->search_items = 'Search News';
        $labels->not_found = 'No News found';
        $labels->not_found_in_trash = 'No News found in Trash';
        $labels->all_items = 'All News';
        $labels->menu_name = 'News';
        $labels->name_admin_bar = 'News';
    }
}
add_action( 'init', 'change_post_labels' );

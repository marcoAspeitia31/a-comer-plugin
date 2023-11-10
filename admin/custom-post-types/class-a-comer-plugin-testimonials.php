<?php
/**
 * The testimonials custom post type functionality of the plugin.
 *
 * @link       https://devitm.com
 * @since      1.0.0
 *
 * @package    A_Comer_Plugin
 * @subpackage A_Comer_Plugin/admin/custom-post-types
 */

class A_Comer_Plugin_Testimonials {

    // Register Custom Post Type
    public function testimonials_post_type() {

        $labels = array(
            'name'                  => _x( 'Testimonials', 'Post Type General Name', 'a-comer-plugin' ),
            'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'a-comer-plugin' ),
            'menu_name'             => __( 'Testimonials', 'a-comer-plugin' ),
            'name_admin_bar'        => __( 'Testimonial', 'a-comer-plugin' ),
            'archives'              => __( 'Testimonial Archives', 'a-comer-plugin' ),
            'attributes'            => __( 'Testimonial Attributes', 'a-comer-plugin' ),
            'parent_item_colon'     => __( 'Parent Testimonial:', 'a-comer-plugin' ),
            'all_items'             => __( 'All Testimonials', 'a-comer-plugin' ),
            'add_new_item'          => __( 'Add New Testimonial', 'a-comer-plugin' ),
            'add_new'               => __( 'Add New', 'a-comer-plugin' ),
            'new_item'              => __( 'New Testimonial', 'a-comer-plugin' ),
            'edit_item'             => __( 'Edit Testimonial', 'a-comer-plugin' ),
            'update_item'           => __( 'Update Testimonial', 'a-comer-plugin' ),
            'view_item'             => __( 'View Testimonial', 'a-comer-plugin' ),
            'view_items'            => __( 'View Testimonials', 'a-comer-plugin' ),
            'search_items'          => __( 'Search Testimonial', 'a-comer-plugin' ),
            'not_found'             => __( 'Not found', 'a-comer-plugin' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'a-comer-plugin' ),
            'featured_image'        => __( 'Featured Image', 'a-comer-plugin' ),
            'set_featured_image'    => __( 'Set featured image', 'a-comer-plugin' ),
            'remove_featured_image' => __( 'Remove featured image', 'a-comer-plugin' ),
            'use_featured_image'    => __( 'Use as featured image', 'a-comer-plugin' ),
            'insert_into_item'      => __( 'Insert into item', 'a-comer-plugin' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'a-comer-plugin' ),
            'items_list'            => __( 'Testimonials list', 'a-comer-plugin' ),
            'items_list_navigation' => __( 'Testimonials list navigation', 'a-comer-plugin' ),
            'filter_items_list'     => __( 'Filter items list', 'a-comer-plugin' ),
        );
        $args = array(
            'label'                 => __( 'Testimonial', 'a-comer-plugin' ),
            'description'           => __( 'Testimonial Description', 'a-comer-plugin' ),
            'labels'                => $labels,
            'supports'              => array( 'title' ),
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-format-status',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
        );
        register_post_type( 'testimonials', $args );

    }

    public function testimonials_metabox() {

        $prefix = 'testimonials_';
        
        $testimonials_metabox = new_cmb2_box( array(
            'id'            => $prefix . 'metabox',
            'title'         => esc_html__( 'Testimonial fields', 'a-comer-plugin' ),
            'object_types'  => array( 'testimonials' ), // Post type
            'priority'   => 'high',
            'show_names' => true, // Show field names on the left
            'closed'     => false, // true to keep the metabox closed by default
            'show_in_rest' => WP_REST_Server::ALLMETHODS, // WP_REST_Server::READABLE|WP_REST_Server::EDITABLE, // Determines which HTTP methods the box is visible in.
        ) );

        $testimonials_metabox->add_field( array(
            'name' => esc_html__( 'Job position', 'a-comer-plugin' ),
            'id'   => $prefix . 'job_position',
            'type' => 'text_medium',
        ) );

        $testimonials_metabox->add_field( array(
            'name' => esc_html__( 'Testimonial Opinion', 'a-comer-plugin' ),
            'id'   => $prefix . 'opinion',
            'type' => 'textarea_small',
        ) );

        $testimonials_metabox->add_field( array(
            'name' => esc_html__( 'Testimonial picture', 'a-comer-plugin' ),
            'id'   => $prefix . 'picture',
            'type' => 'file',
            'text' => array(
                'add_upload_file_text' => esc_html__( 'Upload a testimonial picture', 'a-comer-plugin' )
            ),
            'query_args' => array(
                'type' => array(
                    'image/jpg',
                    'image/jpeg',
                    'image/png',
                    'image/webp',
                )
            ),
            'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        ) );

    }

}
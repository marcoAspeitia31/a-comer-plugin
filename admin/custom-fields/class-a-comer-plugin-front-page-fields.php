<?php
/**
 * The testimonials custom post type functionality of the plugin.
 *
 * @link       https://devitm.com
 * @since      1.0.0
 *
 * @package    A_Comer_Plugin
 * @subpackage A_Comer_Plugin/admin/custom-fields
 */

class A_Comer_Plugin_Front_Page_Fields {

    function front_page_banner_metabox() {

        $prefix = 'front_page_banner_';
        $front_page_id = get_option( 'page_on_front' );

        $front_page_banner_metabox = new_cmb2_box( array(
            'id'            => $prefix . 'metabox',
            'title'         => esc_html__( 'Banner metabox', 'a-comer-plugin' ),
            'object_types'  => array( 'page' ), // Post type
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true, // Show field names on the left
            'show_in_rest' => WP_REST_Server::ALLMETHODS, // WP_REST_Server::READABLE|WP_REST_Server::EDITABLE, // Determines which HTTP methods the box is visible in.
            'show_on'      => array(
                'id'    => array( $front_page_id ),
            ),
            // 'cmb_styles' => false, // false to disable the CMB stylesheet
            // 'closed'     => true, // true to keep the metabox closed by default
            // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
            // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
        ) );

        $front_page_banner_metabox->add_field( array(
            'name'       => esc_html__( 'Banner title', 'a-comer-plugin' ),
            'desc'       => esc_html__( 'This is the main text of the banner', 'a-comer-plugin' ),
            'id'         => $prefix . 'title',
            'type'       => 'textarea_small',
        ) );

        $front_page_banner_metabox->add_field( array(
            'name'       => esc_html__( 'Banner slogan', 'a-comer-plugin' ),
            'desc'       => esc_html__( 'This is the text below of the title', 'a-comer-plugin' ),
            'id'         => $prefix . 'slogan',
            'type'       => 'textarea_small',
        ) );

        $front_page_banner_metabox->add_field( array(
            'name' => esc_html__( 'Appstore URL', 'a-comer-plugin' ),
            'desc' => esc_html__( 'URL Link to download the app', 'a-comer-plugin' ),
            'id'   => $prefix . 'app_store_url',
            'type' => 'text_url',
            'protocols' => array('http', 'https'), // Array of allowed protocols
        ) );

        $front_page_banner_metabox->add_field( array(
            'name' => esc_html__( 'Google Play URL', 'a-comer-plugin' ),
            'desc' => esc_html__( 'URL Link to download the app', 'a-comer-plugin' ),
            'id'   => $prefix . 'google_play_url',
            'type' => 'text_url',
            'protocols' => array('http', 'https'), // Array of allowed protocols
        ) );

        $front_page_banner_metabox->add_field( array(
            'name' => esc_html__( 'Banner picture', 'a-comer-plugin' ),
            'id'   => $prefix . 'picture',
            'desc'       => esc_html__( 'Add an image with 620 x 670 pixels', 'a-comer-plugin' ),
            'type' => 'file',
            'text' => array(
                'add_upload_file_text' => esc_html__( 'Upload the banner picture', 'a-comer-plugin' )
            ),
            'query_args' => array(
                'type' => array(
                    'image/jpg',
                    'image/jpeg',
                    'image/png',
                    'image/webp',
                )
            ),
        ) );

    }

}
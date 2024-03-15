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

class A_Comer_Plugin_Contact_Page_Fields {


    function contact_page_cta_metabox() {

        $prefix = 'contact_page_cta_';

        $contact_page_cta_metabox = new_cmb2_box( array(
            'id'            => $prefix . 'metabox',
            'title'         => esc_html__( 'Call to action Comercios', 'a-comer-plugin' ),
            'object_types'  => array( 'page' ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
            'show_in_rest'  => WP_REST_Server::ALLMETHODS,
            'show_on'       => array( 'key' => 'page-template', 'value' => 'page-contact.php' ),
        ) );

        $contact_page_cta_metabox->add_field( array(
            'name' => esc_html__( 'Title', 'a-comer-plugin' ),
            'desc' => esc_html__( 'Write the title for call to action', 'a-comer-plugin' ),
            'id'   => $prefix . 'title',
            'type' => 'text'
        ) );

        $contact_page_cta_metabox->add_field( array(
            'name' => esc_html__( 'Content', 'a-comer-plugin' ),
            'desc' => esc_html__( 'Write the title for call to action', 'a-comer-plugin' ),
            'id'   => $prefix . 'content',
            'type' => 'textarea_small'
        ) );

        $contact_page_cta_metabox->add_field( array(
            'name' => esc_html__( 'CTA picture', 'a-comer-plugin' ),
            'id'   => $prefix . 'picture',
            'desc'       => esc_html__( 'Add an image with 330 x 360 pixels', 'a-comer-plugin' ),
            'type' => 'file',
            'text' => array(
                'add_upload_file_text' => esc_html__( 'Upload the cta picture', 'a-comer-plugin' )
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

        $contact_page_cta_metabox->add_field( array(
            'name' => esc_html__( 'Appstore URL', 'a-comer-plugin' ),
            'desc' => esc_html__( 'URL Link to download the app', 'a-comer-plugin' ),
            'id'   => $prefix . 'app_store_url',
            'type' => 'text_url',
            'protocols' => array('http', 'https'), // Array of allowed protocols
        ) );

        $contact_page_cta_metabox->add_field( array(
            'name' => esc_html__( 'Google Play URL', 'a-comer-plugin' ),
            'desc' => esc_html__( 'URL Link to download the app', 'a-comer-plugin' ),
            'id'   => $prefix . 'google_play_url',
            'type' => 'text_url',
            'protocols' => array('http', 'https'), // Array of allowed protocols
        ) );
    }

    function contact_page_cta_metabox_drivers() {

        $prefix = 'contact_page_drivers_cta_';

        $contact_page_cta_metabox_drivers = new_cmb2_box( array(
            'id'            => $prefix . 'metabox',
            'title'         => esc_html__( 'Call to action Repartidores', 'a-comer-plugin' ),
            'object_types'  => array( 'page' ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
            'show_in_rest'  => WP_REST_Server::ALLMETHODS,
            'show_on'       => array( 'key' => 'page-template', 'value' => 'page-contact.php' ),
        ) );

        $contact_page_cta_metabox_drivers->add_field( array(
            'name' => esc_html__( 'Title', 'a-comer-plugin' ),
            'desc' => esc_html__( 'Write the title for call to action', 'a-comer-plugin' ),
            'id'   => $prefix . 'title',
            'type' => 'text'
        ) );

        $contact_page_cta_metabox_drivers->add_field( array(
            'name' => esc_html__( 'Content', 'a-comer-plugin' ),
            'desc' => esc_html__( 'Write the title for call to action', 'a-comer-plugin' ),
            'id'   => $prefix . 'content',
            'type' => 'textarea_small'
        ) );

        $contact_page_cta_metabox_drivers->add_field( array(
            'name' => esc_html__( 'CTA picture', 'a-comer-plugin' ),
            'id'   => $prefix . 'picture',
            'desc'       => esc_html__( 'Add an image with 330 x 360 pixels', 'a-comer-plugin' ),
            'type' => 'file',
            'text' => array(
                'add_upload_file_text' => esc_html__( 'Upload the cta picture', 'a-comer-plugin' )
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

        $contact_page_cta_metabox_drivers->add_field( array(
            'name' => esc_html__( 'Appstore URL', 'a-comer-plugin' ),
            'desc' => esc_html__( 'URL Link to download the app', 'a-comer-plugin' ),
            'id'   => $prefix . 'app_store_url',
            'type' => 'text_url',
            'protocols' => array('http', 'https'), // Array of allowed protocols
        ) );

        $contact_page_cta_metabox_drivers->add_field( array(
            'name' => esc_html__( 'Google Play URL', 'a-comer-plugin' ),
            'desc' => esc_html__( 'URL Link to download the app', 'a-comer-plugin' ),
            'id'   => $prefix . 'google_play_url',
            'type' => 'text_url',
            'protocols' => array('http', 'https'), // Array of allowed protocols
        ) );
    }

}
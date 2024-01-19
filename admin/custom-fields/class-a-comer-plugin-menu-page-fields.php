<?php
/**
 * Services custom post type
 *
 * @link       https://devitm.com
 * @since      1.0.0
 *
 * @package    En_Contraste_Plugin
 * @subpackage En_Contraste_Plugin/admin/custom-post-types
 */

/**
 * Services custom post type
 *
 *
 * @package    En_Contraste_Plugin
 * @subpackage En_Contraste_Plugin/admin/custom-fields
 * @author     DevITM <contacto@devitm.com>
 */
class A_Comer_Plugin_Menu_Page_Fields {

    function menu_page_metabox() {

        $prefix = 'acp_options_page_';

        /**
         * Registers options page menu item and form.
         */
        $acp_options = new_cmb2_box( array(
            'id'           => $prefix . 'metabox',
            'title'        => esc_html__( 'Theme options', 'a-comer-plugin' ),
            'object_types' => array( 'options-page' ),

            /*
            * The following parameters are specific to the options-page box
            * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
            */

            'option_key'      => 'acp_theme_options', // The option key and admin menu page slug.
            'icon_url'        => plugin_dir_url( __DIR__ ) . 'img/logo.png', // Menu icon. Only applicable if 'parent_slug' is left empty.
            'menu_title'              => esc_html__( 'Theme Options', 'a-comer-plugin' ), // Falls back to 'title' (above).
            // 'parent_slug'             => 'themes.php', // Make options page a submenu item of the themes menu.
            'capability'              => 'manage_options', // Cap required to view options-page.
            'position'                => 2, // Menu position. Only applicable if 'parent_slug' is left empty.
            // 'admin_menu_hook'         => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
            'priority'                => 10, // Define the page-registration admin menu hook priority.
            // 'display_cb'              => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
            'save_button'             => esc_html__( 'Save', 'a-comer-plugin' ), // The text for the options-page save button. Defaults to 'Save'.
            // 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
            // 'message_cb'              => 'yourprefix_options_page_message_callback',
            // 'tab_group'               => '', // Tab-group identifier, enables options page tab navigation.
            // 'tab_title'               => null, // Falls back to 'title' (above).
            // 'autoload'                => false, // Defaults to true, the options-page option will be autloaded.
        ) );

        /**
         * Branding
         */
        $acp_options->add_field( array(
            'name' => esc_html__( 'Branding', 'a-comer-plugin' ),
            'desc' => esc_html__( 'This is a title description', 'a-comer-plugin' ),
            'id'   => 'branding_title',
            'type' => 'title',
        ) );

        // Menu logo
        $acp_options->add_field( array(
            'name' => esc_html__( 'Menu logo', 'a-comer-plugin' ),
            'desc' => esc_html__( 'Upload an image or enter a URL.', 'a-comer-plugin' ),
            'id'   => 'menu_logo',
            'type' => 'file',
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

        // CTA url
        $acp_options->add_field( array(
            'name' => esc_html__( 'Menu call to action', 'a-comer-plugin' ),
            'id'   => 'menu_cta',
            'type' => 'text_url',
            'protocols' => array( 'https', 'http' ),
        ) );

        /**
         * Settings
         */
        $acp_options->add_field( array(
            'name' => esc_html__( 'Settings', 'a-comer-plugin' ),
            'desc' => esc_html__( 'This is a title description', 'a-comer-plugin' ),
            'id'   => 'cta_title',
            'type' => 'title',
        ) );

        //Google API key
        $acp_options->add_field( array(
            'name' => esc_html__( 'Google API Key', 'a-comer-plugin' ),
            'id'   => 'google_api_key',
            'type' => 'text',
            'attributes' => array(
                'type' => 'password',
            ),
        ) );

        /**
         * Contact information
         */
        $acp_options->add_field( array(
            'name' => esc_html__( 'Contact information', 'a-comer-plugin' ),
            'desc' => esc_html__( 'This is a title description', 'a-comer-plugin' ),
            'id'   => 'contact_title',
            'type' => 'title',
        ) );

        // Phone
        $acp_options->add_field( array(
            'name' => esc_html__( 'Business phone', 'a-comer-plugin' ),
            'id'   => 'business_phone',
            'type' => 'text',
            'attributes' => array(
                'type' => 'number',
            ),
        ) );

        // E-mail
        $acp_options->add_field( array(
            'name' => esc_html__( 'Contact e-mail', 'a-comer-plugin' ),
            'id'   => 'contact_email',
            'type' => 'text_email',
        ) );

        // Map
        $acp_options->add_field( array(
            'name' => 'Location',
            'desc' => 'Drag the marker to set the exact location',
            'id' => 'location',
            'type' => 'pw_map',
            // 'split_values' => true, // Save latitude and longitude as two separate fields
        ) );

        // Business address
        $acp_options->add_field( array(
            'name' => esc_html__( 'Business address', 'a-comer-plugin' ),
            'id'   => 'business_address',
            'type' => 'textarea_small',
            'attributes' => array(
                'disabled' => 'disabled',
                'readonly' => 'readonly',
            ),
        ) );

        /**
         * Social Media
         */
        $acp_options->add_field( array(
            'name' => esc_html__( 'Social Media', 'a-comer-plugin' ),
            'desc' => esc_html__( 'This is a title description', 'a-comer-plugin' ),
            'id'   => 'social_media_title',
            'type' => 'title',
        ) );

        // Facebook
        $acp_options->add_field( array(
            'name' => esc_html__( 'Facebook URL', 'a-comer-plugin' ),
            'id'   => 'facebook_url',
            'type' => 'text_url',
            'protocols' => array( 'https' ),
        ) );

        // Instagram
        $acp_options->add_field( array(
            'name' => esc_html__( 'Instagram URL', 'a-comer-plugin' ),
            'id'   => 'instagram_url',
            'type' => 'text_url',
            'protocols' => array( 'https' ),
        ) );

        // Youtube
        $acp_options->add_field( array(
            'name' => esc_html__( 'Youtube URL', 'a-comer-plugin' ),
            'id'   => 'youtube_url',
            'type' => 'text_url',
            'protocols' => array( 'https' ),
        ) );

        // Tiktok
        $acp_options->add_field( array(
            'name' => esc_html__( 'Tik tok URL', 'a-comer-plugin' ),
            'id'   => 'tiktok_url',
            'type' => 'text_url',
            'protocols' => array( 'https' ),
        ) );
        
    }

    function geocode_business_address( $option, $old_value, $value ) {

        if( $option == 'acp_theme_options' ) {

            $plugin_theme_options = get_option( $option );

            if( ! empty( $plugin_theme_options['google_api_key'] ) ) {

                $google_api_key = esc_html( $plugin_theme_options['google_api_key'] );

            }

            if( $plugin_theme_options['location'] && isset( $google_api_key ) ) {

                $location = $plugin_theme_options['location'];

                $url_maps = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$location['latitude'].",".$location['longitude']."&sensor=false&key=".$google_api_key;
                $json_data = json_decode( @file_get_contents( $url_maps ) );

                $business_address = array(
                    'business_address' => $json_data->results[0]->formatted_address
                );

                $new_value = array_merge( $plugin_theme_options, $business_address );

                update_option( $option, $new_value );
            }

        }

    }

}
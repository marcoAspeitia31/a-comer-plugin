<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://devitm.com
 * @since      1.0.0
 *
 * @package    A_Comer_Plugin
 * @subpackage A_Comer_Plugin/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    A_Comer_Plugin
 * @subpackage A_Comer_Plugin/includes
 * @author     DevITM <maspeitiap@devitm.com>
 */
class A_Comer_Plugin {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      A_Comer_Plugin_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'A_COMER_PLUGIN_VERSION' ) ) {
			$this->version = A_COMER_PLUGIN_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'a-comer-plugin';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_cmb2_metaboxes_hooks();
		$this->define_custom_post_types_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - A_Comer_Plugin_Loader. Orchestrates the hooks of the plugin.
	 * - A_Comer_Plugin_i18n. Defines internationalization functionality.
	 * - A_Comer_Plugin_Admin. Defines all hooks for the admin area.
	 * - A_Comer_Plugin_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-a-comer-plugin-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-a-comer-plugin-i18n.php';

		/**
		 * The file responsible of give functionality with cmb2 framework
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/cmb2-functions.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/cmb2-field-faiconselect/iconselect.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/cmb_field_map/cmb-field-map.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-a-comer-plugin-admin.php';

		/**
		 * The classes responsibles for defining all the metaboxes for pages in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/custom-fields/class-a-comer-plugin-front-page-fields.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/custom-fields/class-a-comer-plugin-contact-page-fields.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/custom-fields/class-a-comer-plugin-menu-page-fields.php';

		/**
		 * The class responsible for defining all actions that occur with custom post types
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-post-types/class-a-comer-plugin-testimonials.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-a-comer-plugin-public.php';

		$this->loader = new A_Comer_Plugin_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the A_Comer_Plugin_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new A_Comer_Plugin_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new A_Comer_Plugin_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to cmb2 pages metaboxes in the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_cmb2_metaboxes_hooks() {

		$plugin_front_page_metaboxes = new A_Comer_Plugin_Front_Page_Fields();

		$this->loader->add_action( 'cmb2_init', $plugin_front_page_metaboxes, 'front_page_banner_metabox' );
		$this->loader->add_action( 'cmb2_init', $plugin_front_page_metaboxes, 'front_page_features_metabox' );
		$this->loader->add_action( 'cmb2_init', $plugin_front_page_metaboxes, 'front_page_counter_metabox' );
		$this->loader->add_action( 'cmb2_init', $plugin_front_page_metaboxes, 'front_page_first_info_metabox' );
		$this->loader->add_action( 'cmb2_init', $plugin_front_page_metaboxes, 'front_page_second_info_metabox' );
		$this->loader->add_action( 'cmb2_init', $plugin_front_page_metaboxes, 'front_page_cta_metabox' );
		$this->loader->add_action( 'cmb2_init', $plugin_front_page_metaboxes, 'front_page_video_metabox' );
		$this->loader->add_action( 'cmb2_init', $plugin_front_page_metaboxes, 'front_page_testimonials_metabox' );

		$plugin_contact_page_metaboxes = new A_Comer_Plugin_Contact_Page_Fields();
		$this->loader->add_action( 'cmb2_init', $plugin_contact_page_metaboxes, 'contact_page_cta_metabox' );
		$this->loader->add_action( 'cmb2_init', $plugin_contact_page_metaboxes, 'contact_page_cta_metabox_drivers' );

		$plugin_menu_page_metaboxes = new A_Comer_Plugin_Menu_Page_Fields();

		$this->loader->add_action( 'cmb2_admin_init', $plugin_menu_page_metaboxes, 'menu_page_metabox' );
		$this->loader->add_action( 'updated_option', $plugin_menu_page_metaboxes, 'geocode_business_address', 10, 3 );

	}

	/**
	 * Register all of the hooks related with custom post types functionality
	 * of the plugin
	 * 
	 * @since	1.0.0
	 * @access private
	 */
	private function define_custom_post_types_hooks() {

		$plugin_cpt_testimonials = new A_Comer_Plugin_Testimonials();

		$this->loader->add_action( 'init', $plugin_cpt_testimonials, 'testimonials_post_type', 0 );
		$this->loader->add_action( 'cmb2_init', $plugin_cpt_testimonials, 'testimonials_metabox', 0 );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new A_Comer_Plugin_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    A_Comer_Plugin_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}

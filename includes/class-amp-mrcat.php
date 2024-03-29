<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       mrcatdev.com/about-me
 * @since      1.0.0
 *
 * @package    Amp_Mrcat
 * @subpackage Amp_Mrcat/includes
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
 * @package    Amp_Mrcat
 * @subpackage Amp_Mrcat/includes
 * @author     Hosein Shurabi <hoseinshurabi@gmail.com>
 */
class Amp_Mrcat {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Amp_Mrcat_Loader    $loader    Maintains and registers all hooks for the plugin.
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
		if ( defined( 'AMP_MRCAT_VERSION' ) ) {
			$this->version = AMP_MRCAT_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'amp-mrcat';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}
	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Amp_Mrcat_Loader. Orchestrates the hooks of the plugin.
	 * - Amp_Mrcat_i18n. Defines internationalization functionality.
	 * - Amp_Mrcat_Admin. Defines all hooks for the admin area.
	 * - Amp_Mrcat_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-amp-mrcat-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-amp-mrcat-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-amp-mrcat-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-amp-mrcat-public.php';


		$this->loader = new Amp_Mrcat_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Amp_Mrcat_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {
		$plugin_i18n = new Amp_Mrcat_i18n();
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
		$plugin_admin = new Amp_Mrcat_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		//call submenu page
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_menu_amp_mrcat' );
		//add amp endpoint
		$this->loader->add_action( 'init', $plugin_admin, 'add_endpoint' );
		$this->loader->add_action( 'query_vars', $plugin_admin, 'add_query_vars' );
		$this->loader->add_action( 'single_template', $plugin_admin, 'amp_template' );
		$this->loader->add_action( 'wp_head', $plugin_admin, 'custom_amp_add_amptml_meta' );
		//remove all filter from content
		$this->loader->add_action( 'init',$plugin_admin, 'remove_plugin_filter' , 99 );
		$this->loader->add_filter('the_content',$plugin_admin, 'regex_content', 99);
		//register settings
		$this->loader->add_action( 'admin_init',$plugin_admin, 'register_fields_amp_mrcat' );
		//register widget
		$this->loader->add_action('widgets_init',$plugin_admin, 'widgets_init_amp_mrcat');
		//add uploader media
		$this->loader->add_action( 'admin_enqueue_scripts',$plugin_admin, 'load_amp_mrcat_media_files' );	
		//ajax - update cache
		$this->loader->add_action( 'wp_ajax_amp_mrcat_update_cache',$plugin_admin, 'amp_mrcat_update_cache' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		$plugin_public = new Amp_Mrcat_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
        $this->loader->add_action('wp_amp_menu', $plugin_public,'func_wp_amp_menu',10,1);
        $this->loader->add_action('wp_amp_breadcrumb', $plugin_public,'func_wp_amp_breadcrumb',10,1);
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
	 * @return    Amp_Mrcat_Loader    Orchestrates the hooks of the plugin.
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

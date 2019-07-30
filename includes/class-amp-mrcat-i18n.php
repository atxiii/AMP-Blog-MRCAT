<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       mrcatdev.com/about-me
 * @since      1.0.0
 *
 * @package    Amp_Mrcat
 * @subpackage Amp_Mrcat/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Amp_Mrcat
 * @subpackage Amp_Mrcat/includes
 * @author     hosein shurabi <hoseinshurabi@gmail.com>
 */
class Amp_Mrcat_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'amp-mrcat',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

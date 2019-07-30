<?php

/**
 * Fired during plugin deactivation
 *
 * @link       mrcatdev.com/about-me
 * @since      1.0.0
 *
 * @package    Amp_Mrcat
 * @subpackage Amp_Mrcat/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Amp_Mrcat
 * @subpackage Amp_Mrcat/includes
 * @author     hosein shurabi <hoseinshurabi@gmail.com>
 */
class Amp_Mrcat_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        global $wp_rewrite; $wp_rewrite->flush_rules(); $wp_rewrite->init();
	}

}

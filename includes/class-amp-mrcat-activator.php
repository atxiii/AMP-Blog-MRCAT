<?php

/**
 * Fired during plugin activation
 *
 * @link       mrcatdev.com/about-me
 * @since      1.0.0
 *
 * @package    Amp_Mrcat
 * @subpackage Amp_Mrcat/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Amp_Mrcat
 * @subpackage Amp_Mrcat/includes
 * @author     Hosein Shurabi <hoseinshurabi@gmail.com>
 */
class Amp_Mrcat_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {

        add_action( 'activated_plugin', array($this,'go_to_panel_mrcat'));
	}
	
	public function go_to_panel_mrcat(){
        exit(wp_redirect(admin_url('admin.php?page=amp_mrcat_admin_panel')));
        die;
    }


}
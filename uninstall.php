<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       mrcatdev.com/about-me
 * @since      1.0.0
 *
 * @package    Amp_Mrcat
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$data_default= array(
    'enable_amp' => true,
    'amp_menu'=> "",
    'breadcrumb'=>"",
    'copyright_footer'=>true,
    'fav_url'=>"",
    'logo_url'=>"",
    'logo_width'=>"",
    'logo_height'=>"",
    'primary-color'=>"",
    'secondary-color'=>"",
    'sticky_top'=>true,
    'hf_bg_color'=>"",
    'hf_font_color'=>"",
    'hamburger_color'=>"",
    'p_sidebar'=>"",
    'bg_color_top_sidebar'=>"",
    'font_color_sidebar'=>"",
    'custom-css'=>"",
    'new_css'=>"",
    'component'=>"",
    'enable_call_tracking'=>"",
    'call_tracking'=>"",
    'ga'=>"",
    'schema_gen'=>true,
    'schema'=>"");

foreach ($data_default as $key => $value){
    delete_option($key);
}
<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              mrcatdev.com/about-me
 * @since             1.0.0
 * @package           Amp_Mrcat
 *
 * @wordpress-plugin
 * Plugin Name:       MRCat Blog AMP
 * Plugin URI:        mrcatdev.com/amp-mrcat/
 * Description:       Convert blog posts to AMP!
 * Version:           1.0.0
 * Author:            Hosein Shurabi
 * Author URI:        mrcatdev.com/about-me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       amp-mrcat
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('AMP_MRCAT_VERSION', '1.0.0');
define('TEXT_DOMAIN', 'amp-mrcat');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-amp-mrcat-activator.php
 */

function activate_amp_mrcat()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-amp-mrcat-activator.php';
	$activator = new Amp_Mrcat_Activator;
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-amp-mrcat-deactivator.php
 */
function deactivate_amp_mrcat()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-amp-mrcat-deactivator.php';
	Amp_Mrcat_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_amp_mrcat');
register_deactivation_hook(__FILE__, 'deactivate_amp_mrcat');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-amp-mrcat.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

function run_amp_mrcat()
{
	$plugin = new Amp_Mrcat();

	$plugin->run();
}
run_amp_mrcat();


/*
 *
 *
 * TODO: Dynamic CSS
 * TODO: Make Cache
 * TODO: Create other template for single
 * TODO: every one make template and publish for other
 * TODO: Contact Form Convert
 *
 *
 */
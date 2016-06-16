<?php
/**
 * @package SITE NAME
 */
/*
Plugin Name: SITE NAME
Plugin URI: http://SITEURL.com
Description: Custom functionality, including post types, for SITE NAME.
Version: 1.0
Author: Nathan Shubert-Harbison
Author URI: http://nathansh.com
Text Domain: sitename
*/

/**
 * Require and instantiate the site plugin class
 *
 */
require_once 'includes/class-penguinpress-site-plugin.php';

add_action( 'plugins_loaded', function() {

	/**
	 * $args
	 *
	 * An `$args` array can be passed as a second argument to the class. Dependencies can be specified in the following format:
	 *
	 *  $args = array(
	 *  	'dependencies' => array(
	 *  		'penguinpress-utils/penguinpress-utils.php' => array(
	 *  			'title' => 'PenguinPress - Utils',
	 *  			'url' => 'https://github.com/nathansh/penguinpress-utils',
	 *  			'repo' => 'https://github.com/nathansh/penguinpress-utils.git'
	 *  		)
	 *  	)
	 *  );
	 *
	 *
	 */

	$penguinpress_site_plugin = new PenguinPress_Site_Plugin( __FILE__ );

} );


/**
 * options.php allows you to create options/settings screens which you can add acf fields to.
 *
 * Uncomment to use.
 *
 */
// require_once( 'includes/options.php' );


/**
 * post-thumbnail.php allows you to customize the admin text for post thumbnails
 *
 * Uncomment to use
 *
 */
// require_once( 'includes/post-thumbnail.php' );


/**
 * admin.php adds an admin stylesheet/js file. These are in the plugin directory and the filenames need to be changed
 * to match the plugin name/directory name as follows;
 *
 * .js file: js/pluginname.js
 * .css file: clone sassyplate (https://github.com/nathansh/sassyplate) into plugin dir. Name the main file sitename_admin.scss
 *
 * To use once the files are in place, open admin.php and uncomment the add_action calls
 *
 */
// require_once( 'includes/admin.php' );

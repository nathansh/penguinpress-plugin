<?php


/**
 * Allow ACF fields to be stored in the plugin when exported
 * This uses WP-CLI and the WP-CLI ACF plugin
 *
 * @package pp
 * @subpackage boilerplate-plugin_filters+hooks
 *
 * @link http://wp-cli.org WP-CLI
 * @link https://github.com/hoppinger/advanced-custom-fields-wpcli WP-CLI ACF Plugin
 */
add_filter( 'acfwpcli_fieldgroup_paths', function( $paths ) {
	$paths[ pp_plugin_slug( plugin_dir_path( __DIR__ ) ) ] = __DIR__ . '/acf_fields/';
	return $paths;
} );

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

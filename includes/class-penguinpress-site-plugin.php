<?php

Class PenguinPress_Site_Plugin {


	private $dependencies = array();
	public static $dependency_messages = array();
	public static $plugin_file = false;


	/**
	 * Main construct method
	 *
	 */
	function __construct( $plugin_file, $args = array() ) {

		// Store dependencies
		$defaults = array(
			'dependencies' => array()
		);
		$args = wp_parse_args( $args, $defaults );
		$this->dependencies = $args['dependencies'];

		// Alias plugin file passed in
		self::$plugin_file = $plugin_file;


		/**
		 * Check dependencies
		 *
		 */
		foreach ( $this->dependencies as $plugin => $info ) {

			if ( ! is_plugin_active( $plugin ) ) {

				self::$dependency_messages[] = ' <p>🐧 <strong>PenguinPress - Site Plugin</strong>: Missing required plugin <a href="' . $info['url'] . '">' . $info['title'] . '</a>, plugin not activated.</p><p>Clone ' . $info['title'] . ' from <code>' . $info['repo'] . '</code></p>';

			} // ! is_plugin_active

		} // foreach

		if ( count( self::$dependency_messages ) ) {
			add_action( 'admin_notices', array( 'PenguinPress_Site_Plugin', 'display_dependency_messages' ) );
			deactivate_plugins( plugin_basename( $plugin_file ) );
		} else {
			$this->init_plugin();
		}

	} // __construct


	private function init_plugin() {

		$plugin = dirname( dirname( __FILE__ ) );

		// Custom post types
		foreach ( glob( $plugin . '/posttypes/posttype-*.php' ) as $filename) {
			require_once( $filename );
		}

		// Custom taxonomies
		foreach ( glob( $plugin . '/posttypes/posttype-*.php' ) as $filename) {
			require_once( $filename );
		}

		// Add ACF path
		$this->add_acf_path();

	}


	/**
	 * Display dependency messages
	 *
	 */
	public static function display_dependency_messages() {

		foreach ( self::$dependency_messages as $message ) {
			echo '<div class="notice notice-error is-dismissible">';
				echo '<p>';
					_e( $message , 'penguinpress-site-plugin' );
				echo '</p>';
			echo '</div>';
		}

	}


	/**
	 * Allow ACF fields to be stored in the plugin when exported
	 * This uses WP-CLI and the WP-CLI ACF plugin
	 *
	 */
	private function add_acf_path() {

		add_filter( 'acfwpcli_fieldgroup_paths', function( $paths ) {

			// Default path name
			$acf_path_name = pp_plugin_slug( get_plugin_data( self::$plugin_file )['Name'] . ' - Site plugin' );

			$paths[ $acf_path_name ] = __DIR__ . '/acf_fields/';
			return $paths;

		} );

	}

}

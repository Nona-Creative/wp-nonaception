<?php

/*
 * Plugin Name: WP Nonaception
 * Plugin URI:  http://leogopal.com/plugins/wp-nonaception
 * Author:      Leo Gopal
 * Author URI:  http://leogopal.com
 * Version:     0.1.1
 * Description: A Plugin to quick install regularly used plugins
 * License:     GPLv2 or later
 */

/**
 * Return the plugin's URL
 *
 * @since 0.1.0
 *
 * @return string
 */
function wp_nonaception_get_plugin_path() {
	return plugin_dir_path( __FILE__ );
}

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once wp_nonaception_get_plugin_path() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'nonaception_register_required_plugins' );
/**
 * Register the required and recommended plugins.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function nonaception_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => 'Jetpack',
			'slug'      => 'jetpack',
			'required'  => true,
		),

		array(
			'name'      => 'Akismet',
			'slug'      => 'akismet',
			'required'  => true,
		),

		array(
			'name'        	=> 'Yoast SEO',
			'slug'        	=> 'wordpress-seo',
			'required'  	=> false,
			'is_callable' 	=> 'wpseo_init',
		),

		array(
			'name'      => 'WP DropFilters',
			'slug'      => 'wp-dropfilters',
			'required'  => false,
		),

		array(
			'name'      => 'Simple System Status',
			'slug'      => 'simple-system-status',
			'required'  => true,
		),

		array(
			'name'      => 'WP Migrate DB',
			'slug'      => 'wp-migrate-db',
			'required'  => false,
		),

		array(
			'name'      => 'Simply Show Hooks',
			'slug'      => 'simply-show-hooks',
			'required'  => false,
		),

		array(
			'name'      => 'Regenerate Thumbnails',
			'slug'      => 'regenerate-thumbnails',
			'required'  => false,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'nonaception',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'nonaception-install', // Menu slug.
		'parent_slug'  => 'tools.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


		'strings'      => array(
			'page_title'                      => __( 'Install Recommended and Required Plugins', 'nonaception' ),
			'menu_title'                      => __( 'Nonaception', 'nonaception' ),
			'installing'                      => __( 'Installing Plugin: %s', 'nonaception' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'nonaception' ),
			'notice_can_install_required'     => _n_noop(
				'The following plugin is marked as required: %1$s.',
				'The following plugins are marked as required: %1$s.',
				'nonaception'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'The following plugin is marked as recommended: %1$s.',
				'The following plugins are marked as recommended: %1$s.',
				'nonaception'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'nonaception'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'nonaception'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'nonaception'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'nonaception'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'nonaception'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'nonaception'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'nonaception'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Install Plugin',
				'Install Plugins',
				'nonaception'
			),
			'update_link' 					  => _n_noop(
				'Update Plugin',
				'Update Plugins',
				'nonaception'
			),
			'activate_link'                   => _n_noop(
				'Activate Plugin',
				'Activate Plugins',
				'nonaception'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'nonaception' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'nonaception' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'nonaception' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'nonaception' ),  // %1$s = plugin name(s).
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'nonaception' ),  // %1$s = plugin name(s).
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'nonaception' ), // %s = dashboard link.
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),

	);

	tgmpa( $plugins, $config );
}


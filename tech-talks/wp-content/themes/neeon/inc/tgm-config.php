<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'tgmpa_register', 'neeon_register_required_plugins' );
function neeon_register_required_plugins() {
	$plugins = array(
		// Bundled
		array(
			'name'         => 'Neeon Core',
			'slug'         => 'neeon-core',
			'source'       => 'neeon-core.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '3.5'
		),
		array(
			'name'         => 'RT Framework',
			'slug'         => 'rt-framework',
			'source'       => 'rt-framework.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '2.5'
		),
		array(
			'name'     		=> 'Review Schema',
			'slug'     		=> 'review-schema',
			'required' 		=> false,
		),
		array(
			'name'         => 'Review Schema Pro',
			'slug'         => 'review-schema-pro',
			'source'       => 'review-schema-pro.zip',
			'required'     => false,
			'version'      => '1.1.7'
		),
		array(
			'name'     		=> 'AMP',
			'slug'     		=> 'amp',
			'required' 		=> false,
		),
		array(
			'name'         => 'Radius AMP',
			'slug'         => 'radius-amp',
			'source'       => 'radius-amp.zip',
			'required'     => false,
			'version'      => '1.0.3'
		),

		// Repository
		array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => true,
		),
		array(
			'name'     => 'Elementor Page Builder',
			'slug'     => 'elementor',
			'required' => true,
		),
		array(
			'name'     => 'One Click Demo Import',
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),
		array(
			'name'     => 'WP Fluent Forms',
			'slug'     => 'fluentform',
			'required' => false,
		),
		array(
			'name'     => 'Wp Social – Social Login and Register, Social Share, & Social Counter',
			'slug'     => 'wp-social',
			'required' => false,
		),
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),
		array(
			'name'     => 'YITH WooCommerce Quick View',
			'slug'     => 'yith-woocommerce-quick-view',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'neeon',                 	// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => NEEON_PLUGINS_DIR,       	// Default absolute path to bundled plugins.
		'menu'         => 'neeon-install-plugins', 	// Menu slug.
		'has_notices'  => true,                    		// Show admin notices or not.
		'dismissable'  => true,                    		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   		// Automatically activate plugins after installation or not.
		'message'      => '',                      		// Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
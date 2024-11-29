<?php

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'magezix_register_required_plugins' );

function magezix_register_required_plugins() {

    $plugins = array(
        array(
			'name'               => esc_html__('Magezix Core', 'magezix'),
			'slug'               => 'magezix-core',
			'source'             => get_template_directory() . '/lib/plugins/magezix-core.zip',
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),
        array(
			'name'               => esc_html__('Xriver Core', 'magezix'),
			'slug'               => 'xriver-core',
			'source'             => get_template_directory() . '/lib/plugins/xriver-core.zip',
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),
        array(
            'name'     => 'Elementor Website Builder',
            'slug'     => 'elementor',
            'required' => true,
        ),

        array(
            'name'               => esc_html__( 'SVG Support', 'gilroy' ),
            'slug'               => 'svg-support',
            'source'             => esc_url( 'https://themexriver.com/plugins/svg-support.zip' ),
            'external_url'       => esc_url( 'https://themexriver.com/plugins/svg-support.zip' ),
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),

        array(
            'name'     => esc_html__('MC4WP: Mailchimp for WordPress', 'magezix'),
            'slug'     => 'mailchimp-for-wp',
            'required' => false,
        ),
        array(
            'name'     => esc_html__('Fluent Forms', 'magezix'),
            'slug'     => 'fluentform',
            'required' => false,
        ),

        array(
            'name'     => esc_html__( 'One Click Demo Import', 'magezix' ),
            'slug'     => 'one-click-demo-import',
            'required' => false,
        ),
        array(
            'name'     => esc_html__( 'Breadcrumb NavXT', 'magezix' ),
            'slug'     => 'breadcrumb-navxt',
            'required' => false,
        ),

    );

    $config = array(
        'id'           => 'magezix',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',

    );

    tgmpa( $plugins, $config );
}

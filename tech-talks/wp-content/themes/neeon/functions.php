<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$theme_info = wp_get_theme();
$theme_info = $theme_info->parent() ? $theme_info->parent() : $theme_info;
$theme_name = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $theme_info->get('Name'))));
update_option( 'rt_licenses', [ $theme_name . '_license_key' => '*********' ] );
$neeon_theme_data = wp_get_theme();
	$action  = 'neeon_theme_init';
	do_action( $action );

	define( 'NEEON_VERSION', ( WP_DEBUG ) ? time() : $neeon_theme_data->get( 'Version' ) );
	define( 'NEEON_AUTHOR_URI', $neeon_theme_data->get( 'AuthorURI' ) );
	define( 'NEEON_NAME', 'neeon' );

	// DIR
	define( 'NEEON_BASE_DIR',    get_template_directory(). '/' );
	define( 'NEEON_INC_DIR',     NEEON_BASE_DIR . 'inc/' );
	define( 'NEEON_VIEW_DIR',    NEEON_INC_DIR . 'views/' );
	define( 'NEEON_LIB_DIR',     NEEON_BASE_DIR . 'lib/' );
	define( 'NEEON_WID_DIR',     NEEON_INC_DIR . 'widgets/' );
	define( 'NEEON_PLUGINS_DIR', NEEON_INC_DIR . 'plugins/' );
	define( 'NEEON_MODULES_DIR', NEEON_INC_DIR . 'modules/' );
	define( 'NEEON_ASSETS_DIR',  NEEON_BASE_DIR . 'assets/' );
	define( 'NEEON_CSS_DIR',     NEEON_ASSETS_DIR . 'css/' );
	define( 'NEEON_JS_DIR',      NEEON_ASSETS_DIR . 'js/' );
	define( 'NEEON_WOO_DIR',     NEEON_BASE_DIR . 'woocommerce/' );

	// URL
	define( 'NEEON_BASE_URL',    get_template_directory_uri(). '/' );
	define( 'NEEON_ASSETS_URL',  NEEON_BASE_URL . 'assets/' );
	define( 'NEEON_CSS_URL',     NEEON_ASSETS_URL . 'css/' );
	define( 'NEEON_JS_URL',      NEEON_ASSETS_URL . 'js/' );
	define( 'NEEON_IMG_URL',     NEEON_ASSETS_URL . 'img/' );
	define( 'NEEON_LIB_URL',     NEEON_BASE_URL . 'lib/' );
	
	// icon trait Plugin Activation
	require_once NEEON_INC_DIR . 'icon-trait.php';
	// Includes
	require_once NEEON_INC_DIR . 'helper-functions.php';
	require_once NEEON_INC_DIR . 'neeon.php';
	require_once NEEON_INC_DIR . 'general.php';
	require_once NEEON_INC_DIR . 'ajax-tab.php'; 
	require_once NEEON_INC_DIR . 'ajax-loadmore.php'; 
	require_once NEEON_INC_DIR . 'scripts.php';
	require_once NEEON_INC_DIR . 'template-vars.php';
	require_once NEEON_INC_DIR . 'includes.php';
	require_once NEEON_INC_DIR . 'lc-helper.php';
	require_once NEEON_INC_DIR . 'lc-utility.php';

	// Includes Modules
	require_once NEEON_MODULES_DIR . 'rt-post-related.php';
	require_once NEEON_MODULES_DIR . 'rt-team-related.php';
	require_once NEEON_MODULES_DIR . 'rt-news-ticker.php';
	require_once NEEON_MODULES_DIR . 'rt-breadcrumbs.php';

	// TGM Plugin Activation
	require_once NEEON_LIB_DIR . 'class-tgm-plugin-activation.php';
	require_once NEEON_INC_DIR . 'tgm-config.php';

	add_editor_style( 'style-editor.css' );

	// Update Breadcrumb Separator
	add_action('bcn_after_fill', 'neeon_hseparator_breadcrumb_trail', 1);
	function neeon_hseparator_breadcrumb_trail($object){
		$object->opt['hseparator'] = '<span class="dvdr"> <i class="fas fa-angle-right"></i> </span>';
		return $object;
	}
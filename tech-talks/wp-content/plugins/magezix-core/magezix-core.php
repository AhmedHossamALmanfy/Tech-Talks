<?php
/*
Plugin Name: Magezix Core
Plugin URI: https://themeforest.net/user/themexriver
Description: After install the Magezix WordPress Theme, you must need to install this "Magezix Core" first to get all functions of Magezix WP Theme.
Author: Raziul Islam
Author URI: http://themexriver.com/
Version: 1.0.7
Text Domain: magezix-core
*/
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'MAGEZIX_VERSION', '1.0' );
define( 'MAGEZIX_DIR_PATH',plugin_dir_path(__FILE__) );
define( 'MAGEZIX_DIR_URL',plugin_dir_url(__FILE__) );
define( 'MAGEZIX_INC_PATH', MAGEZIX_DIR_PATH . '/inc' );
define( 'MAGEZIX_PLUGIN_IMG_PATH', MAGEZIX_DIR_URL . '/assets/img' );

function magezix_plugin_load_textdomain() {
    load_plugin_textdomain( 'magezix-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'magezix_plugin_load_textdomain' );

/**
 * Css Framework Load
 */
if ( file_exists(MAGEZIX_DIR_PATH.'/lib/codestar-framework/codestar-framework.php') ) {
    require_once  MAGEZIX_DIR_PATH.'/lib/codestar-framework/codestar-framework.php';
}

// Load Script
function magezix_frontend_scripts() {
    wp_enqueue_style( 'magezix-admin-style', MAGEZIX_DIR_URL . "assets/css/admin-style.css");
}
add_action( 'admin_enqueue_scripts', 'magezix_frontend_scripts' );

/**
 * Post Widget With Thumbnail
 */
function magezix_cw_wisget(){
    register_widget( 'Magezix_Social_Icons' );
    register_widget( 'Magezix_Recent_Posts' );
    register_widget( 'Magezix_Footer_Recent_Posts' );
    register_widget( 'Magezix_Category_List' );
    register_widget( 'Magezix_Category_List' );
}
add_action('widgets_init', 'magezix_cw_wisget');



function magezix_de_reg() {
    wp_deregister_style( 'elementor-icons-shared-0' );
}
add_action( 'wp_enqueue_scripts', 'magezix_de_reg' );

/**
 * Megamenu Functions
 */
if (!class_exists('EFramework_MegaMenu_Register')) {
    require_once MAGEZIX_INC_PATH . '/mega-menu/class-megamenu.php';
    EFramework_MegaMenu_Register::get_instance();
}

include_once MAGEZIX_INC_PATH . "/custom-widget/social-icon.php";
include_once MAGEZIX_INC_PATH . "/custom-widget/recent-post.php";
include_once MAGEZIX_INC_PATH . "/custom-widget/category-list.php";
include_once MAGEZIX_INC_PATH . "/custom-widget/footer-recent-post.php";
include_once MAGEZIX_INC_PATH . "/options/post-taxonomy-metabox.php";
include_once MAGEZIX_INC_PATH . "/options/theme-metabox.php";
include_once MAGEZIX_INC_PATH . "/options/theme-option.php";
include_once MAGEZIX_INC_PATH . "/helper.php";
include_once MAGEZIX_DIR_PATH . "/elementor/elementor-init.php";
// include_once MAGEZIX_DIR_PATH . "/demo-import/functions.php";
// include_once MAGEZIX_DIR_PATH . "/demo-import/inc/MagezixLicense.php";

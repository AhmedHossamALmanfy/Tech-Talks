<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $pagenow;

function ta_welcome_page() {
    require_once 'tf-welcome.php';
}

function ta_documentations_page() {
    require_once 'tf-documentations.php';
}

function ta_admin_menu() {
    if ( current_user_can( 'edit_theme_options' ) ) {
        add_menu_page(
        ''.ta_theme_name().'',
        ''.ta_theme_name().'',
        'administrator',
        'tf-admin-menu',
        'ta_welcome_page',
        'dashicons-smiley', 4 );
        add_submenu_page( 'tf-admin-menu', XRIVER_CORE_TEXT_DOMAIN, esc_html__( 'Welcome', XRIVER_CORE_TEXT_DOMAIN ), 'administrator', 'tf-admin-menu', 'ta_welcome_page' );
    }
}
add_action( 'admin_menu', 'ta_admin_menu' );

function ta_demo_importer_function() {
    admin_url( 'admin.php?page=tf-demo-importer' );
}

// if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

//     wp_redirect(admin_url("admin.php?page=tf-documentations"));

// }
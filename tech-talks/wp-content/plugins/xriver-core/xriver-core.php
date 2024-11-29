<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Plugin Name: Xriver Core
 * Plugin URI: https://themexriver.com/
 * Description: Xriver Core is a reliable and feature-rich WordPress plugin developed by ThemeXriver.
 * Version: 1.0.7
 * Author: ThemeXriver
 * Author URI: https://themexriver.com/
 * Text Domain: xriver-core
 */

define( 'XRIVER_CORE_VER', '1.0.0' );
define( 'XRIVER_CORE_DIR', plugin_dir_path( __FILE__ ) );
define( 'XRIVER_CORE_URL', plugin_dir_url( __FILE__ ) );
define( 'TA_ASSETS', trailingslashit( XRIVER_CORE_URL . 'assets' ) );

define( 'XRIVER_CORE_TEXT_DOMAIN', 'tf-companion' );
define( 'XRIVER_CORE_PLUGIN_ACTIVED', in_array( 'xriver-core/xriver-core.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

final class Theme_Companion {

    private static $instance;

    function __construct() {

        //require_once XRIVER_CORE_DIR . '/inc/custom-post.php';

        //require_once XRIVER_CORE_DIR . '/inc/acf-meta-field.php';
        //require_once XRIVER_CORE_DIR . '/classes/class-demo-importer.php';
        /**
         * widgets
         */
        // require_once XRIVER_CORE_DIR . '/widgets/tc-info-widget.php';
        // require_once XRIVER_CORE_DIR . '/widgets/tc-contact-info-widget-2.php';
        // require_once XRIVER_CORE_DIR . '/widgets/tc-latest-posts-footer.php';
        // require_once XRIVER_CORE_DIR . '/widgets/tc-social-links-widget.php';
        // require_once XRIVER_CORE_DIR . '/widgets/tc-top-products.php';
        // require_once XRIVER_CORE_DIR . '/widgets/tc-subscriber-widget.php';
        // require_once XRIVER_CORE_DIR . '/widgets/tc-about-info-widget.php';
        // require_once XRIVER_CORE_DIR . '/widgets/tc-contact-info-widget.php';
        // require_once XRIVER_CORE_DIR . '/widgets/tc-latest-posts-sidebar.php';

        if ( !class_exists( 'Alpha_MegaMenu_Register' ) ) {
            require_once XRIVER_CORE_DIR . 'classes/class-megamenu.php';
            Alpha_MegaMenu_Register::get_instance();
        }

        add_filter( 'template_include', [$this, '_custom_template_include'] );
    }

    public static function instance() {

        if ( !isset( self::$instance ) && !( self::$instance instanceof Theme_Companion ) ) {
            self::$instance = new Theme_Companion;
        }
        return self::$instance;
    }

    public function _custom_template_include( $template ) {
        $post_types = tc_custom_post_types();
        foreach ( $post_types as $post_type => $fields ) {
            if ( is_singular( $post_type ) ) {
                return $this->_get_custom_template( 'single-' . $post_type . '.php' );
            }
        }
        return $template;

    }

    public function _get_custom_template( $template ) {
        if ( $theme_file = locate_template( [$template] ) ) {
            $file = $theme_file;
        } else {
            $file = XRIVER_CORE_DIR . 'template/' . $template;
        }
        return apply_filters( __FUNCTION__, $file, $template );
    }

}

function Theme_Companion() {

    return Theme_Companion::instance();
}

Theme_Companion();

if ( file_exists( XRIVER_CORE_DIR . '/admin/admin-init.php' ) ) {
    require_once XRIVER_CORE_DIR . '/admin/admin-init.php';
}

function ta_enqueue_custom_admin_style() {
    wp_register_style( 'custom_wp_admin_css', XRIVER_CORE_URL . 'assets/css/admin.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'ta_enqueue_custom_admin_style' );

// custom admin script
function ta_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script( 'xpress-main', XRIVER_CORE_URL . 'assets/js/main.js', ['jquery'], false, true );
}
add_action( 'admin_enqueue_scripts', 'ta_admin_scripts' );

/**
 *
 */
function tc_custom_post_types() {
    return [
        'tf-mega-menu' => ['title' => 'Mega Menu', 'plural_title' => 'Mega Menus', 'rewrite' => 'tf-mega-menu', 'menu_icon' => 'dashicons-align-center'],
    ];
}

add_filter( 'alpha_custom_post_type', 'tc_custom_post_types' );

/**
 *
 */
function tc_custom_taxonomies() {
    return [
        'movie-categories' => [
            'title'        => 'Movie Category',
            'plural_title' => 'Movie Categories',
            'rewrite'      => 'movie-cat',
            'post_type'    => 'tc-movie',
        ],
    ];
}

add_filter( 'custom_ta_companion_taxonomies', 'tc_custom_taxonomies' );

/**
 * taxonomy category
 */
function tc_get_terms( $id, $tax ) {
    $terms = get_the_terms( get_the_ID(), $tax );
    $list = '';
    if ( $terms && !is_wp_error( $terms ) ):
        $i = 1;
        $cats_count = count( $terms );
        foreach ( $terms as $term ) {
            $exatra = ( $cats_count > $i ) ? ', ' : '';
            $list .= $term->name . $exatra;
            $i++;
        }
    endif;
    return trim( $list, ',' );
}

// post scial share
function hoom_social_share() {
    $html = '';

    $html .= '
    <div class="tf-social-links tf-social-links__self-bg d-flex align-items-center">
        <a class="fb" href="#0"><i class="fab fa-facebook-f"></i></a>
        <a class="tw" href="#0"><i class="fab fa-twitter"></i></a>
        <a class="ln" href="#0"><i class="fab fa-linkedin-in"></i></a>
        <a class="yt" href="#0"><i class="fab fa-instagram"></i></a>
    </div>
    ';

    print $html;
}

// required files
require_once XRIVER_CORE_DIR . '/element-init.php';
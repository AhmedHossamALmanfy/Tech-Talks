<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Plugin; 


function neeon_get_maybe_rtl( $filename ){
	$file = get_template_directory_uri() . '/assets/';
	if ( is_rtl() ) {
		return $file . 'rtl-css/' . $filename;
	}
	else {
		return $file . 'css/' . $filename;
	}
}
add_action( 'wp_enqueue_scripts','neeon_enqueue_high_priority_scripts', 1500 );
function neeon_enqueue_high_priority_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'rtlcss', NEEON_CSS_URL . 'rtl.css', array(), NEEON_VERSION );
	}
}
//elementor animation dequeue
add_action('elementor/frontend/after_enqueue_scripts', function(){
    wp_deregister_style( 'e-animations' );
    wp_dequeue_style( 'e-animations' );
});

add_action( 'wp_enqueue_scripts', 'neeon_register_scripts', 12 );
if ( !function_exists( 'neeon_register_scripts' ) ) {
	function neeon_register_scripts(){
		wp_deregister_style( 'font-awesome' );
        wp_deregister_style( 'layerslider-font-awesome' );
        wp_deregister_style( 'yith-wcwl-font-awesome' );

		/*CSS*/
		// animate CSS	
		wp_register_style( 'magnific-popup',     neeon_get_maybe_rtl('magnific-popup.css'), array(), NEEON_VERSION );		
		wp_register_style( 'animate',        	 neeon_get_maybe_rtl('animate.min.css'), array(), NEEON_VERSION );

		/*JS*/
		// magnific popup
		wp_register_script( 'magnific-popup',    NEEON_JS_URL . 'jquery.magnific-popup.min.js', array( 'jquery' ), NEEON_VERSION, true );

		// theia sticky
		wp_register_script( 'theia-sticky',    	 NEEON_JS_URL . 'theia-sticky-sidebar.min.js', array( 'jquery' ), NEEON_VERSION, true );
		
		// parallax scroll js
		wp_register_script( 'rt-parallax',   	 NEEON_JS_URL . 'rt-parallax.js', array( 'jquery' ), NEEON_VERSION, true );
		
		// wow js
		wp_register_script( 'rt-wow',   		 NEEON_JS_URL . 'wow.min.js', array( 'jquery' ), NEEON_VERSION, true );

		// isotope js
		wp_register_script( 'isotope-pkgd',      NEEON_JS_URL . 'isotope.pkgd.min.js', array( 'jquery' ), NEEON_VERSION, true );		
		wp_register_script( 'swiper-min',        NEEON_JS_URL . 'swiper.min.js', array( 'jquery' ), NEEON_VERSION, true );

		// color mode js
		wp_register_script( 'color-mode',        NEEON_JS_URL . 'color-mode.js', array( 'jquery' ), NEEON_VERSION, true );
		
	}
}

add_action( 'wp_enqueue_scripts', 'neeon_enqueue_scripts', 25 );
if ( !function_exists( 'neeon_enqueue_scripts' ) ) {
	function neeon_enqueue_scripts() {
		$dep = array( 'jquery' );
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'neeon-gfonts', 	NeeonTheme_Helper::fonts_url(), array(), NEEON_VERSION );
		// Bootstrap CSS  //@rtl
		wp_enqueue_style( 'bootstrap', 			neeon_get_maybe_rtl('bootstrap.min.css'), array(), NEEON_VERSION );
		
		// Flaticon CSS
		wp_enqueue_style( 'flaticon-neeon',    NEEON_ASSETS_URL . 'fonts/flaticon-neeon/flaticon.css', array(), NEEON_VERSION );
		
		elementor_scripts();
		//Video popup
		wp_enqueue_style( 'magnific-popup' );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',       NEEON_CSS_URL . 'font-awesome.min.css', array(), NEEON_VERSION );
		// animate CSS
		wp_enqueue_style( 'animate',            neeon_get_maybe_rtl('animate.min.css'), array(), NEEON_VERSION );
		// main CSS // @rtl
		wp_enqueue_style( 'neeon-default',    	neeon_get_maybe_rtl('default.css'), array(), NEEON_VERSION );
		// vc modules css
		wp_enqueue_style( 'neeon-elementor',   neeon_get_maybe_rtl('elementor.css'), array(), NEEON_VERSION );
			
		// Style CSS
		wp_enqueue_style( 'neeon-style',     	neeon_get_maybe_rtl('style.css'), array(), NEEON_VERSION );
		
		// Template Style
		wp_add_inline_style( 'neeon-style',   	neeon_template_style() );

		/*JS*/
		// bootstrap js
		wp_enqueue_script( 'bootstrap',         NEEON_JS_URL . 'bootstrap.min.js', array( 'jquery' ), NEEON_VERSION, true );
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// color mode
		if ( NeeonTheme::$options['color_mode'] ) {
            wp_enqueue_script('color-mode');
        }

        //audio media
        if ( is_singular() ) {
	        wp_enqueue_style(  'wp-mediaelement');
	        wp_enqueue_script( 'wp-mediaelement' );
	    }

		// ticker js
		wp_enqueue_script( 'news-ticker',       NEEON_JS_URL . 'jquery.ticker.js', array( 'jquery' ), NEEON_VERSION, true );
		
		wp_enqueue_script( 'theia-sticky' );
		wp_enqueue_script( 'magnific-popup' );
		wp_enqueue_script( 'rt-wow' );
		wp_enqueue_script( 'rt-parallax' );
		wp_enqueue_script( 'isotope-pkgd' );
		wp_enqueue_script( 'swiper-min' );
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'neeon-main',    	NEEON_JS_URL . 'main.js', $dep , NEEON_VERSION, true );
		
		// localize script
		$neeon_localize_data = array(
			'stickyMenu' 	=> NeeonTheme::$options['sticky_menu'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">' . '</a>',
			'extraOffset' => NeeonTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => NeeonTheme::$options['sticky_menu'] ? 52 : 0,

			//ticker control
			'tickerTitleText' => NeeonTheme::$options['ticker_title_text'] ? NeeonTheme::$options['ticker_title_text'] : 'TRENDING',
			'tickerDelay' => NeeonTheme::$options['ticker_delay'] ? NeeonTheme::$options['ticker_delay'] : 2000,
			'tickerSpeed' => NeeonTheme::$options['ticker_speed'] ? NeeonTheme::$options['ticker_speed'] : 0.10,
			'tickerStyle' => NeeonTheme::$options['ticker_style'] ? NeeonTheme::$options['ticker_style'] : 'reveal',
			'rtl' => is_rtl()?'rtl':'ltr',
			
			// Ajax
			'ajaxURL' => admin_url('admin-ajax.php'),
			'post_scroll_limit' => NeeonTheme::$options['post_scroll_limit'],
			'nonce' => wp_create_nonce( 'neeon-nonce' )
		);
		wp_localize_script( 'neeon-main', 'neeonObj', $neeon_localize_data );
	}	
}

function elementor_scripts() {
	
	if ( !did_action( 'elementor/loaded' ) ) {
		return;
	}
	
	if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		// do stuff for preview		
		wp_enqueue_script( 'rt-wow' );
	} 
}

add_action( 'wp_enqueue_scripts', 'neeon_high_priority_scripts', 1500 );
if ( !function_exists( 'neeon_high_priority_scripts' ) ) {
	function neeon_high_priority_scripts() {
		// Dynamic style
		NeeonTheme_Helper::dynamic_internal_style();
	}
}

function neeon_template_style(){
	ob_start();
	?>
	
	.entry-banner {
		<?php if ( NeeonTheme::$bgtype == 'bgcolor' ): ?>
			background-color: <?php echo esc_html( NeeonTheme::$bgcolor );?>;
		<?php else: ?>
			background: url(<?php echo esc_url( NeeonTheme::$bgimg );?>) no-repeat scroll center bottom / cover;
		<?php endif; ?>
	}

	.content-area {
		padding-top: <?php echo esc_html( NeeonTheme::$padding_top );?>px; 
		padding-bottom: <?php echo esc_html( NeeonTheme::$padding_bottom );?>px;
	}

	<?php if( isset( NeeonTheme::$pagebgcolor ) || isset( NeeonTheme::$pagebgimg ) ) { ?>
	#page .content-area {
		background-image: url( <?php echo NeeonTheme::$pagebgimg; ?> );
		background-color: <?php echo NeeonTheme::$pagebgcolor; ?>;
	}
	<?php } ?>

	.error-page-area {		 
		background-color: <?php echo esc_html( NeeonTheme::$options['error_bodybg_color'] );?>;
	}
	
	<?php
	return ob_get_clean();
}

function load_custom_wp_admin_script_gutenberg() {
	wp_enqueue_style( 'neeon-gfonts', NeeonTheme_Helper::fonts_url(), array(), NEEON_VERSION );
	// font-awesome CSS
	wp_enqueue_style( 'font-awesome',       NEEON_CSS_URL . 'font-awesome.min.css', array(), NEEON_VERSION );
	// Flaticon CSS
	wp_enqueue_style( 'flaticon-neeon',    NEEON_ASSETS_URL . 'fonts/flaticon-neeon/flaticon.css', array(), NEEON_VERSION );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script_gutenberg', 1 );

function load_custom_wp_admin_script() {
	wp_enqueue_style( 'neeon-admin-style',  NEEON_CSS_URL . 'admin-style.css', false, NEEON_VERSION );
	wp_enqueue_script( 'neeon-admin-main',  NEEON_JS_URL . 'admin.main.js', false, NEEON_VERSION, true );
	
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script' );

/*Topbar menu function*/
if ( !function_exists( 'neeon_top_menu' ) ) {
	function neeon_top_menu() {
	    $menus = wp_get_nav_menus();
	    if(!empty($menus)){
	      	$menu_links = array();
	      	foreach ($menus as $key => $value) {
	        	$menu_links[$value->slug] = $value->name;  
	      	}
	      	return $menu_links;
	    }
	}
}

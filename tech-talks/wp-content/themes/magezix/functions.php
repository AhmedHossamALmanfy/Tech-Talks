<?php
/**
 * Magezix functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Magezix
 */

/**
* Define Dir
*/
define( 'MAGEZIX_THEME_DRI', get_template_directory() );
define( 'MAGEZIX_THEME_URI', get_template_directory_uri() );
define( 'MAGEZIX_CSS_PATH', MAGEZIX_THEME_URI . '/assets/css' );
define( 'MAGEZIX_JS_PATH', MAGEZIX_THEME_URI . '/assets/js' );
define( 'MAGEZIX_ICON_PATH', MAGEZIX_THEME_URI . '/assets/fonts/fontawesome/css' );
define( 'MAGEZIX_IMG_PATH', MAGEZIX_THEME_URI . '/assets/images' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function magezix_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Magezix, use a find and replace
		* to change 'magezix' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'magezix', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	remove_theme_support( 'widgets-block-editor' );


	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );
	// custom image Size
	add_image_size( 'magezix-991x524', 991, 524, true );
	add_image_size( 'magezix-991x564', 991, 564, true );
	add_image_size( 'magezix-362x527', 362, 527, true );
	add_image_size( 'magezix-1355x615', 1355, 615, true );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' 		=> esc_html__( 'Primary', 'magezix' ),
			'category_menu' => esc_html__( 'Category Menu', 'magezix' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);


	// add support for post formats
	add_theme_support('post-formats', [
		'standard', 'image', 'video'
	]);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'magezix_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_theme_support( 'woocommerce' );
//	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'magezix_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function magezix_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'magezix_content_width', 640 );
}
add_action( 'after_setup_theme', 'magezix_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magezix_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'magezix' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'magezix' ),
			'before_widget' => '<section id="%1$s" class="widget mt-40 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title mb-20"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	//Footer Widget Start Here
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer One', 'magezix' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add Footer widgets here.', 'magezix' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Two', 'magezix' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add Footer widgets here.', 'magezix' ),
			'before_widget' => '<div class="footer__widget col-lg-3 col-md-6 mt-40"> <div class="quick-links">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h2 class="title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Three', 'magezix' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add Footer widgets here.', 'magezix' ),
			'before_widget' => '<div class="footer__widget col-lg-3 col-md-6 mt-40"><div class="category">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h2 class="title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Four', 'magezix' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add Footer widgets here.', 'magezix' ),
			'before_widget' => '<div class="footer__widget col-lg-3 col-md-6 mt-40">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'magezix_widgets_init' );

/**
 *Google Font Load
 */
if ( ! function_exists( 'magezix_fonts_url' ) ) :
    /**
     * Register Google fonts for Blessing.
     */
    function magezix_fonts_url() {
        $fonts_url     = '';
        $font_families = array();
        $subsets       = 'latin';


		if ( 'off' !== _x( 'on', 'Roboto: on or off', 'magezix' ) ) {
            $font_families[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
        }

        if ( 'off' !== _x( 'on', 'Jost: on or off', 'magezix' ) ) {
            $font_families[] = 'Jost:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
        }

		if ( 'off' !== _x( 'on', 'Yeseva One: on or off', 'magezix' ) ) {
            $font_families[] = 'Yeseva One:400';
        }

        if ( $font_families ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $fonts_url );
    }
endif;

/**
 * Enqueue scripts and styles.
 */
function magezix_scripts() {
	// Add custom fonts, used in the taffees stylesheet.
	wp_enqueue_style( 'magezix-custom-fonts', magezix_fonts_url(), array(), null );

	//Magezix Stylesheet Load
	wp_enqueue_style( 'bootstrap', MAGEZIX_CSS_PATH . '/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome', MAGEZIX_CSS_PATH . '/fontawesome.css' );
	wp_enqueue_style( 'mag-animate', MAGEZIX_CSS_PATH . '/animate.css' );
	wp_enqueue_style( 'metisMenu', MAGEZIX_CSS_PATH . '/metisMenu.css' );
	wp_enqueue_style( 'mag-flaticon', MAGEZIX_CSS_PATH . '/flaticon.css' );
	wp_enqueue_style( 'uikit-min', MAGEZIX_CSS_PATH . '/uikit.min.css' );
	wp_enqueue_style( 'mCustomScrollbar', MAGEZIX_CSS_PATH . '/jquery.mCustomScrollbar.min.css' );
	wp_enqueue_style( 'owl-carousel', MAGEZIX_CSS_PATH . '/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-carousel', MAGEZIX_CSS_PATH . '/owl.carousel.min.css' );
	wp_enqueue_style( 'magnific-popup', MAGEZIX_CSS_PATH . '/magnific-popup.css' );
	wp_enqueue_style( 'magezix-post-style', MAGEZIX_CSS_PATH . '/post-style.css' );
	wp_enqueue_style( 'magezix-woocommerce-style', MAGEZIX_CSS_PATH . '/woocommerce.css' );
	wp_enqueue_style( 'magezix-main', MAGEZIX_CSS_PATH . '/main.css' );
	if (is_rtl()) {
		wp_enqueue_style( 'magezix-rtl', get_template_directory_uri() . '/assets/css/rtl.css' );
	}

	wp_enqueue_style( 'magezix-style', get_stylesheet_uri(), array(), '1.0' );

	//Magezix Scripts Load
	wp_enqueue_script( 'bootstrap', MAGEZIX_JS_PATH . '/bootstrap.bundle.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'owl-carousel', MAGEZIX_JS_PATH . '/owl.carousel.min.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'backToTop', MAGEZIX_JS_PATH . '/backToTop.js', array('jquery'), null, true );
	wp_enqueue_script( 'uikit-min', MAGEZIX_JS_PATH . '/uikit.min.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'resize-sensor', MAGEZIX_JS_PATH . '/resize-sensor.min.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'theia-sticky-sidebar', MAGEZIX_JS_PATH . '/theia-sticky-sidebar.min.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'wow-min', MAGEZIX_JS_PATH . '/wow.min.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'touchspin', MAGEZIX_JS_PATH . '/touchspin.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'jquery-mCustomScrollbar', MAGEZIX_JS_PATH . '/jquery.mCustomScrollbar.concat.min.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'jquery-magnific-popup', MAGEZIX_JS_PATH . '/jquery.magnific-popup.min.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'metisMenu', MAGEZIX_JS_PATH . '/metisMenu.min.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'magezix-main', MAGEZIX_JS_PATH . '/main.js', array('jquery'), '1.0', true );


	// localize script
	$magezix_localize_data = array(

		// Ajax
		'ajaxURL' => admin_url('admin-ajax.php'),
		'post_scroll_limit' => 5,
		'nonce' => wp_create_nonce( 'magezix-nonce' )
	);
	wp_localize_script( 'magezix-main', 'magezixObj', $magezix_localize_data );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'magezix_scripts' );

/**
 * Implement the Custom Header feature.
 */
if ( file_exists( MAGEZIX_THEME_DRI.'/inc/cs-framework-functions.php' ) ) {
	require_once  MAGEZIX_THEME_DRI.'/inc/cs-framework-functions.php';
}


/**
 * Implement the Custom Header feature.
 */
require MAGEZIX_THEME_DRI . '/inc/class-wp-magezix-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require MAGEZIX_THEME_DRI . '/inc/custom-header.php';

/**
* Custom template tags for this theme.
*/
require MAGEZIX_THEME_DRI . '/inc/magezix-functions.php';

/**
 * Demo Import Functions
 */
require MAGEZIX_THEME_DRI . '/lib/ocdi/functions.php';

/**
 * Custom template tags for this theme.
 */
require MAGEZIX_THEME_DRI . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require MAGEZIX_THEME_DRI . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require MAGEZIX_THEME_DRI . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require MAGEZIX_THEME_DRI . '/lib/plugin-activation.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require MAGEZIX_THEME_DRI . '/inc/jetpack.php';
}
/**
* One Click Demo Import
*/
require MAGEZIX_THEME_DRI . '/inc/custom-style.php';

/**
 * Megamenu Enable Hook
 *
 * @return void
 */
function magezix_megamenu_enable() {
	return true;
}
add_filter( 'th_enable_megamenu', 'magezix_megamenu_enable' );



function magezix_single_scroll_post() {
	$current_post = isset( $_POST['current_post'] ) ? absint( $_POST['current_post'] ) : 1;
	$cat_ids = isset( $_POST['cat_ids'] ) ? explode( ',', $_POST['cat_ids'] ) : [];

	ob_start();

	$args = [
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 1,
		'category__in' => $cat_ids,
		'offset' => $current_post,
		'ignore_sticky_posts' => 1,
	];

	$query = new WP_Query( $args );

	global $withcomments;
	$withcomments = true;

	while ( $query->have_posts() ) {
		$query->the_post();	?>
		<div class="blog-post-wrap-all mt-50">
                        <div class="blog-post-wrap ">
                            <article id="post-<?php the_ID(); ?>"  <?php post_class('post-details'); ?>>
                                <?php magezix_category_name();?>
                                <?php
                                    the_title( '<h2>', '</h2>' );
                                ?>
                                <div class="post-details__meta ul_li_between mb-25 mt-none-30">
                                    <ul class="post-meta post-meta--4 style-2 ul_li mt-30">
                                        <li>
                                            <div class="post-meta__author ul_li">
                                                <div class="avatar">
                                                    <?php magezix_main_author_avatars(22);?>
                                                </div>
                                                <span><?php the_author()?>
                                                    <?php
                                                    if(function_exists('magezix_ready_time_ago')){ ?>
                                                        / <span class="year"><?php echo magezix_ready_time_ago();?></span>
                                                    <?php }
                                                    ?>
                                                </span>
                                            </div>
                                        </li>
                                        <li class="magezix-comment"><i class="far fa-comment"></i><?php echo esc_html(get_comments_number());?></li>
                                        <li><i class="far fa-clock"></i><?php echo magezix_reading_time();?></li>
                                    </ul>
                                    <?php
                                        if(function_exists('magezix_post_share')){
                                            magezix_post_share();
                                        }
                                    ?>
                                </div>
                                <?php if(has_post_thumbnail()):?>
                                <figure class="post-thumb ajx-load mb-30">
                                    <?php the_post_thumbnail('full');?>
                                </figure>
                                <?php endif;?>

                                <div class="entry-content">
                                    <?php
                                    the_content(
                                        sprintf(
                                            wp_kses(
                                                /* translators: %s: Name of current post. Only visible to screen readers */
                                                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'magezix' ),
                                                array(
                                                    'span' => array(
                                                        'class' => array(),
                                                    ),
                                                )
                                            ),
                                            wp_kses_post( get_the_title() )
                                        )
                                    );

                                    wp_link_pages(
                                        array(
                                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magezix' ),
                                            'after'  => '</div>',
                                        )
                                    );
                                    ?>
                                </div><!-- .entry-content -->
                                <div class="post-tags-share mt-20 mb-55">
                                    <div class="tags d-flex align-items-center mt-30">
                                        <ul class="list-unstyled ul_li">
                                            <?php magezix_entry_footer();?>
                                        </ul>
                                    </div>
                                    <?php
                                        if(function_exists('magezix_post_two_share')){
                                            magezix_post_two_share();
                                        }
                                    ?>
                                </div>
                            </article>
                        </div>
                        <?php magezix_single_post_pagination();
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;?>
                    </div>

	<?php
	}


	$post_data = ob_get_clean();

	wp_send_json_success( $post_data );
}
add_action( 'wp_ajax_magezix_single_scroll_post', 'magezix_single_scroll_post' );
add_action( 'wp_ajax_nopriv_magezix_single_scroll_post', 'magezix_single_scroll_post' );





function custom_login_redirect() {
    global $pagenow;
    if( $pagenow == 'wp-login.php' && !is_user_logged_in() ) {
        wp_redirect( 'https://tech-talks.site/?page_id=3574' );
        exit();
    }
}
add_action('init', 'custom_login_redirect');


function exclude_page_from_menu($items, $args) {
    // ضع هنا الـ ID أو الـ slug الخاص بالصفحة التي تريد إخفاءها
    $page_id = 3583; // على سبيل المثال، ID الصفحة التي تريد إخفاءها
// https://tech-talks.site/?page_id=3583
    // تحقق مما إذا كان المستخدم غير مسجل الدخول
    if (!is_user_logged_in()) {
        foreach ($items as $key => $item) {
            if ($item->object_id == $page_id) {
                unset($items[$key]);
            }
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'exclude_page_from_menu', 10, 2);


<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !isset( $content_width ) ) {
	$content_width = 1200;
}

add_action('after_setup_theme', 'neeon_setup');
if ( !function_exists( 'neeon_setup' ) ) {
	function neeon_setup() {
		// Language
		load_theme_textdomain( 'neeon', NEEON_BASE_DIR . 'languages' );

		// Theme support
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		remove_theme_support('widgets-block-editor');
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'audio' ) );
		// for gutenberg support
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'Primary Color', 'neeon' ),
				'slug' => 'neeon-primary',
				'color' => '#2962ff',
			),
			array(
				'name' => esc_html__( 'Secondary Color', 'neeon' ),
				'slug' => 'neeon-secondary',
				'color' => '#0034c2',
			),
			array(
				'name' => esc_html__( 'dark gray', 'neeon' ),
				'slug' => 'neeon-button-dark-gray',
				'color' => '#333333',
			),
			array(
				'name' => esc_html__( 'light gray', 'neeon' ),
				'slug' => 'neeon-button-light-gray',
				'color' => '#a5a6aa',
			),
			array(
				'name' => esc_html__( 'white', 'neeon' ),
				'slug' => 'neeon-button-white',
				'color' => '#ffffff',
			),
		) );
		add_theme_support( 'editor-gradient-presets', array(
			array(
				'name'     => esc_html__( 'Gradient Color', 'neeon' ),
				'gradient' => 'linear-gradient(135deg, rgba(255, 0, 0, 1) 0%, rgba(252, 75, 51, 1) 100%)',
				'slug'     => 'neeon_gradient_color',
			),
		));	
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => esc_html__( 'Small', 'neeon' ),
				'size' => 12,
				'slug' => 'small'
			),
			array(
				'name' => esc_html__( 'Normal', 'neeon' ),
				'size' => 16,
				'slug' => 'normal'
			),
			array(
				'name' => esc_html__( 'Large', 'neeon' ),
				'size' => 36,
				'slug' => 'large'
			),
			array(
				'name' => esc_html__( 'Huge', 'neeon' ),
				'size' => 50,
				'slug' => 'huge'
			)
		) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support('editor-styles');	
		
		// Image sizes
		add_image_size( 'neeon-size1', 1296, 700, true );   	// fullimage, Blog List layout
		add_image_size( 'neeon-size2', 960, 520, true );    	// Blog Grid layout 3
		add_image_size( 'neeon-size3', 551, 431, true );    	// Blog Grid layout 2
		add_image_size( 'neeon-size4', 480, 504, true );    	// Blog Grid layout 1
		add_image_size( 'neeon-size5', 537, 512, true );    	// Tab 1,2
		add_image_size( 'neeon-size6', 450, 595, true );    	// Home 4 top addon
		add_image_size( 'neeon-size7', 160, 117, true );    	// sidebar image
		add_image_size( 'neeon-size8', 200, 200, true );    	// Squire image
		add_image_size( 'neeon-size9', 900, 600, true );    	// Left big image
		add_image_size( 'neeon-size10', 220, 175, true );    	// Right small image
		add_image_size( 'neeon-size11', 752, 878, true );    	// Left big image
		
		// Register menus
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary', 'neeon' ),
			'topright' => esc_html__( 'Header Right', 'neeon' ),
		) );		
	}
}

function neeon_theme_add_editor_styles() {
	add_editor_style( get_stylesheet_uri() );
}
add_action( 'admin_init', 'neeon_theme_add_editor_styles' );

function neeon_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'neeon_pingback_header' );

// Initialize Widgets
add_action( 'widgets_init', 'neeon_widgets_register' );
if ( !function_exists( 'neeon_widgets_register' ) ) {
	function neeon_widgets_register() {
		
		$footer_widget_titles1 = array(
			'1' => esc_html__( 'Footer (Style 1) 1', 'neeon' ),
			'2' => esc_html__( 'Footer (Style 1) 2', 'neeon' ),
			'3' => esc_html__( 'Footer (Style 1) 3', 'neeon' ),
			'4' => esc_html__( 'Footer (Style 1) 4', 'neeon' ),
		);	
		
		$footer_widget_titles2 = array(
			'1' => esc_html__( 'Footer (Style 2) 1', 'neeon' ),
			'2' => esc_html__( 'Footer (Style 2) 2', 'neeon' ),
			'3' => esc_html__( 'Footer (Style 2) 3', 'neeon' ),
			'4' => esc_html__( 'Footer (Style 2) 4', 'neeon' ),
		);

		$footer_widget_titles4 = array(
			'1' => esc_html__( 'Footer (Style 4) 1', 'neeon' ),
			'2' => esc_html__( 'Footer (Style 4) 2', 'neeon' ),
			'3' => esc_html__( 'Footer (Style 4) 3', 'neeon' ),
			'4' => esc_html__( 'Footer (Style 4) 4', 'neeon' ),
		);

		$footer_widget_titles5 = array(
			'1' => esc_html__( 'Footer (Style 5) 1', 'neeon' ),
			'2' => esc_html__( 'Footer (Style 5) 2', 'neeon' ),
			'3' => esc_html__( 'Footer (Style 5) 3', 'neeon' ),
			'4' => esc_html__( 'Footer (Style 5) 4', 'neeon' ),
		);

		$footer_widget_titles6 = array(
			'1' => esc_html__( 'Footer (Style 6) 1', 'neeon' ),
			'2' => esc_html__( 'Footer (Style 6) 2', 'neeon' ),
			'3' => esc_html__( 'Footer (Style 6) 3', 'neeon' ),
			'4' => esc_html__( 'Footer (Style 6) 4', 'neeon' ),
		);

		$footer_widget_titles8 = array(
			'1' => esc_html__( 'Footer (Style 8) 1', 'neeon' ),
			'2' => esc_html__( 'Footer (Style 8) 2', 'neeon' ),
			'3' => esc_html__( 'Footer (Style 8) 3', 'neeon' ),
			'4' => esc_html__( 'Footer (Style 8) 4', 'neeon' ),
		);

		// Register Widget Areas ( Common )
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'neeon' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="rt-widget-title-holder"><h3 class="widgettitle">',
			'after_title'   => '<span class="titledot"></span><span class="titleline"></span></h3></div>',
			) );
		
		
		if ( class_exists( 'WooCommerce' ) ) {
			register_sidebar( array(
				'name'          => 'Shop Sidebar',
				'id'            => 'shop-sidebar-1',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle">',
				'after_title'   => '</h3>',
			) );
		}
		
		register_sidebar( array(
			'name'          => esc_html__( 'Top Bar - Left', 'neeon' ),
			'id'            => 'topbar-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hidden">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Top Bar - Right', 'neeon' ),
			'id'            => 'topbar-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hidden">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Offcanvas Info', 'neeon' ),
			'id'            => 'offcanvas',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hidden">',
			'after_title'   => '</h3>',
		) );		
		/*footer 1 register*/
		if ( !empty(NeeonTheme::$options['footer_column_1']) ){
			$item_widget = NeeonTheme::$options['footer_column_1'];
		} else {
			$item_widget = 4;
		}		
		for ( $i = 1; $i <= $item_widget; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles1[$i],
				'id'            => 'footer-style-1-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle '. NeeonTheme::$footer_style .'">',
				'after_title'   => '</h3>',
			) );
		}
		/*footer 2 register*/
		if ( !empty(NeeonTheme::$options['footer_column_2']) ){
			$item_widget = NeeonTheme::$options['footer_column_2'];
		} else {
			$item_widget = 4;
		}		
		for ( $i = 1; $i <= $item_widget; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles2[$i],
				'id'            => 'footer-style-2-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle '. NeeonTheme::$footer_style .'">',
				'after_title'   => '</h3>',
			) );
		}
		/*footer 3 register*/
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Style 3', 'neeon' ),
			'id'            => 'footer-style-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle '. NeeonTheme::$footer_style .'">',
			'after_title'   => '</h3>',
		) );
		/*footer 4 register*/
		if ( !empty(NeeonTheme::$options['footer_column_4']) ){
			$item_widget = NeeonTheme::$options['footer_column_4'];
		} else {
			$item_widget = 3;
		}		
		for ( $i = 1; $i <= $item_widget; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles4[$i],
				'id'            => 'footer-style-4-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle '. NeeonTheme::$footer_style .'">',
				'after_title'   => '</h3>',
			) );
		}	
		/*footer 5 register*/
		if ( !empty(NeeonTheme::$options['footer_column_5']) ){
			$item_widget = NeeonTheme::$options['footer_column_5'];
		} else {
			$item_widget = 3;
		}		
		for ( $i = 1; $i <= $item_widget; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles5[$i],
				'id'            => 'footer-style-5-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle '. NeeonTheme::$footer_style .'">',
				'after_title'   => '</h3>',
			) );
		}		
		/*footer 6 register*/
		if ( !empty(NeeonTheme::$options['footer_column_6']) ){
			$item_widget = NeeonTheme::$options['footer_column_6'];
		} else {
			$item_widget = 3;
		}		
		for ( $i = 1; $i <= $item_widget; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles6[$i],
				'id'            => 'footer-style-6-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle '. NeeonTheme::$footer_style .'">',
				'after_title'   => '</h3>',
			) );
		}
		/*footer 7 register*/
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Style 7', 'neeon' ),
			'id'            => 'footer-style-7',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle '. NeeonTheme::$footer_style .'">',
			'after_title'   => '</h3>',
		) );
		/*footer 8 register*/
		if ( !empty(NeeonTheme::$options['footer_column_8']) ){
			$item_widget = NeeonTheme::$options['footer_column_8'];
		} else {
			$item_widget = 4;
		}		
		for ( $i = 1; $i <= $item_widget; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles8[$i],
				'id'            => 'footer-style-8-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle '. NeeonTheme::$footer_style .'">',
				'after_title'   => '</h3>',
			) );
		}	
		
	}
}
/*Allow HTML for the kses post*/
function neeon_kses_allowed_html($tags, $context) {
    switch($context) {
        case 'social':
            $tags = array(
                'a' => array('href' => array()),
                'b' => array()
            );
            return $tags;
		case 'allow_link':
            $tags = array(
                'a' => array(
                    'class' => array(),
                    'href'  => array(),
                    'rel'   => array(),
                    'title' => array(),
					'target' => array(),					
                ),
				'img' => array(
                    'alt'    => array(),
                    'class'  => array(),
                    'height' => array(),
                    'src'    => array(),
                    'srcset' => array(),
                    'width'  => array(),
                ),
                'b' => array()
            );
            return $tags;
		case 'allow_title':
            $tags = array(
				'a' => array(
                    'class' => array(),
                    'href'  => array(),
                    'rel'   => array(),
                    'title' => array(),
					'target' => array(),
                ),
                'span' => array(
                    'class' => array(),
                    'style' => array(),
                ),
                'b' => array()
            );
            return $tags;
			
        case 'alltext_allow':
            $tags = array(
                'a' => array(
                    'class' => array(),
                    'href'  => array(),
                    'rel'   => array(),
                    'title' => array(),
					'target' => array(),
                ),
                'abbr' => array(
                    'title' => array(),
                ),
                'b' => array(),
                'br' => array(),
                'blockquote' => array(
                    'cite'  => array(),
                ),
                'cite' => array(
                    'title' => array(),
                ),
                'code' => array(),
                'del' => array(
                    'datetime' => array(),
                    'title' => array(),
                ),
                'dd' => array(),
                'div' => array(
                    'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),
                ),
                'dl' => array(),
                'dt' => array(),
                'em' => array(),
                'h1' => array(
                	'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),),
                'h2' => array(
                	'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),),
                'h3' => array(
                	'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),),
                'h4' => array(
                	'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),),
                'h5' => array(
                	'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),),
                'h6' => array(
                	'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),
                ),
                'i' => array(
					'class' => array(),
				),
                'img' => array(
                    'alt'    => array(),
                    'class'  => array(),
                    'height' => array(),
                    'src'    => array(),
                    'srcset' => array(),
                    'width'  => array(),
                ),
                'li' => array(
                    'class' => array(),
                ),
                'ol' => array(
                    'class' => array(),
                ),
                'p' => array(
                    'class' => array(),
                ),
                'q' => array(
                    'cite' => array(),
                    'title' => array(),
                ),
                'span' => array(
                    'class' => array(),
                    'title' => array(),
                    'style' => array(),
                ),
                'strike' => array(),
                'strong' => array(),
                'ul' => array(
                    'class' => array(),
                ),
            );
            return $tags;
        default:
            return $tags;
    }
}
add_filter( 'wp_kses_allowed_html', 'neeon_kses_allowed_html', 10, 2);


/**
 * @param Wp_Query $query
 * @return mixed
 */
function advanced_search_query($query) {
    if($query->is_search()) {
        // category terms search.
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $query->set('tax_query', array(array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array($_GET['category']) )
            ));
        }    
    }
    return $query;
}
add_action('pre_get_posts', 'advanced_search_query', 1000);

/*social link to author profile page*/
add_action( 'show_user_profile', 'neeon_user_social_profile_fields' );
add_action( 'edit_user_profile', 'neeon_user_social_profile_fields' );

function neeon_user_social_profile_fields( $user ) { ?>

	<h3><?php esc_html_e( 'User Designation' , 'neeon' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="neeon_author_designation"><?php esc_html_e( 'Author Designation' , 'neeon' ); ?></label></th>
			<td><input type="text" name="neeon_author_designation" id="neeon_author_designation" value="<?php echo esc_attr( get_the_author_meta( 'neeon_author_designation', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Author Designation' , 'neeon' ); ?></span></td>
		</tr>
	</table>
	
	<h3><?php esc_html_e( 'Social profile information' , 'neeon' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="facebook"><?php esc_html_e( 'Facebook' , 'neeon' ); ?></label></th>
			<td><input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'neeon_facebook', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your facebook URL.' , 'neeon' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="twitter"><?php esc_html_e( 'Twitter' , 'neeon' ); ?></label></th>
			<td><input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'neeon_twitter', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Twitter username.' , 'neeon' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="linkedin"><?php esc_html_e( 'LinkedIn' , 'neeon' ); ?></label></th>
			<td><input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'neeon_linkedin', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your LinkedIn Profile' , 'neeon' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="instagram"><?php esc_html_e( 'Instagram' , 'neeon' ); ?></label></th>
			<td><input type="text" name="instagram" id="instagram" value="<?php echo esc_attr( get_the_author_meta( 'neeon_instagram', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Instagram Profile' , 'neeon' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="pinterest"><?php esc_html_e( 'Pinterest' , 'neeon' ); ?></label></th>
			<td><input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'neeon_pinterest', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Pinterest Profile' , 'neeon' ); ?></span></td>
		</tr>
	</table>
<?php }

add_action( 'personal_options_update', 'neeon_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'neeon_extra_profile_fields' );

function neeon_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'neeon_facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'neeon_twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'neeon_linkedin', $_POST['linkedin'] );
	update_user_meta( $user_id, 'neeon_instagram', $_POST['instagram'] );
	update_user_meta( $user_id, 'neeon_pinterest', $_POST['pinterest'] );
	update_user_meta( $user_id, 'neeon_author_designation', $_POST['neeon_author_designation'] );
}

/*find newest post/product with time*/
function neeon_is_new( $id ) {
	$now    = time();
	$published_date = get_post_time('U');
	$diff =  $now - $published_date;
	if ( $diff < 604800 ) { ?>
		<span class="new-post"><?php esc_html_e( 'New' , 'neeon' ); ?></span>
	<?php }
}

if( ! function_exists( 'neeon_post_img_src' )){
	function neeon_post_img_src( $size = 'neeon-size1' ){
		$post_id  = get_the_ID();
		if ( has_post_thumbnail( $post_id ) ) {			
			$image_id = get_post_thumbnail_id( $post_id );			
			$image    = wp_get_attachment_image_src( $image_id, $size );
			return $image[0];
		} else {
			return;
		}
	}
}

/*Post Time & time format*/
if( ! function_exists( 'neeon_get_time' )){

	function neeon_get_time( $return = false ){

		$post = get_post();
		
		# Date is disabled globally ----------
		if( NeeonTheme::$options['post_time_format'] == 'none' ){
			return false;
		}
		# Human Readable Post Dates ----------
		elseif(  NeeonTheme::$options['post_time_format'] == 'modern' ){

			$time_now  = current_time( 'timestamp' );
			$post_time = get_the_time( 'U' ) ;
			$since = sprintf( esc_html__( '%s ago' , 'neeon' ), human_time_diff( $post_time, $time_now ) );			
		}
		else{
			$since = get_the_date();
		}

		$post_time = '<span class="date meta-item"><span>'.$since.'</span></span>';

		if( $return ){
			return $post_time;
		}

		echo wp_kses( $post_time , 'alltext_allow' );
	}
}

function widgets_scripts( $hook ) {
    if ( 'widgets.php' != $hook ) {
        return;
    }
    wp_enqueue_style( 'wp-color-picker' );
	
}
add_action( 'admin_enqueue_scripts', 'widgets_scripts' );

/*blog post order*/
function neeon_blog_query($query) {
	$blog_query_order = NeeonTheme::$options['blog_query_order'] ?? 'default'; //'rand', 'date', 'title', 'comment_count'
	$blog_query_orderby = NeeonTheme::$options['blog_query_orderby'] ?? 'DESC';
	
    if( $blog_query_order !== 'default' && !is_admin() && $query->is_home() && $query->is_main_query() ){
        $query->set( 'orderby', $blog_query_order );
		$query->set( 'order', $blog_query_orderby );
    }
}
add_action( 'pre_get_posts', 'neeon_blog_query' );

/*Module: Last Post update Date*/
function neeon_last_update() { 

	$lastupdated_args = array(
		'orderby' => 'modified',
		'posts_per_page' => 1,
		'ignore_sticky_posts' => '1'
	);
 
	$lastupdated_loop = new WP_Query( $lastupdated_args );
	
	while( $lastupdated_loop->have_posts() )  {
		$lastupdated_loop->the_post();
		echo get_the_modified_date( 'M j, Y g:i a' );
	}	
	wp_reset_postdata();
}

/*
* for most use of the get_term cached 
* This is because all time it hits and single page provide data quickly
*/
function get_img( $img ){
	$img = get_stylesheet_directory_uri() . '/assets/img/' . $img;
	return $img;
}
function get_css( $file ){
	$file = get_stylesheet_directory_uri() . '/assets/css/' . $file . '.css';
	return $file;
}
function get_js( $file ){
	$file = get_stylesheet_directory_uri() . '/assets/js/' . $file . '.js';
	return $file;
}
function filter_content( $content ){
	// wp filters
	$content = wptexturize( $content );
	$content = convert_smilies( $content );
	$content = convert_chars( $content );
	$content = wpautop( $content );
	$content = shortcode_unautop( $content );

	// remove shortcodes
	$pattern= '/\[(.+?)\]/';
	$content = preg_replace( $pattern,'',$content );

	// remove tags
	$content = strip_tags( $content );

	return $content;
}

function get_current_post_content( $post = false ) {
	if ( !$post ) {
		$post = get_post();				
	}
	$content = has_excerpt( $post->ID ) ? $post->post_excerpt : $post->post_content;
	$content = filter_content( $content );
	return $content;
}

function cached_get_term_by( $field, $value, $taxonomy, $output = OBJECT, $filter = 'raw' ){
	// ID lookups are cached
	if ( 'id' == $field )
		return get_term_by( $field, $value, $taxonomy, $output, $filter );

	$cache_key = $field . '|' . $taxonomy . '|' . md5( $value );
	$term_id = wp_cache_get( $cache_key, 'get_term_by' );

	if ( false === $term_id ){
		$term = get_term_by( $field, $value, $taxonomy );
		if ( $term && ! is_wp_error( $term ) )
			wp_cache_set( $cache_key, $term->term_id, 'get_term_by' );
		else
			wp_cache_set( $cache_key, 0, 'get_term_by' ); // if we get an invalid value, let's cache it anyway
	} else {
		$term = get_term( $term_id, $taxonomy, $output, $filter );
	}

	if ( is_wp_error( $term ) )
		$term = false;

	return $term;
}

/*for avobe reason*/
function cached_get_term_link( $term, $taxonomy = null ){
	// ID- or object-based lookups already result in cached lookups, so we can ignore those.
	if ( is_numeric( $term ) || is_object( $term ) ){
		return get_term_link( $term, $taxonomy );
	}

	$term_object = cached_get_term_by( 'slug', $term, $taxonomy );
	return get_term_link( $term_object );
}


/*only to show the first category in the post - primary category*/
function neeon_if_term_exists( $term, $taxonomy = '', $parent = null ){
	if ( null !== $parent ){
		return term_exists( $term, $taxonomy, $parent );
	}

	if ( ! empty( $taxonomy ) ){
		$cache_key = $term . '|' . $taxonomy;
	}else{
		$cache_key = $term;
	}

	$cache_value = wp_cache_get( $cache_key, 'term_exists' );

	//term_exists frequently returns null, but (happily) never false
	if ( false  === $cache_value ){
		$term_exists = term_exists( $term, $taxonomy );
		wp_cache_set( $cache_key, $term_exists, 'term_exists' );
	}else{
		$term_exists = $cache_value;
	}

	if ( is_wp_error( $term_exists ) )
		$term_exists = null;

	return $term_exists;
}


// Head Script
if( !function_exists( 'neeon_head' ) ) {
	function neeon_head(){
		// Hide preloader if js is disabled
		echo '<noscript><style>#preloader{display:none;}</style></noscript>';
	}	
}
add_action( 'wp_head', 'neeon_head', 1 );

//find the post type function 
if ( ! function_exists ( 'neeon_post_type' ) ) {
	function neeon_post_type() {
		$neeon_post_type_var =get_post_type( get_the_ID());
		echo esc_html( $neeon_post_type_var );
	}
}

/*next previous post links*/
if ( !function_exists( 'neeon_post_links_next_prev' ) ) {
	function neeon_post_links_next_prev() { ?>
	<div class="divider post-navigation">
		<?php if ( !empty( get_next_post_link())){ ?>
			<div class="<?php if ( empty( get_previous_post_link())){ ?>-offset-md-6<?php } ?> <?php if ( is_rtl() ){ echo esc_attr( 'text-left' ); } else { echo esc_attr( 'text-left' ); } ?>">
				<div class="pad-lr-15">
					<span class="next-article"><i class="flaticon flaticon-previous"></i>
					<?php next_post_link( '%link', esc_html__('Previous Post' , 'neeon' ) );?></span>
					<?php next_post_link( '<h4 class="post-nav-title">%link</h4>' ); ?>
				</div>			
			</div>
		<?php } ?>
		<div class="navigation-archive"><a href="<?php echo get_post_type_archive_link( get_post_type(get_the_ID()) ); ?>"><i class="flaticon flaticon-menu"></i></a></div>
		<?php if ( !empty( get_previous_post_link())){ ?>
			<div class="<?php if ( empty( get_next_post_link())){ ?>offset-md-6<?php } ?> <?php if ( is_rtl() ){ echo esc_attr( 'text-right' ); } else { echo esc_attr( 'text-right' ); } ?>">
				<div class="pad-lr-15">
				<span class="prev-article">
				<?php previous_post_link( '%link', esc_html__('Next Post' , 'neeon' ) );?><i class="flaticon flaticon-next"></i></span>
				<?php previous_post_link('<h4 class="post-nav-title">%link</h4>'); ?>
				</div>
			</div>
		<?php } ?>
	</div>
<?php }
}

/*Remove the archive label*/
function neeon_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'neeon_archive_title' );

/*Case single page link*/
add_action( 'wp_ajax_neeon_like', 'neeon_like_callback' );
add_action( 'wp_ajax_nopriv_neeon_like', 'neeon_like_callback' );
function neeon_like_callback(){
	if(!$user_id = get_current_user_id()){
		wp_send_json_error('You must be login to like this post');
	}

	if(!$post_id = !empty($_POST['post_id']) ? absint($_POST['post_id']) : 0){
		wp_send_json_error('Post is mest be selected to like this post');
	}	

	$current_likes = get_user_meta($user_id, '_neeon_likes', true);
	$current_likes = !empty($current_likes) && is_array($current_likes) ? $current_likes : [];
	$existKey = array_search($post_id,  $current_likes);

	if($existKey !== false){
		unset($current_likes[$existKey]);
		update_user_meta($user_id, '_neeon_likes',$current_likes);
		wp_send_json_success([
			'post_id'=> $post_id,
			'action'=> 'unliked'
		]);
	}else{
		$current_likes[]=$post_id;
		update_user_meta($user_id, '_neeon_likes',$current_likes);
		wp_send_json_success([
			'post_id'=> $post_id,
			'action'=> 'liked'
		]);
	}

}

/*Category Color function*/
if( ! function_exists( 'neeon_get_primary_category' )){
	function neeon_get_primary_category() {
		if( get_post_type() != 'post' ) {
			return;
		}
		# Get the first assigned category ----------
			$get_the_category = get_the_category();
			$primary_category = array( $get_the_category[0] );

		if( ! empty( $primary_category[0] )) {
			return $primary_category;
		}
	}
}

/*only to show the first category in the post - primary category ID*/
if( ! function_exists( 'neeon_get_primary_category_id' )){
	function neeon_get_primary_category_id(){
		$primary_category = neeon_get_primary_category();
		if( ! empty( $primary_category[0]->term_id )){
			return $primary_category[0]->term_id;
		}
		return false;
	}
}

/*For category color*/
if ( ! function_exists ( 'neeon_category_prepare' ) ) {
	function neeon_category_prepare() {
		foreach( get_the_category() as $category ) {
			$get_color  = get_term_meta( $category->term_id , 'rt_category_color', true ); 
			if ( $get_color ) {	?>
				<a href="<?php echo get_category_link( $category->term_id ); ?>"><span class="category-style" style="background:#<?php echo esc_attr( $get_color ); ?>"><?php echo esc_html( $category->name ); ?></span></a>
			<?php } else { ?>
				<a href="<?php echo get_category_link( $category->term_id ); ?>"><span class="category-style"><?php echo esc_html( $category->name ); ?></span></a>
			<?php }
		} 
	}
}

/*For single category color*/
if ( ! function_exists ( 'neeon_single_category_prepare' ) ) {
	function neeon_single_category_prepare() {

		foreach( get_the_category() as $category ) {
			$get_color  = get_term_meta( $category->term_id , 'rt_category_color', true ); 
			if ( $get_color ) {	?>
				<a href="<?php echo get_category_link( $category->term_id ); ?>"><span class="category-style" style="background:#<?php echo esc_attr( $get_color ); ?>"><?php echo esc_html( $category->name ); ?></span></a>
			<?php } else { ?>
				<a href="<?php echo get_category_link( $category->term_id ); ?>"><span class="category-style"><?php echo esc_html( $category->name ); ?></span></a>
			<?php }
		} 
	}
}


/*For Selected category color*/
if ( ! function_exists ( 'neeon_sel_category_prepare' ) ) {
	function neeon_sel_category_prepare( $sel_cat_id ) {
	$get_color  = get_term_meta( $sel_cat_id , 'rt_category_color', true );
	
	if ( $get_color ) {	?>
		<a href="<?php echo get_category_link( $sel_cat_id ); ?>"><span class="category-style" style="background:#<?php echo esc_attr( $get_color ); ?>"><?php echo get_cat_name( $sel_cat_id ); ?></span></a>
	<?php } else { ?>
		<a href="<?php echo get_category_link( neeon_get_primary_category()[0]->term_id ); ?>"><span class="category-style"><?php echo esc_html( neeon_get_primary_category()[0]->name ); ?></span></a>
	<?php } 
	
	}
}

if ( ! function_exists ( 'neeon_sel_category_image' ) ) {
	function neeon_sel_category_image( $sel_cat_id, $size = 'thumbnail' ) {
		$get_image  = get_term_meta( $sel_cat_id , 'rt_category_image', true );
		
		if ( $get_image ) {	
			return wp_get_attachment_image_src($get_image, $size)[0];
		} else {
			return '';
		} 
	}
}

/*add category color meta*/
function neeon_colorpicker_field_add_new_category( $taxonomy ) {
  ?>
    <div class="form-field term-colorpicker-wrap">
        <label for="term-colorpicker"><?php esc_html_e( 'Category Color', 'neeon' ); ?></label>
        <input name="rt_category_color" value="#111111" class="colorpicker" id="term-colorpicker" />
        <p><?php esc_html_e( 'This is category background color.', 'neeon' ); ?></p>
    </div>

    <div class="form-field term-group">
        <label for=""><?php esc_html_e( 'Upload and Image', 'neeon' ); ?></label> 
        <div class="category-image"></div> 
        <input type="button" id="upload_image_btn" class="button" value="<?php esc_html_e( 'Upload an Image', 'neeon' ); ?>" />
    </div>
  <?php
}
add_action( 'category_add_form_fields', 'neeon_colorpicker_field_add_new_category' );


function neeon_colorpicker_field_edit_category( $term ) {
    $color = get_term_meta( $term->term_id, 'rt_category_color', true );
    $color = ( ! empty( $color ) ) ? "#{$color}" : '#111111';

    $image = get_term_meta( $term->term_id, 'rt_category_image', true );
  ?>
    <tr class="form-field term-colorpicker-wrap">
        <th scope="row"><label for="term-colorpicker"><?php esc_html_e( 'Category Color', 'neeon' ); ?></label></th>
        <td>
            <input name="rt_category_color" value="<?php echo esc_attr( $color ); ?>" class="colorpicker" id="term-colorpicker" />
            <p class="description"><?php esc_html_e( 'This is category background color.', 'neeon' ); ?></p>
        </td>
    </tr>

    <tr class="form-field term-image-wrap">
        <th scope="row"><label for="term-image"><?php esc_html_e( 'Category Image', 'neeon' ); ?></label></th>
        <td> 
            <div class="category-image">
            	<?php if ( $image ) { ?>
            		<div class="category-image-wrap">
	            		<img src='<?php echo wp_get_attachment_image_src($image, 'thumbnail')[0]; ?>' width='200' />
	            		<input type="hidden" name="rt_category_image" value="<?php echo esc_attr( $image ); ?>" class="category-image-id"/>
	            		<button>x</button>
            		</div>
            	<?php } ?>
            </div>
	        
	        <input type="button" id="upload_image_btn" class="button" value="<?php esc_html_e( 'Upload an Image', 'neeon' ); ?>" />
        </td>
    </tr>
  <?php
}
add_action( 'category_edit_form_fields', 'neeon_colorpicker_field_edit_category' ); 

function neeon_save_termmeta( $term_id ) {
    // Save term color if possible
    if( isset( $_POST['rt_category_color'] ) && ! empty( $_POST['rt_category_color'] ) ) {
        update_term_meta( $term_id, 'rt_category_color', sanitize_hex_color_no_hash( $_POST['rt_category_color'] ) );
    } else {
        delete_term_meta( $term_id, 'rt_category_color' );
    }

    if( isset( $_POST['rt_category_image'] ) && ! empty( $_POST['rt_category_image'] ) ) {
        update_term_meta( $term_id, 'rt_category_image', absint( $_POST['rt_category_image'] ) );
    } else {
        delete_term_meta( $term_id, 'rt_category_image' );
    }
}
add_action( 'created_category', 'neeon_save_termmeta' );
add_action( 'edited_category',  'neeon_save_termmeta' );

function neeon_category_colorpicker_enqueue( $taxonomy ) {
    if( null !== ( $screen = get_current_screen() ) && 'edit-category' !== $screen->id ) {
        return;
    }
    // Colorpicker Scripts
    wp_enqueue_script( 'wp-color-picker' );
    // Colorpicker Styles
    wp_enqueue_style( 'wp-color-picker' );

}
add_action( 'admin_enqueue_scripts', 'neeon_category_colorpicker_enqueue' );

//Category Color column
add_filter( 'manage_edit-category_columns', 'neeon_edit_term_columns', 10, 3 );
function neeon_edit_term_columns( $columns ) {
    $columns['rt_category_color'] = esc_html__( 'Color', 'neeon' );
    $columns['rt_category_image'] = esc_html__( 'Image', 'neeon' );
    return $columns;
}
// RENDER COLUMNS
add_filter( 'manage_category_custom_column', 'neeon_manage_term_custom_column', 10, 3 );
function neeon_manage_term_custom_column( $out, $column, $term_id ) {
    if ( 'rt_category_color' === $column ) {
        $value  = get_term_meta( $term_id , 'rt_category_color', true );
        if ( ! $value )
            $value = '';
        $out = sprintf( '<span class="term-meta-color-block" style="background:#%s" ></span>', esc_attr( $value ) );
    }

    if ( 'rt_category_image' === $column ) {
        $value  = get_term_meta( $term_id , 'rt_category_image', true );
        if ( $value ) {
        	$out = '<img src='.wp_get_attachment_image_src($value, 'thumbnail')[0].' width="200" />';
        } 
    }
    return $out;
}

function neeon_load_custom_wp_admin_style() {	
	wp_enqueue_style( 'wp-color-picker' );
	//wp_enqueue_script( 'rt-widget-color', NEEON_JS_URL . 'rt-widget-color.js', array( 'jquery','wp-color-picker' ), NEEON_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'neeon_load_custom_wp_admin_style' );

// define the language_attributes callback 
add_filter( 'language_attributes', 	'filter_language_attributes', 10, 2 ); 
function filter_language_attributes( $output, $doctype ) { 
    $attributes = array();

    if ( function_exists( 'is_rtl' ) && is_rtl() )
            $attributes[] = 'dir="rtl"';

    if ( $lang = get_bloginfo('language') ) {
            if ( get_option('html_type') == 'text/html' || $doctype == 'html' )
                    $attributes[] = "lang=\"$lang\"";

            if ( get_option('html_type') != 'text/html' || $doctype == 'xhtml' )
                    $attributes[] = "xml:lang=\"$lang\"";
    }

    $color_mode = NeeonTheme::$options['code_mode_type'];
    $attributes[] = 'data-theme="' . esc_attr( $color_mode ) . '"';

    $output = implode(' ', $attributes);

    return $output; 
} 
//Limit the number of tags displayed by Tag Cloud widget
add_filter( 'widget_tag_cloud_args', 'tj_tag_cloud_limit' );
function tj_tag_cloud_limit($args){ 
	if ( isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag' ){
		$args['number'] = 15;
 	}
	return $args;
}

function insert_social_in_head() {
	global $post;

	if ( ! isset( $post ) ) {
		return;
	}

	$title = get_the_title();

	if ( is_singular('post') ) {
		$link = get_the_permalink() . '?v='.time();
		echo '<meta property="og:url" content="' . $link . '" />';
		echo '<meta property="og:type" content="article" />';
		echo '<meta property="og:title" content="' . $title . '" />';

		if ( ! empty( $post->post_content ) ) {
			echo '<meta property="og:description" content="' . wp_trim_words( $post->post_content,
					150 ) . '" />';
		}
		$attachment_id = get_post_thumbnail_id( $post->ID );
		if ( ! empty( $attachment_id ) ) {
			$thumbnail = wp_get_attachment_image_src( $attachment_id, 'full' );
			if ( ! empty( $thumbnail ) ) {
				$attachment = get_post($attachment_id);
				$thumbnail[0] .= '?v='.time();
				echo '<meta property="og:image" itemprop="image" content="' . $thumbnail[0] . '" />';
			    echo '<link itemprop="thumbnailUrl" href="' . $thumbnail[0] . '">';
			    echo '<meta property="og:image:type" content="'.$attachment->post_mime_type.'">';
			}
		}
		echo '<meta property="og:site_name" content="' . get_bloginfo( 'name' ) . '" />';
		echo '<meta name="twitter:card" content="summary" />';
		echo '<meta property="og:updated_time" content="'.time().'" />';
	}
}
add_action( 'wp_head', 'insert_social_in_head' );

/*search icon*/
if( !function_exists( 'radius_search_shape' ) ) {
	function radius_search_shape() {
	    return '<svg width="20" height="20" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M17.1249 16.2411L12.4049 11.5211C13.5391 10.1595 14.1047 8.41291 13.9841 6.64483C13.8634 4.87675 13.0657 3.22326 11.7569 2.02834C10.4482 0.833415 8.7291 0.189061 6.95736 0.229318C5.18562 0.269575 3.49761 0.991344 2.24448 2.24448C0.991344 3.49761 0.269575 5.18562 0.229318 6.95736C0.189061 8.7291 0.833415 10.4482 2.02834 11.7569C3.22326 13.0657 4.87675 13.8634 6.64483 13.9841C8.41291 14.1047 10.1595 13.5391 11.5211 12.4049L16.2411 17.1249L17.1249 16.2411ZM1.49989 7.12489C1.49989 6.01237 1.82979 4.92483 2.44787 3.99981C3.06596 3.07478 3.94446 2.35381 4.97229 1.92807C6.00013 1.50232 7.13113 1.39093 8.22227 1.60797C9.31342 1.82501 10.3157 2.36074 11.1024 3.14741C11.889 3.93408 12.4248 4.93636 12.6418 6.02751C12.8588 7.11865 12.7475 8.24965 12.3217 9.27748C11.896 10.3053 11.175 11.1838 10.25 11.8019C9.32495 12.42 8.23741 12.7499 7.12489 12.7499C5.63355 12.7482 4.20377 12.1551 3.14924 11.1005C2.09471 10.046 1.50154 8.61622 1.49989 7.12489Z" fill="currentColor"/></svg>';
	}
}
/*cart icon*/
if( !function_exists( 'radius_cart_shape' ) ) {
	function radius_cart_shape() {
	    return '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0 0.857143C0 0.629814 0.0903121 0.411797 0.251069 0.251051C0.411825 0.0903058 0.629858 0 0.857203 0H1.49496C2.58075 0 3.23223 0.730286 3.60368 1.40914C3.8517 1.86171 4.03114 2.38629 4.17172 2.86171C4.20974 2.85871 4.24787 2.85719 4.28601 2.85714H18.5704C19.5191 2.85714 20.2048 3.76457 19.9443 4.67771L17.855 12.0023C17.6676 12.6593 17.2713 13.2373 16.7261 13.6489C16.1808 14.0605 15.5162 14.2833 14.833 14.2834H8.03485C7.34622 14.2835 6.67664 14.0573 6.12903 13.6399C5.58141 13.2224 5.18608 12.6366 5.00378 11.9726L4.13515 8.80457L2.69505 3.94971L2.6939 3.94057C2.5156 3.29257 2.34874 2.68571 2.09958 2.23314C1.8607 1.79314 1.66869 1.71429 1.4961 1.71429H0.857203C0.629858 1.71429 0.411825 1.62398 0.251069 1.46323C0.0903121 1.30249 0 1.08447 0 0.857143ZM5.79812 8.38857L6.65647 11.5189C6.82791 12.1383 7.39137 12.5691 8.03485 12.5691H14.833C15.1436 12.5691 15.4457 12.468 15.6936 12.2809C15.9414 12.0939 16.1216 11.8312 16.2068 11.5326L18.1921 4.57143H4.6689L5.78212 8.328L5.79812 8.38857ZM9.71496 17.7143C9.71496 18.3205 9.47413 18.9019 9.04545 19.3305C8.61676 19.7592 8.03534 20 7.42909 20C6.82284 20 6.24142 19.7592 5.81273 19.3305C5.38405 18.9019 5.14322 18.3205 5.14322 17.7143C5.14322 17.1081 5.38405 16.5267 5.81273 16.098C6.24142 15.6694 6.82284 15.4286 7.42909 15.4286C8.03534 15.4286 8.61676 15.6694 9.04545 16.098C9.47413 16.5267 9.71496 17.1081 9.71496 17.7143V17.7143ZM8.00056 17.7143C8.00056 17.5627 7.94035 17.4174 7.83318 17.3102C7.72601 17.2031 7.58065 17.1429 7.42909 17.1429C7.27753 17.1429 7.13217 17.2031 7.025 17.3102C6.91783 17.4174 6.85762 17.5627 6.85762 17.7143C6.85762 17.8658 6.91783 18.0112 7.025 18.1183C7.13217 18.2255 7.27753 18.2857 7.42909 18.2857C7.58065 18.2857 7.72601 18.2255 7.83318 18.1183C7.94035 18.0112 8.00056 17.8658 8.00056 17.7143ZM17.7155 17.7143C17.7155 18.3205 17.4747 18.9019 17.046 19.3305C16.6173 19.7592 16.0359 20 15.4296 20C14.8234 20 14.242 19.7592 13.8133 19.3305C13.3846 18.9019 13.1438 18.3205 13.1438 17.7143C13.1438 17.1081 13.3846 16.5267 13.8133 16.098C14.242 15.6694 14.8234 15.4286 15.4296 15.4286C16.0359 15.4286 16.6173 15.6694 17.046 16.098C17.4747 16.5267 17.7155 17.1081 17.7155 17.7143V17.7143ZM16.0011 17.7143C16.0011 17.5627 15.9409 17.4174 15.8337 17.3102C15.7266 17.2031 15.5812 17.1429 15.4296 17.1429C15.2781 17.1429 15.1327 17.2031 15.0256 17.3102C14.9184 17.4174 14.8582 17.5627 14.8582 17.7143C14.8582 17.8658 14.9184 18.0112 15.0256 18.1183C15.1327 18.2255 15.2781 18.2857 15.4296 18.2857C15.5812 18.2857 15.7266 18.2255 15.8337 18.1183C15.9409 18.0112 16.0011 17.8658 16.0011 17.7143Z" fill="currentColor"/></svg>';
	}
}

/*cart icon*/
if( !function_exists( 'radius_arrow_shape' ) ) {
	function radius_arrow_shape() {
	    return '<svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="34px"
                height="16px"
                viewBox="0 0 34.53 16"
                xml:space="preserve"
              >
                <rect
                  class="rt-button-line"
                  y="7.6"
                  width="34"
                  height=".4"
                ></rect>
                <g class="rt-button-cap-fake">
                  <path
                    class="rt-button-cap"
                    d="M25.83.7l.7-.7,8,8-.7.71Zm0,14.6,8-8,.71.71-8,8Z"
                  ></path>
                </g>
            </svg>';
	}
}
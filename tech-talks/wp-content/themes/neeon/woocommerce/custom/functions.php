<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

class WC_Functions {

	protected static $instance = null;

	public function __construct() {
		/* Theme supports for WooCommerce */
		add_action( 'after_setup_theme', array( $this, 'theme_support' ) );

		/* ====== Shop/Archive Wrapper ====== */
		// Remove
		add_filter( 'woocommerce_show_page_title',        '__return_false' );
		remove_action( 'woo_main_before',                 'woo_display_breadcrumbs', 10 );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
		remove_action( 'woocommerce_sidebar',             'woocommerce_get_sidebar', 10 );
		remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10 );
		remove_action( 'woocommerce_after_shop_loop',     'woocommerce_pagination', 10 );
		// Add
		add_action( 'woocommerce_before_main_content',     array( $this, 'wrapper_start' ), 10 );
		add_action( 'woocommerce_after_main_content',      array( $this, 'wrapper_end' ), 10 );
		add_action( 'loop_shop_per_page',                  array( $this, 'neeon_loop_shop_per_page' ), 20 );
		add_action( 'woocommerce_after_shop_loop',         array( $this, 'neeon_products_paginations' ), 10 );
		// Columns
		add_filter( 'loop_shop_columns',                    array( $this, 'loop_shop_columns' ) );
		add_filter( 'woocommerce_get_image_size_thumbnail', array( $this, 'neeon_product_imgae_size' ) );
		add_filter( 'woocommerce_get_image_size_single', array( $this, 'neeon_single_product_imgae_size' ) );
		add_filter( 'woocommerce_get_image_size_gallery_thumbnail', array( $this, 'neeon_product_thumbnail_imgae_size' ) );

		/* Yith Wishlist */ 
		if ( function_exists( 'YITH_WCWL_Frontend' ) && class_exists( 'YITH_WCWL_Ajax_Handler' )  ) {
			$wishlist_init = YITH_WCWL_Frontend();
			remove_action( 'wp_head',                                   array( $wishlist_init, 'add_button' ) );
			add_action( 'wp_ajax_neeon_add_to_wishlist',                array( $this, 'add_to_wishlist' ) );
			add_action( 'wp_ajax_nopriv_neeon_add_to_wishlist',         array( $this, 'add_to_wishlist' ) );
		}

		/* ====== Shop/Details ====== */
		remove_action( 'woocommerce_product_description_heading',  '__return_null' );
		remove_action( 'woocommerce_after_single_product_summary',  'woocommerce_upsell_display', 15 );
		//remove_action( 'woocommerce_single_product_summary',  'woocommerce_template_single_sharing', 50 );


		// Single Product Layout
		add_action( 'init', array( $this, 'single_product_layout_hooks' ) );

		/* ====== Checkout Page ====== */
		add_filter( 'woocommerce_checkout_fields', array( $this, 'neeon_checkout_fields' ) );

		/* ====== Mini Cart ====== */
		add_action( 'neeon_woo_cart_icon', array( $this, 'neeon_wc_cart_count' ) );
		add_action( 'woocommerce_add_to_cart_fragments', array( $this, 'neeon_header_add_to_cart_fragment' ) );
		add_action( 'wp_ajax_neeon_product_remove', array( $this, 'neeon_product_remove' ) );
        add_action( 'wp_ajax_nopriv_neeon_product_remove', array( $this, 'neeon_product_remove' ) );
	}


	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function theme_support() {
		add_theme_support( 'woocommerce', 
			array(
				// 'gallery_thumbnail_image_width' => 150,
			) 
		);
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_post_type_support( 'product', 'page-attributes' );
	}

	public function wrapper_start() {
		self::get_custom_template_part( 'shop-header' );
	}

	public function wrapper_end() {
		self::get_custom_template_part( 'shop-footer' );
	}

	public function loop_shop_columns(){
		$cols = NeeonTheme::$options['products_cols_width'];
		return $cols;
	}

	public function neeon_product_imgae_size( $size ) {
		return array(
			'width' => 370,
			'height' => 450,
			'crop' => 1,
		);
	}
	public function neeon_product_thumbnail_imgae_size( $size ) {
		return array(
			'width' => 155,
			'height' => 157,
			'crop' => 0,
		);
	}

	public function neeon_single_product_imgae_size( $size ) {
		return array(
			'width' => 450,
			'height' => 515,
			'crop' => 1,
		);
	}

	public function neeon_products_paginations(){
		NeeonTheme_Helper::pagination();
	}

	// Template Loader
	public static function get_template_part( $template, $args = array() ){
		extract( $args );

		$template = '/' . $template . '.php';

		if ( file_exists( get_stylesheet_directory() . $template ) ) {
			$file = get_stylesheet_directory() . $template;
		}
		else {
			$file = get_template_directory() . $template;
		}

		require $file;
	}
	public static function get_custom_template_part( $template, $args = array() ){
		$template = 'woocommerce/custom/template-parts/' . $template;
		self::get_template_part( $template, $args );
	} 

	/* = Single Page
	=============================================================================*/
	public function single_product_layout_hooks() {
		// Remove Action
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
		// Add Action
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 5 );		
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 5 );
		add_action( 'woocommerce_single_product_summary', array( $this, 'single_socials_share' ), 5 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
		add_action( 'woocommerce_single_product_summary', array( $this, 'single_wishlist_compare' ), 40 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

		// Add to cart button
		add_action( 'woocommerce_before_add_to_cart_button', array( $this, 'add_to_cart_button_wrapper_start' ), 3 );
		add_action( 'woocommerce_after_add_to_cart_button',  array( $this, 'add_to_cart_button_wrapper_end' ), 90 );
	}

	public function single_socials_share(){
		if( NeeonTheme::$options['wc_product_social_icon'] ){
			echo '<div class="product-single-social-shares-btns">';
			self::neeon_product_social_share();
			echo '</div>';
		}
	}	
	public function single_wishlist_compare(){
		echo '<div class="wistlist-compare-box">';
		self::print_add_to_wishlist_icon();
		self::print_compare_icon();
		echo '</div>';
	}

	public function add_to_cart_button_wrapper_start(){
		echo '<div class="single-add-to-cart-wrapper">';
	}

	public function add_to_cart_button_wrapper_end(){
		echo '</div>';
	}


 
	/* = Shop Page
	=============================================================================*/
	public static function get_product_thumbnail( $product, $thumb_size = 'woocommerce_thumbnail' ) {
		$thumbnail   = $product->get_image( $thumb_size, array(), false );
		if ( !$thumbnail ) {
			$thumbnail = wc_placeholder_img( $thumb_size );
		}
		return $thumbnail;
	}

	public static function get_product_thumbnail_link( $product, $thumb_size = 'woocommerce_thumbnail' ) {
		return '<a href="'.esc_attr( $product->get_permalink() ).'">'.self::get_product_thumbnail( $product, $thumb_size ).'</a>';
	}

	public static function print_add_to_cart_icon( $product_id, $icon = true, $text = true ){
		global $product;
		$quantity = 1;
		$class = implode( ' ', array_filter( array(
			'action-cart',
			'product_type_' . $product->get_type(),
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
			$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
		) ) );

		$html = '';

		$product_cart_id = WC()->cart->generate_cart_id( $product_id );
	    $in_cart = WC()->cart->find_product_in_cart( $product_cart_id );

		 if ( $in_cart ) {
	    	if ( $icon ) {
				$html .= '<i class="fas fa-check"></i>';
			}
			if ( $text ) {
				$html .= '<span>Already in cart</span>';
			}
		} else {
			if ( $icon ) {
				$html .= radius_cart_shape();
			}
			
			if ( $text ) {
				$html .= '<span>' . $product->add_to_cart_text() . '</span>';
			}
		}
		
	    if ( $in_cart ) {
			echo sprintf( '<a rel="nofollow" title="%s" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s">' . $html . '</a>',
				esc_attr( $product->add_to_cart_text() ),
				esc_url( wc_get_cart_url() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				esc_attr( $product->get_id() ),
				esc_attr( $product->get_sku() )
			);
		} else {
			echo sprintf( '<a rel="nofollow" title="%s" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">' . $html . '</a>',
				esc_attr( $product->add_to_cart_text() ),
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				esc_attr( $product->get_id() ),
				esc_attr( $product->get_sku() ),
				esc_attr( isset( $class ) ? $class : 'action-cart' )
			);
		}
	}

    public function neeon_loop_shop_per_page( $products ) {
        // Return the number of products you wanna show per page.
        $shop_posts_per_page = NeeonTheme::$options['products_per_page'];
        if (!empty($shop_posts_per_page)) {
           $products = $shop_posts_per_page;
        } else {
            $products = '9';
        }
        return $products;
    }

	public static function neeon_product_social_share(){

		$url   = urlencode( get_permalink() );
		$title = urlencode( get_the_title() );

		$defaults = array(
			'facebook' => array(
				'url'  => "http://www.facebook.com/sharer.php?u=$url",
				'icon' => 'fab fa-facebook-f',
				'class' => 'bg-fb'
			),
			'twitter'  => array(
				'url'  => "https://twitter.com/intent/tweet?source=$url&text=$title:$url",
				'icon' => 'fab fa-twitter',
				'class' => 'bg-twitter'
			),
			'linkedin' => array(
				'url'  => "http://www.linkedin.com/shareArticle?mini=true&url=$url&title=$title",
				'icon' => 'fab fa-linkedin-in',
				'class' => 'bg-linked'
			),
			'pinterest'=> array( 
				'url'  => "http://pinterest.com/pin/create/button/?url=$url&description=$title",
				'icon' => 'fab fa-pinterest-square',
				'class' => 'bg-pinterst'
			),
		);

		foreach ( $defaults as $key => $value ) {
			if ( !$value ) {
				unset( $defaults[$key] );
			}
		}

		$sharers = apply_filters( 'rdtheme_social_sharing_icons', $defaults );

		?>
		<div class="post-share-btn">
			<h5 class="item-label"><?php esc_html_e( 'Share:', 'neeon' );?></h5>
			<div class="post-social-sharing">
				<ul class="item-social">
					<?php foreach ( $sharers as $key => $sharer ){ ?>
		            <li>
		            	<a href="<?php echo esc_url( $sharer['url'] );?>" class="<?php echo esc_attr( $sharer['class'] );?>">
		            		<i class="<?php echo esc_attr( $sharer['icon'] );?>"></i>
		            	</a>
		            </li>
		            <?php } ?>
		        </ul>
			</div>
		</div>

	<?php }
	
	// quickview
	public static function print_quickview_icon( $icon = true, $text = false ){
		if ( !function_exists( 'YITH_WCQV_Frontend' ) ) {
			return false;
		}

		if ( is_shop() && !NeeonTheme::$options['wc_shop_quickview_icon'] ) {
			return false;
		}

		if ( is_product() && !NeeonTheme::$options['wc_product_quickview_icon'] ) {
			return false;
		}

		global $product;

		$html = '';

		if ( $icon ) {
			$html .= radius_search_shape();
		}

		if ( $text ) {
			$html .= '<span>' . esc_html__( 'QuickView', 'neeon' ) . '</span>';
		}

		?>
		<a href="#" class="yith-wcqv-button" data-product_id="<?php echo esc_attr( $product->get_id() );?>" title="<?php esc_attr_e( 'QuickView', 'neeon' ); ?>"><?php echo $html; ?></a>
		<?php
	}

	// compare
	public static function print_compare_icon( $icon = true, $text = true ){
		if ( !class_exists( 'YITH_Woocompare' ) ) {
			return false;
		}

		if ( is_shop() && !NeeonTheme::$options['wc_shop_compare_icon'] ) {
			return false;
		}

		if ( is_product() && !NeeonTheme::$options['wc_product_compare_icon'] ) {
			return false;
		}

		global $product;
		global $yith_woocompare;
		$id  = $product->get_id();
		$url = method_exists( $yith_woocompare->obj, 'add_product_url' ) ? $yith_woocompare->obj->add_product_url( $id ) : '';

		$html = '';

		if ( $icon ) {
			$html .= '<i class="fas fa-random"></i>';
		}

		if ( $text ) {
			$html .= '';
		}

		?>
		<a href="<?php echo esc_url( $url );?>" class="compare" data-product_id="<?php echo esc_attr( $id );?>" title="<?php esc_attr_e( 'Add To Compare', 'neeon' ); ?>"><?php echo wp_kses_post( $html ); ?></a>
		<?php
	}

	// Wishlist
	public static function print_add_to_wishlist_icon( $icon = true, $text = false ){
		if ( !defined( 'YITH_WCWL' ) ) {
			return false;
		}

		if ( is_shop() && !NeeonTheme::$options['wc_shop_wishlist_icon'] ) {
			return false;
		}

		if ( is_product() && !NeeonTheme::$options['wc_product_wishlist_icon'] ) {
			return false;
		}

		self::get_custom_template_part( 'wishlist-icon', compact( 'icon', 'text' ) );
	}

	public function add_to_wishlist() {
		check_ajax_referer( 'add_to_wishlist', 'nonce' );
		\YITH_WCWL_Ajax_Handler::add_to_wishlist();
		wp_die();
	}

	public static function get_stock_status() {
		global $product;
		return $product->is_in_stock() ? esc_html__( 'In Stock', 'neeon' ) : esc_html__( 'Out of Stock', 'neeon' );
	}

	// WooCommerce Checkout Fields Hook
    public function neeon_checkout_fields( $fields ) {
        $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
        $fields['billing']['billing_first_name']['label'] = false;
        $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
        $fields['billing']['billing_last_name']['label'] = false;

        $fields['billing']['billing_company']['placeholder'] = 'Company Name';
        $fields['billing']['billing_company']['label'] = false;

        $fields['billing']['billing_country']['placeholder'] = 'Country';
        $fields['billing']['billing_country']['label'] = 'Select Your Country';

        $fields['billing']['billing_address_1']['placeholder'] = 'Street Address';
        $fields['billing']['billing_address_1']['label'] = false;
        $fields['billing']['billing_address_2']['placeholder'] = 'Apartment, Unite ( optional )';
        $fields['billing']['billing_address_2']['label'] = false;

        $fields['billing']['billing_city']['placeholder'] = 'Town / City';
        $fields['billing']['billing_city']['label'] = false;

        $fields['billing']['billing_state']['placeholder'] = 'County';
        $fields['billing']['billing_state']['label'] = false;

        $fields['billing']['billing_postcode']['placeholder'] = 'Post Code / Zip';
        $fields['billing']['billing_postcode']['label'] = false;

        $fields['billing']['billing_email']['placeholder'] = 'Email Address';
        $fields['billing']['billing_email']['label'] = false;

        $fields['billing']['billing_phone']['placeholder'] = 'Phone';
        $fields['billing']['billing_phone']['label'] = false;

        return $fields;
    }

    /*----------------------------------------------------------------------------------*/
    /* Woo Mini Cart
    /*----------------------------------------------------------------------------------*/

    //Minicart Callback Function
    public static function NeeonWooMiniCart(){
        ob_start();
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            do_action( 'neeon_woo_cart_icon' );
        }
        $woo_cart_out = ob_get_clean();
        
        $woo_cart_out = '<div class="header-action-item cart-area mini-cart-items header-shop-cart">'. $woo_cart_out .'</div>';
        
        echo wp_kses_stripslashes( $woo_cart_out );

    }

    /**
     * Add Cart icon and count to header if WC is active
     */
    public function neeon_cart_items(){
        $empty_cart = '<li class="cart-item d-flex align-items-center"><h5 class="text-center no-cart-items">'. apply_filters( 'neeon_woo_mini_cart_empty', esc_html__('Your cart is empty', 'neeon') ) .'</h5></li>';

        if(is_null(WC()->cart)) {
        	return $empty_cart;
		} 

		if ( WC()->cart->get_cart_contents_count() == 0 ) return $empty_cart;

        ob_start();
        
        $shop_page_url = get_permalink( wc_get_page_id( 'cart' ) );
        $remove_loader = apply_filters('woo_mini_cart_loader', NeeonTheme_Helper::get_img( 'spinner2.gif' ));
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            ?>
                <li class="cart-item d-flex align-items-center">
	                <?php
	                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
	                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
	                ?>
	                <div class="cart-single-product">
						<div class="media">
							<div class="cart-product-img">
								<?php
		                            $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
		                            if ( ! $product_permalink ) {
		                                echo ( ''. $thumbnail );
		                            } else {
		                                printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
		                            }
		                        ?>
							</div>
							<div class="media-body cart-content">
								<ul>
									<li class="minicart-title">
										<div class="cart-title-line1">
											<?php echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key ); ?>
										</div>
										<div class="cart-title-line2">
										<?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?> &#9747; <?php echo esc_attr( $cart_item['quantity'] ); ?>
										</div>
									</li>
									<li class="minicart-remove">
										<?php
				                            echo apply_filters(
				                                'woocommerce_cart_item_remove_link',
				                                sprintf(
				                                    '<a href="%s" class="remove_from_cart_button remove-cart-item" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="fas fa-trash-alt"></i></a>',
				                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
				                                    esc_attr__( 'Remove this item', 'neeon' ),
				                                    esc_attr( $product_id ),
				                                    esc_attr( $cart_item_key ),
				                                    esc_attr( $_product->get_sku() )
				                                ),
				                                $cart_item_key
				                            );
				                        ?>
									</li>
								</ul>
							</div>
							<span class="remove-item-overlay text-center"><img src="<?php echo esc_url($remove_loader); ?>" alt="<?php esc_attr_e('Loader..', 'neeon') ?>" /></span>
						</div>
					</div>

	                <?php
	                    }//if
	                ?>
                </li>
                <?php
                }//foreach
            ?>
            <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
            <li class="cart-total">
                <div class="total-price">
                    <span class="f-left"><?php _e( 'Total:', 'neeon' ); ?></span>
                    <span class="f-right"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
                </div>
            </li>
            <li class="cart-btn">
                <div class="checkout-link">
                    <a class="button wc-forward" href="<?php echo wc_get_cart_url(); ?>"><?php _e( 'View Cart', 'neeon' ); ?></a>
                    <a class="button wc-forward checkout" href="<?php echo wc_get_checkout_url(); ?>"><?php _e( 'Checkout', 'neeon' ); ?></a>
                </div>
            </li>
            <?php endif; ?>
        <?php 
        $out = ob_get_clean();
        return $out;
    }

    public function neeon_wc_cart_count() {
     
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
     
   			if(!is_null(WC()->cart)) {
			    $count = WC()->cart->cart_contents_count;
			} else {
				$count = 0;
			}

			// $count = WC()->cart->cart_contents_count();
            $cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
            ?>
            <div class="cart-list-trigger">
	            <a class="cart-contents cart-trigger-icon" href="<?php echo esc_url( $cart_link ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'neeon' ); ?>"><?php echo radius_cart_shape(); ?> <span><?php echo esc_html( $count > 0  ? absint( $count ) : 0 ); ?></span></a>
                <div class="cart-wrapper">
                    <ul class="minicart">
		            	<?php echo wp_kses_stripslashes( $this->neeon_cart_items() ); ?>
		            </ul>
                </div>
            </div>
            <?php
        }
    }


    /**
     * Ensure cart contents update when products are added to the cart via AJAX
     */
    public function neeon_header_add_to_cart_fragment( $fragments ) {
        ob_start();

        //if(!is_null(WC()->cart)) {
		    $count = WC()->cart->cart_contents_count;
		// } else {
		// 	$count = 0;
		// }
        $cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();

        ?>
            <div class="header-action-item cart-area mini-cart-items header-shop-cart">
            	<div class="cart-list-trigger">
	                <a class="cart-contents cart-trigger-icon" href="<?php echo esc_url( $cart_link ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'neeon' ); ?>"><?php echo radius_cart_shape(); ?> <?php if ( $count >= 0 ) echo '<span>' . $count . '</span>'; ?></a>
	                <div class="cart-wrapper">
		                <ul class="minicart">
		                <?php echo wp_kses_stripslashes( $this->neeon_cart_items() ); ?>
		                </ul>
		            </div>
	            </div>
            </div>
        <?php
        $fragments['div.mini-cart-items'] = ob_get_clean();
         
        return $fragments;
    }

    public function neeon_wc_cart_ajax() {
        $output = '';
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        	if(!is_null(WC()->cart)) {
			    $count = WC()->cart->cart_contents_count;
			} else {
				$count = 0;
			}
            $cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
            ob_start();
            ?>
            <a class="cart-contents" href="<?php echo esc_url( $cart_link ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'neeon' ); ?>"><?php echo radius_cart_shape(); ?> <?php if ( $count > 0 ) echo '(' . $count . ')'; ?></a>
            <ul class="minicart">
            <?php
                echo wp_kses_stripslashes( $this->neeon_cart_items() );
            ?>
            </ul>
            <?php
            $output = ob_get_clean();
        }
        return  $output;
    }

    public function neeon_product_remove() {
        global $wpdb, $woocommerce;
        session_start();
        foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item){
            if($cart_item['product_id'] == $_POST['product_id'] ){
                $woocommerce->cart->remove_cart_item($cart_item_key);
            }
        }
        $return["mini_cart"] = $this->neeon_wc_cart_ajax();
        echo json_encode($return);
        exit();
    }


}

WC_Functions::instance();
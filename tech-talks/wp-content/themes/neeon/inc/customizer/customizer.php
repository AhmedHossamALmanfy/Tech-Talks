<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */
namespace radiustheme\neeon\Customizer;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class NeeonTheme_Customizer {
	// Get our default values
	protected $defaults;
    protected static $instance = null;

	public function __construct() {
		// Register Panels
		add_action( 'customize_register', array( $this, 'add_customizer_panels' ) );
		// Register sections
		add_action( 'customize_register', array( $this, 'add_customizer_sections' ) );
	}

    public static function instance() {
        if (null == self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function populated_default_data() {
        $this->defaults = rttheme_generate_defaults();
    }

	/**
	 * Customizer Panels
	 */
	public function add_customizer_panels( $wp_customize ) {

        // Add Layput Panel
        $wp_customize->add_panel( 'rttheme_header_panel',
            array(
                'title' => __( 'Header', 'neeon' ),
                'description' => esc_html__( 'Adjust the overall layout for your site.', 'neeon' ),
                'priority' => 2,
            )
        );

	    // Add Layput Panel
		$wp_customize->add_panel( 'rttheme_layouts_defaults',
		 	array(
				'title' => __( 'Layout Settings', 'neeon' ),
				'description' => esc_html__( 'Adjust the overall layout for your site.', 'neeon' ),
				'priority' => 9,
			)
		);

        // Add General Panel
        $wp_customize->add_panel( 'rttheme_blog_settings',
            array(
                'title' => __( 'Blog Settings', 'neeon' ),
                'description' => esc_html__( 'Adjust the overall layout for your site.', 'neeon' ),
                'priority' => 10,
            )
        );
		
		// Add General Panel
        $wp_customize->add_panel( 'rttheme_cpt_settings',
            array(
                'title' => __( 'Custom Posts', 'neeon' ),
                'description' => esc_html__( 'All custom posts settings here.', 'neeon' ),
                'priority' => 11,
            )
        );
		
	}

    /**
    * Customizer sections
    */
	public function add_customizer_sections( $wp_customize ) {

		// Rename the default Colors section
		$wp_customize->get_section( 'colors' )->title = 'Background';

		// Move the default Colors section to our new Colors Panel
		$wp_customize->get_section( 'colors' )->panel = 'colors_panel';

		// Change the Priority of the default Colors section so it's at the top of our Panel
		$wp_customize->get_section( 'colors' )->priority = 10;

			
        // Add Header Main Section
        $wp_customize->add_section( 'header_top_section',
            array(
                'title' => __( 'Header Top', 'neeon' ),
                'priority' => 1,
                'panel' => 'rttheme_header_panel',
            )
        );
         // Add Header Main Section
        $wp_customize->add_section( 'header_section',
            array(
                'title' => __( 'Header Main', 'neeon' ),
                'priority' => 2,
                'panel' => 'rttheme_header_panel',
            )
        );
         // Add Header Main Section
        $wp_customize->add_section( 'header_mobile_section',
            array(
                'title' => __( 'Header Mobile', 'neeon' ),
                'priority' => 3,
                'panel' => 'rttheme_header_panel',
            )
        );

        // Add General Section
        $wp_customize->add_section( 'general_section',
            array(
                'title' => __( 'General', 'neeon' ),
                'priority' => 1,
            )
        );  

        // Add Footer Section
        $wp_customize->add_section( 'footer_section',
            array(
                'title' => __( 'Footer', 'neeon' ),
                'priority' => 3,
            )
        );
        // Add Color Section
        $wp_customize->add_section( 'color_section',
            array(
                'title' => __( 'Color', 'neeon' ),
                'priority' => 4,
            )
        );
		// Add News Ticker Section
		$wp_customize->add_section( 'news_ticker_section',
			array(
				'title' => __( 'News Ticker', 'neeon' ),
				'priority' => 5,
			)
		);

        // Add News Ticker Section
        $wp_customize->add_section( 'reading_progress_bar_section',
            array(
                'title' => __( 'Progress Bar', 'neeon' ),
                'priority' => 6,
            )
        );        
		
		// Add Footer Section
        $wp_customize->add_section( 'banner_section',
            array(
                'title' => __( 'Banner', 'neeon' ),
                'priority' => 7,
            )
        );

        // Add Footer Section
        $wp_customize->add_section( 'ad_section',
            array(
                'title' => __( 'Advertisement', 'neeon' ),
                'priority' => 8,
            )
        );
		
		// Add Pages Layout Section	
        $wp_customize->add_section( 'page_layout_section',
            array(
                'title' => __( 'Pages Layout', 'neeon' ),
                'priority' => 2,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
        // Add Blog Archive Layout Section
        $wp_customize->add_section( 'blog_layout_section',
            array(
                'title' => __( 'Blog Archive Layout', 'neeon' ),
                'priority' => 3,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Blog Single Layout Section
        $wp_customize->add_section( 'post_single_layout_section',
            array(
                'title' => __( 'Post Single Layout', 'neeon' ),
                'priority' => 4,
                'panel' => 'rttheme_layouts_defaults',
            )
        );

        // Add Team Archive Layout Section
        $wp_customize->add_section( 'team_layout_section',
            array(
                'title' => __( 'Team Archive Layout', 'neeon' ),
                'priority' => 9,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
        
        // Add Team Single Layout Section
        $wp_customize->add_section( 'team_single_layout_section',
            array(
                'title' => __( 'Team Single Layout', 'neeon' ),
                'priority' => 10,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Search Layout Section
        $wp_customize->add_section( 'search_layout_section',
            array(
                'title' => __( 'Search Layout', 'neeon' ),
                'priority' => 11,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Error Layout Section
        $wp_customize->add_section( 'error_layout_section',
            array(
                'title' => __( 'Error Layout', 'neeon' ),
                'priority' => 12,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Shop Archive Layout Section
        $wp_customize->add_section( 'wc_shop_layout_section',
            array(
                'title' => __( 'Shop Archive Layout', 'neeon' ),
                'priority' => 13,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Shop Single Layout Section
        $wp_customize->add_section( 'wc_product_layout_section',
            array(
                'title' => __( 'Product Single Layout', 'neeon' ),
                'priority' => 14,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
        // Add Blog Settings Section -------------------------
        $wp_customize->add_section( 'blog_post_settings_section',
            array(
                'title' => __( 'Blog Settings', 'neeon' ),
                'priority' => 10,
                'panel' => 'rttheme_blog_settings',
            )
        );
        // Add Single Blog Settings Section
        $wp_customize->add_section( 'single_post_secttings_section',
            array(
                'title' => __( 'Post Settings', 'neeon' ),
                'priority' => 12,
                'panel' => 'rttheme_blog_settings',
            )
        );
		// Add Single Share Settings Section
        $wp_customize->add_section( 'single_post_share_section',
            array(
                'title' => __( 'Post Share', 'neeon' ),
                'priority' => 13,
                'panel' => 'rttheme_blog_settings',
            )
        );
		
		// Add Team Section
        $wp_customize->add_section( 'rttheme_team_settings',
            array(
                'title' => __( 'Team Setting', 'neeon' ),
                'priority' => 14,
				'panel' => 'rttheme_cpt_settings',
            )
        );
        
        // Add Error Page Section
        $wp_customize->add_section( 'error_section',
            array(
                'title' => __( 'Error Page', 'neeon' ),
                'priority' => 15,
            )
        );
        // Add our wooCommerce shop Section
        $wp_customize->add_section('shop_layout_section',
            array(
               'title'    => esc_html__('Shop Archive Layout', 'neeon'),
               'priority' => 1,
               'panel'    => 'woocommerce',
            )
        );
        
        // Add our wooCommerce product Section
        $wp_customize->add_section('product_layout_section',
            array(
               'title'    => esc_html__('Shop Single Layout', 'neeon'),
               'priority' => 2,
               'panel'    => 'woocommerce',
            )
        );

	}

}

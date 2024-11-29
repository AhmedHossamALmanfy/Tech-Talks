<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\neeon\Customizer\Settings;

use radiustheme\neeon\Customizer\NeeonTheme_Customizer;
use radiustheme\neeon\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\neeon\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\neeon\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class NeeonTheme_Header_Settings extends NeeonTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_header_controls' ) );
	}

    public function register_header_controls( $wp_customize ) {
		
		// Top Bar Style
		$wp_customize->add_setting( 'top_bar',
            array(
                'default' => $this->defaults['top_bar'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_bar',
            array(
                'label' => __( 'Top Bar On/Off', 'neeon' ),
                'section' => 'header_top_section',
            )
        ) );
		
        $wp_customize->add_setting( 'top_bar_style',
            array(
                'default' => $this->defaults['top_bar_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',

            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'top_bar_style',
            array(
                'label' => __( 'Top Bar Layout', 'neeon' ),
                'description' => esc_html__( 'You can override this settings only Mobile', 'neeon' ),
                'section' => 'header_top_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-1.jpg',
                        'name' => __( 'Layout 1', 'neeon' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-2.jpg',
                        'name' => __( 'Layout 2', 'neeon' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-3.jpg',
                        'name' => __( 'Layout 3', 'neeon' )
                    ),                    
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-4.jpg',
                        'name' => __( 'Layout 4', 'neeon' )
                    ),                                        
                    '5' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-5.jpg',
                        'name' => __( 'Layout 5', 'neeon' )
                    ),                                       
                    '6' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-6.jpg',
                        'name' => __( 'Layout 6', 'neeon' )
                    ),
                ),
                'active_callback'   => 'rttheme_is_topbar_enabled',
            )
        ) );

        // Top Bar Style
        $wp_customize->add_setting( 'top_bar_date',
            array(
                'default' => $this->defaults['top_bar_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_bar_date',
            array(
                'label' => __( 'Topbar Date', 'neeon' ),
                'section' => 'header_top_section',
            )
        ) );

        /*topbar two option*/
        $wp_customize->add_setting( 'top_bar_update',
            array(
                'default' => $this->defaults['top_bar_update'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        ); 
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_bar_update',
            array(
                'label' => __( 'Topbar Last Update', 'neeon' ),
                'section' => 'header_top_section',
                'active_callback'   => 'rttheme_is_topbar2_enabled',
            )
        ) );
        $wp_customize->add_setting( 'top_address_2',
            array(
                'default' => $this->defaults['top_address_2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_address_2',
            array(
                'label' => __( 'Topbar Address', 'neeon' ),
                'section' => 'header_top_section',
                'active_callback'   => 'rttheme_is_topbar2_enabled',
            )
        ) );

        $wp_customize->add_setting( 'top_email_2',
            array(
                'default' => $this->defaults['top_email_2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_email_2',
            array(
                'label' => __( 'Topbar Email', 'neeon' ),
                'section' => 'header_top_section',
                'active_callback'   => 'rttheme_is_topbar2_enabled',
            )
        ) );

        /*topbar three option*/
        $wp_customize->add_setting( 'top_address_3',
            array(
                'default' => $this->defaults['top_address_3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_address_3',
            array(
                'label' => __( 'Topbar Address', 'neeon' ),
                'section' => 'header_top_section',
                'active_callback'   => 'rttheme_is_topbar3_enabled',
            )
        ) );

        $wp_customize->add_setting( 'top_social_3',
            array(
                'default' => $this->defaults['top_social_3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_social_3',
            array(
                'label' => __( 'Topbar Social', 'neeon' ),
                'section' => 'header_top_section',
                'active_callback'   => 'rttheme_is_topbar3_enabled',
            )
        ) );

		// Topbar one option
		$wp_customize->add_setting('top_bar_bgcolor', 
            array(
                'default' => $this->defaults['top_bar_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_bgcolor',
            array(
                'label' => esc_html__('Top Bar Background Color', 'neeon'),
                'section' => 'header_top_section', 
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_bar_color', 
            array(
                'default' => $this->defaults['top_bar_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_color',
            array(
                'label' => esc_html__('Top Bar Text Color', 'neeon'),
                'section' => 'header_top_section', 
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_baricon_color', 
            array(
                'default' => $this->defaults['top_baricon_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_baricon_color',
            array(
                'label' => esc_html__('Top Bar Icon Color', 'neeon'),
                'section' => 'header_top_section', 
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        ));
		
		// Topbar two option
		$wp_customize->add_setting('top_bar_bgcolor_2', 
            array(
                'default' => $this->defaults['top_bar_bgcolor_2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_bgcolor_2',
            array(
                'label' => esc_html__('Top Bar Background Color', 'neeon'),
                'section' => 'header_top_section', 
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_bar_color_2', 
            array(
                'default' => $this->defaults['top_bar_color_2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_color_2',
            array(
                'label' => esc_html__('Top Bar Text Color', 'neeon'),
                'section' => 'header_top_section', 
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_baricon_color_2', 
            array(
                'default' => $this->defaults['top_baricon_color_2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_baricon_color_2',
            array(
                'label' => esc_html__('Top Bar Icon Color', 'neeon'),
                'section' => 'header_top_section', 
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        ));

        // Topbar three option
        $wp_customize->add_setting('top_bar_bgcolor_3', 
            array(
                'default' => $this->defaults['top_bar_bgcolor_3'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_bgcolor_3',
            array(
                'label' => esc_html__('Top Bar Background Color', 'neeon'),
                'section' => 'header_top_section', 
                'active_callback'   => 'rttheme_is_topbar3_enabled',    
            )
        ));
        
        $wp_customize->add_setting('top_bar_color_3', 
            array(
                'default' => $this->defaults['top_bar_color_3'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_color_3',
            array(
                'label' => esc_html__('Top Bar Text Color', 'neeon'),
                'section' => 'header_top_section', 
                'active_callback'   => 'rttheme_is_topbar3_enabled',    
            )
        ));
        
        $wp_customize->add_setting('top_baricon_color_3', 
            array(
                'default' => $this->defaults['top_baricon_color_3'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_baricon_color_3',
            array(
                'label' => esc_html__('Top Bar Icon Color', 'neeon'),
                'section' => 'header_top_section', 
                'active_callback'   => 'rttheme_is_topbar3_enabled',    
            )
        )); 
        /*top bar 4 style*/
        $wp_customize->add_setting( 'top_social_4',
            array(
                'default' => $this->defaults['top_social_4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_social_4',
            array(
                'label' => __( 'Topbar Social', 'neeon' ),
                'section' => 'header_top_section',
                'active_callback'   => 'rttheme_is_topbar4_enabled',
            )
        ) );
        $wp_customize->add_setting( 'topbar_menu',
            array(
                'default' => $this->defaults['topbar_menu'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'topbar_menu',
            array(
                'label' => __( 'Select Topbar Menu', 'neeon' ),
                'section' => 'header_top_section',
                'type' => 'select',
                'choices' => neeon_top_menu(),
                'active_callback'   => 'rttheme_is_topbar4_enabled',    
            )
        );
        $wp_customize->add_setting('top_bar_bgcolor_4', 
            array(
                'default' => $this->defaults['top_bar_bgcolor_4'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_bgcolor_4',
            array(
                'label' => esc_html__('Top Bar Background Color', 'neeon'),
                'section' => 'header_top_section', 
                'active_callback'   => 'rttheme_is_topbar4_enabled',    
            )
        ));
        
        $wp_customize->add_setting('top_bar_color_4', 
            array(
                'default' => $this->defaults['top_bar_color_4'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_color_4',
            array(
                'label' => esc_html__('Top Bar Text Color', 'neeon'),
                'section' => 'header_top_section', 
                'active_callback'   => 'rttheme_is_topbar4_enabled',    
            )
        ));
        
        $wp_customize->add_setting('top_baricon_color_4', 
            array(
                'default' => $this->defaults['top_baricon_color_4'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_baricon_color_4',
            array(
                'label' => esc_html__('Top Bar Icon Color', 'neeon'),
                'section' => 'header_top_section', 
                'active_callback'   => 'rttheme_is_topbar4_enabled',    
            )
        ));

        /*top bar 4 style*/
        $wp_customize->add_setting('top_bar_bgcolor_5', 
            array(
                'default' => $this->defaults['top_bar_bgcolor_5'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_bgcolor_5',
            array(
                'label' => esc_html__('Top Bar Background Color', 'neeon'),
                'section' => 'header_top_section', 
                'active_callback'   => 'rttheme_is_topbar5_enabled',    
            )
        ));
        
        $wp_customize->add_setting('top_bar_color_5', 
            array(
                'default' => $this->defaults['top_bar_color_5'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_color_5',
            array(
                'label' => esc_html__('Top Bar Text Color', 'neeon'),
                'section' => 'header_top_section', 
                'active_callback'   => 'rttheme_is_topbar5_enabled',    
            )
        ));

        $wp_customize->add_setting('top_barhov_color_5', 
            array(
                'default' => $this->defaults['top_barhov_color_5'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_barhov_color_5',
            array(
                'label' => esc_html__('Top Bar Hover Color', 'neeon'),
                'section' => 'header_top_section', 
                'active_callback'   => 'rttheme_is_topbar5_enabled',    
            )
        ));
        
        $wp_customize->add_setting('top_baricon_color_5', 
            array(
                'default' => $this->defaults['top_baricon_color_5'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_baricon_color_5',
            array(
                'label' => esc_html__('Top Bar Icon Color', 'neeon'),
                'section' => 'header_top_section', 
                'active_callback'   => 'rttheme_is_topbar5_enabled',    
            )
        ));

        /**
         * Heading for Header Variation
         */
        $wp_customize->add_setting('header_variation_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_variation_heading', array(
            'label' => __( 'Header Variation', 'neeon' ),
            'section' => 'header_section',
        )));
		
		$wp_customize->add_setting( 'sticky_menu',
            array(
                'default' => $this->defaults['sticky_menu'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'sticky_menu',
            array(
                'label' => __( 'Sticky Header', 'neeon' ),
                'section' => 'header_section',
            )
        ) );
		
		$wp_customize->add_setting( 'header_opt',
            array(
                'default' => $this->defaults['header_opt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'header_opt',
            array(
                'label' => __( 'Header On/Off', 'neeon' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting('header_bg_color', 
            array(
                'default' => $this->defaults['header_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color',
            array(
                'label' => esc_html__('Header Background Color', 'neeon'),
                'section' => 'header_section', 
            )
        ));

        // Header Style
        $wp_customize->add_setting( 'header_style',
            array(
                'default' => $this->defaults['header_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'header_style',
            array(
                'label' => __( 'Header Layout', 'neeon' ),
                'description' => esc_html__( 'You can override this settings only Mobile', 'neeon' ),
                'section' => 'header_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-1.jpg',
                        'name' => __( 'Layout 1', 'neeon' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-2.jpg',
                        'name' => __( 'Layout 2', 'neeon' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-3.jpg',
                        'name' => __( 'Layout 3', 'neeon' )
                    ),
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-4.jpg',
                        'name' => __( 'Layout 4', 'neeon' )
                    ),
                    '5' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-5.jpg',
                        'name' => __( 'Layout 5', 'neeon' )
                    ),
                    '6' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-6.jpg',
                        'name' => __( 'Layout 6', 'neeon' )
                    ),
                    '7' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-7.jpg',
                        'name' => __( 'Layout 7', 'neeon' )
                    ),
                    '8' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-8.jpg',
                        'name' => __( 'Layout 8', 'neeon' )
                    ),
                    '9' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-9.jpg',
                        'name' => __( 'Layout 9', 'neeon' )
                    ),
                    '10' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-10.jpg',
                        'name' => __( 'Layout 10', 'neeon' )
                    ),
                    '11' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-11.jpg',
                        'name' => __( 'Layout 11', 'neeon' )
                    ),
                    '12' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-12.jpg',
                        'name' => __( 'Layout 12', 'neeon' )
                    ),
                    '13' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-13.jpg',
                        'name' => __( 'Layout 13', 'neeon' )
                    ),
                    '14' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-14.jpg',
                        'name' => __( 'Layout 14', 'neeon' )
                    ),
                    '15' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-15.jpg',
                        'name' => __( 'Layout 15', 'neeon' )
                    ),
                )
            )
        ) );

        //Header Action
		$wp_customize->add_setting( 'search_icon',
            array(
                'default' => $this->defaults['search_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'search_icon',
            array(
                'label' => __( 'Search Icon', 'neeon' ),
                'section' => 'header_section',
            )
        ) );
		
		$wp_customize->add_setting( 'vertical_menu_icon',
            array(
                'default' => $this->defaults['vertical_menu_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'vertical_menu_icon',
            array(
                'label' => __( 'Vertical Menu Icon', 'neeon' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'cart_icon',
            array(
                'default' => $this->defaults['cart_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'cart_icon',
            array(
                'label' => __( 'Cart Icon', 'neeon' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'user_icon',
            array(
                'default' => $this->defaults['user_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'user_icon',
            array(
                'label' => __( 'User Icon', 'neeon' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'header_date',
            array(
                'default' => $this->defaults['header_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'header_date',
            array(
                'label' => __( 'Header Date', 'neeon' ),
                'section' => 'header_section',
            )
        ) );
        /*header button*/
        $wp_customize->add_setting( 'online_button',
            array(
                'default' => $this->defaults['online_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'online_button',
            array(
                'label' => __( 'Make a Header Button', 'neeon' ),
                'section' => 'header_section',
            )
        ) );
        
        $wp_customize->add_setting( 'online_button_text',
            array(
                'default' => $this->defaults['online_button_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'online_button_text',
            array(
                'label' => __( 'Button Text', 'neeon' ),
                'section' => 'header_section',
                'type' => 'text',
                'active_callback'   => 'rttheme_is_button_enabled',
            )
        );
        
        $wp_customize->add_setting( 'online_button_link',
            array(
                'default' => $this->defaults['online_button_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'online_button_link',
            array(
                'label' => __( 'Button Link', 'neeon' ),
                'section' => 'header_section',
                'type' => 'url',
                'active_callback'   => 'rttheme_is_button_enabled',
            )
        );
        /*header subscribe button*/
        $wp_customize->add_setting( 'subscribe_button',
            array(
                'default' => $this->defaults['subscribe_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'subscribe_button',
            array(
                'label' => __( 'Header Subscribe Button', 'neeon' ),
                'section' => 'header_section',
            )
        ) );
        
        $wp_customize->add_setting( 'subscribe_button_text',
            array(
                'default' => $this->defaults['subscribe_button_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'subscribe_button_text',
            array(
                'label' => __( 'Subscribe Button Text', 'neeon' ),
                'section' => 'header_section',
                'type' => 'text',
                'active_callback'   => 'rttheme_is_subscribe_button_enabled',
            )
        );
        
        $wp_customize->add_setting( 'subscribe_button_link',
            array(
                'default' => $this->defaults['subscribe_button_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'subscribe_button_link',
            array(
                'label' => __( 'Subscribe Button Link', 'neeon' ),
                'section' => 'header_section',
                'type' => 'url',
                'active_callback'   => 'rttheme_is_subscribe_button_enabled',
            )
        );


        /**
         * Heading for Header Variation
         */
        $wp_customize->add_setting('header_mobile_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_mobile_heading', array(
            'label' => __( 'Mobile Header Option', 'neeon' ),
            'section' => 'header_mobile_section',
        )));

        $wp_customize->add_setting( 'mobile_topbar',
            array(
                'default' => $this->defaults['mobile_topbar'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_topbar',
            array(
                'label' => __( 'Mobile Topbar', 'neeon' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_date',
            array(
                'default' => $this->defaults['mobile_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_date',
            array(
                'label' => __( 'Mobile Date', 'neeon' ),
                'section' => 'header_mobile_section',
            )
        ) );
        $wp_customize->add_setting( 'mobile_phone',
            array(
                'default' => $this->defaults['mobile_phone'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_phone',
            array(
                'label' => __( 'Mobile Phone No', 'neeon' ),
                'section' => 'header_mobile_section',
            )
        ) );
        $wp_customize->add_setting( 'mobile_email',
            array(
                'default' => $this->defaults['mobile_email'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_email',
            array(
                'label' => __( 'Mobile Email', 'neeon' ),
                'section' => 'header_mobile_section',
            )
        ) );
        $wp_customize->add_setting( 'mobile_address',
            array(
                'default' => $this->defaults['mobile_address'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_address',
            array(
                'label' => __( 'Mobile Address', 'neeon' ),
                'section' => 'header_mobile_section',
            )
        ) );
        $wp_customize->add_setting( 'mobile_subscribe',
            array(
                'default' => $this->defaults['mobile_subscribe'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_subscribe',
            array(
                'label' => __( 'Mobile Subscribe', 'neeon' ),
                'section' => 'header_mobile_section',
            )
        ) );
        $wp_customize->add_setting( 'mobile_social',
            array(
                'default' => $this->defaults['mobile_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_social',
            array(
                'label' => __( 'Mobile Social', 'neeon' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_search',
            array(
                'default' => $this->defaults['mobile_search'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_search',
            array(
                'label' => __( 'Mobile Search', 'neeon' ),
                'section' => 'header_mobile_section',
            )
        ) );
        $wp_customize->add_setting( 'mobile_cart',
            array(
                'default' => $this->defaults['mobile_cart'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_cart',
            array(
                'label' => __( 'Mobile Cart', 'neeon' ),
                'section' => 'header_mobile_section',
            )
        ) );
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new NeeonTheme_Header_Settings();
}

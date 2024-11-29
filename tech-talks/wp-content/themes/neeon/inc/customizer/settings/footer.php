<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\neeon\Customizer\Settings;

use radiustheme\neeon\Customizer\NeeonTheme_Customizer;
use radiustheme\neeon\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\neeon\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class NeeonTheme_Footer_Settings extends NeeonTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_footer_controls' ) );
	}

    public function register_footer_controls( $wp_customize ) {
		
		// Footer off & on
		$wp_customize->add_setting( 'footer_area',
            array(
                'default' => $this->defaults['footer_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer_area',
            array(
                'label' => __( 'Footer Top', 'neeon' ),
                'section' => 'footer_section',
            )
        ) );
        $wp_customize->add_setting( 'copyright_area',
            array(
                'default' => $this->defaults['copyright_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'copyright_area',
            array(
                'label' => __( 'Footer Copyright', 'neeon' ),
                'section' => 'footer_section',
            )
        ) );
        $wp_customize->add_setting( 'footer_sticky',
            array(
                'default' => $this->defaults['footer_sticky'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer_sticky',
            array(
                'label' => __( 'Footer Sticky', 'neeon' ),
                'section' => 'footer_section',
            )
        ) );
		
        // Footer Style
        $wp_customize->add_setting( 'footer_style',
            array(
                'default' => $this->defaults['footer_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );

        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'footer_style',
            array(
                'label' => __( 'Footer Layout', 'neeon' ),
                'description' => esc_html__( 'You can set default footer form here.', 'neeon' ),
                'section' => 'footer_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-1.jpg',
                        'name' => __( 'Layout 1', 'neeon' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-2.jpg',
                        'name' => __( 'Layout 2', 'neeon' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-3.jpg',
                        'name' => __( 'Layout 3', 'neeon' )
                    ),
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-4.jpg',
                        'name' => __( 'Layout 4', 'neeon' )
                    ),
                    '5' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-5.jpg',
                        'name' => __( 'Layout 5', 'neeon' )
                    ),
                    '6' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-6.jpg',
                        'name' => __( 'Layout 6', 'neeon' )
                    ),
                    '7' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-7.jpg',
                        'name' => __( 'Layout 7', 'neeon' )
                    ),
                    '8' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-8.jpg',
                        'name' => __( 'Layout 8', 'neeon' )
                    ),
                )
            )
        ) );
		// Footer 1 column
		$wp_customize->add_setting( 'footer_column_1',
            array(
                'default' => $this->defaults['footer_column_1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );
        $wp_customize->add_control( 'footer_column_1',
            array(
                'label' => __( 'Number of Columns for Footer', 'neeon' ),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Column', 'neeon' ),
                    '2' => esc_html__( '2 Columns', 'neeon' ),
                    '3' => esc_html__( '3 Columns', 'neeon' ),
                    '4' => esc_html__( '4 Columns', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );

        // Footer 2 column
        $wp_customize->add_setting( 'footer_column_2',
            array(
                'default' => $this->defaults['footer_column_2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        );
        $wp_customize->add_control( 'footer_column_2',
            array(
                'label' => __( 'Number of Columns for Footer', 'neeon' ),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Column', 'neeon' ),
                    '2' => esc_html__( '2 Columns', 'neeon' ),
                    '3' => esc_html__( '3 Columns', 'neeon' ),
                    '4' => esc_html__( '4 Columns', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        );

        // Footer 4 column
        $wp_customize->add_setting( 'footer_column_4',
            array(
                'default' => $this->defaults['footer_column_4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_column_4',
            array(
                'label' => __( 'Number of Columns for Footer', 'neeon' ),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Column', 'neeon' ),
                    '2' => esc_html__( '2 Columns', 'neeon' ),
                    '3' => esc_html__( '3 Columns', 'neeon' ),
                    '4' => esc_html__( '4 Columns', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer4_enabled',
            )
        );

        // Footer 5 column
        $wp_customize->add_setting( 'footer_column_5',
            array(
                'default' => $this->defaults['footer_column_5'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_column_5',
            array(
                'label' => __( 'Number of Columns for Footer', 'neeon' ),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Column', 'neeon' ),
                    '2' => esc_html__( '2 Columns', 'neeon' ),
                    '3' => esc_html__( '3 Columns', 'neeon' ),
                    '4' => esc_html__( '4 Columns', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer5_enabled',
            )
        );

        // Footer 6 column
        $wp_customize->add_setting( 'footer_column_6',
            array(
                'default' => $this->defaults['footer_column_6'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_column_6',
            array(
                'label' => __( 'Number of Columns for Footer', 'neeon' ),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Column', 'neeon' ),
                    '2' => esc_html__( '2 Columns', 'neeon' ),
                    '3' => esc_html__( '3 Columns', 'neeon' ),
                    '4' => esc_html__( '4 Columns', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer6_enabled',
            )
        );

        // Footer 8 column
        $wp_customize->add_setting( 'footer_column_8',
            array(
                'default' => $this->defaults['footer_column_8'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_column_8',
            array(
                'label' => __( 'Number of Columns for Footer', 'neeon' ),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Column', 'neeon' ),
                    '2' => esc_html__( '2 Columns', 'neeon' ),
                    '3' => esc_html__( '3 Columns', 'neeon' ),
                    '4' => esc_html__( '4 Columns', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer8_enabled',
            )
        );
		
		// Footer 1 bg type
		$wp_customize->add_setting( 'footer_bgtype',
            array(
                'default' => $this->defaults['footer_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype',
            array(
                'label' => __( 'Background Type', 'neeon' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'neeon' ),
                'type' => 'select',
                'choices' => array(
					'fbgcolor' => esc_html__( 'BG Color', 'neeon' ),
                    'fbgimg' => esc_html__( 'BG Image', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );

        $wp_customize->add_setting('fbgcolor', 
            array(
                'default' => $this->defaults['fbgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor',
            array(
                'label' => esc_html__('Background Color', 'neeon'),
                'settings' => 'fbgcolor', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer1_bgcolor_type_condition',
            )
        ));

        $wp_customize->add_setting( 'fbgimg',
            array(
                'default' => $this->defaults['fbgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg',
            array(
                'label' => __( 'Background Image', 'neeon' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'neeon' ),
                'section' => 'footer_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'neeon' ),
                    'change' => __( 'Change File', 'neeon' ),
                    'default' => __( 'Default', 'neeon' ),
                    'remove' => __( 'Remove', 'neeon' ),
                    'placeholder' => __( 'No file selected', 'neeon' ),
                    'frame_title' => __( 'Select File', 'neeon' ),
                    'frame_button' => __( 'Choose File', 'neeon' ),
                ),
                'active_callback' => 'rttheme_footer1_bgimg_type_condition',
            )
        ) );

        // Footer 2 bg type
        $wp_customize->add_setting( 'footer_bgtype2',
            array(
                'default' => $this->defaults['footer_bgtype2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype2',
            array(
                'label' => __( 'Background Type', 'neeon' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'neeon' ),
                'type' => 'select',
                'choices' => array(
                    'fbgcolor2' => esc_html__( 'BG Color', 'neeon' ),
                    'fbgimg2' => esc_html__( 'BG Image', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        );	

        $wp_customize->add_setting('fbgcolor2', 
            array(
                'default' => $this->defaults['fbgcolor2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor2',
            array(
                'label' => esc_html__('Background Color', 'neeon'),
                'settings' => 'fbgcolor2', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer2_bgcolor_type_condition',
            )
        ));		

        $wp_customize->add_setting( 'fbgimg2',
            array(
                'default' => $this->defaults['fbgimg2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg2',
            array(
                'label' => __( 'Background Image', 'neeon' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'neeon' ),
                'section' => 'footer_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'neeon' ),
                    'change' => __( 'Change File', 'neeon' ),
                    'default' => __( 'Default', 'neeon' ),
                    'remove' => __( 'Remove', 'neeon' ),
                    'placeholder' => __( 'No file selected', 'neeon' ),
                    'frame_title' => __( 'Select File', 'neeon' ),
                    'frame_button' => __( 'Choose File', 'neeon' ),
                ),
                'active_callback' => 'rttheme_footer2_bgimg_type_condition',
            )
        ) );

        // Footer 3 bg type
        $wp_customize->add_setting( 'footer_bgtype3',
            array(
                'default' => $this->defaults['footer_bgtype3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype3',
            array(
                'label' => __( 'Background Type', 'neeon' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'neeon' ),
                'type' => 'select',
                'choices' => array(
                    'fbgcolor3' => esc_html__( 'BG Color', 'neeon' ),
                    'fbgimg3' => esc_html__( 'BG Image', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        );    

        $wp_customize->add_setting('fbgcolor3', 
            array(
                'default' => $this->defaults['fbgcolor3'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor3',
            array(
                'label' => esc_html__('Background Color', 'neeon'),
                'settings' => 'fbgcolor3', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer3_bgcolor_type_condition',
            )
        ));     

        $wp_customize->add_setting( 'fbgimg3',
            array(
                'default' => $this->defaults['fbgimg3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg3',
            array(
                'label' => __( 'Background Image', 'neeon' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'neeon' ),
                'section' => 'footer_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'neeon' ),
                    'change' => __( 'Change File', 'neeon' ),
                    'default' => __( 'Default', 'neeon' ),
                    'remove' => __( 'Remove', 'neeon' ),
                    'placeholder' => __( 'No file selected', 'neeon' ),
                    'frame_title' => __( 'Select File', 'neeon' ),
                    'frame_button' => __( 'Choose File', 'neeon' ),
                ),
                'active_callback' => 'rttheme_footer3_bgimg_type_condition',
            )
        ) );

        // Footer 4 bgtype
        $wp_customize->add_setting( 'footer_bgtype4',
            array(
                'default' => $this->defaults['footer_bgtype4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype4',
            array(
                'label' => __( 'Background Type', 'neeon' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'neeon' ),
                'type' => 'select',
                'choices' => array(
                    'fbgcolor4' => esc_html__( 'BG Color', 'neeon' ),
                    'fbgimg4' => esc_html__( 'BG Image', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer4_enabled',
            )
        );   

        $wp_customize->add_setting('fbgcolor4', 
            array(
                'default' => $this->defaults['fbgcolor4'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor4',
            array(
                'label' => esc_html__('Background Color', 'neeon'),
                'settings' => 'fbgcolor4', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer4_bgcolor_type_condition',
            )
        ));     

        $wp_customize->add_setting( 'fbgimg4',
            array(
                'default' => $this->defaults['fbgimg4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg4',
            array(
                'label' => __( 'Background Image', 'neeon' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'neeon' ),
                'section' => 'footer_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'neeon' ),
                    'change' => __( 'Change File', 'neeon' ),
                    'default' => __( 'Default', 'neeon' ),
                    'remove' => __( 'Remove', 'neeon' ),
                    'placeholder' => __( 'No file selected', 'neeon' ),
                    'frame_title' => __( 'Select File', 'neeon' ),
                    'frame_button' => __( 'Choose File', 'neeon' ),
                ),
                'active_callback' => 'rttheme_footer4_bgimg_type_condition',
            )
        ) );

        // Footer 5 bg type
        $wp_customize->add_setting( 'footer_bgtype5',
            array(
                'default' => $this->defaults['footer_bgtype5'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype5',
            array(
                'label' => __( 'Background Type', 'neeon' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'neeon' ),
                'type' => 'select',
                'choices' => array(
                    'fbgcolor5' => esc_html__( 'BG Color', 'neeon' ),
                    'fbgimg5' => esc_html__( 'BG Image', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer5_enabled',
            )
        );  

        $wp_customize->add_setting('fbgcolor5', 
            array(
                'default' => $this->defaults['fbgcolor5'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor5',
            array(
                'label' => esc_html__('Background Color', 'neeon'),
                'settings' => 'fbgcolor5', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer5_bgcolor_type_condition',
            )
        ));     

        $wp_customize->add_setting( 'fbgimg5',
            array(
                'default' => $this->defaults['fbgimg5'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg5',
            array(
                'label' => __( 'Background Image', 'neeon' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'neeon' ),
                'section' => 'footer_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'neeon' ),
                    'change' => __( 'Change File', 'neeon' ),
                    'default' => __( 'Default', 'neeon' ),
                    'remove' => __( 'Remove', 'neeon' ),
                    'placeholder' => __( 'No file selected', 'neeon' ),
                    'frame_title' => __( 'Select File', 'neeon' ),
                    'frame_button' => __( 'Choose File', 'neeon' ),
                ),
                'active_callback' => 'rttheme_footer5_bgimg_type_condition',
            )
        ) );

        // Footer 6 bg type
        $wp_customize->add_setting( 'footer_bgtype6',
            array(
                'default' => $this->defaults['footer_bgtype6'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype6',
            array(
                'label' => __( 'Background Type', 'neeon' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'neeon' ),
                'type' => 'select',
                'choices' => array(
                    'fbgcolor6' => esc_html__( 'BG Color', 'neeon' ),
                    'fbgimg6' => esc_html__( 'BG Image', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer6_enabled',
            )
        ); 

        $wp_customize->add_setting('fbgcolor6', 
            array(
                'default' => $this->defaults['fbgcolor6'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor6',
            array(
                'label' => esc_html__('Background Color', 'neeon'),
                'settings' => 'fbgcolor6', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer6_bgcolor_type_condition',
            )
        ));     

        $wp_customize->add_setting( 'fbgimg6',
            array(
                'default' => $this->defaults['fbgimg6'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg6',
            array(
                'label' => __( 'Background Image', 'neeon' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'neeon' ),
                'section' => 'footer_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'neeon' ),
                    'change' => __( 'Change File', 'neeon' ),
                    'default' => __( 'Default', 'neeon' ),
                    'remove' => __( 'Remove', 'neeon' ),
                    'placeholder' => __( 'No file selected', 'neeon' ),
                    'frame_title' => __( 'Select File', 'neeon' ),
                    'frame_button' => __( 'Choose File', 'neeon' ),
                ),
                'active_callback' => 'rttheme_footer6_bgimg_type_condition',
            )
        ) );

        // Footer 7 bg type
        $wp_customize->add_setting( 'footer_bgtype7',
            array(
                'default' => $this->defaults['footer_bgtype7'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype7',
            array(
                'label' => __( 'Background Type', 'neeon' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'neeon' ),
                'type' => 'select',
                'choices' => array(
                    'fbgcolor7' => esc_html__( 'BG Color', 'neeon' ),
                    'fbgimg7' => esc_html__( 'BG Image', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer7_enabled',
            )
        );      

        $wp_customize->add_setting('fbgcolor7', 
            array(
                'default' => $this->defaults['fbgcolor7'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor7',
            array(
                'label' => esc_html__('Background Color', 'neeon'),
                'settings' => 'fbgcolor7', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer7_bgcolor_type_condition',
            )
        ));     

        $wp_customize->add_setting( 'fbgimg7',
            array(
                'default' => $this->defaults['fbgimg7'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg7',
            array(
                'label' => __( 'Background Image', 'neeon' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'neeon' ),
                'section' => 'footer_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'neeon' ),
                    'change' => __( 'Change File', 'neeon' ),
                    'default' => __( 'Default', 'neeon' ),
                    'remove' => __( 'Remove', 'neeon' ),
                    'placeholder' => __( 'No file selected', 'neeon' ),
                    'frame_title' => __( 'Select File', 'neeon' ),
                    'frame_button' => __( 'Choose File', 'neeon' ),
                ),
                'active_callback' => 'rttheme_footer7_bgimg_type_condition',
            )
        ) );

        // Footer 8 bg type
        $wp_customize->add_setting( 'footer_bgtype8',
            array(
                'default' => $this->defaults['footer_bgtype8'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype8',
            array(
                'label' => __( 'Background Type', 'neeon' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'neeon' ),
                'type' => 'select',
                'choices' => array(
                    'fbgcolor8' => esc_html__( 'BG Color', 'neeon' ),
                    'fbgimg8' => esc_html__( 'BG Image', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_footer8_enabled',
            )
        );      

        $wp_customize->add_setting('fbgcolor8', 
            array(
                'default' => $this->defaults['fbgcolor8'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor8',
            array(
                'label' => esc_html__('Background Color', 'neeon'),
                'settings' => 'fbgcolor8', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer8_bgcolor_type_condition',
            )
        ));     

        $wp_customize->add_setting( 'fbgimg8',
            array(
                'default' => $this->defaults['fbgimg8'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg8',
            array(
                'label' => __( 'Background Image', 'neeon' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'neeon' ),
                'section' => 'footer_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'neeon' ),
                    'change' => __( 'Change File', 'neeon' ),
                    'default' => __( 'Default', 'neeon' ),
                    'remove' => __( 'Remove', 'neeon' ),
                    'placeholder' => __( 'No file selected', 'neeon' ),
                    'frame_title' => __( 'Select File', 'neeon' ),
                    'frame_button' => __( 'Choose File', 'neeon' ),
                ),
                'active_callback' => 'rttheme_footer8_bgimg_type_condition',
            )
        ) );

        /*Footer 1, 2 Color*/ 
		$wp_customize->add_setting('footer_title_color', 
            array(
                'default' => $this->defaults['footer_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer12_color_enabled',
            )
        ));
		
		$wp_customize->add_setting('footer_color', 
            array(
                'default' => $this->defaults['footer_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color',
            array(
                'label' => esc_html__('Footer Text Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer12_color_enabled',
            )
        ));
		
		$wp_customize->add_setting('footer_link_color', 
            array(
                'default' => $this->defaults['footer_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer12_color_enabled',
            )
        ));
		
		$wp_customize->add_setting('footer_link_hover_color', 
            array(
                'default' => $this->defaults['footer_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_hover_color',
            array(
                'label' => esc_html__('Footer Link Hover Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer12_color_enabled',
            )
        ));
        // Footer 2 copyright bg color
        $wp_customize->add_setting('copyright_text_color', 
            array(
                'default' => $this->defaults['copyright_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_text_color',
            array(
                'label' => esc_html__('Copyright Text Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer12_color_enabled',
            )
        ));

        $wp_customize->add_setting('copyright_link_color', 
            array(
                'default' => $this->defaults['copyright_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_link_color',
            array(
                'label' => esc_html__('Copyright Link Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer12_color_enabled',
            )
        )); 

        $wp_customize->add_setting('copyright_hover_color', 
            array(
                'default' => $this->defaults['copyright_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_hover_color',
            array(
                'label' => esc_html__('Copyright Hover Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer12_color_enabled',
            )
        )); 

        /* = Footer 3
        ======================================================*/       

        $wp_customize->add_setting('footer3_title_color', 
            array(
                'default' => $this->defaults['footer3_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ));
        
        $wp_customize->add_setting('footer3_color', 
            array(
                'default' => $this->defaults['footer3_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_color',
            array(
                'label' => esc_html__('Footer Text Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ));

        $wp_customize->add_setting('footer3_link_color', 
            array(
                'default' => $this->defaults['footer3_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ));

        $wp_customize->add_setting('footer3_hover_color', 
            array(
                'default' => $this->defaults['footer3_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_hover_color',
            array(
                'label' => esc_html__('Footer Hover Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ));
        /* Footer 3 logo */
        $wp_customize->add_setting( 'footer3_logo',
            array(
                'default' => $this->defaults['footer3_logo'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer3_logo',
            array(
                'label' => __( 'Footer Logo', 'neeon' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ) );

        /* Footer 3 Social */
        $wp_customize->add_setting( 'footer3_social',
            array(
                'default' => $this->defaults['footer3_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer3_social',
            array(
                'label' => __( 'Footer Social', 'neeon' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ) );
        
        /*footer 3 logo*/
        $wp_customize->add_setting('footer_logo_light',
            array(
              'default'           => $this->defaults['footer_logo_light'],
              'transport'         => 'refresh',
              'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo_light',
            array(
                'label'         => esc_html__('Footer Logo', 'neeon'),
                'description'   => esc_html__('This is the description for the Media Control', 'neeon'),
                'section'       => 'footer_section',
                'mime_type'     => 'image',
                'button_labels' => array(
                    'select'       => esc_html__('Select File', 'neeon'),
                    'change'       => esc_html__('Change File', 'neeon'),
                    'default'      => esc_html__('Default', 'neeon'),
                    'remove'       => esc_html__('Remove', 'neeon'),
                    'placeholder'  => esc_html__('No file selected', 'neeon'),
                    'frame_title'  => esc_html__('Select File', 'neeon'),
                    'frame_button' => esc_html__('Choose File', 'neeon'),
                ),
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ));
        /* = Footer 4
        ======================================================*/
        $wp_customize->add_setting( 'footer_shape4',
            array(
                'default' => $this->defaults['footer_shape4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer_shape4',
            array(
                'label' => __( 'Footer Shape', 'neeon' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer4_enabled',
            )
        ) );

        /* = Footer 5
        ======================================================*/       

        $wp_customize->add_setting('footer5_title_color', 
            array(
                'default' => $this->defaults['footer5_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer5_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer5_enabled',
            )
        ));
        
        $wp_customize->add_setting('footer5_color', 
            array(
                'default' => $this->defaults['footer5_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer5_color',
            array(
                'label' => esc_html__('Footer Text Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer5_enabled',
            )
        ));

        $wp_customize->add_setting('footer5_link_color', 
            array(
                'default' => $this->defaults['footer5_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer5_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer5_enabled',
            )
        ));

        $wp_customize->add_setting('footer5_hover_color', 
            array(
                'default' => $this->defaults['footer5_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer5_hover_color',
            array(
                'label' => esc_html__('Footer Hover Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer5_enabled',
            )
        ));

        $wp_customize->add_setting('footer5_copyright_color', 
            array(
                'default' => $this->defaults['footer5_copyright_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer5_copyright_color',
            array(
                'label' => esc_html__('Footer Copyright Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer5_enabled',
            )
        ));

        /* = Footer 6
        ======================================================*/       
        $wp_customize->add_setting('footer6_title_color', 
            array(
                'default' => $this->defaults['footer6_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer6_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer6_enabled',
            )
        ));
        
        $wp_customize->add_setting('footer6_color', 
            array(
                'default' => $this->defaults['footer6_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer6_color',
            array(
                'label' => esc_html__('Footer Text Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer6_enabled',
            )
        ));

        $wp_customize->add_setting('footer6_link_color', 
            array(
                'default' => $this->defaults['footer6_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer6_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer6_enabled',
            )
        ));

        $wp_customize->add_setting('footer6_hover_color', 
            array(
                'default' => $this->defaults['footer6_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer6_hover_color',
            array(
                'label' => esc_html__('Footer Hover Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer6_enabled',
            )
        ));

        $wp_customize->add_setting('footer6_copyright_color', 
            array(
                'default' => $this->defaults['footer6_copyright_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer6_copyright_color',
            array(
                'label' => esc_html__('Footer Copyright Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer6_enabled',
            )
        ));

        /* = Footer 7
        ======================================================*/       

        $wp_customize->add_setting('footer7_title_color', 
            array(
                'default' => $this->defaults['footer7_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer7_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer7_enabled',
            )
        ));
        
        $wp_customize->add_setting('footer7_color', 
            array(
                'default' => $this->defaults['footer7_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer7_color',
            array(
                'label' => esc_html__('Footer Text Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer7_enabled',
            )
        ));

        $wp_customize->add_setting('footer7_link_color', 
            array(
                'default' => $this->defaults['footer7_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer7_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer7_enabled',
            )
        ));

        $wp_customize->add_setting('footer7_hover_color', 
            array(
                'default' => $this->defaults['footer7_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer7_hover_color',
            array(
                'label' => esc_html__('Footer Hover Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer7_enabled',
            )
        ));
        /* Footer 7 logo */
        $wp_customize->add_setting( 'footer7_logo',
            array(
                'default' => $this->defaults['footer7_logo'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer7_logo',
            array(
                'label' => __( 'Footer Logo', 'neeon' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer7_enabled',
            )
        ) );

        /* Footer 7 Social */
        $wp_customize->add_setting( 'footer7_social',
            array(
                'default' => $this->defaults['footer7_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer7_social',
            array(
                'label' => __( 'Footer Social', 'neeon' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer7_enabled',
            )
        ) );
        
        /*footer 7 logo*/
        $wp_customize->add_setting('footer_logo_light7',
            array(
              'default'           => $this->defaults['footer_logo_light7'],
              'transport'         => 'refresh',
              'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo_light7',
            array(
                'label'         => esc_html__('Footer Logo', 'neeon'),
                'description'   => esc_html__('This is the description for the Media Control', 'neeon'),
                'section'       => 'footer_section',
                'mime_type'     => 'image',
                'button_labels' => array(
                    'select'       => esc_html__('Select File', 'neeon'),
                    'change'       => esc_html__('Change File', 'neeon'),
                    'default'      => esc_html__('Default', 'neeon'),
                    'remove'       => esc_html__('Remove', 'neeon'),
                    'placeholder'  => esc_html__('No file selected', 'neeon'),
                    'frame_title'  => esc_html__('Select File', 'neeon'),
                    'frame_button' => esc_html__('Choose File', 'neeon'),
                ),
                'active_callback' => 'rttheme_is_footer7_enabled',
            )
        ));

        /* = Footer 8
        ======================================================*/ 
        /*footer 7 logo*/
        $wp_customize->add_setting('footer_logo_light8',
            array(
              'default'           => $this->defaults['footer_logo_light8'],
              'transport'         => 'refresh',
              'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo_light8',
            array(
                'label'         => esc_html__('Footer Logo', 'neeon'),
                'description'   => esc_html__('This is the description for the Media Control', 'neeon'),
                'section'       => 'footer_section',
                'mime_type'     => 'image',
                'button_labels' => array(
                    'select'       => esc_html__('Select File', 'neeon'),
                    'change'       => esc_html__('Change File', 'neeon'),
                    'default'      => esc_html__('Default', 'neeon'),
                    'remove'       => esc_html__('Remove', 'neeon'),
                    'placeholder'  => esc_html__('No file selected', 'neeon'),
                    'frame_title'  => esc_html__('Select File', 'neeon'),
                    'frame_button' => esc_html__('Choose File', 'neeon'),
                ),
                'active_callback' => 'rttheme_is_footer8_enabled',
            )
        ));

        /* = Footer Copyright
        ======================================================*/
        $wp_customize->add_setting('copyright_bg_color', 
            array(
                'default' => $this->defaults['copyright_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_bg_color',
            array(
                'label' => esc_html__('Copyright Background Color', 'neeon'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_copyright_bg_color_enabled',
            )
        ));
		
		// Copyright Text
        $wp_customize->add_setting( 'copyright_text',
            array(
                'default' => $this->defaults['copyright_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'copyright_text',
            array(
                'label' => __( 'Copyright Text', 'neeon' ),
                'section' => 'footer_section',
                'type' => 'textarea',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new NeeonTheme_Footer_Settings();
}

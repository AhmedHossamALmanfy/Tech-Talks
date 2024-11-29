<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\neeon\Customizer\Settings;

use radiustheme\neeon\Customizer\NeeonTheme_Customizer;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class NeeonTheme_Error_Settings extends NeeonTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_error_controls' ) );
	}

    public function register_error_controls( $wp_customize ) {
		
		$wp_customize->add_setting('error_bodybg_color', 
            array(
                'default' => $this->defaults['error_bodybg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_bodybg_color',
            array(
                'label' => esc_html__('Body Background Color', 'neeon'),
                'section' => 'error_section', 
            )
        ));
		// Error image
        $wp_customize->add_setting( 'error_image',
            array(
                'default' => $this->defaults['error_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_image',
            array(
                'label' => __( 'Error Image', 'neeon' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'neeon' ),
                'section' => 'error_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'neeon' ),
                    'change' => __( 'Change File', 'neeon' ),
                    'default' => __( 'Default', 'neeon' ),
                    'remove' => __( 'Remove', 'neeon' ),
                    'placeholder' => __( 'No file selected', 'neeon' ),
                    'frame_title' => __( 'Select File', 'neeon' ),
                    'frame_button' => __( 'Choose File', 'neeon' ),
                )
            )
        ) );
		
        // Error Text
        $wp_customize->add_setting( 'error_text1',
            array(
                'default' => $this->defaults['error_text1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_text1',
            array(
                'label' => __( 'Error Heading', 'neeon' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting( 'error_text2',
            array(
                'default' => $this->defaults['error_text2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field'
            )
        );
        $wp_customize->add_control( 'error_text2',
            array(
                'label' => __( 'Error Text', 'neeon' ),
                'section' => 'error_section',
                'type' => 'textarea',
            )
        );
        // Button Text
        $wp_customize->add_setting( 'error_buttontext',
            array(
                'default' => $this->defaults['error_buttontext'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_buttontext',
            array(
                'label' => __( 'Button Text', 'neeon' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting('error_text1_color', 
            array(
                'default' => $this->defaults['error_text1_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text1_color',
            array(
                'label' => esc_html__('Error Heading Color', 'neeon'),
                'section' => 'error_section', 
            )
        ));
		
		$wp_customize->add_setting('error_text2_color', 
            array(
                'default' => $this->defaults['error_text2_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text2_color',
            array(
                'label' => esc_html__('Error Text Color', 'neeon'),
                'section' => 'error_section', 
            )
        ));

        /*Animation*/
        $wp_customize->add_setting( 'error_animation',
            array(
                'default' => $this->defaults['error_animation'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'error_animation',
            array(
                'label' => __( 'Animation On/Off', 'neeon' ),
                'section' => 'error_section',
                'type' => 'select',
                'choices' => array(
                    'wow' => esc_html__( 'Animation On', 'neeon' ),
                    'hide' => esc_html__( 'Animation Off', 'neeon' ),
                ),
            )
        );

        $wp_customize->add_setting( 'error_animation_effect',
            array(
                'default' => $this->defaults['error_animation_effect'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'error_animation_effect',
            array(
                'label' => __( 'Entrance Animation', 'neeon' ),
                'section' => 'error_section',
                'type' => 'select',
                'choices' => array(
                    'none' => esc_html__( 'none', 'neeon' ),
                    'bounce' => esc_html__( 'bounce', 'neeon' ),
                    'flash' => esc_html__( 'flash', 'neeon' ),
                    'pulse' => esc_html__( 'pulse', 'neeon' ),
                    'rubberBand' => esc_html__( 'rubberBand', 'neeon' ),
                    'shakeX' => esc_html__( 'shakeX', 'neeon' ),
                    'shakeY' => esc_html__( 'shakeY', 'neeon' ),
                    'headShake' => esc_html__( 'headShake', 'neeon' ),
                    'swing' => esc_html__( 'swing', 'neeon' ),                 
                    'fadeIn' => esc_html__( 'fadeIn', 'neeon' ),
                    'fadeInDown' => esc_html__( 'fadeInDown', 'neeon' ),
                    'fadeInLeft' => esc_html__( 'fadeInLeft', 'neeon' ),
                    'fadeInRight' => esc_html__( 'fadeInRight', 'neeon' ),
                    'fadeInUp' => esc_html__( 'fadeInUp', 'neeon' ),                   
                    'bounceIn' => esc_html__( 'bounceIn', 'neeon' ),
                    'bounceInDown' => esc_html__( 'bounceInDown', 'neeon' ),
                    'bounceInLeft' => esc_html__( 'bounceInLeft', 'neeon' ),
                    'bounceInRight' => esc_html__( 'bounceInRight', 'neeon' ),
                    'bounceInUp' => esc_html__( 'bounceInUp', 'neeon' ),           
                    'slideInDown' => esc_html__( 'slideInDown', 'neeon' ),
                    'slideInLeft' => esc_html__( 'slideInLeft', 'neeon' ),
                    'slideInRight' => esc_html__( 'slideInRight', 'neeon' ),
                    'slideInUp' => esc_html__( 'slideInUp', 'neeon' ), 
                ),
            )
        );
		
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new NeeonTheme_Error_Settings();
}

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
use radiustheme\neeon\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\neeon\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class NeeonTheme_Team_Post_Settings extends NeeonTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_team_post_controls' ) );
	}

    /**
     * Gallery Post Controls
     */
    public function register_team_post_controls( $wp_customize ) {
		
		$wp_customize->add_setting( 'team_archive_style',
            array(
                'default' => $this->defaults['team_archive_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'team_archive_style',
            array(
                'label' => __( 'Team Archive Layout', 'neeon' ),
                'description' => esc_html__( 'Select the gallery layout for gallery page', 'neeon' ),
                'section' => 'rttheme_team_settings',
                'choices' => array(
                    'style1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/post-style-1.png',
                        'name' => __( 'Layout 1', 'neeon' )
                    ),
                    'style2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/post-style-3.png',
                        'name' => __( 'Layout 2', 'neeon' )
                    ),
                )
            )
        ) );

        // Gallery option
        $wp_customize->add_setting( 'team_arexcerpt_limit',
            array(
                'default' => $this->defaults['team_arexcerpt_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'team_arexcerpt_limit',
            array(
                'label' => __( 'Team Archive Excerpt Limit', 'neeon' ),
                'section' => 'rttheme_team_settings',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'team_ar_excerpt',
            array(
                'default' => $this->defaults['team_ar_excerpt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_ar_excerpt',
            array(
                'label' => __( 'Show Excerpt', 'neeon' ),
                'section' => 'rttheme_team_settings',
            )
        ));
		
		$wp_customize->add_setting( 'team_ar_position',
            array(
                'default' => $this->defaults['team_ar_position'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_ar_position',
            array(
                'label' => __( 'Show Position', 'neeon' ),
                'section' => 'rttheme_team_settings',
            )
        ));
		
		$wp_customize->add_setting( 'team_ar_social',
            array(
                'default' => $this->defaults['team_ar_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_ar_social',
            array(
                'label' => __( 'Show Social', 'neeon' ),
                'section' => 'rttheme_team_settings',
            )
        ));
		
		// Single Gallery Post
		$wp_customize->add_setting('team_single_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'team_single_heading', array(
            'label' => __( 'Single Team', 'neeon' ),
            'section' => 'rttheme_team_settings',
        )));
		
		$wp_customize->add_setting( 'team_info',
            array(
                'default' => $this->defaults['team_info'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_info',
            array(
                'label' => __( 'Show Info', 'neeon' ),
                'section' => 'rttheme_team_settings',
            )
        ));
		
		$wp_customize->add_setting( 'team_skill',
            array(
                'default' => $this->defaults['team_skill'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_skill',
            array(
                'label' => __( 'Show Skill', 'neeon' ),
                'section' => 'rttheme_team_settings',
            )
        ));
		
		// Related Gallery Post
		$wp_customize->add_setting('team_related_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'team_related_heading', array(
            'label' => __( 'Related Team Settings', 'neeon' ),
            'section' => 'rttheme_team_settings',
        )));
		
		$wp_customize->add_setting( 'show_related_team',
            array(
                'default' => $this->defaults['show_related_team'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_related_team',
            array(
                'label' => __( 'Show Related Team', 'neeon' ),
                'section' => 'rttheme_team_settings',
            )
        ));
		
		$wp_customize->add_setting( 'team_related_title',
            array(
                'default' => $this->defaults['team_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'team_related_title',
            array(
                'label' => __( 'Related Title', 'neeon' ),
                'section' => 'rttheme_team_settings',
                'type' => 'text',
				'active_callback'   => 'rttheme_is_related_team_enabled',
            )
        );
		
		$wp_customize->add_setting( 'related_team_number',
            array(
                'default' => $this->defaults['related_team_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_team_number',
            array(
                'label' => __( 'Team Post', 'neeon' ),
                'section' => 'rttheme_team_settings',
                'type' => 'number',
				'active_callback'   => 'rttheme_is_related_team_enabled',
            )
        );
		
		$wp_customize->add_setting( 'related_team_title_limit',
            array(
                'default' => $this->defaults['related_team_title_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_team_title_limit',
            array(
                'label' => __( 'Title Limit', 'neeon' ),
                'section' => 'rttheme_team_settings',
                'type' => 'number',
				'active_callback'   => 'rttheme_is_related_team_enabled',
            )
        );
        $wp_customize->add_setting( 'team_slug',
            array(
                'default' => $this->defaults['team_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'team_slug',
            array(
                'label' => __( 'Team Slug', 'neeon' ),
                'section' => 'rttheme_team_settings',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting( 'team_cat_slug',
            array(
                'default' => $this->defaults['team_cat_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'team_cat_slug',
            array(
                'label' => __( 'Team Category Slug', 'neeon' ),
                'section' => 'rttheme_team_settings',
                'type' => 'text',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new NeeonTheme_Team_Post_Settings();
}

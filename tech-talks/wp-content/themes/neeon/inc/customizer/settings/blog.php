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
class NeeonTheme_Blog_Post_Settings extends NeeonTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_blog_post_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_blog_post_controls( $wp_customize ) {

        // Blog Post Style
        $wp_customize->add_setting( 'blog_style',
            array(
                'default' => $this->defaults['blog_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );

        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'blog_style',
            array(
                'label' => __( 'Blog/Archive Layout', 'neeon' ),
                'description' => esc_html__( 'Blog Post layout variation you can selecr and use.', 'neeon' ),
                'section' => 'blog_post_settings_section',
                'choices' => array(
                    'style1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 1', 'neeon' )
                    ),
                    'style2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog3.png',
                        'name' => __( 'Layout 2', 'neeon' )
                    ),
                    'style3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 3', 'neeon' )
                    ),
                    'style4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog2.png',
                        'name' => __( 'Layout 4', 'neeon' )
                    ),
                    'style5' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 5', 'neeon' )
                    ),
                    'style6' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 6', 'neeon' )
                    ),
                )
            )
        ) );

        /*Loadmore*/
        $wp_customize->add_setting( 'blog_loadmore',
            array(
                'default' => $this->defaults['blog_loadmore'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_loadmore',
            array(
                'label' => __( 'Blog Pagination', 'neeon' ),
                'section' => 'blog_post_settings_section',
                'type' => 'select',
                'choices' => array(
                    'pagination' => esc_html__( 'Pagination', 'neeon' ),
                    'loadmore' => esc_html__( 'Load More', 'neeon' ),
                ),
                'active_callback' => 'rttheme_is_blog_style1_enabled',
            )
        );

        $wp_customize->add_setting( 'load_more_limit',
            array(
                'default' => $this->defaults['load_more_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'load_more_limit',
            array(
                'label' => __( 'Load More Limit', 'neeon' ),
                'section' => 'blog_post_settings_section',
                'type' => 'number',
                'active_callback' => 'rttheme_is_blog_style1_enabled',
            )
        );
		$wp_customize->add_setting( 'post_content_limit',
            array(
                'default' => $this->defaults['post_content_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'post_content_limit',
            array(
                'label' => __( 'Blog Content Limit', 'neeon' ),
                'section' => 'blog_post_settings_section',
                'type' => 'number',
                'active_callback' => 'rttheme_is_blog_excerpt1_enabled',
            )
        );
		
		$wp_customize->add_setting( 'post_content_limit2',
            array(
                'default' => $this->defaults['post_content_limit2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'post_content_limit2',
            array(
                'label' => __( 'Blog Content Limit', 'neeon' ),
                'section' => 'blog_post_settings_section',
                'type' => 'number',
                'active_callback' => 'rttheme_is_blog_excerpt2_enabled',
            )
        );
		
		$wp_customize->add_setting( 'blog_content',
            array(
                'default' => $this->defaults['blog_content'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_content',
            array(
                'label' => __( 'Show Content', 'neeon' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_date',
            array(
                'default' => $this->defaults['blog_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_date',
            array(
                'label' => __( 'Show Date', 'neeon' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_author_name',
            array(
                'default' => $this->defaults['blog_author_name'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_author_name',
            array(
                'label' => __( 'Show Author', 'neeon' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_comment_num',
            array(
                'default' => $this->defaults['blog_comment_num'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_comment_num',
            array(
                'label' => __( 'Show Comment', 'neeon' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_cats',
            array(
                'default' => $this->defaults['blog_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_cats',
            array(
                'label' => __( 'Show Category', 'neeon' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_view',
            array(
                'default' => $this->defaults['blog_view'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_view',
            array(
                'label' => __( 'Show Views', 'neeon' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_length',
            array(
                'default' => $this->defaults['blog_length'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_length',
            array(
                'label' => __( 'Show Reading Length', 'neeon' ),
                'section' => 'blog_post_settings_section',
            )
        ) );


        /*blog query orderby*/
        $wp_customize->add_setting( 'blog_query_order',
            array(
                'default' => $this->defaults['blog_query_order'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_query_order',
            array(
                'label' => __( 'Sort Order', 'neeon' ),
                'section' => 'blog_post_settings_section',
                'type' => 'select',
                'choices' => array(
                    'default' => esc_html__( 'Default', 'neeon' ),
                    'title' => esc_html__( 'Title', 'neeon' ),
                    'recent' => esc_html__( 'Recent Posts', 'neeon' ),
                    'rand' => esc_html__( 'Random Posts', 'neeon' ),
                    'modified' => esc_html__( 'Last Modified Posts', 'neeon' ),
                    'comment_count' => esc_html__( 'Comment Count', 'neeon' ),
                ),
            )
        );

        /*blog query order*/
        $wp_customize->add_setting( 'blog_query_orderby',
            array(
                'default' => $this->defaults['blog_query_orderby'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_query_orderby',
            array(
                'label' => __( 'Sort Orderby', 'neeon' ),
                'section' => 'blog_post_settings_section',
                'type' => 'select',
                'choices' => array(
                    'DESC' => esc_html__( 'DESC', 'neeon' ),
                    'ASC' => esc_html__( 'ASC', 'neeon' ),
                ),
            )
        );

        /*Author bg image*/
        $wp_customize->add_setting('author_bg_image',
            array(
              'default'           => $this->defaults['author_bg_image'],
              'transport'         => 'refresh',
              'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'author_bg_image',
            array(
                'label'         => esc_html__('Author Top Background', 'neeon'),
                'description'   => esc_html__('This is the description for the Media Control', 'neeon'),
                'section'       => 'blog_post_settings_section',
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
            )
        ));

        /*Animation*/
        $wp_customize->add_setting( 'blog_animation',
            array(
                'default' => $this->defaults['blog_animation'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_animation',
            array(
                'label' => __( 'Animation On/Off', 'neeon' ),
                'section' => 'blog_post_settings_section',
                'type' => 'select',
                'choices' => array(
                    'wow' => esc_html__( 'Animation On', 'neeon' ),
                    'hide' => esc_html__( 'Animation Off', 'neeon' ),
                ),
            )
        );

        $wp_customize->add_setting( 'blog_animation_effect',
            array(
                'default' => $this->defaults['blog_animation_effect'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_animation_effect',
            array(
                'label' => __( 'Entrance Animation', 'neeon' ),
                'section' => 'blog_post_settings_section',
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
	new NeeonTheme_Blog_Post_Settings();
}

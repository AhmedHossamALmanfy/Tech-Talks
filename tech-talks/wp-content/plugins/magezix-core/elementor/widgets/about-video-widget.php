<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_about_video extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'mgz-about-video-';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Magezix About Video', 'magezix-core' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'mg-custom-icon';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'magezix_widgets' ];
	}

	
	protected function register_controls() {

		$this->start_controls_section(
			'features_options',
			[
				'label' => esc_html__( 'Features Option', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'video_image', [
				'label' => esc_html__( 'Video Image', 'magezix-core' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
		$this->add_control(
			'video_link', [
				'label' => esc_html__( 'Video Link', 'magezix-core' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
		$this->add_control(
			'title_video', [
				'label' => esc_html__( 'Video Title', 'magezix-core' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
		$this->add_control(
			'title_txt', [
				'label' => esc_html__( 'Video TEXT', 'magezix-core' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
		$this->add_control(
			'video_description',
			[
				'label' => esc_html__( 'Video List Item', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type Video List Item here', 'magezix-core' ),
			]
		);
		
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>

    <div class="about__video ul_li">
        <div class="about__video-img pos-rel">
            <img src="<?php echo esc_url($settings['video_image']['url']);?>" alt="<?php echo esc_attr($settings['video_image']['alt']);?>">
            <a class="popup-video popup-video--sm" href="<?php echo esc_url($settings['video_link']['url']);?>"><i class="fas fa-play"></i></a>
        </div>
        <div class="about__video-content">
            <h4><?php echo wp_kses( $settings['title_video'], true )?></h4>
            <p><?php echo wp_kses( $settings['title_txt'], true )?></p>
            <?php echo wp_kses( $settings['video_description'], true )?>
        </div>
    </div>
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_about_video() );
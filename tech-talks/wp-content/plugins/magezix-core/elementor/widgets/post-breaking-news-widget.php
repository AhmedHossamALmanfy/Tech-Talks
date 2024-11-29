<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_post_brk_news extends Widget_Base {

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
		return 'mgz-news-apply-title';
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
		return esc_html__( 'News Apply', 'magezix-core' );
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
			'section_title',
			[
				'label' => esc_html__( 'Section Title', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title', [
				'label'       => esc_html__( 'Title', 'magezix-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'form_code', [
				'label'       => esc_html__( 'Form Code', 'magezix-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'margin_bottom',
			[
				'label' => esc_html__( 'Bottom Space', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tx-section-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>

    <div class="post-search pl-25">
        <h2 class="tx-section-heading mb-30">
            <span><?php echo wp_kses( $settings['title'], true );?></span>
        </h2>
        <div class="post-search__form">
            <?php echo do_shortcode( $settings['form_code'] );?>
        </div>
    </div>
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_post_brk_news() );
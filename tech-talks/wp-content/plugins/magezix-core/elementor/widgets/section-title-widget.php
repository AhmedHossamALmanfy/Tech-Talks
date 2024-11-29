<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_section_title extends Widget_Base {

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
		return 'mgz-section-title';
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
		return esc_html__( 'Section Title', 'magezix-core' );
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
			'layout_style',
			[
				'label' => esc_html__( 'Style', 'magezix-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => 'style_1',
				'options' => [
					'style_1'  => esc_html__( 'Style 1', 'magezix-core' ),
					'style_2'  => esc_html__( 'Style 2', 'magezix-core' ),
				],
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
			'margin_bottom',
			[
				'label' => esc_html__( 'Bottom Space', 'magezix-core' ),
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

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Section Title  Style', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'magezix-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tx-section-heading span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'title_br_color',
			[
				'label' => esc_html__( 'Title Under border Color', 'magezix-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tx-section-heading span::before' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .tx-section-heading',
			]
		);
		$this->end_controls_section();

	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>
	<?php if($settings['layout_style'] == 'style_1'):?>
    <h2 class="tx-section-heading mb-30">
        <span><?php echo wp_kses( $settings['title'], true );?></span>
    </h2>
	<?php elseif($settings['layout_style'] == 'style_2'):?>
	<h2 class="tx-section-heading style-3 mb-30">
		<span><?php echo wp_kses( $settings['title'], true );?></span>
	</h2>
	<?php else:?>
		<h2 class="tx-section-heading mb-30">
			<span><?php echo wp_kses( $settings['title'], true );?></span>
		</h2>
	<?php endif;?>
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_section_title() );
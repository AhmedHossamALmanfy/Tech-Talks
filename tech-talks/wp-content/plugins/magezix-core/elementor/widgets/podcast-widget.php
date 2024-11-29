<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_podcast extends Widget_Base {

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
		return 'mgz-podcast';
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
		return esc_html__( 'Magezix Podcast', 'magezix-core' );
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
			'newslater_option',
			[
				'label' => esc_html__( 'Newslater', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'top_title', [
				'label'       => esc_html__( 'Top Title', 'magezix-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
				'label'       => esc_html__( 'Subscribe Form', 'magezix-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => 'Type Newslater Shortcode Here',
			]
		);
		$this->add_control(
			'description', [
				'label'       => esc_html__( 'Description', 'magezix-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'pod_cast_option',
			[
				'label' => esc_html__( 'Pod Cast Option', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'pod_top_title', [
				'label'       => esc_html__( 'Top Title', 'magezix-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'pod_title', [
				'label'       => esc_html__( 'Pod Title', 'magezix-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'pod_description', [
				'label'       => esc_html__( 'Pod Description', 'magezix-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'news_later_style',
			[
				'label' => esc_html__( 'News Later Style', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'magezix-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .subscribe__title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .subscribe__title',
			]
		);
		$this->end_controls_section();

	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>

	<div class="row mt-none-30">
		<div class="col-xl-6 col-lg-6 col-md-6 mt-30">
			<span class="politics-sec-heading"><?php echo esc_html($settings['top_title']);?></span>
				<div class="subscribe__form-wrap">
					<h3 class="subscribe__title"><?php echo wp_kses( $settings['title'], true );?></h3>
					<div class="newsletter__form style-2" action="#!">
						<?php echo do_shortcode( $settings['form_code'] );?>
					</div>
					<p class="pt-30"><?php echo wp_kses( $settings['description'], true );?></p>
			</div>
		</div>
		<div class="col-xl-6 col-lg-6 col-md-6 mt-30">
			<span class="politics-sec-heading"><?php echo esc_html($settings['pod_top_title']);?></span>
			<div class="podcast">
				<h2 class="podcast__title"><?php echo wp_kses( $settings['pod_title'], true );?></h2>
				<p><?php echo wp_kses( $settings['pod_title'], true );?></p>
				<div class="audio-player__wrap mt-30"> 
					<div class="audio-player">
					<div class="timeline">
						<div class="progress"></div>
					</div>
					<div class="controls">
						<div class="play-container">
						<div class="toggle-play play">
						</div>
						</div>
						<div class="time">
						<div class="current">0:00</div>
						<div class="divider">/</div>
						<div class="length"></div>
						</div>
						<div class="volume-container">
						<div class="volume-button">
							<div class="volume icono-volumeMedium"></div>
						</div>
						
						<div class="volume-slider">
							<div class="volume-percentage"></div>
						</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_podcast() );
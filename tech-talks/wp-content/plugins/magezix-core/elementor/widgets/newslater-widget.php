<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_newslater extends Widget_Base {

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
		return 'mgz-newslater-title';
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
		return esc_html__( 'Magezix Newslater', 'magezix-core' );
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
				'selector' => '
				{{WRAPPER}} .subscribe__title,
				{{WRAPPER}} .newsletter__title
				',
			]
		);
		$this->end_controls_section();

	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>
	<?php if($settings['layout_style'] == 'style_1'){ ?>
		<span class="politics-sec-heading"><?php echo esc_html($settings['top_title']);?></span>
			<div class="subscribe__form-wrap">
				<h3 class="subscribe__title"><?php echo wp_kses( $settings['title'], true );?></h3>
				<div class="newsletter__form style-2" action="#!">
					<?php echo do_shortcode( $settings['form_code'] );?>
				</div>
				<p class="pt-30"><?php echo wp_kses( $settings['description'], true );?></p>
		</div>
	<?php }elseif($settings['layout_style'] == 'style_2'){ ?>
		<!-- newsletter start -->
		<section class="newsletter gray-bg pt-55 pb-50">
			<div class="container mxw_1680">
				<div class="row">
					<div class="col-lg-6">
						<div class="newsletter__content">
							<h3 class="newsletter__title"><?php echo wp_kses( $settings['title'], true );?></h3>
							<p class="newsletter__title-sub"><?php echo wp_kses( $settings['description'], true );?></p>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="newsletter__form-wrap pl-55">
							<div class="newsletter__form style-3" action="#!">
								<?php echo do_shortcode( $settings['form_code'] );?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- newsletter end -->
	<?php }else{ ?>
		<span class="politics-sec-heading"><?php echo esc_html($settings['top_title']);?></span>
			<div class="subscribe__form-wrap">
				<h3 class="subscribe__title"><?php echo wp_kses( $settings['title'], true );?></h3>
				<div class="newsletter__form style-2" action="#!">
					<?php echo do_shortcode( $settings['form_code'] );?>
				</div>
				<p class="pt-30"><?php echo wp_kses( $settings['description'], true );?></p>
		</div>
	<?php }?>
    
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_newslater() );
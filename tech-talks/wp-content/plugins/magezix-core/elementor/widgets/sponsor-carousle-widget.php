<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_sponsor_carousle extends Widget_Base {

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
		return 'mgz-sponsor-carousle';
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
		return esc_html__( 'Sponsor Carousle', 'magezix-core' );
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
			'sponsor_carousel',
			[
				'label' => esc_html__( 'Sponsor Carousel', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_bg_color',
			[
				'label' => esc_html__( 'Sponsor Section BG Color', 'magezix-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gray-bg' => 'background-color: {{VALUE}}',
				],
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'sponsor_img', [
				'label'       => esc_html__( 'Sponsor Image', 'magezix-core' ),
				'type'        => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'sponsor_link', [
				'label'       => esc_html__( 'Sponsor Link', 'magezix-core' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'label_block' => true,
			]
		);
		

		$this->add_control(
			'sponsors',
			[
				'label'       => __( 'Sponsor Image Slide', 'magezix-core' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
			]
		);
		
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>

        <!-- brand start -->
		<section class="brand gray-bg pt-55 pb-55">
			<div class="container mxw_1630">
				<div class="brand__active owl-carousel">
					<?php foreach($settings['sponsors'] as $item):?>
					<div class="brand__item">
						<a href="<?php echo esc_url($item['sponsor_link']['url']);?>"><img src="<?php echo esc_url($item['sponsor_img']['url']);?>" alt="<?php echo esc_attr($item['sponsor_img']['alt']);?>"></a>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</section>
		<!-- brand end -->
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_sponsor_carousle() );
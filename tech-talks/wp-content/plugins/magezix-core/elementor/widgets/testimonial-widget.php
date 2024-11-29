<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_testimonial_widget extends Widget_Base {

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
		return 'mgz-testimonial-widget';
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
		return esc_html__( 'Magezix Testimonial', 'magezix-core' );
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
			'team_options',
			[
				'label' => esc_html__( 'Team Content', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'testimonial_bg', [
				'label' => esc_html__( 'Testimonial', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
        $this->add_control(
			'quote-1', [
				'label' => esc_html__( 'Quote 1', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
        $this->add_control(
			'quote-2', [
				'label' => esc_html__( 'Quote 2', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
        $repeater = new Repeater();

		$repeater->add_control(
			'feedback', [
				'label' => esc_html__( 'Feedback', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'date', [
				'label' => esc_html__( 'Date', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'designation', [
				'label' => esc_html__( 'Designation', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'testimonials',
			[
				'label' => esc_html__( 'Add New Testimonial', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>

    <div class="testimonial bg_img" data-background="<?php echo esc_url($settings['testimonial_bg']['url']);?>">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-11 col-md-11 col-11">
                <div class="testimonial__slide">
                    <span class="quote quote--1"><img src="<?php echo esc_url($settings['quote-1']['url']);?>" alt=""></span>
                    <span class="quote quote--2"><img src="<?php echo esc_url($settings['quote-2']['url']);?>" alt=""></span>
                    <div class="testimonial__slide-active owl-carousel">
                        <?php foreach($settings['testimonials'] as $item):?>
                        <div class="testimonial__item">
                            <h3><?php echo wp_kses( $item['feedback'], true );?></h3>
                            <span><span class="date"><?php echo esc_html($item['date']);?> </span><span class="name">/ <?php echo esc_html($item['designation']);?></span></span>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
            <!-- testimonial end -->
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_testimonial_widget() );
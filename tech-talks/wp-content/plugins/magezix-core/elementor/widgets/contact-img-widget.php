<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_contact_img extends Widget_Base {

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
		return 'mgz-contact-img-';
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
		return esc_html__( 'Magezix Contact Image', 'magezix-core' );
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
			'contact_info_options',
			[
				'label' => esc_html__( 'Contact Image Option', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'contact_image', [
				'label' => esc_html__( 'Contact Image Upload', 'magezix-core' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
		$this->add_control(
			'authore_image', [
				'label' => esc_html__( 'Authore Image Upload', 'magezix-core' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
		
		
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>

    <div class="contact-img pos-rel">
        <img src="<?php echo esc_url($settings['contact_image']['url']);?>" alt="<?php echo esc_attr($settings['contact_image']['alt']);?>">
        <div class="contact-img__author">
            <img src="<?php echo esc_url($settings['authore_image']['url']);?>" alt="<?php echo esc_attr($settings['authore_image']['alt']);?>">
        </div>
    </div>
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_contact_img() );
<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_contact_info extends Widget_Base {

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
		return 'mgz-contact-info-';
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
		return esc_html__( 'Magezix Contact Info', 'magezix-core' );
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
				'label' => esc_html__( 'Contact Info Option', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'info_image', [
				'label' => esc_html__( 'Contact Info Icon Image Upload', 'magezix-core' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
		
		$this->add_control(
			'info_title', [
				'label' => esc_html__( 'Contact Info Title', 'magezix-core' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
		
		$this->add_control(
			'info_description',
			[
				'label' => esc_html__( 'Info Item', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type Description here', 'magezix-core' ),
			]
		);
		
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>

    <div class="contact-info__item d-flex">
        <span class="icon"><img src="<?php echo esc_url($settings['info_image']['url']);?>" alt="<?php echo esc_attr($settings['info_image']['alt']);?>"></span>
        <div class="content">
            <h3><?php echo wp_kses( $settings['info_title'], true );?></h3>
            <?php echo wp_kses( $settings['info_description'], true );?>
        </div>
    </div>
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_contact_info() );
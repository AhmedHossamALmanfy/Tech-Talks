<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_faq_widget extends Widget_Base {

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
		return 'mgz-faq-widget';
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
		return esc_html__( 'Magezix Faq Widget', 'magezix-core' );
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
			'about_faq_options',
			[
				'label' => esc_html__( 'FAQ Option', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $repeater = new Repeater();

        $repeater->add_control(
			'is_active',
			[
				'label' => esc_html__( 'Active', 'magezix-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'YES', 'magezix-core' ),
				'label_off' => esc_html__( 'NO', 'magezix-core' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'magezix-core' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $repeater->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'magezix-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your List Item description here', 'magezix-core' ),
			]
		);
		
		$this->add_control(
			'faqitems',
			[
				'label' => esc_html__( 'Add New FAQ Item', 'magezix-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
			]
		);
        
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>

    <div class="faq_wrap">
        <ul class="accordion_box clearfix">
            <?php foreach($settings['faqitems'] as $item):?>
            <li class="accordion block">
                <div class="acc-btn">
                    <?php echo wp_kses( $item['title'], true );?>
                </div>
                <div class="acc_body <?php if( 'yes' == $item['is_active']){ echo esc_attr('current active-block');}?>">
                    <div class="content">
                        <p><?php echo wp_kses( $item['description'], true );?></p>
                    </div>
                </div>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_faq_widget() );
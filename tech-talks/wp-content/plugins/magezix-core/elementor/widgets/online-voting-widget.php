<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_online_vot extends Widget_Base {

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
		return 'mgz-online-vot';
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
		return esc_html__( 'Online Vot Count', 'magezix-core' );
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
			'vot_count_content',
			[
				'label' => esc_html__( 'Vot Count', 'magezix-core' ),
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
			'authore_img', [
				'label'       => esc_html__( 'Authore Image', 'magezix-core' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'feedback', [
				'label'       => esc_html__( 'Feedback', 'magezix-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'yes_txt', [
				'label'       => esc_html__( 'YES', 'magezix-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'yes_count', [
				'label'       => esc_html__( 'YES Count', 'magezix-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'no_txt', [
				'label'       => esc_html__( 'NO', 'magezix-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'no_count', [
				'label'       => esc_html__( 'NO Count', 'magezix-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>

    <div class="online-voating__wrap">
        <?php if(!empty($settings['title'])):?>
        <h2 class="tx-section-heading">
            <span><?php echo esc_html($settings['title']);?></span>
        </h2>
        <?php endif;?>
        <div class="online-voating text-center mt-40">
            <span class="online-voating__auote"></span>
            <div class="online-voating__author">
                <img src="<?php echo esc_url($settings['authore_img']['url']);?>" alt="<?php echo esc_attr($settings['authore_img']['alt']);?>">
            </div>
            <p><?php echo wp_kses($settings['feedback'], true);?></p>
            <div class="online-voating__progress ul_li_center mt-40">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo esc_attr($settings['yes_count']);?>%;" aria-valuenow="<?php echo esc_attr($settings['yes_count']);?>" aria-valuemin="0" aria-valuemax="100"><span><?php echo esc_html($settings['yes_txt']);?></span><span class="number"><?php echo esc_html($settings['yes_count']);?>%</span></div>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo esc_attr($settings['no_count']);?>%;" aria-valuenow="<?php echo esc_attr($settings['no_count']);?>" aria-valuemin="0" aria-valuemax="100"><span><?php echo esc_html($settings['no_txt']);?></span><span class="number"><?php echo esc_html($settings['no_count']);?>%</span></div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_online_vot() );
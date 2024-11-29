<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_team_widget extends Widget_Base {

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
		return 'mgz-team-widget';
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
		return esc_html__( 'Magezix Team', 'magezix-core' );
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
			'team_img', [
				'label'       => esc_html__( 'Authore Image', 'magezix-core' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'team_shape_img', [
				'label'       => esc_html__( 'Team Shape Image', 'magezix-core' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'condition' => ['layout_style' => 'style_2'],
			]
		);
		$this->add_control(
			'authore_name', [
				'label'       => esc_html__( 'Name', 'magezix-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'designation_txt', [
				'label'       => esc_html__( 'Designation Text', 'magezix-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'designation', [
				'label'       => esc_html__( 'Designation', 'magezix-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
        $repeater = new Repeater();

		$repeater->add_control(
			'icon', [
				'label' => esc_html__( 'Icons', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);
		$repeater->add_control(
			'link', [
				'label' => esc_html__( 'Links', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::URL,
			]
		);
		$this->add_control(
			'socials',
			[
				'label' => esc_html__( 'Add Social Icon', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();	

		if('style_1' == $settings['layout_style']){
			require dirname( __FILE__ ) . '/views/team-1.php';
		}elseif('style_2' == $settings['layout_style']){
			require dirname( __FILE__ ) . '/views/team-2.php';
		}else{
			require dirname( __FILE__ ) . '/views/team-1.php';
		}
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_team_widget() );
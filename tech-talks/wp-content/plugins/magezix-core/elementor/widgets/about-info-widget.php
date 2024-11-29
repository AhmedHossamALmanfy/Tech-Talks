<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_about_info extends Widget_Base {

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
		return 'mgz-about-info';
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
		return esc_html__( 'Magezix About Info', 'magezix-core' );
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
			'about_info_options',
			[
				'label' => esc_html__( 'About Info Option', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $repeater = new Repeater();
        $repeater->add_control(
			'count', [
				'label'       => esc_html__( 'Count Number', 'magezix-core' ),
				'type'        => Controls_Manager::TEXT,
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
			'description', [
				'label' => esc_html__( 'Description', 'magezix-core' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
		
		$this->add_control(
			'features',
			[
				'label' => esc_html__( 'Add New Features Item', 'magezix-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'title_field' => '{{{ count }}} {{{ title }}}',
			]
		);
        $this->add_control(
			'headingTitle', [
				'label' => esc_html__( 'Heading Title', 'magezix-core' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
        $this->add_control(
			'headingdescription', [
				'label' => esc_html__( 'Heading Description', 'magezix-core' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
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
			'tabsitems',
			[
				'label' => esc_html__( 'Add New Tab Item', 'magezix-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
			]
		);
        $this->add_control(
			'cta_1_info',
			[
				'label' => esc_html__( 'CTA One Options', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'cta_one_title', [
				'label' => esc_html__( 'Title', 'magezix-core' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $this->add_control(
			'cta_one_icon_1', [
				'label' => esc_html__( 'Icon One', 'magezix-core' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
        $this->add_control(
			'cta_one_icon_2', [
				'label' => esc_html__( 'Icon Two', 'magezix-core' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
        $this->add_control(
			'cta_2_info',
			[
				'label' => esc_html__( 'CTA Two Options', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'cta_two_title', [
				'label' => esc_html__( 'Title', 'magezix-core' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);        
        $this->add_control(
			'cta_two_video_link', [
				'label' => esc_html__( 'Video Link Two', 'magezix-core' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>

    <!-- about info start -->
    <div class="about-info__wrap">
        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-5">
                <div class="about-info__box">
                    <?php foreach($settings['features'] as $feature):?>
                        <div class="about-info__item d-flex">
                            <span class="number"><?php echo esc_html($feature['count']);?></span>
                            <div class="content">
                                <h4><?php echo wp_kses( $feature['title'], true );?></h4>
                                <p><?php echo wp_kses( $feature['description'], true );?></p>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="about-info__tab-wrap pl-150">
                    <h2><?php echo wp_kses( $settings['headingTitle'], true );?></h2>
                    <p><?php echo wp_kses( $settings['headingdescription'], true );?></p>
                    <div class="about-info__tab mt-25">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php foreach($settings['tabsitems'] as $item):?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php if('yes' == $item['is_active']){echo esc_attr('active');}?>" id="ab-hm-tb-<?php echo esc_attr($item['_id'])?>" data-bs-toggle="tab" data-bs-target="#ab-hom-tb-<?php echo esc_attr($item['_id'])?>" type="button" role="tab" aria-controls="ab-hom-tb-<?php echo esc_attr($item['_id'])?>" aria-selected="true"><?php echo esc_html($item['title']);?></button>
                            </li>
                            <?php endforeach;?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                        <?php foreach($settings['tabsitems'] as $item):?>
                            <div class="tab-pane animated fadeInUp <?php if('yes' == $item['is_active']){echo esc_attr('show active');}?>" id="ab-hom-tb-<?php echo esc_attr($item['_id'])?>" role="tabpanel" aria-labelledby="ab-hm-tb-<?php echo esc_attr($item['_id'])?>">
                                <div class="about-info__tab-content">
                                    <div class="about-info__tab-list list-unstyled">
                                        <?php echo wp_kses( $item['description'], true );?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-info__bottom">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="about-info__info info-left">
                        <h2><?php echo wp_kses( $settings['cta_one_title'], true );?></h2>
                        <span class="icon icon--1"><img src="<?php echo esc_url($settings['cta_one_icon_1']['url']);?>" alt="<?php echo esc_attr($settings['cta_one_icon_1']['alt']);?>"></span>
                        <span class="icon icon--2"><img src="<?php echo esc_url($settings['cta_one_icon_2']['url']);?>" alt="<?php echo esc_attr($settings['cta_one_icon_2']['alt']);?>"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-info__info info-right pos-rel">
                        <h2><?php echo wp_kses( $settings['cta_two_title'], true );?></h2>
                        <a class="popup-video popup-video--md" href="<?php echo esc_url($settings['cta_two_video_link']['url']);?>"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- about info end -->
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_about_info() );
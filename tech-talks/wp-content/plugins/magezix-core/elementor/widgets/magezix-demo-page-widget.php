<?php

/**
 * Elementor Single Widget
 * @package magezix Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Magezix_Demo_Page extends Widget_Base {

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
		return 'magezix-demo-page-id';
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
		return esc_html__( 'Magezix Demo Page', 'magezix-core' );
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
			'magezix_about_option',
			[
				'label' => esc_html__( 'Demo Option', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $this->add_control(
			'demo_image', [
				'label' => esc_html__( 'Demo Image', 'magezix-core' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
		
		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'magezix-core' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
		$this->add_control(
			'badge', [
				'label' => esc_html__( 'Badge', 'magezix-core' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
		
		$this->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'magezix-core' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
        $this->add_control(
			'coming_soon',
			[
				'label' => esc_html__( 'Coming Soon', 'magezix-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'magezix-core' ),
				'label_off' => esc_html__( 'Hide', 'magezix-core' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();		
    ?>
    <div class="magezix_demo_mg_item <?php if($settings['coming_soon'] == true){ echo esc_attr('cm-soon');}?> ">
        <div class="magezix__img_wrap">
            <a href="<?php echo esc_url($settings['link']['url']);?>">
                <img src="<?php echo esc_url($settings['demo_image']['url']);?>" alt="">
            </a>
            <?php if(!empty($settings['badge'])):?>
                <span><?php echo esc_html($settings['badge']);?></span>
            <?php endif;?>
            <?php if($settings['coming_soon'] == true):?>
                <p>Coming Soon</p>
            <?php endif;?>
        </div>
        <div class="magezix__content">
            <?php echo wp_kses($settings['title'], true);?>
        </div>
    </div>
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new Magezix_Demo_Page() );
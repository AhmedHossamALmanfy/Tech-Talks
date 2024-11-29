<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_feature_info extends Widget_Base {

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
		return 'mgz-feature-info';
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
		return esc_html__( 'Magezix Features Box', 'magezix-core' );
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
			'features_options',
			[
				'label' => esc_html__( 'Features Option', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $this->add_control(
			'features_icon', [
				'label'       => esc_html__( 'Upload Feature Icon Image', 'magezix-core' ),
				'type'        => Controls_Manager::MEDIA,
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
			'description', [
				'label' => esc_html__( 'Description', 'magezix-core' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
		
		
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>

    <!-- about info start -->
    <div class="about__info-box d-flex">
        <?php if(!empty($settings['features_icon']['url'])):?>
            <span class="icon"><img src="<?php echo esc_url($settings['features_icon']['url']);?>" alt="<?php echo esc_attr($settings['features_icon']['alt']);?>"></span>
        <?php endif;?>
        <div class="content">
            <?php if(!empty($settings['title'])):?>
                <h4><?php echo wp_kses( $settings['title'], true );?></h4>
            <?php endif;?>

            <?php if(!empty($settings['description'])):?>
                <p><?php echo wp_kses( $settings['description'], true );?></p>
            <?php endif;?>
        </div>
    </div>
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_feature_info() );
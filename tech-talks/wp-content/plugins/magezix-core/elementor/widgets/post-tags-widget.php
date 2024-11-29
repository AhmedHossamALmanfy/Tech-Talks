<?php

/**
 * Elementor Single Widget
 * @package Magezix Core
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_tags_display extends Widget_Base {

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
		return 'magezix-tags-disp';
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
		return esc_html__( 'Post Tags Widget', 'magezix-core' );
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
			'post_options',
			[
				'label' => esc_html__( 'Post Options', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'section_heading', [
				'label'       => esc_html__( 'Section Title', 'magezix-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Trending Topics', 'magezix-core' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();
        
    ?>
    
    <div class="widget">
        <?php if(!empty($settings['section_heading'])):?>
        <h2 class="tx-section-heading mb-20">
            <span><?php echo wp_kses( $settings['section_heading'], true );?></span>
        </h2>
        <?php endif;?>
        <div class="tagcloud">
            <?php
                $tags = get_tags();
                foreach ( $tags as $tag ) :
                $tag_link = get_tag_link( $tag->term_id );
            ?>
            <a href="<?php echo esc_url($tag_link); ?>"><?php echo esc_html($tag->name); ?></a>
            <?php endforeach;?>
        </div>
    </div>

    <?php 
    }
		
    
}


Plugin::instance()->widgets_manager->register( new magezix_tags_display() );
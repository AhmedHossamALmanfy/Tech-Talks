<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_social_flower extends Widget_Base {

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
		return 'mgz-social-flower';
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
		return esc_html__( 'Magezix Social Flower', 'magezix-core' );
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
				'label' => esc_html__( 'Social Flower Option', 'magezix-core' ),
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
        $repeater = new Repeater();
        $repeater->add_control(
			'social_name', [
				'label'       => esc_html__( 'Social Platform', 'magezix-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'icon', [
				'label' => esc_html__( 'Icons', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);
		$repeater->add_control(
			'link_label', [
				'label' => esc_html__( 'Link Label', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
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
                'title_field' => '{{{ social_name }}}',
                'default' => [
					[
						'icon' => 'fab fa-facebook-f',
						'social_name' => esc_html__( 'Facebook', 'magezix-core' ),
						'link_label' => esc_html__( 'Follow', 'magezix-core' ),
					],
					[
                        'icon' => 'fab fa-twitter',
						'social_name' => esc_html__( 'Twitter', 'magezix-core' ),
                        'link_label' => esc_html__( 'Follow', 'magezix-core' ),
					],
					[
                        'icon' => 'fab fa-instagram',
						'social_name' => esc_html__( 'Instagram', 'magezix-core' ),
                        'link_label' => esc_html__( 'Follow', 'magezix-core' ),
					],
					[
                        'icon' => 'fab fa-youtube',
						'social_name' => esc_html__( 'Youtube', 'magezix-core' ),
                        'link_label' => esc_html__( 'Subscribe', 'magezix-core' ),
					],
					[
                        'icon' => 'fab fa-pinterest',
						'social_name' => esc_html__( 'Pinterest', 'magezix-core' ),
                        'link_label' => esc_html__( 'Follow', 'magezix-core' ),
					],
				],
			]
		);
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();		

    ?>

    <div class="widget">
        <?php if(!empty($settings['title'])):?>
        <h2 class="widget-title mb-30">
            <span><?php echo esc_html($settings['title']);?></span>
        </h2>
        <?php endif;?>
        <ul class="widget__social">
            <?php foreach($settings['socials'] as $itm):?>
            <li>
                <div class="left-text ul_li">
                    <span class="icon"><?php \Elementor\Icons_Manager::render_icon( $itm['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                    <span><?php echo esc_html($itm['social_name']);?></span>
                </div>
                <a href="<?php echo esc_url($itm['link']['url']);?>"><?php echo esc_html($itm['link_label']);?></a>
            </li>
            <?php endforeach;?>     
        </ul>
    </div>
    <?php 
    }
		
	
}


Plugin::instance()->widgets_manager->register( new magezix_social_flower() );
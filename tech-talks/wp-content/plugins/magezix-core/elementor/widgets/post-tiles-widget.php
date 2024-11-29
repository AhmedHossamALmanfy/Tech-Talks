<?php

/**
 * Elementor Single Widget
 * @package Magezix Core
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_post_tiles extends Widget_Base {

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
		return 'magezix-post-tiles';
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
		return esc_html__( 'Post Tiles', 'magezix-core' );
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

		$this->add_control(
			'layout_style',
			[
				'label' => esc_html__( 'Tiles Layout Style', 'magezix-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => 'style_1',
				'options' => [
					'style_1'  => esc_html__( 'Tiles Style 1', 'magezix-core' ),
					'style_2'  => esc_html__( 'Tiles Style 2', 'magezix-core' ),
					'style_3'  => esc_html__( 'Tiles Style 3', 'magezix-core' ),
				],
			]
		);

		$this->add_control(
			'postcustomorder',
			[
				'label'        => esc_html__( 'Custom Order', 'magezix-core' ),
				'type'         =>Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);
		$this->add_control(
			'postorder',
			[
				'label'     => esc_html__( 'Post Order', 'magezix-core' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'ASC',
				'options'   => [
					'ASC'  => esc_html__( 'Ascending', 'magezix-core' ),
					'DESC' => esc_html__( 'Descending', 'magezix-core' ),
				],
			]
		);
		$this->add_control(
			'postorderby',
			[
				'label'     => esc_html__( 'Post Order By', 'magezix-core' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'none',
				'options'   => [
					'none'          => esc_html__( 'None', 'magezix-core' ),
					'ID'            => esc_html__( 'ID', 'magezix-core' ),
					'date'          => esc_html__( 'Date', 'magezix-core' ),
					'name'          => esc_html__( 'Name', 'magezix-core' ),
					'title'         => esc_html__( 'Title', 'magezix-core' ),
					'comment_count' => esc_html__( 'Comment count', 'magezix-core' ),
					'rand'          => esc_html__( 'Random', 'magezix-core' ),
				],
				'condition' => ['postcustomorder' => 'yes'],
			]
		);
		$this->add_control(
			'pst_per_page',
			[
				'label'   => __( 'Posts Per Page', 'magezix-core' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 1,
				'default' => 3,
			]
		);
		$this->add_control(
			'skip_post',
			[
				'label'          => esc_html__( 'Skip Post Enable?', 'magezix-core' ),
				'type'           => Controls_Manager::SWITCHER,
				'label_on'       => esc_html__( 'Show', 'magezix-core' ),
				'label_off'      => esc_html__( 'Hide', 'magezix-core' ),
				'return_value'   => 'yes',
				'default'        => 'yes',
				'style_transfer' => true,
			]
		);
		$this->add_control(
			'skip_post_count',
			[
				'label'   => __( 'Skip Post Count', 'magezix-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 0,
				'condition' => ['skip_post' => 'yes'],
			]
		);
		$this->add_control(
			'post_categories',
			[
				'type'        => Controls_Manager::SELECT2,
				'label'       => esc_html__( 'Select Categories', 'magezix-core' ),
				'options'     => magezix_post_category(),
				'label_block' => true,
				'multiple'    => true,
			]
		);
		$this->add_control(
			'post_tags',
			[
				'type'        => Controls_Manager::SELECT2,
				'label'       => esc_html__( 'Select Tags', 'magezix-core' ),
				'multiple'    => true,
                  'options'     => array_flip(magezix_item_tag_lists( 'tags', array(
                    'sort_order'  => 'ASC',
                    'taxonomies'    => 'post_tag',
                    'hide_empty'  => false,
                ) )),
			]
		);
        $this->add_control(
			'post_format', [
			   
				'label'   => esc_html__('Select Post Format', 'magezix-core'),
				'type'    => Controls_Manager::SELECT2,
				'options' => [
					
					'post-format-video' => esc_html__( 'Video', 'magezix-core' ),
					'post-format-image' => esc_html__( 'Image', 'magezix-core' ),
					'post-format-audio' => esc_html__( 'Audio', 'magezix-core' ),
					'post-format-gallery' => esc_html__( 'Gallery', 'magezix-core' ),
					'post-format-standard' => esc_html__( 'Standard', 'magezix-core' ),
				],
				'default'     => [],
				'label_block' => true,
				'multiple'    => true,
			]
		);
		$this->add_control(
			'title_length',
			[
				'label'     => __( 'Title Length', 'magezix-core' ),
				'type'      => Controls_Manager::NUMBER,
				'step'      => 1,
				'default'   => 20,
			]
		);
		$this->add_control(
			'excerpt_length',
			[
				'label'     => __( 'Excerpt Length', 'magezix-core' ),
				'type'      => Controls_Manager::NUMBER,
				'step'      => 1,
				'default'   => 30,
				'condition' => ['layout_style' => 'style_3'],
			]
		);
		$this->add_control(
			'authore_hide',
			[
				'label'          => esc_html__( 'Authore Hide', 'magezix-core' ),
				'type'           => Controls_Manager::SWITCHER,
				'label_on'       => esc_html__( 'Show', 'magezix-core' ),
				'label_off'      => esc_html__( 'Hide', 'magezix-core' ),
				'return_value'   => 'yes',
				'default'        => 'yes',
				'style_transfer' => true,
			]
		);
		$this->add_control(
			'avater_size',
			[
				'label'   => __( 'Authore Avater Size', 'magezix-core' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 22,
				'default' => 22,
			]
		);
		$this->add_control(
			'cmt_hide',
			[
				'label'          => esc_html__( 'Comment Hide', 'magezix-core' ),
				'type'           => Controls_Manager::SWITCHER,
				'label_on'       => esc_html__( 'Show', 'magezix-core' ),
				'label_off'      => esc_html__( 'Hide', 'magezix-core' ),
				'return_value'   => 'yes',
				'default'        => 'yes',
				'style_transfer' => true,
			]
		);
		$this->add_control(
			'date_hide',
			[
				'label'          => esc_html__( 'Hide Date', 'magezix-core' ),
				'type'           => Controls_Manager::SWITCHER,
				'label_on'       => esc_html__( 'Show', 'magezix-core' ),
				'label_off'      => esc_html__( 'Hide', 'magezix-core' ),
				'return_value'   => 'yes',
				'default'        => 'yes',
				'style_transfer' => true,
			]
		);
		$this->add_control(
			'cat_hide',
			[
				'label'          => esc_html__( 'Hide Category', 'magezix-core' ),
				'type'           => Controls_Manager::SWITCHER,
				'label_on'       => esc_html__( 'Show', 'magezix-core' ),
				'label_off'      => esc_html__( 'Hide', 'magezix-core' ),
				'return_value'   => 'yes',
				'default'        => 'yes',
				'style_transfer' => true,
			]
		);
		$this->add_control(
			'view_hide',
			[
				'label'          => esc_html__( 'Hide View', 'magezix-core' ),
				'type'           => Controls_Manager::SWITCHER,
				'label_on'       => esc_html__( 'Show', 'magezix-core' ),
				'label_off'      => esc_html__( 'Hide', 'magezix-core' ),
				'return_value'   => 'yes',
				'default'        => 'no',
				'style_transfer' => true,
			]
		);
		$this->add_control(
			'show_video',
			[
				'label'          => esc_html__( 'Show Video', 'magezix-core' ),
				'type'           => Controls_Manager::SWITCHER,
				'label_on'       => esc_html__( 'Show', 'magezix-core' ),
				'label_off'      => esc_html__( 'Hide', 'magezix-core' ),
				'return_value'   => 'yes',
				'default'        => 'no',
				'style_transfer' => true,
			]
		);

		$this->add_responsive_control(
			'feature_img_height',
			[
				'label' => esc_html__( 'Width', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .most-reading__post-item .post-thumb img' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .post-thumb.hlg-415 img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'post_stryle',
			[
				'label' => esc_html__( 'Post Style Style', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'magezix-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .post-title a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .post-title',
			]
		);
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();
        $args = array(
			'post_type'           => 'post',
			'posts_per_page'      => !empty( $settings['pst_per_page'] ) ? $settings['pst_per_page'] : 1,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'order'               => $settings['postorder'],
			'orderby'             => $settings['postorderby'],
		);
		if( ! empty($settings['post_categories'] ) ){
			$args['category_name'] = implode(',', $settings['post_categories']);
		}
		if("yes" == $settings['skip_post']){
			$args['offset'] = $settings['skip_post_count'];
		}
		if(!empty($settings['post_tags'][0])) {
			$args['tax_query'] = array(
				array(
				'taxonomy' => 'post_tag',
				'field'    => 'ids',
				'terms'    => $settings['post_tags']
				)
			);
		}
        if( isset($settings['post_format']) && is_array($settings['post_format']) && count($settings['post_format']) > 0  ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => $settings['post_format'],
					'operator' => 'IN'
				) 
			);
		} 
		
		$query = new \WP_Query( $args );
    ?>
    
		<?php 
			if('style_1' == $settings['layout_style']){
				require dirname( __FILE__ ) . '/views/tiles-1.php';
			}elseif('style_2' == $settings['layout_style']){
				require dirname( __FILE__ ) . '/views/tiles-2.php';
			}elseif('style_3' == $settings['layout_style']){
				require dirname( __FILE__ ) . '/views/tiles-3.php';
			}else{
				require dirname( __FILE__ ) . '/views/tiles-1.php';
			}
		?>

    <?php 
    }
		
    
}


Plugin::instance()->widgets_manager->register( new magezix_post_tiles() );
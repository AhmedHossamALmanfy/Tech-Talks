<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_post_grid_carosule extends Widget_Base {

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
		return 'mgz-post-grid-v2-carousel';
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
		return esc_html__( 'Post Grid V2 Carousel', 'magezix-core' );
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
			'topic_heading', [
				'label'       => esc_html__( 'Section Title', 'magezix-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Trending Topics', 'magezix-core' ),
				'label_block' => true,
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
				'default' => 5,
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
				'default'   => 20,
			]
		);
		$this->add_control(
			'title_ov_length',
			[
				'label'     => __( 'Overlay Post Title Length', 'magezix-core' ),
				'type'      => Controls_Manager::NUMBER,
				'step'      => 1,
				'default'   => 20,
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
				'min'     => 20,
				'default' => 20,
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
		$this->add_responsive_control(
			'thumb_img_height',
			[
				'label' => esc_html__( 'Width', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .trending__post-item .post-thumb.mzx-post__item img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();

    ?>
    <div class="daily-blogs">
        <div class="carousel-post__wrap">
            <?php if(!empty($settings['topic_heading'])):?>
                <h2 class="tx-section-heading mb-30">
                    <span><?php echo wp_kses( $settings['topic_heading'], true );?></span>
                </h2>
            <?php endif;?>
            <div class="daily-blogs__slide owl-carousel tx-post__carousel-nav">
                <?php
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
                if ( $query->have_posts() ) {
                $iten_number = 0;
                while ( $query->have_posts() ) {
                $query->the_post();
                    $mgthumb_size = 'full';
                    $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
                    $iten_number++;
            ?>
                <div class="sports-post__single tx-post style-2">
                    <div class="post-thumb br-4">
                        <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
                    </div>
                    <div class="post-content">
                        <ul class="post-meta post-meta--4 style-2 ul_li mb-15">
                            <li>
                                <div class="post-meta__author ul_li">
                                    <div class="avatar">
                                        <?php magezix_post_author_avatars($settings['avater_size']);?>
                                    </div>
                                    <span><?php the_author()?></span>
                                </div>
                            </li>
                            <li class="magezix-comment"><i class="far fa-comments-alt"></i> <?php esc_html_e( 'Comment', 'magezix' );?> (<?php echo esc_attr(get_comments_number());?>)</li>
                        </ul>
                        <h2 class="post-title border-effect"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
                        <p><?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], '')  ;?></p>
                    </div>
                </div>
                <?php } wp_reset_query(); } ?>
            </div>
        </div>
    </div>
    <?php
    }


}


Plugin::instance()->widgets_manager->register( new magezix_post_grid_carosule() );
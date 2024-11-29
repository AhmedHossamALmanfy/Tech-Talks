<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_post_slider extends Widget_Base {

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
		return 'mgz-post-slider';
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
		return esc_html__( 'Post Full Screen Slider', 'magezix-core' );
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
				'label' => esc_html__( 'Slider Post Options', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
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
				'default'   => 30,
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
					'{{WRAPPER}} .hero-post__height' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'post_scroll_options',
			[
				'label' => esc_html__( 'Scroll Post Options', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'sc_postcustomorder',
			[
				'label'        => esc_html__( 'Custom Order', 'magezix-core' ),
				'type'         =>Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);
		$this->add_control(
			'sc_postorder',
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
			'sc_postorderby',
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
			'sc_pst_per_page',
			[
				'label'   => __( 'Posts Per Page', 'magezix-core' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 1,
				'default' => 5,
			]
		);
		$this->add_control(
			'sc_skip_post',
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
			'sc_skip_post_count',
			[
				'label'   => __( 'Skip Post Count', 'magezix-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 0,
				'condition' => ['skip_post' => 'yes'],
			]
		);
		$this->add_control(
			'sc_post_categories',
			[
				'type'        => Controls_Manager::SELECT2,
				'label'       => esc_html__( 'Select Categories', 'magezix-core' ),
				'options'     => magezix_post_category(),
				'label_block' => true,
				'multiple'    => true,
			]
		);

		$this->add_control(
			'sc_post_tags',
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
			'sc_post_format', [

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
			'sc_title_length',
			[
				'label'     => __( 'Title Length', 'magezix-core' ),
				'type'      => Controls_Manager::NUMBER,
				'step'      => 1,
				'default'   => 20,
			]
		);
		$this->add_control(
			'sc_excerpt_length',
			[
				'label'     => __( 'Excerpt Length', 'magezix-core' ),
				'type'      => Controls_Manager::NUMBER,
				'step'      => 1,
				'default'   => 30,
			]
		);
		$this->add_control(
			'sc_authore_hide',
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
			'sc_avater_size',
			[
				'label'   => __( 'Authore Avater Size', 'magezix-core' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 20,
				'default' => 20,
			]
		);

		$this->add_responsive_control(
			'sl_thumb_img_height',
			[
				'label' => esc_html__( 'Width', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .politics-post__item .post-thumb.mzx-post__item img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'main_style',
			[
				'label' => esc_html__( 'Slider Style', 'magezix-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'magezix-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-post__item .post-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .hero-post__item .post-title',
			]
		);
		$this->add_control(
			'scroll_post_style',
			[
				'label' => esc_html__( 'Scroll Post Style', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'sm_title_color',
			[
				'label' => esc_html__( 'Scroll Post Title Color', 'magezix-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .politics-post__item .post-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sm_title_typography',
				'selector' => '{{WRAPPER}} .politics-post__item .post-title',
			]
		);
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();

    ?>
    <!-- hero post start -->
    <section class="hero-post pos-rel">
        <div class="container-fluid p-0">
            <div class="hero-post__active owl-carousel">
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
					$tags = get_the_tags(get_the_ID());
			?>
                <div class="hero-post__item hero-post__height bg_img d-flex align-content-center" data-background="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full'));?>">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-7 col-md-8">
                            <div class="hero-post__content">
                                <ul class="post-tags ul_li mb-20" data-animation="fadeInUp" data-delay=".1s">
								<?php
                            		if($tags){ ?>
                                    <li><span><?php esc_html_e( '# Tags', 'magezix-core' );?></span></li>
									<?php foreach ( $tags as $tag ) :
                            		$tag_link = get_tag_link( $tag->term_id );?>
                                    <li><a href="<?php echo esc_url($tag_link); ?>"><?php echo esc_html($tag->name); ?></a></li>
									<?php endforeach; } ?>
                                </ul>
                                <h2 class="post-title border-effect" data-animation="fadeInUp" data-delay=".2s"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
                                <p data-animation="fadeInUp" data-delay=".3s"><?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], '')  ;?></p>
                                <ul class="post-meta post-meta--4 style-4 ul_li mt-30" data-animation="fadeInUp" data-delay=".4s">
                                    <li>
                                        <div class="post-meta__author ul_li">
                                            <div class="avatar">
												<?php magezix_post_author_avatars($settings['avater_size']);?>
                                            </div>
                                            <span><?php the_author()?> / <span class="year"><?php echo magezix_ready_time_ago();?></span></span>
                                        </div>
                                    </li>
                                    <li class="magezix-comment"><i class="far fa-comment"></i><?php echo esc_attr(get_comments_number());?></li>
                                    <li><i class="far fa-clock"></i><?php echo magezix_reading_time();?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } wp_reset_query(); } ?>
            </div>
        </div>
        <div class="scroll-post hero-post__scroll mCustomScrollbar" data-mcs-theme="dark">
		<?php
			$args2 = array(
				'post_type'           => 'post',
				'posts_per_page'      => !empty( $settings['sc_pst_per_page'] ) ? $settings['sc_pst_per_page'] : 1,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
				'order'               => $settings['sc_postorder'],
				'orderby'             => $settings['sc_postorderby'],
			);
			if( ! empty($settings['sc_post_categories'] ) ){
				$args2['category_name'] = implode(',', $settings['sc_post_categories']);
			}
			if("yes" == $settings['sc_skip_post']){
				$args2['offset'] = $settings['sc_skip_post_count'];
			}
			if(!empty($settings['post_tags'][0])) {
				$args2['tax_query'] = array(
					array(
					'taxonomy' => 'post_tag',
					'field'    => 'ids',
					'terms'    => $settings['sc_post_tags']
					)
				);
			}
			if( isset($settings['sc_post_format']) && is_array($settings['sc_post_format']) && count($settings['post_format']) > 0  ) {
				$args2['tax_query'] = array(
					array(
						'taxonomy' => 'post_format',
						'field'    => 'slug',
						'terms'    => $settings['sc_post_format'],
						'operator' => 'IN'
					)
				);
			}
			$query2 = new \WP_Query( $args2 );
		?>
		<?php
				if ( $query2->have_posts() ) {
				$iten_number = 0;
				while ( $query2->have_posts() ) {
				$query2->the_post();
					$mgthumb2_size = 'full';
					$title2 = wp_trim_words( get_the_title(), $settings['sc_title_length'], '' );
					$iten_number++;
					$tags = get_the_tags(get_the_ID());
			?>
            <div class="politics-post__item hero-post-item tx-post ul_li">
                <div class="post-thumb mzx-post__item">
					<a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb2_size );?></a>
                    <span class="post-number"><?php if($iten_number < 10){echo esc_attr('0'. $iten_number);}else{echo esc_attr($iten_number);} ;?></span>
                </div>
                <div class="post-content">
                    <?php
						if(function_exists('magezix_category_pl')){
							magezix_category_pl();
						}
					?>
                    <h2 class="post-title border-effect-2"><a href="<?php the_permalink();?>"><?php echo esc_html($title2);?></a></h2>
                    <ul class="post-meta post-meta--4 style-4 ul_li">
                        <li class="magezix-comment"><i class="far fa-comment"></i><?php echo esc_attr(get_comments_number());?></li>
                        <li><i class="far fa-clock"></i><?php echo magezix_reading_time();?></li>
                    </ul>
                </div>
            </div>
            <?php } wp_reset_query(); } ?>
        </div>
    </section>
    <!-- hero post end -->
    <?php
    }


}


Plugin::instance()->widgets_manager->register( new magezix_post_slider() );
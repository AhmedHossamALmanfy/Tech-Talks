<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_post_tiles_tab extends Widget_Base {

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
		return 'mgz-post-tiles-tabs';
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
		return esc_html__( 'Post Tiles Tab', 'magezix-core' );
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
			'section_heading',
			[
				'label' => esc_html__( 'Section Heading', 'magezix-core' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'is_active',
			[
				'label'          => esc_html__( 'Active Tab Item', 'magezix-core' ),
				'type'           => Controls_Manager::SWITCHER,
				'label_on'       => esc_html__( 'YES', 'magezix-core' ),
				'label_off'      => esc_html__( 'NO', 'magezix-core' ),
				'return_value'   => 'yes',
				'default'        => 'no',
				'style_transfer' => true,
			]
		);
		$repeater->add_control(
			'tbicon',
			[
				'label' => esc_html__( 'Icon', 'magezix-core' ),
				'type' => Controls_Manager::ICONS,
			]
		);
		$repeater->add_control(
			'tab_title', [
				'label'       => esc_html__( 'Title', 'magezix-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'All', 'datanext-extension' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'postcustomorder',
			[
				'label'        => esc_html__( 'Custom Order', 'magezix-core' ),
				'type'         =>Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);
		$repeater->add_control(
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
		$repeater->add_control(
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
		$repeater->add_control(
			'pst_per_page',
			[
				'label'   => __( 'Posts Per Page', 'magezix-core' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 1,
				'default' => 5,
			]
		);
		$repeater->add_control(
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
		$repeater->add_control(
			'skip_post_count',
			[
				'label'   => __( 'Skip Post Count', 'magezix-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 0,
				'condition' => ['skip_post' => 'yes'],
			]
		);
		$repeater->add_control(
			'post_categories',
			[
				'type'        => Controls_Manager::SELECT2,
				'label'       => esc_html__( 'Select Categories', 'magezix-core' ),
				'options'     => magezix_post_category(),
				'label_block' => true,
				'multiple'    => true,
			]
		);

		$repeater->add_control(
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
        $repeater->add_control(
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
			'magezix_list_tab',
			[
				'label'       => __( 'Add Slide', 'magezix-core' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ tab_title }}}',
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
					'{{WRAPPER}} .tx-post-overly--lg .post-thumb.h-555 img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();

    ?>
    <div class="category-news__wrap">
        <?php if(!empty($settings['section_heading'])):?>
        <h2 class="tx-section-heading style-2 mb-30">
            <span><?php echo wp_kses( $settings['section_heading'], true );?></span>
        </h2>
        <?php endif;?>
        <ul class="tx-post__nav nav style-2 nav-tabs" id="txTabFour" role="tablist">
            <?php foreach($settings['magezix_list_tab'] as $item):?>
            <li class="nav-item" role="presentation">
            <button class="nav-link <?php if('yes' == $item['is_active']){echo esc_attr('active');}?>" id="txTabFour-0<?php echo esc_attr($item['_id']);?>" data-bs-toggle="tab" data-bs-target="#txTabFour-<?php echo esc_attr($item['_id']);?>" type="button" role="tab" aria-controls="txTabFour-<?php echo esc_attr($item['_id']);?>" aria-selected="true"><?php \Elementor\Icons_Manager::render_icon( $item['tbicon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo esc_html($item['tab_title']);?></button>
            </li>
            <?php endforeach;?>
        </ul>
        <div class="tx-post__content tab-content mt-30" id="txTabContentFour">
            <?php foreach($settings['magezix_list_tab'] as $item):

                $args = array(
                    'post_type'           => 'post',
                    'posts_per_page'      => !empty( $item['pst_per_page'] ) ? $item['pst_per_page'] : 1,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => 1,
                    'order'               => $item['postorder'],
                    'orderby'             => $item['postorderby'],
                );
                if( ! empty($item['post_categories'] ) ){
                    $args['category_name'] = implode(',', $item['post_categories']);
                }
                if("yes" == $item['skip_post']){
                    $args['offset'] = $item['skip_post_count'];
                }
                if(!empty($item['post_tags'][0])) {
                    $args['tax_query'] = array(
                        array(
                        'taxonomy' => 'post_tag',
                        'field'    => 'ids',
                        'terms'    => $item['post_tags']
                        )
                    );
                }
                if( isset($item['post_format']) && is_array($item['post_format']) && count($item['post_format']) > 0  ) {
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'post_format',
                            'field'    => 'slug',
                            'terms'    => $item['post_format'],
                            'operator' => 'IN'
                        )
                    );
                }
                $query = new \WP_Query( $args );
            ?>
            <div class="tab-pane animated fadeInUp <?php if('yes' == $item['is_active']){echo esc_attr('show active');}?>" id="txTabFour-<?php echo esc_attr($item['_id']);?>" role="tabpanel" aria-labelledby="txTabFour-0<?php echo esc_attr($item['_id']);?>">
                <div class="row flex-row-reverse mt-none-30">
                <?php
                if ( $query->have_posts() ) {
				$iten_number = 0;
                while ( $query->have_posts() ) {
                $query->the_post();
                    $mgthumb_size = 'full';
                    $title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
                    $tags = get_the_tags(get_the_ID());
					$iten_number++;
                ?>
                <?php if(0 == $query->current_post):?>
                    <div class="col-xl-8 col-lg-12 col-md-12 mt-30">
                        <div class="tx-post tx-post-overly tx-post-overly--lg ml-40">
                            <div class="post-thumb mzx-post__item br-3 h-555">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
                            </div>
                            <div class="post-content w-100 text-center">
                                <ul class="post-meta post-meta--4 style-3 ul_li_center mb-10">
                                    <li>
                                        <div class="post-meta__author ul_li">
                                            <div class="avatar">
                                                <?php magezix_post_author_avatars($settings['avater_size']);?>
                                            </div>
                                            <span><?php the_author()?></span>
                                        </div>
                                    </li>
                                    <li class="magezix-comment"><i class="far fa-comment"></i><?php esc_html_e( 'Comments', 'magezix' );?> (<?php echo esc_attr(get_comments_number());?>)</li>
                                </ul>
                                <h2 class="post-title border-effect fs-30"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h2>
                                <?php if($tags){ ?>
                                <div class="tags-slide-wrap style-2 ul_li_center mt-20">
                                    <span><?php esc_html_e( '# Tags', 'magezix-core' );?></span>
                                    <div class="tags-slide owl-carousel">
                                    <?php foreach ( $tags as $tag ) :
                                    $tag_link = get_tag_link( $tag->term_id );?>
                                        <div class="item">
                                            <a href="<?php echo esc_url($tag_link); ?>"><?php echo esc_html($tag->name); ?></a>
                                        </div>
                                    <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php else:?>
                    <?php if ( 1 ==  $query->current_post ): ?>
                    <div class="col-xl-4 col-lg-12 col-md-12 mt-30">
                        <div class="tx-post__item-wrap style-2 mr-none-30">
                        <?php endif;?>
                            <div class="tx-post__category-item tx-post__category-item--3 tx-post ul_li">
                                <div class="post-thumb">
                                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'large' );?></a>
                                    <span class="post-number style-2"><?php if($iten_number < 10){echo esc_attr('0'. $iten_number);}else{echo esc_attr($iten_number);} ;?></span>
                                </div>
                                <div class="post-content">
                                    <?php if(function_exists('magezix_category_pl')){
                                        magezix_category_pl();
                                    }?>
                                    <h3 class="post-title border-effect-2"><a href="<?php echo esc_html($title);?>"><?php echo esc_html($title);?></a></h3>
                                    <div class="post-meta post-meta--2 ul_li">
                                        <div class="post-meta__author ul_li">
                                            <div class="avatar">
                                                <?php magezix_post_author_avatars($settings['avater_size']);?>
                                            </div>
                                            <span><?php the_author()?></span>
                                        </div>
                                        <span class="date"><i class="far fa-calendar-alt"></i><?php print get_the_date( "M d, Y" ); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php if (($query->current_post + 1) == ($query->post_count)):?>
                        </div>
                    </div>
                    <?php endif; endif;?>
                    <?php } wp_reset_query(); } ?>
                </div>
            </div>
            <?php endforeach;?>

        </div>
    </div>

    <?php
    }


}


Plugin::instance()->widgets_manager->register( new magezix_post_tiles_tab() );
<?php

/**
 * Elementor Single Widget
 * @package Papurfy Extension
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_post_v3_list_tab extends Widget_Base {

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
		return 'mgz-post-tabs-list-v3';
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
		return esc_html__( 'Post Tab List V3', 'magezix-core' );
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
		$this->add_control(
			'thumb_img_height',
			[
				'label' => esc_html__( 'Width', 'magezix-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .trending__post-item .post-thumb img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();

    ?>

    <!-- tab post grid start -->
    <div class="tab-post">
        <ul class="tab-post__nav nav nav-tabs" id="tbv3IDS" role="tablist">

            <?php foreach($settings['magezix_list_tab'] as $item):?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?php if('yes' == $item['is_active']){echo esc_attr('active');}?>" id="tbv3IDS-<?php echo esc_attr($item['_id']);?>" data-bs-toggle="tab" data-bs-target="#tbv3ID-<?php echo esc_attr($item['_id']);?>" type="button" role="tab" aria-controls="tbv3IDS-<?php echo esc_attr($item['_id']);?>" aria-selected="true"><i class="far fa-clock"></i><?php echo esc_html($item['tab_title']);?></button>
                </li>
            <?php endforeach;?>

        </ul>
        <div class="tab-content" id="txTabContentThree">
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
            <div class="tab-pane animated fadeInUp <?php if('yes' == $item['is_active']){echo esc_attr('show active');}?>" id="tbv3ID-<?php echo esc_attr($item['_id']);?>" role="tabpanel" aria-labelledby="tbv3IDS-<?php echo esc_attr($item['_id']);?>">
                <div class="row">
                    <?php
						if ( $query->have_posts() ) {
						$iten_number = 0;
						while ( $query->have_posts() ) {
						$query->the_post();
							$mgthumb_size = 'large';
							$title = wp_trim_words( get_the_title(), $settings['title_length'], '' );
							$iten_number++;
					?>
                    <div class="col-lg-4">
                        <div class="tab-post__item tab-post__item--2 tx-post ul_li mt-45">
                            <div class="post-thumb">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail( $mgthumb_size );?></a>
                                <span class="post-number"><?php if($iten_number < 10){echo esc_attr('0'. $iten_number);}else{echo esc_attr($iten_number);} ;?></span>
                            </div>
                            <div class="post-content">
                                <?php
                                    if(function_exists('magezix_category_badge_sm')){
                                        magezix_category_badge_sm();
                                    }
                                ?>
                                <h4 class="post-title border-effect-2"><a href="<?php the_permalink();?>"><?php echo esc_html($title);?></a></h4>
                                <span class="text-uppercase fs-13"><i class="far fa-calendar-alt"></i><?php print get_the_date( "M d, Y" ); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php } wp_reset_query(); } ?>
                </div>
            </div>
            <?php endforeach;?>

        </div>
    </div>

    <?php
    }


}


Plugin::instance()->widgets_manager->register( new magezix_post_v3_list_tab() );
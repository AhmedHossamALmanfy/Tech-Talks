<?php
namespace ElementHelper\Widget;


use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Post_Cats extends Element_El_Widget {

    /**
     * Get widget name.
     *
     * Retrieve Element Helper widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'post_cats';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Post Custom Cats', 'elementhelper' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.sabber.com/widgets/icon-box/';
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'mg-custom-icon';
    }

    public function get_categories() {
		return [ 'magezix_widgets' ];
	}

    public function get_keywords() {
        return [ 'featured', 'list', 'icon' ];
    }

    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __( 'Design Style', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'design_style',
            [
                'label' => __( 'Design Style', 'elementhelper' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'elementhelper' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_icon',
            [
                'label' => __( 'Cat Lists', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'type',
            [
                'label' => __( 'Media Type', 'elementhelper' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __( 'Icon', 'elementhelper' ),
                        'icon' => 'far fa-smile',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'elementhelper' ),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'elementhelper' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image',
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
                'condition' => [
                    'type' => 'image',
                ]
            ]
        );

        if ( elh_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'Icon', 'elementhelper' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => elh_element_get_elh_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon',
                    ]
                ]
            );
        }
        else {
            $repeater->add_control(
                'selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'type' => 'icon',
                    ]
                ]
            );
        }

        $repeater->add_control(
            'title',
            [
                'label' => __( 'Cat Title', 'elementhelper' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Features Title', 'elementhelper' ),
                'placeholder' => __( 'Type Icon Box Title', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        // button link
        $repeater->add_control(
            'button_link',
            [
                'label' => __( 'Cat Link', 'elementhelper' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => __( 'https://your-link.com', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        // cat count
        $repeater->add_control(
            'cat_count',
            [
                'label' => __( 'Cat Count', 'elementhelper' ),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => __( '0', 'elementhelper' ),
                'placeholder' => __( 'Type Cat Count', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        // button text
        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'elementhelper' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Read More', 'elementhelper' ),
                'placeholder' => __( 'Type button text here', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
                'default' => [
                    [
                        'title' => __( 'Title Here', 'elementhelper' ),
                        'description' => __( 'Description Here', 'elementhelper' ),
                    ],
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_media_style',
            [
                'label' => __( 'Cat Style', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // icon color
        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .category__item .category__icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        // title color
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .category__item .category__title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .category__item .category__title a',
            ]
        );

        // count color
        $this->add_control(
            'count_color',
            [
                'label' => __( 'Count Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .category__item .category__number' => 'color: {{VALUE}};',
                ],
            ]
        );

        // count typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'count_typography',
                'label' => __( 'Count Typography', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .category__item .category__number',
            ]
        );

        $this->end_controls_section();

        // Button style
        $this->start_controls_section(
            '_section_button_style',
            [
                'label' => __( 'Button Style', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // button border radius
        $this->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} a.category__search' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __( 'Typography', 'elementhelper' ),
                'selector' => '{{WRAPPER}} a.category__search',
            ]
        );

        // tab normal
        $this->start_controls_tabs( 'tabs_button_style' );

        // tab normal
        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __( 'Normal', 'elementhelper' ),
            ]
        );

        // button text color
        $this->add_control(
            'button_text_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.category__search' => 'color: {{VALUE}};',
                ],
            ]
        );

        // button background color
        $this->add_control(
            'button_background_color',
            [
                'label' => __( 'Background Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.category__search' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // tab hover
        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __( 'Hover', 'elementhelper' ),
            ]
        );

        // button text color
        $this->add_control(
            'button_text_hover_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.category__search:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // button background color
        $this->add_control(
            'button_background_hover_color',
            [
                'label' => __( 'Background Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.category__search:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     *
     * Used to generate the final HTML displayed on the frontend.
     *
     * Note that if skin is selected, it will be rendered by the skin itself,
     * not the widget.
     *
     * @since 1.0.0
     * @access public
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

    ?>

    <?php if ( $settings['design_style'] === 'style_3' ): ?>

    <?php else: ?>
    <section class="category">
        <div class="container">
            <div class="category__border pb-35">
                <div class="row mt-none-30">
                    <?php foreach ( $settings['slides'] as $key => $slide ) : ?>
                    <div class="col-lg-2 col-md-4">
                        <div class="category__item text-center mt-30">
                            <span class="category__icon">
                                <?php if ( $slide['type'] === 'image' && ( $slide['image']['url'] || $slide['image']['id'] ) ) :
                                    $this->get_render_attribute_string( 'image' );
                                    $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                ?>
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'image' ); ?>
                                <?php elseif ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?>

                                <?php elh_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                <?php endif; ?>
                            </span>

                            <?php if(!empty( $slide['title'] )) : ?>
                            <h4 class="category__title">
								<a href="<?php echo esc_url( $slide['button_link']['url'] ) ?>">
                                    <?php echo elh_element_kses_basic( $slide['title'] ); ?>
                                </a>
							</h4>
                            <?php endif; ?>

                            <?php if(!empty( $slide['cat_count'] )) : ?>
                            <span class="category__number">(<?php echo esc_html($slide['cat_count']); ?>)</span>
                            <?php endif; ?>

                            <a href="<?php echo esc_url( $slide['button_link']['url'] ); ?>" class="category__search">
                                <?php echo elh_element_kses_basic( $settings['button_text'] ); ?>
                                <i class="far fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>

    <?php endif; ?>

    <?php
    }

}

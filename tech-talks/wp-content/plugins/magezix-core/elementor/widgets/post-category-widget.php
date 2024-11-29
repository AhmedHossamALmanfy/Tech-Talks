<?php

/**
 * Elementor Single Widget
 * @package Magezix Core
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class magezix_category_list extends Widget_Base {

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
		return 'magezix-category-list';
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
		return esc_html__( 'Post Category', 'magezix-core' );
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
			'layout_style',
			[
				'label' => esc_html__( 'Category Style', 'magezix-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => 'style_1',
				'options' => [
					'style_1'  => esc_html__( 'Style 1', 'magezix-core' ),
					'style_2'  => esc_html__( 'Style 2', 'magezix-core' ),
				],
			]
		);
        $this->add_control(
			'hideempty',
			[
				'label'        => esc_html__( 'Hide Empty', 'magezix-core' ),
				'type'         =>Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);
		$this->add_control(
			'hidenumber',
			[
				'label'        => esc_html__( 'Hide Count', 'magezix-core' ),
				'type'         =>Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
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
			'cateorder',
			[
				'label'     => esc_html__( 'Category Order', 'magezix-core' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'ASC',
				'options'   => [
					'ASC'  => esc_html__( 'Ascending', 'magezix-core' ),
					'DESC' => esc_html__( 'Descending', 'magezix-core' ),
				],
                'condition' => ['postcustomorder!' => 'yes'],
			]
		);
		$this->add_control(
            'catehow',
            [
                'label'   => __( 'How many Category You Want to show?', 'magezix-core' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 8,
            ]
        );
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();
        $categorys  = "category";

        $cate_lists = get_terms( $categorys, [
            'orderby'    => 'slug',
            'number'     => $settings['catehow'],
            'childless'              => 0,
			'child_of'               => 0,
			'parent'=>0,
            'order'      => $settings['cateorder'],
            'hide_empty' => 'yes' === $settings['hideempty'] ? false : true,
        ] );
    ?>
    <!-- category start -->
    <?php if ( $settings['layout_style'] == 'style_1' ): ?>
    <?php if ( !empty( $cate_lists ) && !is_wp_error( $cate_lists ) ): ?>
    <section class="category">
        <div class="container">
            <div class="category__border pb-35">
                <div class="row mt-none-30">
                    <?php
                    foreach ( $cate_lists as $cate ):
                        $meta = get_term_meta($cate->term_id, 'magezix_cate_meta', true);

                        $cate_img = !empty( $meta['cate_img_upload']['url'] )? $meta['cate_img_upload']['url'] : '';
                        $icon_name = !empty( $meta['icon_name'] )? $meta['icon_name'] : '';
                        $custom_cate_name = !empty( $meta['custom_cate_name'] )? $meta['custom_cate_name'] : '';
                    ?>
                    <div class="col-lg-2 col-md-4">
                        <div class="category__item text-center mt-30">

                            <span class="category__icon">
                                <i class="<?php echo esc_attr($icon_name);?>"></i>
                            </span>

                            <h4 class="category__title">
								<a href="<?php echo esc_url( get_term_link( $cate->term_id ) ) ?>">
								<?php
									if(!empty($custom_cate_name)){
										echo esc_html( $custom_cate_name );
									}else{
										echo esc_html( $cate->name );
									}
								 ?>
							</a>
							</h4>
                            <?php if('yes' == $settings['hidenumber']):?>
                            <span class="category__number">(<?php echo esc_attr( $cate->count ) ?>)</span>
                            <?php endif;?>
                            <a href="<?php echo esc_url( get_term_link( $cate->term_id ) ) ?>" class="category__search">
                                <?php esc_html_e( 'View', 'magezix-core' );?>
                                <i class="far fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>
    <!-- category end -->
    <?php endif;?>
    <?php else:?>
	<!-- category start -->
		<?php if ( !empty( $cate_lists ) && !is_wp_error( $cate_lists ) ): ?>
		<div class="category pt-45 pb-55">
			<div class="category__wrap ul_li_between">
				<?php
				foreach ( $cate_lists as $cate ):
					$meta = get_term_meta($cate->term_id, 'magezix_cate_meta', true);

					$cate_img = !empty( $meta['cate_img_upload']['url'] )? $meta['cate_img_upload']['url'] : '';
					$icon_name = !empty( $meta['icon_name'] )? $meta['icon_name'] : '';
					$custom_cate_name = !empty( $meta['custom_cate_name'] )? $meta['custom_cate_name'] : '';
				?>
				<div class="category__item text-center mt-30">

					<span class="category__icon">
						<i class="<?php echo esc_attr($icon_name);?>"></i>
					</span>

					<h4 class="category__title">
						<a href="<?php echo esc_url( get_term_link( $cate->term_id ) ) ?>">
							<?php
								if(!empty($custom_cate_name)){
									echo esc_html( $custom_cate_name );
								}else{
									echo esc_html( $cate->name );
								}
							?>
						</a>
					</h4>
					<?php if('yes' == $settings['hidenumber']):?>
					<span class="category__number">(<?php echo esc_attr( $cate->count ) ?>)</span>
					<?php endif;?>
					<a href="<?php echo esc_url( get_term_link( $cate->term_id ) ) ?>" class="category__search">
						<?php esc_html_e( 'View', 'magezix-core' );?>
						<i class="far fa-eye"></i>
					</a>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	<?php endif;?>
	<?php endif;?>
	<!-- category end -->
    <?php
    }


}


Plugin::instance()->widgets_manager->register( new magezix_category_list() );
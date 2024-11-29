<?php
/**
 * All Elementor widget init
 * @package Magezix
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}


if ( !class_exists('Magezix_Elementor_Widget_Init') ){

	class Magezix_Elementor_Widget_Init{
		/*
			* $instance
			* @since 1.0.0
			* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array($this,'_widget_categories') );
			//elementor widget registered
			add_action('elementor/widgets/register',array($this,'_widget_registered'));
			add_action('elementor/editor/after_enqueue_styles',array($this,'editor_style'));
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}
		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager){

			$categories = [];
			$categories['magezix_widgets'] =
				[
					'title' => __( 'Magezix Addons', 'element-helper' ),
					'icon'  => 'fa fa-plug'
				];

			$old_categories = $elements_manager->get_categories();
			$categories = array_merge($categories, $old_categories);

			$set_categories = function ( $categories ) {
				$this->categories = $categories;
			};

			$set_categories->call( $elements_manager, $categories );
		}

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered(){
			if( !class_exists('Elementor\Widget_Base') ){
				return;
			}
			$elementor_widgets = array(

				// magezix Theme Widgets
				'post-overlay',
				'post-list-item',
				'post-list-scroll',
				'post-list-tab',
				'post-list-tab-v2',
				'post-list-tab-v3',
				'post-trending-topic',
				'post-slider',
				'post-tab-tiles',
				'post-horizontal',
				'post-grid-carousel',
				'post-carousel',
				'post-list-carousel',
				'post-tiles',
				'post-tab-overlay',
				'post-grid',
				'post-video',
				'post-video-list',
				'post-slider-v2',
				'sponsor-post',
				'post-category',
				'post-tags',
				'sponsor-carousle',
				'online-voting',
				'team',
				'search',
				'social-flower',
				'testimonial',
				'section-title',
				'about-info',
				'feature',
				'button',
				'about-video',
				'contact-info',
				'contact-img',
				'faq',
				'post-breaking-news',
				'breadcrumb',
				'newslater',
				'podcast',
				'magezix-demo-page',
			);

			$elementor_widgets = apply_filters('magezix_elementor_widget',$elementor_widgets);

			if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
				foreach ( $elementor_widgets as $widget ){
					$widget_file = 'plugins/elementor/widget/'.$widget.'.php';
					$template_file = locate_template($widget_file);
					if ( !$template_file || !is_readable( $template_file ) ) {
						$template_file = MAGEZIX_DIR_PATH.'/elementor/widgets/'.$widget.'-widget.php';
					}
					if ( $template_file && is_readable( $template_file ) ) {
						include_once $template_file;
					}
				}
			}

		}

		public function editor_style(){
			$cs_icon = plugins_url( 'icon.png', __FILE__ );
			wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .mg-custom-icon{content: url( '.$cs_icon.');width: 28px;}' );
		}



	}

	if ( class_exists('Magezix_Elementor_Widget_Init') ){
		Magezix_Elementor_Widget_Init::getInstance();
	}

}//end if
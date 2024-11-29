<?php
// Customizer Default Data
if ( ! function_exists( 'rttheme_generate_defaults' ) ) {
    function rttheme_generate_defaults() {
        $customizer_defaults = array(

            // General  
            'logo'               	=> '',
            'logo_light'          	=> '',
            'logo_alternet'         => '',
            'logo_width'            => '',
            'mobile_logo_width'     => '',
			'image_blend'			=> 'normal',			
			'container_width'		=> '1320',
            'preloader'          	=> 0,
            'preloader_image'    	=> '',
			'preloader_bg_color' 	=> '#ffffff',
            'back_to_top'     		=> 1,
            'display_no_preview_image'    => 0,

            // Contact Socials
            'phone'   			=> '',
            'email'   			=> '',
            'address'   		=> '',
            'sidetext'   		=> '',
            'address_label'   	=> '',
            'sidetext_label'   	=> '',
            'social_label'   	=> '',			
            'social_facebook'  	=> '',
            'social_twitter'   	=> '',
            'social_linkedin'   => '',
            'social_behance' 	=> '',
            'social_dribbble'  	=> '',
            'social_youtube'    => '',
            'social_pinterest'  => '',
            'social_instagram'  => '',
            'social_skype'      => '',
            'social_rss'       	=> '',
            'social_snapchat'   => '',
            'social_tiktok'     => '',
			
			// Color
			'primary_color' 			=> '#2962ff',
			'secondary_color' 			=> '#0034c2',
			'body_color' 				=> '#6c6f72',			
			'menu_color' 				=> '#000000',
			'menu_hover_color' 			=> '#2962ff',
			'menu_color_tr' 			=> '#ffffff',			
			'black_bag_menu_color' 		=> '#ffffff',			
			'submenu_color' 			=> '#656567',
			'submenu_hover_color' 		=> '#2962ff',
			'submenu_bgcolor' 			=> '#ffffff',
			'submenu_hover_bgcolor' 	=> '#ffffff',

            //dark color mode
            'color_mode'                => 0,
            'code_mode_type'            => 'light-mode',
            'dark_mode_bgcolor'         => '#101213',
            'dark_mode_light_bgcolor'   => '#171818',
            'dark_mode_color'           => '#d7d7d7',
            'dark_mode_border_color'    => '#222121',
            'color_mode_button_bgcolor'     => '#2962ff',
            'color_mode_button_scrollcolor' => '#0034c2',

			// news ticker
			'ticker_enable' 			=> 0,
			'ticker_title_text' 		=> esc_html__('TRENDING', 'neeon'),
			'ticker_delay' 				=> '2000',
			'ticker_speed' 				=> '0.10',
			'ticker_style' 				=> 'reveal',
			'ticker_post_number' 		=> 5,
			'ticker_swiper_bg_color' 	=> '#292929',
			'ticker_text_color' 		=> '#e0e0e0',
			'ticker_text_hover_color' 	=> '#ffffff',
            'ticker_swiper_bg5_color'    => '#ffffff',
            'ticker_text5_color'         => '#000000',
            'ticker_text5_hover_color'   => '#2962ff',

			// reading progress bar
			'scroll_indicator_enable' 	=> 0,
			'scroll_indicator_bgcolor' 	=> '#2962ff',
            'scroll_indicator_bgcolor2' => '#0034c2',
			'scroll_indicator_height' 	=> 4,
			'scroll_indicator_position' => 'top',

            // header
			'top_bar'  					=> 0,
			'top_bar_style'  			=> 1,
			'top_bar_date'  			=> 1,
			'top_bar_update'  			=> 1,
            'top_address_2'             => 1,
            'top_email_2'               => 1,
            'top_address_3'             => 0,
            'top_social_3'              => 1,
            'top_social_4'              => 1,
            'topbar_menu'               => '',
			'top_bar_bgcolor'			=> '#292929',
			'top_bar_color'				=> '#e0e0e0',
			'top_baricon_color'			=> '#ffffff',
			'top_bar_bgcolor_2'			=> '#2962ff',
			'top_bar_color_2'			=> '#ffffff',
			'top_baricon_color_2'		=> '#ffffff',
            'top_bar_bgcolor_3'         => '#f7f7f7',
            'top_bar_color_3'           => '#818181',
            'top_baricon_color_3'       => '#818181',
            'top_bar_bgcolor_4'         => '#292929',
            'top_bar_color_4'           => '#c7c3c3',
            'top_baricon_color_4'       => '#ffffff',
            'top_bar_bgcolor_5'         => '#ffffff',
            'top_bar_color_5'           => '#adadad',
            'top_barhov_color_5'        => '#2962ff',
            'top_baricon_color_5'       => '#7a7a7a',

			'mobile_topbar'  			=> 0,
			'mobile_date'  				=> 1,
			'mobile_phone'  			=> 1,
			'mobile_email'  			=> 0,
			'mobile_address'  			=> 1,
            'mobile_subscribe'          => 0,
			'mobile_social'  			=> 0,
			'mobile_search'  			=> 0,
            'mobile_cart'               => 0,
			
            'header_bg_color'           => '',
			'sticky_menu'       		=> 1,
			'header_opt'       			=> 1,
            'header_style'      		=> 1,
            'search_icon'      			=> 0,
            'vertical_menu_icon' 		=> 0,
            'cart_icon' 				=> 0,
            'user_icon'                 => 0,
            'header_date'               => 1,
            'online_button'             => 0,
            'online_button_text'        => esc_html__('View All Recipes', 'neeon'),
            'online_button_link'        => '#',
            'subscribe_button'          => 1,
            'subscribe_button_text'     => esc_html__('Subscribe', 'neeon'),
            'subscribe_button_link'     => '#',

            // Ad option
            'header_ad_heading'       	=> '',
            'ad_type'       			=> 'adimage',
            'adimage'       			=> '',
            'adcustom'       			=> '',
            'ad_img_link'       		=> '',
            'head_ad_option'       		=> 0,
            'ad_img_target'       		=> 0,

            'before_head_ad_option'     => 0,
            'before_ad_type'            => 'before_adimage',
            'before_adimage'            => '',
            'before_adcustom'           => '',
            'before_ad_img_link'        => '',
            'before_ad_img_target'      => 0,

            'before_head_ad11_option'     => 0,
            'before_ad11_type'            => 'before_head11_adimage',
            'before_head11_adimage'       => '',
            'before_head11_adcustom'      => '',
            'before_ad11_img_link'        => '',
            'before_ad11_img_target'      => 0,

            'before_post_ad_heading'    => '',
            'before_post_ad_option'     => 0,
            'ad_before_post_type'      	=> 'post_before_adimage',
            'post_before_adimage'      	=> '',
            'post_before_ad_img_link'   => '',
            'post_before_ad_img_target' => 0,
            'post_before_adcustom'      => '',

            'after_post_ad_heading'     => '',
            'after_post_ad_option'      => 0,
            'ad_after_post_type'      	=> 'post_after_adimage',
            'post_after_adimage'      	=> '',
            'post_after_ad_img_link'    => '',
            'post_after_ad_img_target'  => 0,
            'post_after_adcustom'       => '',
			
			// Footer
            'footer_style'        		=> 1,
            'copyright_text'      		=> '&copy; ' . date('Y') . esc_html__( ' neeon. All Rights Reserved by', 'neeon' ) . '<a target="_blank" rel="nofollow" href="' . NEEON_AUTHOR_URI . '">RadiusTheme</a>',
			'footer_column_1'			=> 4,
            'footer_column_2'           => 4,
            'footer_column_4'           => 3,
            'footer_column_5'           => 3,
            'footer_column_6'           => 3,
            'footer_column_8'           => 4,
			'footer_area'				=> 1,
            'copyright_area'            => 1,
            'footer_sticky'             => 0,
			'footer_bgtype' 			=> 'fbgcolor',
            'footer_bgtype2'            => 'fbgcolor2',
            'footer_bgtype3'            => 'fbgcolor3',
            'footer_bgtype4'            => 'fbgcolor4',
            'footer_bgtype5'            => 'fbgcolor5',
            'footer_bgtype6'            => 'fbgcolor6',
            'footer_bgtype7'            => 'fbgcolor7',
            'footer_bgtype8'            => 'fbgcolor8',
			'fbgcolor' 					=> '#0f1012',
            'fbgcolor2'                 => '#0f1012',
            'fbgcolor3'                 => '#0f1012',
            'fbgcolor4'                 => '#0f1012',
            'fbgcolor5'                 => '#f7f7f7',
            'fbgcolor6'                 => '#ffffff',
            'fbgcolor7'                 => '#0f1012',
            'fbgcolor8'                 => '#0f1012',
			'fbgimg'					=> '',
            'fbgimg2'                   => '',
            'fbgimg3'                   => '',
            'fbgimg4'                   => '',
            'fbgimg5'                   => '',
            'fbgimg6'                   => '',
            'fbgimg7'                   => '',
            'fbgimg8'                   => '',
			'footer_title_color' 		=> '#ffffff',
			'footer_color' 				=> '#d0d0d0',
			'footer_link_color' 		=> '#d0d0d0',
			'footer_link_hover_color' 	=> '#ffffff',
            'footer_logo_light'         => '',
            'footer_logo_light7'        => '',
            'footer_logo_light8'        => '',
            'footer3_logo'              => 1,
            'footer3_social'            => 1,
            'footer7_logo'              => 1,
            'footer7_social'            => 1,
            'copyright_text_color'      => '#d0d0d0',
            'copyright_link_color'      => '#d0d0d0',
            'copyright_hover_color'     => '#ffffff',

            'footer3_title_color'     	=> '#ffffff',
            'footer3_color'     		=> '#d0d0d0',
            'footer3_link_color'     	=> '#d0d0d0',
            'footer3_hover_color'     	=> '#ffffff',
            'footer_shape4'             => 1,
            'copyright_bg_color'        => '',
            'footer5_title_color'       => '#000000',
            'footer5_color'             => '#000000',
            'footer5_link_color'        => '#000000',
            'footer5_hover_color'       => '#2962ff',
            'footer5_copyright_color'   => '#a5a6aa',
            'footer6_title_color'       => '#000000',
            'footer6_color'             => '#6c6f72',
            'footer6_link_color'        => '#6c6f72',
            'footer6_hover_color'       => '#2962ff',
            'footer6_copyright_color'   => '#6c6f72',
            'footer7_title_color'     	=> '#ffffff',
            'footer7_color'     		=> '#d0d0d0',
            'footer7_link_color'     	=> '#d0d0d0',
            'footer7_hover_color'     	=> '#ffffff',
			
			// Banner 
			'breadcrumb_link_color' 	=> '#646464',
			'breadcrumb_link_hover_color' => '#2962ff',
			'breadcrumb_active_color' 	=> '#2962ff',
			'breadcrumb_seperator_color'=> '#646464',
			'banner_bg_opacity' 		=> 1,
			'banner_top_padding'    	=> 30,
            'banner_bottom_padding' 	=> 30,
            'breadcrumb_active' 		=> 0,
			
			// Post Type Slug
			'team_slug' 				=> 'team',
			'team_cat_slug' 			=> 'team-category',		
			
            // Page Layout Setting 
            'page_layout'        => 'full-width',
            'page_sidebar'        => '',
			'page_padding_top'    => 80,
            'page_padding_bottom' => 80,
            'page_banner' => 1,
            'page_breadcrumb' => 0,
            'page_bgtype' => 'bgcolor',
            'page_bgcolor' => '#f7f7f7',
            'page_bgimg' => '',
            'page_page_bgimg' => '',
            'page_page_bgcolor' => '#ffffff',
			
			//Blog Layout Setting 
            'blog_layout' => 'right-sidebar',
            'blog_sidebar' => '',
			'blog_padding_top'    => 80,
            'blog_padding_bottom' => 80,
            'blog_banner' => 1,
            'blog_breadcrumb' => 0,			
			'blog_bgtype' => 'bgcolor',
            'blog_bgcolor' => '#f7f7f7',
            'blog_bgimg' => '',
            'blog_page_bgimg' => '',
            'blog_page_bgcolor' => '#ffffff',
			
			//Single Post Layout Setting 
			'single_post_layout' => 'right-sidebar',
            'single_post_sidebar' => '',
			'single_post_padding_top'    => 80,
            'single_post_padding_bottom' => 80,
            'single_post_banner' => 1,
            'single_post_breadcrumb' => 0,			
			'single_post_bgtype' => 'bgcolor',
            'single_post_bgcolor' => '#f7f7f7',
            'single_post_bgimg' => '',
            'single_post_page_bgimg' => '',
            'single_post_page_bgcolor' => '#ffffff',

            //Team Layout Setting 
			'team_archive_layout' => 'full-width',
            'team_archive_sidebar' => '',
			'team_archive_padding_top'    => 80,
            'team_archive_padding_bottom' => 80,
            'team_archive_banner' => 1,
            'team_archive_breadcrumb' => 0,			
			'team_archive_bgtype' => 'bgcolor',
            'team_archive_bgcolor' => '#f7f7f7',
            'team_archive_bgimg' => '',
            'team_archive_page_bgimg' => '',
            'team_archive_page_bgcolor' => '#ffffff',
			
			//Team Single Layout Setting 
			'team_layout' => 'full-width',
            'team_sidebar' => '',
			'team_padding_top'    => 80,
            'team_padding_bottom' => 80,
            'team_banner' => 1,
            'team_breadcrumb' => 0,			
			'team_bgtype' => 'bgcolor',
            'team_bgcolor' => '#f7f7f7',
            'team_bgimg' => '',
            'team_page_bgimg' => '',
            'team_page_bgcolor' => '#ffffff',
			
			//Search Layout Setting 
			'search_layout' => 'right-sidebar',
            'shop_sidebar' => '',
			'search_padding_top'    => 80,
            'search_padding_bottom' => 80,
            'search_banner' => 1,
            'search_breadcrumb' => 0,			
			'search_bgtype' => 'bgcolor',
            'search_bgcolor' => '#f7f7f7',
            'search_bgimg' => '',
            'search_page_bgimg' => '',
            'search_page_bgcolor' => '#ffffff',
            'search_excerpt_length' => 40,
			
			//Error Layout Setting 
			'error_padding_top'    => 80,
            'error_padding_bottom' => 80,
            'error_banner' => 1,
            'error_breadcrumb' => 0,			
			'error_bgtype' => 'bgcolor',
            'error_bgcolor' => '#f7f7f7',
            'error_bgimg' => '',
            'error_page_bgimg' => '',
            'error_page_bgcolor' => '#ffffff',
			
			//Shop Archive Layout Setting 
			'shop_layout' => 'left-sidebar',
            'shop_sidebar' => '',
			'shop_padding_top'    => 80,
            'shop_padding_bottom' => 80,
            'shop_banner' => 1,
            'shop_breadcrumb' => 0,			
			'shop_bgtype' => 'bgcolor',
            'shop_bgcolor' => '#f7f7f7',
            'shop_bgimg' => '',
            'shop_page_bgimg' => '',
            'shop_page_bgcolor' => '#ffffff',

            'products_cols_width' => 4,
			'products_per_page' => 8,
			'wc_shop_cart_icon' => 1,
			'wc_shop_quickview_icon' => 1,
			'wc_shop_wishlist_icon' => 0,
			'wc_shop_compare_icon' => 0,
			'wc_shop_rating' => 0,
			
			//Product Single Layout Setting 
			'product_layout' => 'full-width',
            'product_sidebar' => '',
			'product_padding_top'    => 80,
            'product_padding_bottom' => 80,
            'product_banner' => 1,
            'product_breadcrumb' => 0,			
			'product_bgtype' => 'bgcolor',
            'product_bgcolor' => '#f7f7f7',
            'product_bgimg' => '',
            'product_page_bgimg' => '',
            'product_page_bgcolor' => '#ffffff',

            'wc_product_social_icon' => 0,
            'wc_product_meta' => 1,
            'wc_product_wishlist_icon' => 0,
			'wc_product_compare_icon' => 0,
			'wc_product_quickview_icon' => 1,
			'related_woo_product' => 1,
			'related_product_title' => esc_html__('Related Products', 'neeon'),

            // Blog Archive
			'blog_style'				=> 'style2',
            'blog_loadmore'             => 'pagination',
            'load_more_limit'           => 4,
			'post_banner_title'  		=> '',
			'post_content_limit'  		=> '23',
            'post_content_limit2'       => '55',
			'blog_content'  			=> 1,
			'blog_date'  				=> 1,
			'blog_author_name'  		=> 1,
			'blog_comment_num'  		=> 0,
			'blog_cats'  				=> 1,
			'blog_view'  				=> 0,
			'blog_length'  				=> 0,
            'blog_query_order'  		=> 'default',
            'blog_query_orderby'  	    => 'DESC',
			'author_bg_image'  			=> '',
			'blog_animation'  			=> 'hide',
			'blog_animation_effect'  	=> 'fadeInUp',
			
			// Post
            'post_style'                => 'style1',
			'scroll_post_enable'		=> 0,
            'post_scroll_limit'         => 1,
			'post_featured_image'		=> 1,
			'post_author_name'			=> 1,
			'post_date'					=> 1,
			'post_comment_num'			=> 1,
			'post_cats'					=> 1,
			'post_tags'					=> 1,
			'post_share'				=> 1,
			'post_links'				=> 0,
			'post_author_bio'			=> 0,
			'post_view'					=> 1,
			'post_length'				=> 0,
			'post_published'			=> 0,
			'show_related_post'			=> 0,
			'show_related_post_number'	=> 5,
			'related_title'				=> esc_html__('Related Post', 'neeon'),
			'show_related_post_title_limit'	=> 8,
			'related_post_query'		=> 'cat',
			'related_post_sort'			=> 'recent',
			'post_time_format'			=> 'modern',
			
			'single_post_padding_left'	=> 0,
			'single_post_padding_right'	=> 0,
			
			// Post Share
			'post_share_facebook' 		=> 1,
			'post_share_twitter' 		=> 1,
			'post_share_youtube' 		=> 1,
			'post_share_linkedin' 		=> 1,
			'post_share_pinterest' 		=> 0,
			'post_share_whatsapp' 		=> 1,
			'post_share_cloud' 			=> 1,
			'post_share_dribbble' 		=> 0,
			'post_share_tumblr' 		=> 0,
			'post_share_reddit' 		=> 0,
			'post_share_email' 			=> 0,
			'post_share_print' 			=> 0,
            'post_share_tiktok'         => 0,

			// Team
			'team_archive_style' 		=> 'style1',
			'team_arexcerpt_limit' 		=> 12,
			'team_ar_excerpt' 			=> 0,
			'team_ar_position' 			=> 1,
			'team_ar_social' 			=> 1,
			'team_info' 				=> 1,
			'team_skill' 				=> 1,
			'show_related_team' 		=> 1,
			'team_related_title' 		=> esc_html__('Related Chef', 'neeon'),
			'related_team_number' 		=> 5,
			'related_team_title_limit' 	=> 5,
			
            // Error
            'error_bodybg_color' 		=> '#ffffff',
            'error_text1_color' 		=> '#000000',
            'error_text2_color' 		=> '#6c6f72',
			'error_image' 				=> '',
            'error_text1' 				=> esc_html__('Oops... Page Not Found!', 'neeon'),
            'error_text2' 				=> esc_html__('The page which you are looking for does not exist galley of type and scrambled it to make a type specimen book. Please return to the homepage.','neeon'),
            'error_buttontext' 			=> esc_html__('Back to home','neeon'),
            'error_animation' 			=> 'hide',
            'error_animation_effect' 	=> 'fadeInUp',
            
            // Typography
            'typo_body' => json_encode(
                array(
                    'font' => 'Roboto',
                    'regularweight' => 'normal',
                )
            ),
            'typo_body_size' => '16px',
            'typo_body_height'=> '28px',

            //Menu Typography
            'typo_menu' => json_encode(
                array(
                    'font' => 'Spartan',
                    'regularweight' => '600',
                )
            ),
            'typo_menu_size' => '14px',
            'typo_menu_height'=> '22px',

            //Sub Menu Typography
            'typo_sub_menu' => json_encode(
                array(
                    'font' => 'Spartan',
                    'regularweight' => '500',
                )
            ),
            'typo_submenu_size' => '13px',
            'typo_submenu_height'=> '22px',


            // Heading Typography
            'typo_heading' => json_encode(
                array(
                    'font' => 'Spartan',
                    'regularweight' => '700',
                )
            ),
            //H1
            'typo_h1' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h1_size' => '36px',
            'typo_h1_height' => '40px',

            //H2
            'typo_h2' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h2_size' => '28.44px',
            'typo_h2_height'=> '32px',

            //H3
            'typo_h3' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h3_size' => '22.63px',
            'typo_h3_height'=> '33px',

            //H4
            'typo_h4' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h4_size' => '20.25px',
            'typo_h4_height'=> '30px',

            //H5
            'typo_h5' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h5_size' => '18px',
            'typo_h5_height'=> '28px',

            //H6
            'typo_h6' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h6_size' => '16px',
            'typo_h6_height'=> '26px',

            
        );

        return apply_filters( 'rttheme_customizer_defaults', $customizer_defaults );
    }
}
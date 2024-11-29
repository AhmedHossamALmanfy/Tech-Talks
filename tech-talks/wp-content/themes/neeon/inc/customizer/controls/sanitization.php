<?php

if ( class_exists( 'WP_Customize_Control' ) ) {

    /* Header action button */
    if (!function_exists('rttheme_is_button_enabled')) {
        function rttheme_is_button_enabled()
        {
            $online_button = get_theme_mod('online_button');
            if (empty($online_button)) {
                return false;
            }
            return true;
        }
    }

    /* Header subscribe button */
    if (!function_exists('rttheme_is_subscribe_button_enabled')) {
        function rttheme_is_subscribe_button_enabled()
        {
            $subscribe_button = get_theme_mod('subscribe_button');
            if (empty($subscribe_button)) {
                return false;
            }
            return true;
        }
    }
	
	/* Header action button */
    if (!function_exists('rttheme_is_related_post_enabled')) {
        function rttheme_is_related_post_enabled()
        {
            $show_related_post = get_theme_mod('show_related_post');
            if (empty($show_related_post)) {
                return false;
            }
            return true;
        }
    }
	
	/* Check is Enabled Preloader */
    if (!function_exists('rttheme_is_preloader_enabled')) {
        function rttheme_is_preloader_enabled()
        {
            $preloader = get_theme_mod('preloader');
            if (empty($preloader)) {
                return false;
            }
            return true;
        }
    }

    /* Topbar check is enabled */
    if (!function_exists('rttheme_is_topbar_enabled')) {
        function rttheme_is_topbar_enabled()
        {
            $top_bar = get_theme_mod('top_bar');
            if (empty($top_bar)) {
                return false;
            }
            return true;
        }
    }
	
	/* Topbar 1 check is enabled */
    if ( ! function_exists( 'rttheme_is_topbar1_enabled' ) ) {
        function rttheme_is_topbar1_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( $top_bar_style == 1 && $top_bar == true ) {
                return true;
            }
            return false;
        }
    }
	
	/* Topbar 2 check is enabled */
    if ( ! function_exists( 'rttheme_is_topbar2_enabled' ) ) {
        function rttheme_is_topbar2_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( $top_bar_style == 2 && $top_bar == true ) {
                return true;
            }
            return false;
        }
    }

    /* Topbar 3 check is enabled */
    if ( ! function_exists( 'rttheme_is_topbar3_enabled' ) ) {
        function rttheme_is_topbar3_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( $top_bar_style == 3 && $top_bar == true ) {
                return true;
            }
            return false;
        }
    }

    /* Topbar 4 check is enabled */
    if ( ! function_exists( 'rttheme_is_topbar4_enabled' ) ) {
        function rttheme_is_topbar4_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( $top_bar_style == 4 && $top_bar == true ) {
                return true;
            }
            return false;
        }
    }

    /* Topbar 5 check is enabled */
    if ( ! function_exists( 'rttheme_is_topbar5_enabled' ) ) {
        function rttheme_is_topbar5_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( $top_bar_style == 5 && $top_bar == true ) {
                return true;
            }
            return false;
        }
    }

	/* = Page Layout
    ==========================================================*/
	/**
     * Check is Enabled Header Button
     */
    if ( ! function_exists( 'rttheme_is_header_banner_enabled' ) ) {
        function rttheme_is_header_banner_enabled() {
            $page_banner = get_theme_mod('page_banner');
            if (empty($page_banner)) {
                return false;
            }
            return true;
        }
    }

	/**
     * Check is selected banner background type is image
     */
    if ( ! function_exists( 'rttheme_banner_bgimg_type_condition' ) ) {
        function rttheme_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('page_bgtype');
            if ( $BgType === 'bgimg' ) {
                return true;
            }
            return false;
        }
    }
    /**
     * Check is selected banner background type is color
     */
    if ( ! function_exists( 'rttheme_banner_bgcolor_type_condition' ) ) {
        function rttheme_banner_bgcolor_type_condition() {
            $checkbox_value = get_theme_mod( 'page_banner', false );
            $select_value   = get_theme_mod( 'page_bgtype', 'bgcolor' );
            if ( !empty( $checkbox_value ) && $select_value == 'bgcolor' ) {
                return true;
            }
            return false;
        }
    }


    /* Header 11 check is enabled */
    if ( ! function_exists( 'rttheme_is_header11_enabled' ) ) {
        function rttheme_is_header11_enabled() {
            $header_style = get_theme_mod( 'header_style', '11' );
            if ( $header_style == 11 ) {
                return true;
            }
            return false;
        }
    }

    /* = Single Page Layout
    ==========================================================*/
    /**
     * Check is Enabled Header Button
     */
    if ( ! function_exists( 'rttheme_is_single_post_banner_enabled' ) ) {
        function rttheme_is_single_post_banner_enabled() {
            $page_banner = get_theme_mod('single_post_banner');
            if (empty($page_banner)) {
                return false;
            }
            return true;
        }
    }

	/**
     * Check is selected banner background type is image
     */
    if ( ! function_exists( 'rttheme_single_banner_bgimg_type_condition' ) ) {
        function rttheme_single_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('single_post_banner_bg_type');
            if ( $BgType === 'bgimg' ) {
                return true;
            }
            return false;
        }
    }
    /**
     * Check is selected banner background type is color
     */
    if ( ! function_exists( 'rttheme_single_banner_bgcolor_type_condition' ) ) {
        function rttheme_single_banner_bgcolor_type_condition() {
            $select_value = get_theme_mod( 'single_post_banner', false );
            $select_bg_value = get_theme_mod( 'single_post_banner_bg_type', 'bgcolor' );
            if ( !empty( $select_value ) && $select_bg_value == 'bgcolor' ) {
                return true;
            }
            return false;
        }
    }

    /*Single Scroll Post check is enabled option*/
    if ( ! function_exists( 'rttheme_is_single_scroll_post_enabled' ) ) {
        function rttheme_is_single_scroll_post_enabled() {
            $scroll_post_enable = get_theme_mod( 'scroll_post_enable', '1' );
            if ( $scroll_post_enable == '1' ) {
                return true;
            }
            return false;
        }
    }   
	
	/* Team related option */
    if (!function_exists('rttheme_is_related_team_enabled')) {
        function rttheme_is_related_team_enabled()
        {
            $show_related_team = get_theme_mod('show_related_team');
            if (empty($show_related_team)) {
                return false;
            }
            return true;
        }
    }

     /* Woo related option */
    if (!function_exists('rttheme_is_related_woo_enabled')) {
        function rttheme_is_related_woo_enabled()
        {
            $related_woo_product = get_theme_mod('related_woo_product');
            if (empty($related_woo_product)) {
                return false;
            }
            return true;
        }
    }
    

	/**
     * Check is selected banner background type is image
     */
    if ( ! function_exists( 'rttheme_single_case_bgimg_type_condition' ) ) {
        function rttheme_single_case_bgimg_type_condition() {
            $select_value = get_theme_mod( 'single_case_banner', false );
            $SgBgType = get_theme_mod( 'single_case_banner_bg_type', 'bgimg' );
            if ( !empty( $select_value ) && $SgBgType == 'bgimg' ) {
                return true;
            }
            return false;
            
        }
    }
    /**
     * Check is selected banner background type is color
     */
    if ( ! function_exists( 'rttheme_single_case_bgcolor_type_condition' ) ) {
        function rttheme_single_case_bgcolor_type_condition() {
            $select_value = get_theme_mod( 'single_case_banner', false );
            $select_bg_value = get_theme_mod( 'single_case_banner_bg_type', 'bgcolor' );
            if ( !empty( $select_value ) && $select_bg_value == 'bgcolor' ) {
                return true;
            }
            return false;
        }
    }


    // ad option before header
    if ( ! function_exists( 'rttheme_head_before_ad_type_image_condition' ) ) {
        function rttheme_head_before_ad_type_image_condition() {
            $BgType = get_theme_mod('before_ad_type');
            $before_head_ad_option = get_theme_mod('before_head_ad_option');
            if ( $BgType === 'before_adimage' && $before_head_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'rttheme_head_before_ad_type_custom_condition' ) ) {
        function rttheme_head_before_ad_type_custom_condition() {
            $BgType = get_theme_mod('before_ad_type');
            $before_head_ad_option = get_theme_mod('before_head_ad_option');
            if ( $BgType === 'before_adcustom' && $before_head_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }


    // ad option after header
    if ( ! function_exists( 'rttheme_head_ad_type_image_condition' ) ) {
        function rttheme_head_ad_type_image_condition() {
            $BgType = get_theme_mod('ad_type');
            $head_ad_option = get_theme_mod('head_ad_option');
            if ( $BgType === 'adimage' && $head_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'rttheme_head_ad_type_custom_condition' ) ) {
        function rttheme_head_ad_type_custom_condition() {
            $BgType = get_theme_mod('ad_type');
            $head_ad_option = get_theme_mod('head_ad_option');
            if ( $BgType === 'adcustom' && $head_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    // ad option content before header
    if ( ! function_exists( 'rttheme_cbefore_ad_type_image_condition' ) ) {
        function rttheme_cbefore_ad_type_image_condition() {
            $BgType = get_theme_mod('ad_before_post_type');
            $before_post_ad_option = get_theme_mod('before_post_ad_option');
            if ( $BgType === 'post_before_adimage' && $before_post_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'rttheme_cbefore_ad_type_custom_condition' ) ) {
        function rttheme_cbefore_ad_type_custom_condition() {
            $BgType = get_theme_mod('ad_before_post_type');
            $before_post_ad_option = get_theme_mod('before_post_ad_option');
            if ( $BgType === 'post_before_adcustom' && $before_post_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    // ad option content after header
    if ( ! function_exists( 'rttheme_cafter_ad_type_image_condition' ) ) {
        function rttheme_cafter_ad_type_image_condition() {
            $BgType = get_theme_mod('ad_after_post_type');
            $after_post_ad_option = get_theme_mod('after_post_ad_option');
            if ( $BgType === 'post_after_adimage' && $after_post_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'rttheme_cafter_ad_type_custom_condition' ) ) {
        function rttheme_cafter_ad_type_custom_condition() {
            $BgType = get_theme_mod('ad_after_post_type');
            $after_post_ad_option = get_theme_mod('after_post_ad_option');
            if ( $BgType === 'post_after_adcustom' && $after_post_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }


    // ad option before header 11
    if ( ! function_exists( 'rttheme_head_before_ad11_type_image_condition' ) ) {
        function rttheme_head_before_ad11_type_image_condition() {
            $BgType = get_theme_mod('before_ad11_type');
            $before_head_ad11_option = get_theme_mod('before_head_ad11_option');
            if ( $BgType === 'before_head11_adimage' && $before_head_ad11_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'rttheme_head_before_ad11_type_custom_condition' ) ) {
        function rttheme_head_before_ad11_type_custom_condition() {
            $BgType = get_theme_mod('before_ad11_type');
            $before_head_ad11_option = get_theme_mod('before_head_ad11_option');
            if ( $BgType === 'before_head11_adcustom' && $before_head_ad11_option == 1 ) {
                return true;
            }
            return false;
        }
    }


    /*Footer 1 check is enabled option*/
    if ( ! function_exists( 'rttheme_is_footer1_enabled' ) ) {
        function rttheme_is_footer1_enabled() {
            $footer_style = get_theme_mod( 'footer_style', '1' );
            if ( $footer_style == 1 ) {
                return true;
            }
            return false;
        }
    }
    /*Footer 2 check is enabled option*/
    if ( ! function_exists( 'rttheme_is_footer2_enabled' ) ) {
        function rttheme_is_footer2_enabled() {
            $footer_style = get_theme_mod( 'footer_style', '2' );
            if ( $footer_style == 2 ) {
                return true;
            }
            return false;
        }
    }
    /*Footer 3 check is enabled option*/
    if ( ! function_exists( 'rttheme_is_footer3_enabled' ) ) {
        function rttheme_is_footer3_enabled() {
            $footer_style = get_theme_mod( 'footer_style', '3' );
            if ( $footer_style == 3 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 4 check is enabled option*/
    if ( ! function_exists( 'rttheme_is_footer4_enabled' ) ) {
        function rttheme_is_footer4_enabled() {
            $footer_style = get_theme_mod( 'footer_style', '4' );
            if ( $footer_style == 4 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 5 check is enabled option*/
    if ( ! function_exists( 'rttheme_is_footer5_enabled' ) ) {
        function rttheme_is_footer5_enabled() {
            $footer_style = get_theme_mod( 'footer_style', '5' );
            if ( $footer_style == 5 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 6 check is enabled option*/
    if ( ! function_exists( 'rttheme_is_footer6_enabled' ) ) {
        function rttheme_is_footer6_enabled() {
            $footer_style = get_theme_mod( 'footer_style', '6' );
            if ( $footer_style == 6 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 7 check is enabled option*/
    if ( ! function_exists( 'rttheme_is_footer7_enabled' ) ) {
        function rttheme_is_footer7_enabled() {
            $footer_style = get_theme_mod( 'footer_style', '7' );
            if ( $footer_style == 7 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 8 check is enabled option*/
    if ( ! function_exists( 'rttheme_is_footer8_enabled' ) ) {
        function rttheme_is_footer8_enabled() {
            $footer_style = get_theme_mod( 'footer_style', '8' );
            if ( $footer_style == 8 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 1 & 2 color check is enabled option*/
    if ( ! function_exists( 'rttheme_is_footer12_color_enabled' ) ) {
        function rttheme_is_footer12_color_enabled() {
            $footer_style = get_theme_mod( 'footer_style' );
            if ( $footer_style == 1 || $footer_style == 2 || $footer_style == 4 || $footer_style == 8 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 1 bg color & image check enabled option*/
	if ( ! function_exists( 'rttheme_footer1_bgimg_type_condition' ) ) {
        function rttheme_footer1_bgimg_type_condition() {
            $BgType = get_theme_mod('footer_bgtype');
            $fstyle1 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgimg' && $fstyle1 == 1 ) {
                return true;
            }
            return false;
        }
    }
	if ( ! function_exists( 'rttheme_footer1_bgcolor_type_condition' ) ) {
        function rttheme_footer1_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer_bgtype');
            $fstyle1 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgcolor' && $fstyle1 == 1 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 2 bg color & image check enabled option*/
    if ( ! function_exists( 'rttheme_footer2_bgimg_type_condition' ) ) {
        function rttheme_footer2_bgimg_type_condition() {
            $BgType = get_theme_mod('footer_bgtype2');
            $fstyle2 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgimg2' && $fstyle2 == 2 ) {
                return true;
            }
            return false;
        }
    }
    if ( ! function_exists( 'rttheme_footer2_bgcolor_type_condition' ) ) {
        function rttheme_footer2_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer_bgtype2');
            $fstyle2 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgcolor2' && $fstyle2 == 2 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 3 bg color & image check enabled option*/
    if ( ! function_exists( 'rttheme_footer3_bgimg_type_condition' ) ) {
        function rttheme_footer3_bgimg_type_condition() {
            $BgType = get_theme_mod('footer_bgtype3');
            $fstyle3 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgimg3' && $fstyle3 == 3 ) {
                return true;
            }
            return false;
        }
    }
    if ( ! function_exists( 'rttheme_footer3_bgcolor_type_condition' ) ) {
        function rttheme_footer3_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer_bgtype3');
            $fstyle3 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgcolor3' && $fstyle3 == 3 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 4 bg color & image check enabled option*/
    if ( ! function_exists( 'rttheme_footer4_bgimg_type_condition' ) ) {
        function rttheme_footer4_bgimg_type_condition() {
            $BgType = get_theme_mod('footer_bgtype4');
            $fstyle4 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgimg4' && $fstyle4 == 4 ) {
                return true;
            }
            return false;
        }
    }
    if ( ! function_exists( 'rttheme_footer4_bgcolor_type_condition' ) ) {
        function rttheme_footer4_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer_bgtype4');
            $fstyle4 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgcolor4' && $fstyle4 == 4 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 5 bg color & image check enabled option*/
    if ( ! function_exists( 'rttheme_footer5_bgimg_type_condition' ) ) {
        function rttheme_footer5_bgimg_type_condition() {
            $BgType = get_theme_mod('footer_bgtype5');
            $fstyle5 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgimg5' && $fstyle5 == 5 ) {
                return true;
            }
            return false;
        }
    }
    if ( ! function_exists( 'rttheme_footer5_bgcolor_type_condition' ) ) {
        function rttheme_footer5_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer_bgtype5');
            $fstyle5 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgcolor5' && $fstyle5 == 5 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 6 bg color & image check enabled option*/
    if ( ! function_exists( 'rttheme_footer6_bgimg_type_condition' ) ) {
        function rttheme_footer6_bgimg_type_condition() {
            $BgType = get_theme_mod('footer_bgtype6');
            $fstyle6 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgimg6' && $fstyle6 == 6 ) {
                return true;
            }
            return false;
        }
    }
    if ( ! function_exists( 'rttheme_footer6_bgcolor_type_condition' ) ) {
        function rttheme_footer6_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer_bgtype6');
            $fstyle6 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgcolor6' && $fstyle6 == 6 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 7 bg color & image check enabled option*/
    if ( ! function_exists( 'rttheme_footer7_bgimg_type_condition' ) ) {
        function rttheme_footer7_bgimg_type_condition() {
            $BgType = get_theme_mod('footer_bgtype7');
            $fstyle7 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgimg7' && $fstyle7 == 7 ) {
                return true;
            }
            return false;
        }
    }
    if ( ! function_exists( 'rttheme_footer7_bgcolor_type_condition' ) ) {
        function rttheme_footer7_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer_bgtype7');
            $fstyle7 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgcolor7' && $fstyle7 == 7 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 8 bg color & image check enabled option*/
    if ( ! function_exists( 'rttheme_footer8_bgimg_type_condition' ) ) {
        function rttheme_footer8_bgimg_type_condition() {
            $BgType = get_theme_mod('footer_bgtype8');
            $fstyle8 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgimg8' && $fstyle8 == 8 ) {
                return true;
            }
            return false;
        }
    }
    if ( ! function_exists( 'rttheme_footer8_bgcolor_type_condition' ) ) {
        function rttheme_footer8_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer_bgtype8');
            $fstyle8 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgcolor8' && $fstyle8 == 8 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 1, 2 & 4 copyright bg color check is enabled option*/
    if ( ! function_exists( 'rttheme_is_copyright_bg_color_enabled' ) ) {
        function rttheme_is_copyright_bg_color_enabled() {
            $footer_style = get_theme_mod( 'footer_style' );
            if ( $footer_style == 1 || $footer_style == 2 || $footer_style == 4 || $footer_style == 8 ) {
                return true;
            }
            return false;
        }
    }

    /*Blog check is enabled option*/
    if ( ! function_exists( 'rttheme_is_blog_style1_enabled' ) ) {
        function rttheme_is_blog_style1_enabled() {
            $blog_style = get_theme_mod( 'blog_style', 'style1' );
            if ( $blog_style == 'style1' ) {
                return true;
            }
            return false;
        }
    }

    /* Blog Excerpt enabled option */
    if (!function_exists('rttheme_is_blog_excerpt1_enabled')) {
        function rttheme_is_blog_excerpt1_enabled()
        {
            $blog_style = get_theme_mod( 'blog_style' );
            if ( ($blog_style == 'style4' || $blog_style == 'style5') ) {
                return true;
            }
            return false;
        }
    }

    if (!function_exists('rttheme_is_blog_excerpt2_enabled')) {
        function rttheme_is_blog_excerpt2_enabled()
        {
            $blog_style = get_theme_mod( 'blog_style' );
            if ( ($blog_style == 'style2') ) {
                return true;
            }
            return false;
        }
    }

	/**
	 * URL sanitization
	 *
	 * @param  string	Input to be sanitized (either a string containing a single url or multiple, separated by commas)
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'rttheme_url_sanitization' ) ) {
		function rttheme_url_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false) {
				$input = explode( ',', $input );
			}
			if ( is_array( $input ) ) {
				foreach ($input as $key => $value) {
					$input[$key] = esc_url_raw( $value );
				}
				$input = implode( ',', $input );
			}
			else {
				$input = esc_url_raw( $input );
			}
			return $input;
		}
	}

	/**
	 * Switch sanitization
	 *
	 * @param  string		Switch value
	 * @return integer	Sanitized value
	 */

	if ( ! function_exists( 'rttheme_switch_sanitization' ) ) {
		function rttheme_switch_sanitization( $input ) {
			if ( true === $input ) {
				return 1;
			} else {
				return 0;
			}
		}
	}

	/**
	 * Radio Button and Select sanitization
	 *
	 * @param  string		Radio Button value
	 * @return integer	Sanitized value
	 */
	if ( ! function_exists( 'rttheme_radio_sanitization' ) ) {
		function rttheme_radio_sanitization( $input, $setting ) {
			//get the list of possible radio box or select options
         $choices = $setting->manager->get_control( $setting->id )->choices;

			if ( array_key_exists( $input, $choices ) ) {
				return $input;
			} else {
				return $setting->default;
			}
		}
	}

	/**
	 * Integer sanitization
	 *
	 * @param  string		Input value to check
	 * @return integer	Returned integer value
	 */

	if ( ! function_exists( 'rttheme_sanitize_integer' ) ) {
		function rttheme_sanitize_integer( $input ) {
			return (int) $input;
		}
	}

	/**
	 * Text sanitization
	 *
	 * @param  string	Input to be sanitized (either a string containing a single string or multiple, separated by commas)
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'rttheme_text_sanitization' ) ) {
		function rttheme_text_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false) {
				$input = explode( ',', $input );
			}
			if( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[$key] = sanitize_text_field( $value );
				}
				$input = implode( ',', $input );
			}
			else {
				$input = sanitize_text_field( $input );
			}
			return $input;
		}
	}

    if ( ! function_exists( 'rttheme_textarea_sanitization' ) ) {
        function rttheme_textarea_sanitization( $input ) {
            return $input;
        }
    }

    /**
     * Google Font sanitization
     *
     * @param  string	JSON string to be sanitized
     * @return string	Sanitized input
     */

    if ( ! function_exists( 'rttheme_google_font_sanitization' ) ) {
        function rttheme_google_font_sanitization( $input ) {
            $val =  json_decode( $input, true );
            if( is_array( $val ) ) {
                foreach ( $val as $key => $value ) {
                    $val[$key] = sanitize_text_field( $value );
                }
                $input = json_encode( $val );
            }
            else {
                $input = json_encode( sanitize_text_field( $val ) );
            }
            return $input;
        }
    }

	/**
	 * Array sanitization
	 *
	 * @param  array	Input to be sanitized
	 * @return array	Sanitized input
	 */
	if ( ! function_exists( 'rttheme_array_sanitization' ) ) {
		function rttheme_array_sanitization( $input ) {
			if( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[$key] = sanitize_text_field( $value );
				}
			}
			else {
				$input = '';
			}
			return $input;
		}
	}

	/**
	 * Alpha Color (Hex & RGBa) sanitization
	 *
	 * @param  string	Input to be sanitized
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'rttheme_hex_rgba_sanitization' ) ) {
		function rttheme_hex_rgba_sanitization( $input, $setting ) {
			if ( empty( $input ) || is_array( $input ) ) {
				return $setting->default;
			}

			if ( false === strpos( $input, 'rgba' ) ) {
				// If string doesn't start with 'rgba' then santize as hex color
				$input = sanitize_hex_color( $input );
			} else {
				// Sanitize as RGBa color
				$input = str_replace( ' ', '', $input );
				sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
				$input = 'rgba(' . rttheme_in_range( $red, 0, 255 ) . ',' . rttheme_in_range( $green, 0, 255 ) . ',' . rttheme_in_range( $blue, 0, 255 ) . ',' . rttheme_in_range( $alpha, 0, 1 ) . ')';
			}
			return $input;
		}
	}

	/**
	 * Only allow values between a certain minimum & maxmium range
	 *
	 * @param  number	Input to be sanitized
	 * @return number	Sanitized input
	 */
	if ( ! function_exists( 'rttheme_in_range' ) ) {
		function rttheme_in_range( $input, $min, $max ){
			if ( $input < $min ) {
				$input = $min;
			}
			if ( $input > $max ) {
				$input = $max;
			}
		    return $input;
		}
	}

	/**
	 * Date Time sanitization
	 *
	 * @param  string	Date/Time string to be sanitized
	 * @return string	Sanitized input
	 */

	if ( ! function_exists( 'rttheme_date_time_sanitization' ) ) {
		function rttheme_date_time_sanitization( $input, $setting ) {
			$datetimeformat = 'Y-m-d';
			if ( $setting->manager->get_control( $setting->id )->include_time ) {
				$datetimeformat = 'Y-m-d H:i:s';
			}
			$date = DateTime::createFromFormat( $datetimeformat, $input );
			if ( $date === false ) {
				$date = DateTime::createFromFormat( $datetimeformat, $setting->default );
			}
			return $date->format( $datetimeformat );
		}
	}

	/**
	 * Slider sanitization
	 *
	 * @param  string	Slider value to be sanitized
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'rttheme_range_sanitization' ) ) {
		function rttheme_range_sanitization( $input, $setting ) {
			$attrs = $setting->manager->get_control( $setting->id )->input_attrs;

			$min = ( isset( $attrs['min'] ) ? $attrs['min'] : $input );
			$max = ( isset( $attrs['max'] ) ? $attrs['max'] : $input );
			$step = ( isset( $attrs['step'] ) ? $attrs['step'] : 1 );

			$number = floor( $input / $attrs['step'] ) * $attrs['step'];

			return rttheme_in_range( $number, $min, $max );
		}
	}

}

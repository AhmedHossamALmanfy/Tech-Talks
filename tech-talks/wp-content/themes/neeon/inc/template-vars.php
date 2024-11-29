<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'template_redirect', 'neeon_template_vars' );
if( !function_exists( 'neeon_template_vars' ) ) {
    function neeon_template_vars() {
        // Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;
                case 'product':
                $prefix = 'product';
                break;
                default:
                $prefix = 'single_post';
                break;
                case 'neeon_team':
                $prefix = 'team';
                break;  
            }
			
			$layout_settings    = get_post_meta( $post_id, 'neeon_layout_settings', true );
            
            NeeonTheme::$layout = ( empty( $layout_settings['neeon_layout'] ) || $layout_settings['neeon_layout']  == 'default' ) ? NeeonTheme::$options[$prefix . '_layout'] : $layout_settings['neeon_layout'];

            NeeonTheme::$sidebar = ( empty( $layout_settings['neeon_sidebar'] ) || $layout_settings['neeon_sidebar'] == 'default' ) ? NeeonTheme::$options[$prefix . '_sidebar'] : $layout_settings['neeon_sidebar'];
			
            NeeonTheme::$top_bar = ( empty( $layout_settings['neeon_top_bar'] ) || $layout_settings['neeon_top_bar'] == 'default' ) ? NeeonTheme::$options['top_bar'] : $layout_settings['neeon_top_bar'];
            
            NeeonTheme::$top_bar_style = ( empty( $layout_settings['neeon_top_bar_style'] ) || $layout_settings['neeon_top_bar_style'] == 'default' ) ? NeeonTheme::$options['top_bar_style'] : $layout_settings['neeon_top_bar_style'];
			
			NeeonTheme::$header_opt = ( empty( $layout_settings['neeon_header_opt'] ) || $layout_settings['neeon_header_opt'] == 'default' ) ? NeeonTheme::$options['header_opt'] : $layout_settings['neeon_header_opt'];
            
            NeeonTheme::$header_style = ( empty( $layout_settings['neeon_header'] ) || $layout_settings['neeon_header'] == 'default' ) ? NeeonTheme::$options['header_style'] : $layout_settings['neeon_header'];
			
            NeeonTheme::$footer_style = ( empty( $layout_settings['neeon_footer'] ) || $layout_settings['neeon_footer'] == 'default' ) ? NeeonTheme::$options['footer_style'] : $layout_settings['neeon_footer'];
			
			NeeonTheme::$footer_area = ( empty( $layout_settings['neeon_footer_area'] ) || $layout_settings['neeon_footer_area'] == 'default' ) ? NeeonTheme::$options['footer_area'] : $layout_settings['neeon_footer_area'];

            NeeonTheme::$copyright_area = ( empty( $layout_settings['neeon_copyright_area'] ) || $layout_settings['neeon_copyright_area'] == 'default' ) ? NeeonTheme::$options['copyright_area'] : $layout_settings['neeon_copyright_area'];
			
            $padding_top = ( empty( $layout_settings['neeon_top_padding'] ) || $layout_settings['neeon_top_padding'] == 'default' ) ? NeeonTheme::$options[$prefix . '_padding_top'] : $layout_settings['neeon_top_padding'];
			
            NeeonTheme::$padding_top = (int) $padding_top;
            
            $padding_bottom = ( empty( $layout_settings['neeon_bottom_padding'] ) || $layout_settings['neeon_bottom_padding'] == 'default' ) ? NeeonTheme::$options[$prefix . '_padding_bottom'] : $layout_settings['neeon_bottom_padding'];
			
            NeeonTheme::$padding_bottom = (int) $padding_bottom;
			
            NeeonTheme::$has_banner = ( empty( $layout_settings['neeon_banner'] ) || $layout_settings['neeon_banner'] == 'default' ) ? NeeonTheme::$options[$prefix . '_banner'] : $layout_settings['neeon_banner'];
            
            NeeonTheme::$has_breadcrumb = ( empty( $layout_settings['neeon_breadcrumb'] ) || $layout_settings['neeon_breadcrumb'] == 'default' ) ? NeeonTheme::$options[ $prefix . '_breadcrumb'] : $layout_settings['neeon_breadcrumb'];
            
            NeeonTheme::$bgtype = ( empty( $layout_settings['neeon_banner_type'] ) || $layout_settings['neeon_banner_type'] == 'default' ) ? NeeonTheme::$options[$prefix . '_bgtype'] : $layout_settings['neeon_banner_type'];
            
            NeeonTheme::$bgcolor = empty( $layout_settings['neeon_banner_bgcolor'] ) ? NeeonTheme::$options[$prefix . '_bgcolor'] : $layout_settings['neeon_banner_bgcolor'];
			
			if( !empty( $layout_settings['neeon_banner_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['neeon_banner_bgimg'], 'full', true );
                NeeonTheme::$bgimg = $attch_url[0];
            } elseif( !empty( NeeonTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( NeeonTheme::$options[$prefix . '_bgimg'], 'full', true );
                NeeonTheme::$bgimg = $attch_url[0];
            } else {
                NeeonTheme::$bgimg = NEEON_IMG_URL . 'banner.jpg';
            }
			
            NeeonTheme::$pagebgcolor = empty( $layout_settings['neeon_page_bgcolor'] ) ? NeeonTheme::$options[$prefix . '_page_bgcolor'] : $layout_settings['neeon_page_bgcolor'];			
            
            if( !empty( $layout_settings['neeon_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['neeon_page_bgimg'], 'full', true );
                NeeonTheme::$pagebgimg = $attch_url[0];
            } elseif( !empty( NeeonTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( NeeonTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                NeeonTheme::$pagebgimg = $attch_url[0];
            }
        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {
            if( is_search() ) {
                $prefix = 'search';
            } else if( is_404() ) {
                $prefix                                = 'error';
                NeeonTheme::$options[$prefix . '_layout'] = 'full-width';
            } elseif( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
                $prefix = 'shop';
            } elseif( is_post_type_archive( "neeon_team" ) || is_tax( "neeon_team_category" ) ) {
                $prefix = 'team_archive'; 
            }else {
                $prefix = 'blog';
            }
            
            NeeonTheme::$layout         		= NeeonTheme::$options[$prefix . '_layout'];
            NeeonTheme::$top_bar        		= NeeonTheme::$options['top_bar'];
            NeeonTheme::$header_opt      		= NeeonTheme::$options['header_opt'];
            NeeonTheme::$footer_area     		= NeeonTheme::$options['footer_area'];
            NeeonTheme::$copyright_area         = NeeonTheme::$options['copyright_area'];
            NeeonTheme::$top_bar_style  		= NeeonTheme::$options['top_bar_style'];
            NeeonTheme::$header_style   		= NeeonTheme::$options['header_style'];
            NeeonTheme::$footer_style   		= NeeonTheme::$options['footer_style'];
            NeeonTheme::$padding_top    		= NeeonTheme::$options[$prefix . '_padding_top'];
            NeeonTheme::$padding_bottom 		= NeeonTheme::$options[$prefix . '_padding_bottom'];
            NeeonTheme::$has_banner     		= NeeonTheme::$options[$prefix . '_banner'];
            NeeonTheme::$has_breadcrumb 		= NeeonTheme::$options[$prefix . '_breadcrumb'];
            NeeonTheme::$bgtype         		= NeeonTheme::$options[$prefix . '_bgtype'];
            NeeonTheme::$bgcolor        		= NeeonTheme::$options[$prefix . '_bgcolor'];
			
            if( !empty( NeeonTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( NeeonTheme::$options[$prefix . '_bgimg'], 'full', true );
                NeeonTheme::$bgimg = $attch_url[0];
            } else {
                NeeonTheme::$bgimg = NEEON_IMG_URL . 'banner.jpg';
            }
			
            NeeonTheme::$pagebgcolor = NeeonTheme::$options[$prefix . '_page_bgcolor'];
            if( !empty( NeeonTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( NeeonTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                NeeonTheme::$pagebgimg = $attch_url[0];
            }
			
			
        }
    }
}

// Add body class
add_filter( 'body_class', 'neeon_body_classes' );
if( !function_exists( 'neeon_body_classes' ) ) {
    function neeon_body_classes( $classes ) {
		
		// Header
    	if ( NeeonTheme::$options['sticky_menu'] == 1 ) {
			$classes[] = 'sticky-header';
		}
		
        $classes[] = 'header-style-'. NeeonTheme::$header_style;		
        $classes[] = 'footer-style-'. NeeonTheme::$footer_style;

        if ( NeeonTheme::$top_bar == 1 || NeeonTheme::$top_bar == 'on' ){
            $classes[] = 'has-topbar topbar-style-'. NeeonTheme::$top_bar_style;
        }
        
        $classes[] = ( NeeonTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';
		
		$classes[] = ( NeeonTheme::$layout == 'left-sidebar' ) ? 'left-sidebar' : 'right-sidebar';
        
        if( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
            $classes[] = 'product-list-view';
        } else {
            $classes[] = 'product-grid-view';
        }
		if ( is_singular('post') ) {
			$classes[] =  ' post-detail-' . NeeonTheme::$options['post_style'];
        }
        return $classes;
    }
}
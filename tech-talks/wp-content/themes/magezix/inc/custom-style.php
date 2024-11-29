<?php

// File Security Check
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

function magezix_theme_options_style() {

    //
    // Enqueueing StyleSheet file
    //
    wp_enqueue_style( 'magezix-theme-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css' );
    $css_output = '';
    $magezix_primary_color = cs_get_option('mazc-primery-color'); 
    $magezix_primary_2_color = cs_get_option('mazc-primery-2-color'); 
    $mazc_color_primary_3 = cs_get_option('mazc-color-primary-3');
    $mazc_color_white = cs_get_option('mazc-color-white');
    $mazc_color_black = cs_get_option('mazc-color-black');
    $mazc_color_default = cs_get_option('mazc-color-default');
    $mazc_color_gray = cs_get_option('mazc-color-gray');
    $mazc_color_border = cs_get_option('mazc-color-border');
    $mazc_color_border_2 = cs_get_option('mazc-color-border-2');
    $mazc_color_border_3 = cs_get_option('mazc-color-border-3');
    $mazc_color_dark_2 = cs_get_option('mazc-color-dark-2');

    //Theme Gradient COlor
    //Theme Gradient COlor
    $css_output .= '        
        :root {
            --color-primary: '.esc_attr($magezix_primary_color).';
        }
    ';
    $css_output .= '        
        :root {
            --color-primary-2: '.esc_attr($magezix_primary_2_color).';
        }
    ';
    $css_output .= '        
        :root {
            --color-primary-3: '.esc_attr($mazc_color_primary_3).';
        }
    ';
    $css_output .= '        
        :root {
            --color-white: '.esc_attr($mazc_color_white).';
        }
    ';
    $css_output .= '        
        :root {
            --color-black: '.esc_attr($mazc_color_black).';
        }
    ';
    $css_output .= '        
        :root {
            --color-default: '.esc_attr($mazc_color_default).';
        }
    ';
    $css_output .= '        
        :root {
            --color-gray: '.esc_attr($mazc_color_gray).';
        }
    ';
    $css_output .= '        
        :root {
            --color-border: '.esc_attr($mazc_color_border).';
        }
    ';
    $css_output .= '        
        :root {
            --color-border-2: '.esc_attr($mazc_color_border_2).';
        }
    ';
    $css_output .= '        
        :root {
            --color-border-3: '.esc_attr($mazc_color_border_3).';
        }
    ';
    $css_output .= '        
        :root {
            --color-dark-2: '.esc_attr($mazc_color_dark_2).';
        }
    ';
    

    wp_add_inline_style( 'magezix-theme-custom-style', $css_output );

}
add_action( 'wp_enqueue_scripts', 'magezix_theme_options_style' );

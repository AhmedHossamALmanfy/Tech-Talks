<?php

/**
 *
 * Get Magezix Theme options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_get_option' ) ) {
    function cs_get_option( $option = '', $default = null ) {
        $options = get_option( 'magezix_theme_options' ); // Attention: Set your unique id of the framework
        return ( isset( $options[$option] ) ) ? $options[$option] : $default;
    }
}

/**
 *
 * Get get switcher option
 *  for theme options
 * @since 1.0.0
 * @version 1.0.0
 *
 */

if ( ! function_exists( 'cs_get_switcher_option' )) {

    function cs_get_switcher_option( $option = '', $default = null ) {
        $options = get_option( 'magezix_theme_options' ); // Attention: Set your unique id of the framework
        $return_val =  ( isset( $options[$option] ) ) ? $options[$option] : $default;
        $return_val =  (is_null($return_val) || '1' == $return_val ) ? true : false;;
        return $return_val;
    }
}

if ( ! function_exists( 'cs_switcher_option' )) {

    function cs_switcher_option( $option = '', $default = null ) {
        $options = get_option( 'magezix_theme_options' ); // Attention: Set your unique id of the framework
        $return_val =  ( isset( $options[$option] ) ) ? $options[$option] : $default;
        $return_val =  ( '1' == $return_val ) ? true : false;;
        return $return_val;
    }
}


/**
 * Function for get a metaboxes
 *
 * @param $prefix_key Required Meta unique slug
 * @param $meta_key Required Meta slug
 * @param $default Optional Set default value
 * @param $id Optional Set post id
 *
 * @return mixed
 */
function magezix_get_meta( $prefix_key, $meta_key, $default = null, $id = '' ) {
    if ( !$id ) {
        $id = get_the_ID();
    }

    $meta_boxes = get_post_meta( $id, $prefix_key, true );
    return ( isset( $meta_boxes[$meta_key] ) ) ? $meta_boxes[$meta_key] : $default;
}

/**
 * Get Header layout
 *
 * @return string
 */
function magezix_site_header() {
    $header_layout = cs_get_option( 'header_glob_style', 'header-style-one' );

    if ( is_page() ) {
        $page_header = magezix_get_meta( 'magezix_page_meta', 'header_layout', 'default' );

        if ( 'default' !== $page_header ) {
            $header_layout = $page_header;
        }
    }

    return $header_layout;
}
/**
 * Get Footer layout
 *
 * @return string
 */
function magezix_site_footer() {
    $footer_layout = cs_get_option( 'footer_glob_style', 'footer-style-one' );

    if ( is_page() ) {
        $page_footer = magezix_get_meta( 'magezix_page_meta', 'footer_layout', 'default' );

        if ( 'default' !== $page_footer ) {
            $footer_layout = $page_footer;
        }
    }

    return $footer_layout;
}

 /**
  * Site Logo
  */
function magezix_logo(){ 
    $global_logo = cs_get_option('theme_logo');
    $page_footer = magezix_get_meta( 'magezix_page_meta', 'page_logo', 'default' );
    ?>
    <?php if(!empty($page_footer['url'])):?>
        <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
            <img src="<?php echo esc_url($page_footer['url']);?>" alt="<?php echo esc_attr(get_bloginfo());?>">
        </a>
    <?php elseif(isset($global_logo['url']) && $global_logo['url']):?>
        <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
        <img src="<?php echo esc_url($global_logo['url']);?>" alt="<?php echo esc_attr(get_bloginfo());?>">
        </a>
    <?php else:?>
        <?php 
            if(has_custom_logo()){
                the_custom_logo();
            }else{ ?>
            <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo.svg" alt="<?php esc_attr_e('Logo', 'magezix'); ?>">
            </a>
        <?php    }
        ?>
    <?php endif;?>
<?php }

 /**
  * Site Logo
  */
function magezix_v2_logo(){ 
    $global_v2_logo = cs_get_option('theme_v2_logo');
    $page_logo = magezix_get_meta( 'magezix_page_meta', 'page_logo', 'default' );
    ?>
    <?php if(!empty($page_logo['url'])):?>
        <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
            <img src="<?php echo esc_url($page_logo['url']);?>" alt="<?php echo esc_attr($page_logo['alt']);?>">
        </a>
    <?php elseif(isset($global_v2_logo['url']) && $global_v2_logo['url']):?>
        <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
        <img src="<?php echo esc_url($global_v2_logo['url']);?>" alt="<?php echo esc_attr($global_v2_logo['alt']);?>">
        </a>
    <?php else:?>
        <?php 
            if(has_custom_logo()){
                the_custom_logo();
            }else{ ?>
            <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo-v2.svg" alt="<?php esc_attr_e('Logo', 'magezix'); ?>">
            </a>
        <?php    }
        ?>
    <?php endif;?>
<?php }

 /**
  * Site Logo V3
  */
function magezix_v3_logo(){ 
    $global_v3_logo = cs_get_option('theme_v3_logo');
    $page_logo = magezix_get_meta( 'magezix_page_meta', 'page_logo', 'default' );
    ?>
    <?php if(!empty($page_logo['url'])):?>
        <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
            <img src="<?php echo esc_url($page_logo['url']);?>" alt="<?php echo esc_attr($page_logo['alt']);?>">
        </a>
    <?php elseif(isset($global_v3_logo['url']) && $global_v3_logo['url']):?>
        <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
        <img src="<?php echo esc_url($global_v3_logo['url']);?>" alt="<?php echo esc_attr($global_v3_logo['alt']);?>">
        </a>
    <?php else:?>
        <?php 
            if(has_custom_logo()){
                the_custom_logo();
            }else{ ?>
            <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo_v3.svg" alt="<?php esc_attr_e('Logo', 'magezix'); ?>">
            </a>
        <?php    }
        ?>
    <?php endif;?>
<?php }

 /**
  * Site Logo V4
  */
function magezix_v4_logo(){ 
    $global_v4_logo = cs_get_option('theme_v4_logo');
    $page_logo = magezix_get_meta( 'magezix_page_meta', 'page_logo', 'default' );
    ?>
    <?php if(!empty($page_logo['url'])):?>
        <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
            <img src="<?php echo esc_url($page_logo['url']);?>" alt="<?php echo esc_attr($page_logo['alt']);?>">
        </a>
    <?php elseif(isset($global_v4_logo['url']) && $global_v4_logo['url']):?>
        <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
        <img src="<?php echo esc_url($global_v4_logo['url']);?>" alt="<?php echo esc_attr($global_v4_logo['alt']);?>">
        </a>
    <?php else:?>
        <?php 
            if(has_custom_logo()){
                the_custom_logo();
            }else{ ?>
            <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo_v4.svg" alt="<?php esc_attr_e('Logo', 'magezix'); ?>">
            </a>
        <?php    }
        ?>
    <?php endif;?>
<?php }

/**
 * Footer Logo
 */
function magezix_footer_logo(){ 
    $footer_logo = cs_get_option('footer_logo');    
?>
    <a class="footer__logo mb-20" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php if(isset($footer_logo['url']) && $footer_logo['url'] ):?>
        <img src="<?php echo esc_url($footer_logo['url']);?>" alt="<?php echo esc_attr($footer_logo['alt']);?>">
        <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/light-logo.svg" alt="<?php esc_attr_e('Footer logo', 'magezix') ;?>">
        <?php endif;?>
    </a>
<?php 
}

/**
 * Footer Logo Version Two
 */
function magezix_footer_v2_logo(){ 
    $footer_v2_logo = cs_get_option('footer_v2_logo');    
?>
    <a class="footer__logo mb-20" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php if(isset($footer_v2_logo['url']) && $footer_v2_logo['url'] ):?>
        <img src="<?php echo esc_url($footer_v2_logo['url']);?>" alt="<?php echo esc_attr($footer_v2_logo['alt']);?>">
        <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/footer_v2_logo.svg" alt="<?php esc_attr_e('Footer logo', 'magezix') ;?>">
        <?php endif;?>
    </a>
<?php 
}

/**
 * Footer Logo Version Three
 */
function magezix_footer_v3_logo(){ 
    $footer_v3_logo = cs_get_option('footer_v3_logo');    
?>
    <a class="footer__logo mb-20" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php if(isset($footer_v3_logo['url']) && $footer_v3_logo['url'] ):?>
        <img src="<?php echo esc_url($footer_v3_logo['url']);?>" alt="<?php echo esc_attr($footer_v3_logo['alt']);?>">
        <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/footer_logo_v3.svg" alt="<?php esc_attr_e('Footer logo', 'magezix') ;?>">
        <?php endif;?>
    </a>
<?php 
}
/**
 * Dark Mode Logo
 */
function magezix_light_logo(){ 
    $theme_light_logo = cs_get_option('theme_light_logo');    
?>
    <a class="light-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php if(isset($theme_light_logo['url']) && $theme_light_logo['url'] ):?>
        <img src="<?php echo esc_url($theme_light_logo['url']);?>" alt="<?php esc_html_e('logo', 'magezix') ;?>">
        <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/light-logo.svg" alt="<?php esc_attr_e('Light logo', 'magezix') ;?>">
        <?php endif;?>
    </a>
<?php 
}
/**
 * Dark Mode Logo V2
 */
function magezix_light_logo_v2(){ 
    $theme_light_v2_logo = cs_get_option('theme_light_v2_logo');    
?>
    <a class="light-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php if(isset($theme_light_v2_logo['url']) && $theme_light_v2_logo['url'] ):?>
        <img src="<?php echo esc_url($theme_light_v2_logo['url']);?>" alt="<?php esc_html_e('logo', 'magezix') ;?>">
        <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/light-logo-v2.svg" alt="<?php esc_attr_e('Light logo', 'magezix') ;?>">
        <?php endif;?>
    </a>
<?php 
}

/**
 * Dark Mode Logo V3
 */
function magezix_light_logo_v3(){ 
    $theme_light_v3_logo = cs_get_option('theme_light_v3_logo');    
?>
    <a class="light-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php if(isset($theme_light_v3_logo['url']) && $theme_light_v3_logo['url'] ):?>
        <img src="<?php echo esc_url($theme_light_v3_logo['url']);?>" alt="<?php echo esc_attr($theme_light_v3_logo['alt']);?>">
        <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/logo_v3_light.svg" alt="<?php esc_attr_e('Light logo', 'magezix') ;?>">
        <?php endif;?>
    </a>
<?php 
}

/**
 * Dark Mode Logo V4
 */
function magezix_light_logo_v4(){ 
    $theme_light_v4_logo = cs_get_option('theme_light_v4_logo');    
?>
    <a class="light-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php if(isset($theme_light_v4_logo['url']) && $theme_light_v4_logo['url'] ):?>
        <img src="<?php echo esc_url($theme_light_v4_logo['url']);?>" alt="<?php echo esc_attr($theme_light_v4_logo['alt']);?>">
        <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/logo_v4_light.svg" alt="<?php esc_attr_e('Light logo', 'magezix') ;?>">
        <?php endif;?>
    </a>
<?php 
}

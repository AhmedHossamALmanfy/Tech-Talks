<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = NeeonTheme_Helper::nav_menu_args();

// Logo
if( !empty( NeeonTheme::$options['logo'] ) ) {
    $logo_dark = wp_get_attachment_image( NeeonTheme::$options['logo'], 'full' );
    $neeon_dark_logo = $logo_dark;
}else {
    $neeon_dark_logo = get_bloginfo( 'name' ); 
}

?>

<div class="rt-header-menu mean-container" id="meanmenu"> 
    <?php if ( NeeonTheme::$options['mobile_topbar'] ) { ?>
        <?php get_template_part('template-parts/header/mobile', 'topbar');?>
    <?php } ?>
    <div class="mobile-mene-bar">
        <div class="mean-bar">
            <span class="sidebarBtn ">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </span>
            <a class="mobile-logo" href="<?php echo esc_url(home_url('/'));?>"><?php echo wp_kses( $neeon_dark_logo, 'alltext_allow' ); ?></a>
            <?php if ( NeeonTheme::$options['mobile_search'] || NeeonTheme::$options['mobile_cart'] ) { ?>
                <div class="info">
                    <?php if ( NeeonTheme::$options['mobile_search'] ) { ?>
                        <?php get_template_part( 'template-parts/header/icon', 'search' );?>
                    <?php } ?>
                    <?php if ( NeeonTheme::$options['mobile_cart'] ) { ?>
                        <?php get_template_part( 'template-parts/header/icon', 'cart' );?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>    
        <div class="rt-slide-nav">
            <div class="offscreen-navigation">
                <?php wp_nav_menu( $nav_menu_args );?>
            </div>
        </div>
    </div>
</div>

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

if( !empty( NeeonTheme::$options['logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( NeeonTheme::$options['logo_light'], 'full' );
	$neeon_light_logo = $logo_lights;
}else {
	$neeon_light_logo = get_bloginfo( 'name' );
}

?>
<div id="sticky-placeholder"></div>
<div class="header-menu" id="header-middlebar">
	<div class="container">
		<div class="logo-ad-wrap d-flex align-items-center justify-content-between">
			<div class="site-branding">				
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $neeon_dark_logo, 'allow_link' ); ?></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $neeon_light_logo, 'allow_link' ); ?></a>
			</div>
			<?php if ( NeeonTheme::$options['before_head_ad_option'] ) { ?>
			<div class="header-before-ad">
				<?php if ( NeeonTheme::$options['before_ad_type'] == 'before_adimage' ) { ?>
				<?php if (NeeonTheme::$options['before_ad_img_link']){
					$target = NeeonTheme::$options['before_ad_img_target']? 'target="_blank"':'';
					echo '<a '.$target.'  href="'.esc_url( NeeonTheme::$options['before_ad_img_link'] ).'">'.wp_get_attachment_image( NeeonTheme::$options['before_adimage'], 'full' ).'</a>';

				} else {
					echo wp_get_attachment_image( NeeonTheme::$options['before_adimage'], 'full' );
				} ?>
				<?php } else {
					echo NeeonTheme::$options['before_adcustom'];
				} ?>		
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="header-menu" id="header-menu">
	<div class="container">
		<div class="menu-full-wrap">
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<?php if ( NeeonTheme::$options['search_icon'] || NeeonTheme::$options['cart_icon'] || NeeonTheme::$options['vertical_menu_icon'] ) { ?>
			<div class="header-icon-area">				
				<?php if ( NeeonTheme::$options['search_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'search' );?>
				<?php } if ( NeeonTheme::$options['cart_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'cart' );?>
				<?php } if ( NeeonTheme::$options['vertical_menu_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'offcanvas' );?>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
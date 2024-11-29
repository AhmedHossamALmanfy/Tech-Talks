<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = NeeonTheme_Helper::nav_menu_args();

// Logo
if( !empty( NeeonTheme::$options['logo_alternet'] ) ) {
	$logo_dark = wp_get_attachment_image( NeeonTheme::$options['logo_alternet'], 'full' );
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
		<div class="menu-full-wrap">
			<?php if ( NeeonTheme::$options['header_date'] || NeeonTheme::$options['vertical_menu_icon'] ) { ?>
			<div class="header-icon-left">
				<?php if ( NeeonTheme::$options['vertical_menu_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'offcanvas' );?>
				<?php } if ( NeeonTheme::$options['header_date'] ) { ?>
				<div class="topbar-date"><i class="far fa-calendar-alt icon"></i><?php echo date_i18n( get_option('date_format') ); ?></div>
				<?php } ?>	
			</div>
			<?php } ?>
			<div class="logo-menu-wrap">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $neeon_dark_logo, 'allow_link' ); ?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $neeon_light_logo, 'allow_link' ); ?></a>
				</div>				
			</div>
			<?php if ( NeeonTheme::$options['before_head_ad11_option'] ) { ?>
			<div class="header-before-ad">
				<?php if ( NeeonTheme::$options['before_ad11_type'] == 'before_head11_adimage' ) { ?>
				<?php if (NeeonTheme::$options['before_ad11_img_link']){
					$target = NeeonTheme::$options['before_ad11_img_target']? 'target="_blank"':'';
					echo '<a '.$target.'  href="'.esc_url( NeeonTheme::$options['before_ad11_img_link'] ).'">'.wp_get_attachment_image( NeeonTheme::$options['before_head11_adimage'], 'full' ).'</a>';

				} else {
					echo wp_get_attachment_image( NeeonTheme::$options['before_head11_adimage'], 'full' );
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
		<div class="menu-wrap" id="header-menu">
			<div id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( $nav_menu_args );?>
			</div>
		</div>
	</div>
</div>
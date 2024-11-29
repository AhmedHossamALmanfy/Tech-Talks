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
<div class="header-menu header-top" id="header-middlebar">
	<div class="container">
		<div class="menu-full-wrap">			
			<div class="logo-menu-wrap">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $neeon_dark_logo, 'allow_link' ); ?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $neeon_light_logo, 'allow_link' ); ?></a>
				</div>				
			</div>
			<?php if ( NeeonTheme::$options['search_icon'] ) { ?>
			<div class="header-search-six">
				<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) )  ?>" class="search-form">
					<input required="" type="text" id="search-form-5f51fb188e3b0" class="search-field" placeholder="<?php esc_attr_e( 'Search …', 'neeon');?>" value="" name="s">
					<button class="search-button" type="submit"><?php echo radius_search_shape(); ?></button>
				</form>
				<?php if ( NeeonTheme::$options['online_button'] == '1' ) { ?>
					<div class="header-button">
						<a class="button-style-2" target="_self" href="<?php echo esc_url( NeeonTheme::$options['online_button_link']  );?>"><?php echo esc_html( NeeonTheme::$options['online_button_text'] );?></a>
					</div>
				<?php } ?>
			</div>	
			<?php } ?>	
			<?php if ( NeeonTheme::$options['cart_icon'] || NeeonTheme::$options['vertical_menu_icon'] ) { ?>
			<div class="header-icon-area">
				<?php if ( NeeonTheme::$options['cart_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'cart' );?>
				<?php } if ( NeeonTheme::$options['vertical_menu_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'offcanvas' );?>
				<?php } ?>
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
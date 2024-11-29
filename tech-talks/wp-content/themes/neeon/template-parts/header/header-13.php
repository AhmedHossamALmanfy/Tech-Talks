<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = NeeonTheme_Helper::nav_menu_args();
$neeon_socials = NeeonTheme_Helper::socials();

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
			<?php if ( NeeonTheme::$options['vertical_menu_icon'] ) { ?>
			<div class="header-icon-area">
				<?php if ( NeeonTheme::$options['vertical_menu_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'offcanvas' );?>
				<?php } ?>
				<?php if ( $neeon_socials ) { ?>
					<ul class="header-social">
						<?php foreach ( $neeon_socials as $neeon_social ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $neeon_social['url'] );?>"><i class="fab <?php echo esc_attr( $neeon_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
			</div>
			<?php } ?>
			<div class="logo-menu-wrap">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $neeon_dark_logo, 'allow_link' ); ?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $neeon_light_logo, 'allow_link' ); ?></a>
				</div>				
			</div>
			<?php if ( NeeonTheme::$options['search_icon'] || NeeonTheme::$options['cart_icon'] ) { ?>
			<div class="header-icon-area">
				<?php if ( NeeonTheme::$options['search_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'search' );?>
				<?php } if ( NeeonTheme::$options['cart_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'cart' );?>
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
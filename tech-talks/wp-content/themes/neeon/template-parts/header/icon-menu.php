<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
 
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

<div class="additional-menu-area header-offcanvus">
	<div class="sidenav sidemenu">
		<div class="canvas-content">
			<a href="#" class="closebtn"><i class="fas fa-times"></i></a>
			<div class="additional-logo">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $neeon_dark_logo, 'allow_link' ); ?></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $neeon_light_logo, 'allow_link' ); ?></a>
			</div>
			<?php wp_nav_menu( array( 'theme_location' => 'topright','container' => 'nav', 'container_class' => 'offscreen-navigation', 'menu_class' => 'menu' ) );?>
			<div class="sidenav-address">
				<?php if( is_active_sidebar('offcanvas') ) { dynamic_sidebar('offcanvas'); } ?>
				<div class="copyright"><?php echo wp_kses( NeeonTheme::$options['copyright_text'] , 'allow_link' );?></div>
				<?php if ( !empty ( $neeon_socials ) ) { ?>
				<?php if ( !empty ( NeeonTheme::$options['social_label'] ) ) { ?>
					<h4 class="social-title"><?php echo wp_kses( NeeonTheme::$options['social_label'] , 'alltext_allow' );?></h4>
				<?php } } ?>
				<?php if ( $neeon_socials ) { ?>
				<div class="sidenav-social">
					<?php foreach ( $neeon_socials as $neeon_social ): ?>
						<span><a target="_blank" href="<?php echo esc_url( $neeon_social['url'] );?>"><i class="fab <?php echo esc_attr( $neeon_social['icon'] );?>"></i></a></span>
					<?php endforeach; ?>					
				</div>						
				<?php } ?>
			</div>		
		</div>
	</div>
    <button type="button" class="side-menu-open side-menu-trigger">
        <span class="menu-btn-icon">
          <span class="line line1"></span>
          <span class="line line2"></span>
          <span class="line line3"></span>
        </span>
        <span class="menu-text"><?php esc_html_e ( 'Menu' , 'neeon' ); ?></span>
    </button>
</div>
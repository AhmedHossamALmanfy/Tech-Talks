<?php

// Logo
if( !empty( NeeonTheme::$options['footer_logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( NeeonTheme::$options['footer_logo_light'], 'full' );
	$neeon_light_logo = $logo_lights;
}else {
	$neeon_light_logo = "<img width='162' height='52' src='" . NEEON_IMG_URL . 'logo-light.svg' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

$neeon_socials = NeeonTheme_Helper::socials();

if( !empty( NeeonTheme::$options['fbgimg3'] ) ) {
	$f1_bg = wp_get_attachment_image_src( NeeonTheme::$options['fbgimg3'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = NEEON_IMG_URL . 'footer_bg.jpg';
}

if ( NeeonTheme::$options['footer_bgtype3'] == 'fbgcolor3' ) {
	$neeon_bg = NeeonTheme::$options['fbgcolor3'];
} else {
	$neeon_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}
$bgc = '';
if ( NeeonTheme::$options['footer_bgtype3'] == 'fbgimg3' ) {
	$bgc = 'footer-bg-opacity';
}
?>

<?php if ( NeeonTheme::$footer_area == 1 || NeeonTheme::$copyright_area == 1 ) { ?>
	<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="background:<?php echo esc_html( $neeon_bg ); ?>">		
		<div class="container">
			<?php if ( ( NeeonTheme::$options['footer3_logo'] || NeeonTheme::$options['footer3_social'] ) && NeeonTheme::$footer_area == 1  ) { ?>
			<div class="footer-logo-area">
				<?php if ( NeeonTheme::$options['footer3_logo'] ) { ?>
				<div class="footer-logo"><a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $neeon_light_logo, 'allow_link' ); ?></a>
				</div>
				<?php } ?>
				<?php dynamic_sidebar( 'footer-style-3' ); ?>
				<?php if ( $neeon_socials && ( NeeonTheme::$options['footer3_social'] ) ) { ?>
				<div class="social-wrap">
					<span class="wrapper-line"></span>
					<ul class="footer-social">
						<?php foreach ( $neeon_socials as $neeon_social ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $neeon_social['url'] );?>"><i class="fab <?php echo esc_attr( $neeon_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
					<span class="wrapper-line"></span>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if ( NeeonTheme::$copyright_area == 1 ) { ?>
			<div class="copyright"><?php echo wp_kses( NeeonTheme::$options['copyright_text'] , 'allow_link' );?></div>
			<?php } ?>
		</div>
	</div>
<?php } ?>

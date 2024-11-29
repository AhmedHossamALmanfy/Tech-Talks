<?php

// Logo
if( !empty( NeeonTheme::$options['footer_logo_light7'] ) ) {
	$logo_lights = wp_get_attachment_image( NeeonTheme::$options['footer_logo_light7'], 'full' );
	$neeon_light_logo = $logo_lights;
}else {
	$neeon_light_logo = "<img width='162' height='52' src='" . NEEON_IMG_URL . 'logo-light.svg' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

$neeon_socials = NeeonTheme_Helper::socials();

if( !empty( NeeonTheme::$options['fbgimg7'] ) ) {
	$f1_bg = wp_get_attachment_image_src( NeeonTheme::$options['fbgimg7'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = NEEON_IMG_URL . 'footer_bg.jpg';
}

if ( NeeonTheme::$options['footer_bgtype7'] == 'fbgcolor7' ) {
	$neeon_bg = NeeonTheme::$options['fbgcolor7'];
} else {
	$neeon_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}
$bgc = '';
if ( NeeonTheme::$options['footer_bgtype7'] == 'fbgimg7' ) {
	$bgc = 'footer-bg-opacity';
}
?>

<?php if ( NeeonTheme::$footer_area == 1 || NeeonTheme::$copyright_area == 1 ) { ?>
	<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="background:<?php echo esc_html( $neeon_bg ); ?>">		
		<div class="container">			
			<div class="footer-logo-area">
				<?php if ( NeeonTheme::$options['footer7_logo'] ) { ?>
				<div class="footer-logo"><a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $neeon_light_logo, 'allow_link' ); ?></a>
				</div>
				<?php } ?>
				<?php dynamic_sidebar( 'footer-style-7' ); ?>
				<?php if ( $neeon_socials && ( NeeonTheme::$options['footer7_social'] ) ) { ?>
					<ul class="footer-social">
						<?php foreach ( $neeon_socials as $neeon_social ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $neeon_social['url'] );?>"><i class="fab <?php echo esc_attr( $neeon_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
			</div>
		</div>
		<?php if ( NeeonTheme::$copyright_area == 1 ) { ?>
		<div class="copyright"><div class="container"><?php echo wp_kses( NeeonTheme::$options['copyright_text'] , 'allow_link' );?></div></div>
		<?php } ?>
	</div>
<?php } ?>

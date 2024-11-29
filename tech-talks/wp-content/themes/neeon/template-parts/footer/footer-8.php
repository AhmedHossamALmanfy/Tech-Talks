<?php
$neeon_footer_column = NeeonTheme::$options['footer_column_8'];
switch ( $neeon_footer_column ) {
	case '1':
	$neeon_footer_class = 'col-12';
	break;
	case '2':
	$neeon_footer_class = 'col-xl-6 col-md-6';
	break;
	case '3':
	$neeon_footer_class = 'col-xl-4 col-md-6';
	break;		
	default:
	$neeon_footer_class = 'col-xl-3 col-md-6';
	break;
}
$neeon_socials = NeeonTheme_Helper::socials();
// Logo
if( !empty( NeeonTheme::$options['footer_logo_light8'] ) ) {
	$logo_lights = wp_get_attachment_image( NeeonTheme::$options['footer_logo_light8'], 'full' );
	$neeon_light_logo = $logo_lights;
}else {
	$neeon_light_logo = "<img width='162' height='52' src='" . NEEON_IMG_URL . 'logo-light.svg' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

if( !empty( NeeonTheme::$options['fbgimg8'] ) ) {
	$f1_bg = wp_get_attachment_image_src( NeeonTheme::$options['fbgimg8'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = NEEON_IMG_URL . 'footer_bg.jpg';
}

if ( NeeonTheme::$options['footer_bgtype8'] == 'fbgcolor8' ) {
	$neeon_bg = NeeonTheme::$options['fbgcolor8'];
} else {
	$neeon_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}
$bgc = '';
if ( NeeonTheme::$options['footer_bgtype8'] == 'fbgimg8' ) {
	$bgc = 'footer-bg-opacity';
}
?>

<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="background:<?php echo esc_html( $neeon_bg ); ?>">
	<?php if ( NeeonTheme::$footer_area == 1 ) { ?>
	<div class="footer-content-area">
		<div class="container">			
			<div class="row">
				<?php
				for ( $i = 1; $i <= $neeon_footer_column; $i++ ) {
					echo '<div class="' . $neeon_footer_class . '">';
					dynamic_sidebar( 'footer-style-8-'. $i );
					echo '</div>';
				}
				?>
			</div>			
		</div>
	</div>
	<?php } ?>
	<?php if ( NeeonTheme::$copyright_area == 1 ) { ?>
	<div class="footer-copyright-area">
		<div class="container">
			<div class="copyright-area">
				<div class="footer-logo"><a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $neeon_light_logo, 'allow_link' ); ?></a></div>
				<?php if ( $neeon_socials ) { ?>
				<ul class="footer-social">
					<?php foreach ( $neeon_socials as $neeon_social ): ?>
						<li><a target="_blank" href="<?php echo esc_url( $neeon_social['url'] );?>"><i class="fab <?php echo esc_attr( $neeon_social['icon'] );?>"></i></a></li>
					<?php endforeach; ?>
				</ul>
				<?php } ?>
				<div class="copyright"><?php echo wp_kses( NeeonTheme::$options['copyright_text'] , 'allow_link' );?></div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>


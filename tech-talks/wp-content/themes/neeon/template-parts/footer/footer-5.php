<?php
$neeon_footer_column = NeeonTheme::$options['footer_column_5'];
switch ( $neeon_footer_column ) {
	case '1':
	$neeon_footer_class = 'col-12';
	break;
	case '2':
	$neeon_footer_class = 'col-md-6 col-12';
	break;
	case '3':
	$neeon_footer_class = 'col-lg-4 col-12';
	break;		
	default:
	$neeon_footer_class = 'col-xl-3 col-md-6 col-12';
	break;
}
$neeon_socials = NeeonTheme_Helper::socials();

if( !empty( NeeonTheme::$options['fbgimg5'] ) ) {
	$f1_bg = wp_get_attachment_image_src( NeeonTheme::$options['fbgimg5'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = NEEON_IMG_URL . 'footer_bg.jpg';
}

if ( NeeonTheme::$options['footer_bgtype5'] == 'fbgcolor5' ) {
	$neeon_bg = NeeonTheme::$options['fbgcolor5'];
} else {
	$neeon_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}
$bgc = '';
if ( NeeonTheme::$options['footer_bgtype5'] == 'fbgimg5' ) {
	$bgc = 'footer-bg-opacity';
}
?>


<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="background:<?php echo esc_html( $neeon_bg ); ?>">
	<?php if ( is_active_sidebar( 'footer-style-5-1' ) && NeeonTheme::$footer_area == 1 ) { ?>
	<div class="footer-content-area">
		<div class="container">			
			<div class="row">
				<?php
				for ( $i = 1; $i <= $neeon_footer_column; $i++ ) {
					echo '<div class="' . $neeon_footer_class . '">';
					dynamic_sidebar( 'footer-style-5-'. $i );
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
			<div class="copyright"><?php echo wp_kses( NeeonTheme::$options['copyright_text'] , 'allow_link' );?></div>
		</div>
	</div>
	<?php } ?>
</div>


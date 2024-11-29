<?php
$neeon_footer_column = NeeonTheme::$options['footer_column_4'];
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

if( !empty( NeeonTheme::$options['fbgimg4'] ) ) {
	$f1_bg = wp_get_attachment_image_src( NeeonTheme::$options['fbgimg4'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = NEEON_IMG_URL . 'footer_bg.jpg';
}

if ( NeeonTheme::$options['footer_bgtype4'] == 'fbgcolor4' ) {
	$neeon_bg = NeeonTheme::$options['fbgcolor4'];
} else {
	$neeon_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}
$bgc = '';
if ( NeeonTheme::$options['footer_bgtype4'] == 'fbgimg4' ) {
	$bgc = 'footer-bg-opacity';
}
?>


<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="background:<?php echo esc_html( $neeon_bg ); ?>">
	<?php if ( is_active_sidebar( 'footer-style-4-1' ) && NeeonTheme::$footer_area == 1 ) { ?>
	<?php if ( NeeonTheme::$options['footer_shape4'] ) { ?>
		<div class="shape-holder">
			<span class="shape wow fadeInUp" data-wow-delay="1.5s" data-wow-duration="1.5s">
				<img width="636" height="166" loading='lazy' src="<?php echo NEEON_ASSETS_URL . 'element/footer-shape-1.png'; ?>" alt="<?php echo esc_attr('footer-shape', 'neeon'); ?>">
			</span>
		</div>
	<?php } ?>
	<div class="footer-content-area">
		<div class="container">			
			<div class="row">
				<?php
				for ( $i = 1; $i <= $neeon_footer_column; $i++ ) {
					echo '<div class="' . $neeon_footer_class . '">';
					dynamic_sidebar( 'footer-style-4-'. $i );
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


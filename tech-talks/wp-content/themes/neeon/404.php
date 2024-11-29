
<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

wp_head();

if( !empty( NeeonTheme::$options['error_image'] ) ) {
	$error_bg = wp_get_attachment_image( NeeonTheme::$options['error_image'], 'full', true );
	$neeon_error_img = $error_bg;
}else {
	$neeon_error_img = "<img width='758' height='489' src='" . NEEON_IMG_URL . '404.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

?>
<?php get_header();?>
<div id="primary" class="content-area error-page-area">
	<div class="container">
		<div class="error-page-content">
			<div class="item-img">
				<span class="error-img <?php echo esc_attr( NeeonTheme::$options['error_animation'] );?> <?php echo esc_attr( NeeonTheme::$options['error_animation_effect'] );?>" data-wow-delay=".5s" data-wow-duration="1s"><?php echo wp_kses( $neeon_error_img, 'allow_link' ); ?></span>
			</div>
			<?php if ( !empty( NeeonTheme::$options['error_text1']) ) { ?>
			<h2 class="error-title <?php echo esc_attr( NeeonTheme::$options['error_animation'] );?> <?php echo esc_attr( NeeonTheme::$options['error_animation_effect'] );?>" data-wow-delay=".7s" data-wow-duration="1s"><?php echo wp_kses( NeeonTheme::$options['error_text1'] , 'alltext_allow' );?></h2>
			<?php } ?>
			<?php if ( !empty(NeeonTheme::$options['error_text2'])) { ?>
			<p class="<?php echo esc_attr( NeeonTheme::$options['error_animation'] );?> <?php echo esc_attr( NeeonTheme::$options['error_animation_effect'] );?>" data-wow-delay=".9s" data-wow-duration="1s"><?php echo wp_kses( NeeonTheme::$options['error_text2'] , 'alltext_allow' );?></p>
			<?php } ?>
			<div class="go-home <?php echo esc_attr( NeeonTheme::$options['error_animation'] );?> <?php echo esc_attr( NeeonTheme::$options['error_animation_effect'] );?>" data-wow-delay="1.1s" data-wow-duration="1s">
			  <a class="button-style-2" href="<?php echo esc_url( home_url( '/' ) );?>">
			  	<?php echo esc_html( NeeonTheme::$options['error_buttontext'] );?>
			  </a>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
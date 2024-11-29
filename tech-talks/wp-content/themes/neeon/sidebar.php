<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if( is_active_sidebar( 'sidebar' )) {
	$fixedbar = 'fixed-bar-coloum';
}else {
	$fixedbar = '';
}

if( NeeonTheme::$options['image_blend'] == 'normal' ) {
	$blend = 'normal';
}else {
	$blend = 'blend';
}

?>
<div class="col-xl-3 col-lg-8 mx-auto <?php echo esc_attr( $fixedbar ); ?>">
	<aside class="sidebar-widget-area <?php echo esc_attr($blend); ?>">
		<?php
			if ( NeeonTheme::$sidebar ) {
				if ( is_active_sidebar( NeeonTheme::$sidebar ) ) dynamic_sidebar( NeeonTheme::$sidebar );
			}
			else {
				if ( is_active_sidebar( 'sidebar' ) ) dynamic_sidebar( 'sidebar' );
			}
		?>
	</aside>
</div>
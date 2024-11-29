<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$neeon_socials = NeeonTheme_Helper::socials();
$container = ( NeeonTheme::$header_style == 12 ) ? 'container-fluid' : 'container';

?>

<div id="tophead" class="header-top-bar align-items-center"> 
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="top-bar-wrap">
			<?php if ( NeeonTheme::$options['top_address_2'] || NeeonTheme::$options['top_email_2'] ) { ?>
			<div class="tophead-left">
				<?php if ( NeeonTheme::$options['top_address_2'] ) { ?>
				<div class="address">
					<i class="fas fa-map-marker-alt"></i><?php echo wp_kses( NeeonTheme::$options['address'] , 'alltext_allow' );?>
				</div>
				<?php } ?>
				<?php if ( NeeonTheme::$options['top_email_2'] ) { ?>
				<div class="email">
					<i class="fas fa-envelope"></i><a href="mailto:<?php echo esc_attr( NeeonTheme::$options['email'] );?>"><?php echo wp_kses( NeeonTheme::$options['email'] , 'alltext_allow' );?></a>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if ( NeeonTheme::$options['top_bar_date'] || NeeonTheme::$options['top_bar_update'] ) { ?>
			<div class="tophead-right">
				<?php if ( NeeonTheme::$options['top_bar_date'] ) { ?>
				<div class="topbar-date"><i class="far fa-calendar-alt icon"></i><?php echo date_i18n( get_option('date_format') ); ?></div>
				<?php } ?>
				<?php if ( NeeonTheme::$options['top_bar_update'] ) { ?>
				<div class="topbar-update"><i class="far fa-clock"></i><?php esc_html_e ( 'Last Update : ' , 'neeon' ); ?><?php neeon_last_update(); ?></div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>


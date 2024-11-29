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
			<?php if ( NeeonTheme::$options['top_address_3'] || NeeonTheme::$options['top_bar_date'] ) { ?>
			<div class="tophead-left">
				<?php if ( NeeonTheme::$options['top_bar_date'] ) { ?>
				<div class="topbar-date"><i class="far fa-calendar-alt icon"></i><?php echo date_i18n( get_option('date_format') ); ?></div>
				<?php } ?>
				<?php if ( NeeonTheme::$options['top_address_3'] ) { ?>
				<div class="address">
					<i class="fas fa-map-marker-alt"></i><?php echo wp_kses( NeeonTheme::$options['address'] , 'alltext_allow' );?>
				</div>
				<?php } ?>				
			</div>
			<?php } ?>
			<?php if ( NeeonTheme::$options['top_social_3'] ) { ?>
			<div class="tophead-right">
				<?php if ( $neeon_socials ) { ?>
					<div class="social-label">
						<?php if ( !empty ( NeeonTheme::$options['social_label'] ) ) { ?>
							<?php echo wp_kses( NeeonTheme::$options['social_label'] , 'alltext_allow' );?> :
						<?php } ?>
					</div>
					<ul class="tophead-social">
						<?php foreach ( $neeon_socials as $neeon_social ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $neeon_social['url'] );?>"><i class="fab <?php echo esc_attr( $neeon_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>


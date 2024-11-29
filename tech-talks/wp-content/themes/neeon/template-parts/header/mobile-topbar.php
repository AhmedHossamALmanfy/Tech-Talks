<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$neeon_socials = NeeonTheme_Helper::socials();

$neeon_mobile_meta  = ( NeeonTheme::$options['mobile_date'] || NeeonTheme::$options['mobile_phone'] || NeeonTheme::$options['mobile_email'] || NeeonTheme::$options['mobile_address'] || NeeonTheme::$options['mobile_subscribe'] || NeeonTheme::$options['mobile_social'] && $neeon_socials ) ? true : false;

?>
<?php if ( $neeon_mobile_meta ) { ?>
<div class="mobile-top-bar" id="mobile-top-fix">
	<div class="mobile-top">
		<?php if ( NeeonTheme::$options['mobile_date'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="far fa-calendar-alt"></i>
			</div>
			<div class="info"><span class="info-text"><?php echo date_i18n( get_option('date_format') ); ?></span></div>
		</div>
		<?php } ?>

		<?php if ( NeeonTheme::$options['mobile_phone'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="fas fa-phone-alt"></i>
			</div>
			<div class="info"><span class="info-text"><a href="tel:<?php echo esc_attr( NeeonTheme::$options['phone'] );?>"><?php echo wp_kses( NeeonTheme::$options['phone'] , 'alltext_allow' );?></a></span></div>
		</div>
		<?php } ?>			
		<?php if ( NeeonTheme::$options['mobile_email'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="far fa-envelope"></i>
			</div>
			<div class="info"><span class="info-text"><a href="mailto:<?php echo esc_attr( NeeonTheme::$options['email'] );?>"><?php echo wp_kses( NeeonTheme::$options['email'] , 'alltext_allow' );?></a></span></div>
		</div>
		<?php } ?>
		<?php if ( NeeonTheme::$options['mobile_address'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="fas fa-map-marker-alt"></i>
			</div>
			<div class="info"><span class="info-text"><?php echo wp_kses( NeeonTheme::$options['address'] , 'alltext_allow' );?></span></div>
		</div>
		<?php } ?>
		<?php if ( NeeonTheme::$options['mobile_subscribe'] ) { ?>
			<div class="header-button">
				<a class="button-style-1" target="_self" href="<?php echo esc_url( NeeonTheme::$options['subscribe_button_link']  );?>"><?php echo esc_html( NeeonTheme::$options['subscribe_button_text'] );?></a>
			</div>
		<?php } ?>
	</div>
	<?php if ( NeeonTheme::$options['mobile_social'] && $neeon_socials ) { ?>
		<ul class="mobile-social">
			<?php foreach ( $neeon_socials as $neeon_social ): ?>
				<li><a target="_blank" href="<?php echo esc_url( $neeon_social['url'] );?>"><i class="fab <?php echo esc_attr( $neeon_social['icon'] );?>"></i></a></li>
			<?php endforeach; ?>
		</ul>
	<?php } ?>
</div>
<?php } ?>
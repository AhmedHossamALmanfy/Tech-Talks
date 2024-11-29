<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$neeon_socials = NeeonTheme_Helper::socials();
$topbar_menu = NeeonTheme::$options['topbar_menu'];
$nav_topmenu_args = array( 'menu' => $topbar_menu, 'container' => 'nav', 'depth' => 1 );
$container = ( NeeonTheme::$header_style == 12 ) ? 'container-fluid' : 'container';

?>
<div id="tophead" class="header-top-bar align-items-center">
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="top-bar-wrap">
			<div class="rt-topbar-menu">
				<?php wp_nav_menu( $nav_topmenu_args );?>
			</div>
			<div class="tophead-right">
				<?php if ( NeeonTheme::$options['top_bar_date'] ) { ?>
				<div class="topbar-date"><i class="far fa-calendar-alt icon"></i><?php echo date_i18n( get_option('date_format') ); ?></div>
				<?php } ?>			
				<?php if ( NeeonTheme::$options['top_social_4'] && $neeon_socials ) { ?>
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
		</div>
	</div>
</div>
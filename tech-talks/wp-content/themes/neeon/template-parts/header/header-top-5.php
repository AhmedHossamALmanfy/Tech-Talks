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
			<?php if ( NeeonTheme::$options['ticker_enable'] ) {  ?>
				<div class="rt-news-ticker-holder">
					<i class="fas fa-bolt icon"></i><?php neeon_news_ticker(); ?>
				</div>
			<?php } ?>
			<div class="tophead-right">
				<?php if ( NeeonTheme::$options['search_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'search' );?>
				<?php } ?>			
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
		</div>
	</div>
</div>
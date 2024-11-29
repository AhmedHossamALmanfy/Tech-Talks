<?php
/**
 * Template Name: Post Layout 2
 * Template Post Type: post
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( NeeonTheme::$layout == 'full-width' ) {
	$neeon_layout_class = 'col-sm-12 col-12';
}
else{
	$neeon_layout_class = NeeonTheme_Helper::has_active_widget();
}

if( NeeonTheme::$options['image_blend'] == 'normal' ) {
	$blend = 'normal';
}else {
	$blend = 'blend';
}
?>
<?php get_header(); ?>

<div id="primary" class="content-area <?php echo esc_attr($blend); ?>">
	<div id="contentHolder">
		<?php if ( NeeonTheme::$options['before_post_ad_option'] ) { ?>
		<div class="content-top-ad">
			<div class="container">
				<div class="content-top-ad-item">
					<?php if ( NeeonTheme::$options['ad_before_post_type'] == 'post_before_adimage' ) { ?>
					<?php if (NeeonTheme::$options['post_before_ad_img_link']){
						$target = NeeonTheme::$options['post_before_ad_img_target']? 'target="_blank"':'';
						echo '<a '.$target.'  href="'.esc_url( NeeonTheme::$options['post_before_ad_img_link'] ).'">'.wp_get_attachment_image( NeeonTheme::$options['post_before_adimage'], 'full' ).'</a>';

					} else {
						echo wp_get_attachment_image( NeeonTheme::$options['post_before_adimage'], 'full' );
					}?>	

					<?php } else {
						echo NeeonTheme::$options['post_before_adcustom'];
					} ?>		
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="post-detail-style2">
			<div class="<?php echo ( NeeonTheme::$options['scroll_post_enable'] == 1 ) ? esc_attr( 'ajax-scroll-post' ) : ''; ?>">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content-single-2', get_post_format() );?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
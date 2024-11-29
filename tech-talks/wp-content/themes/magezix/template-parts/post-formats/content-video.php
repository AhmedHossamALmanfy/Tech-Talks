<?php
/**
 * Template part for displaying Video Formaats posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magezix
 */
if(get_post_meta(get_the_ID(), 'magezix_post_format_meta', true)) {
    $post_video_meta = get_post_meta(get_the_ID(), 'magezix_post_format_meta', true);
} else {
    $post_video_meta = array();
}

if( array_key_exists( 'video_link', $post_video_meta )) {
    $video_link = $post_video_meta['video_link'];
} else {
    $video_link = '';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('tx-post-item tx-post format-video mt-50'); ?>>
    <div class="post-thumb">
        <a href="<?php the_permalink();?>">
            <?php 
            if(has_post_thumbnail()){
                the_post_thumbnail('magezix-991x524');
            }        
            ?>
        </a>
        <div class="post-date">
			<?php echo wp_kses( get_the_date('d'), true ); ?>
			<br> <span><?php echo wp_kses( get_the_date('M'), true ); ?></span>			
		</div>
        <a href="<?php echo esc_url($video_link);?>" class="popup-video"><i class="fas fa-play"></i></a>
    </div>
	<?php get_template_part('template-parts/common/post-summery'); ?>
	
</article><!-- #post-<?php the_ID(); ?> -->

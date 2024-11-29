<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$neeon_has_entry_meta  = ( NeeonTheme::$options['post_date'] || NeeonTheme::$options['post_author_name'] || NeeonTheme::$options['post_comment_num'] || ( NeeonTheme::$options['post_length'] && function_exists( 'neeon_reading_time' ) ) || ( NeeonTheme::$options['post_view'] && function_exists( 'neeon_views' ) ) ) ? true : false;

$neeon_comments_number = number_format_i18n( get_comments_number() );
$neeon_comments_html = $neeon_comments_number == 1 ? esc_html__( 'Comment' , 'neeon' ) : esc_html__( 'Comments' , 'neeon' );
$neeon_comments_html = '<span class="comment-number">'. $neeon_comments_number .'</span> '. $neeon_comments_html;
$neeon_author_bio = get_the_author_meta( 'description' );

$neeon_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$neeon_time_html       = apply_filters( 'neeon_single_time', $neeon_time_html );

$author = $post->post_author;

$news_author_fb = get_user_meta( $author, 'neeon_facebook', true );
$news_author_tw = get_user_meta( $author, 'neeon_twitter', true );
$news_author_ld = get_user_meta( $author, 'neeon_linkedin', true );
$news_author_pr = get_user_meta( $author, 'neeon_pinterest', true );
$news_author_ins = get_user_meta( $author, 'neeon_instagram', true );
$neeon_author_designation = get_user_meta( $author, 'neeon_author_designation', true );

$post_layout_ops = get_post_meta( get_the_ID() ,'neeon_post_layout', true );
$youtube_link = get_post_meta( get_the_ID(), 'neeon_youtube_link', true );
$audio_track = get_post_meta( get_the_ID(), 'neeon_audio_track' , true );

if ( empty(has_post_thumbnail() ) ) {
	$img_class ='no-image';
}else {
	$img_class ='show-image';
}

?>
<div id="post-<?php the_ID(); ?>" <?php post_class($post_layout_ops); ?>>
	<div class="entry-content rt-single-content"><?php the_content();?>
		<?php wp_link_pages( array(
			'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'neeon' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) ); ?>
	</div>

	<?php if ( ( 'audio' == get_post_format( $id ) && !empty( $audio_track ) ) ) { ?>
		<div class="post-audio-player">
            <audio class="neeon-audio-full-track" style="display: none">
                <source src="<?php echo wp_get_attachment_url( $audio_track ); ?>" type="audio/mp3">
            </audio>
        </div>
    <?php } ?>

	<?php if ( ( NeeonTheme::$options['post_tags'] && has_tag() ) || ( NeeonTheme::$options['post_share']  && ( function_exists( 'neeon_post_share' ) ) ) ) { ?>
	<div class="entry-footer">
		<div class="entry-footer-meta">
			<?php if ( NeeonTheme::$options['post_tags'] && has_tag() ) { ?>
			<div class="meta-tags">
				<h4 class="meta-title"><?php esc_html_e( 'Tags:', 'neeon' );?></h4><?php echo get_the_term_list( $post->ID, 'post_tag', '' ); ?>
			</div>	
			<?php } if ( ( NeeonTheme::$options['post_share'] ) && ( function_exists( 'neeon_post_share' ) ) ) { ?>
			<div class="post-share"><h4 class="meta-title"><?php esc_html_e( 'Share This Post:', 'neeon' );?></h4><?php neeon_post_share(); ?></div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
	<!-- author bio -->
	<?php if ( NeeonTheme::$options['post_author_bio'] == '1' ) { ?>
		<?php if ( !empty ( $neeon_author_bio ) ) { ?>
		<div class="media about-author">
			<div class="<?php if ( is_rtl() ) { ?>pull-right<?php } else { ?>pull-left<?php } ?>">
				<?php echo get_avatar( $author, 105 ); ?>
			</div>
			<div class="media-body">
				<div class="about-author-info">
					<h3 class="author-title"><?php the_author_posts_link();?></h3>
				</div>
				<?php if ( $neeon_author_bio ) { ?>
				<div class="author-bio"><?php echo esc_html( $neeon_author_bio );?></div>
				<?php } ?>
				<ul class="author-box-social">
					<?php if ( ! empty( $news_author_fb ) ){ ?><li><a href="<?php echo esc_attr( $news_author_fb ); ?>"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_tw ) ){ ?><li><a href="<?php echo esc_attr( $news_author_tw ); ?>"><i class="fab fa-x-twitter"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_ld ) ){ ?><li><a href="<?php echo esc_attr( $news_author_ld ); ?>"><i class="fab fa-linkedin-in"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_pr ) ){ ?><li><a href="<?php echo esc_attr( $news_author_pr ); ?>"><i class="fab fa-pinterest-p"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_ins ) ){ ?><li><a href="<?php echo esc_url( $news_author_ins ); ?>"><i class="fab fa-instagram"></i></a></li><?php } ?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
	<?php } ?>
	<!-- next/prev post -->
	<?php if ( NeeonTheme::$options['post_links'] ) { neeon_post_links_next_prev(); } ?>
	
	<?php
	if ( comments_open() || get_comments_number() ){
		comments_template();
	}
	?>	
	<?php if( NeeonTheme::$options['show_related_post'] == '1' && is_single() && !empty ( neeon_related_post() ) ) { ?>
		<div class="related-post">
			<?php neeon_related_post(); ?>
		</div>
	<?php } ?>

	<?php if ( NeeonTheme::$options['after_post_ad_option'] ) { ?>
	<div class="content-bottom-ad">
		<div class="content-bottom-item">
			<?php if ( NeeonTheme::$options['ad_after_post_type'] == 'post_after_adimage' ) { ?>
			<?php if (NeeonTheme::$options['post_after_ad_img_link']){
				$target = NeeonTheme::$options['post_after_ad_img_target']? 'target="_blank"':'';
				echo '<a '.$target.'  href="'.esc_url( NeeonTheme::$options['post_after_ad_img_link'] ).'">'.wp_get_attachment_image( NeeonTheme::$options['post_after_adimage'], 'full' ).'</a>';

			} else {
				echo wp_get_attachment_image( NeeonTheme::$options['post_after_adimage'], 'full' );
			}?>	

			<?php } else {
				echo NeeonTheme::$options['post_after_adcustom'];
			} ?>		
		</div>
	</div>
	<?php } ?>		
</div>
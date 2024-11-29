<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'neeon-size2';

$neeon_has_entry_meta  = ( NeeonTheme::$options['blog_date'] || NeeonTheme::$options['blog_author_name'] || NeeonTheme::$options['blog_comment_num'] || NeeonTheme::$options['blog_length'] && function_exists( 'neeon_reading_time' ) || NeeonTheme::$options['blog_view'] && function_exists( 'neeon_views' ) ) ? true : false;

$neeon_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$neeon_time_html       = apply_filters( 'neeon_single_time', $neeon_time_html );

$neeon_comments_number = number_format_i18n( get_comments_number() );
$neeon_comments_html = $neeon_comments_number == 1 ? esc_html__( 'Comment' , 'neeon' ) : esc_html__( 'Comments' , 'neeon' );
$neeon_comments_html = '<span class="comment-number">'. $neeon_comments_number .'</span> ' . $neeon_comments_html;

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), NeeonTheme::$options['post_content_limit'], '' );

if ( empty(has_post_thumbnail() ) ) {
	$img_class ='no-image';
}else {
	$img_class ='show-image';
}

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-2' ); ?>>
	<div class="blog-box <?php echo esc_attr($img_class); ?>">
		<?php if ( has_post_thumbnail() || NeeonTheme::$options['display_no_preview_image'] == '1'  ) { ?>
			<div class="blog-img-holder">
				<div class="blog-img">
					<a href="<?php the_permalink(); ?>" class="img-opacity-hover"><?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( $thumb_size, ['class' => 'img-responsive'] ); ?>
						<?php } else {
							if ( NeeonTheme::$options['display_no_preview_image'] == '1' ) {
								if ( !empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
									$thumbnail = wp_get_attachment_image( NeeonTheme::$options['no_preview_image']['id'], $thumb_size );						
								}
								elseif ( empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
									$thumbnail = '<img class="wp-post-image" src="'.NEEON_IMG_URL.'noimage_870X525.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
								}
								echo wp_kses( $thumbnail , 'alltext_allow' );
							}
						}
					?>
					</a>
				</div>				
			</div>
		<?php } ?>
		<div class="entry-content">
			<?php if ( NeeonTheme::$options['blog_cats'] ) { ?>
				<span class="entry-categories"><?php echo the_category( ', ' );?></span>
			<?php } ?>
			<h2 class="entry-title"><a class="title-animation-black-bold" href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<?php if ( $neeon_has_entry_meta ) { ?>
			<ul class="entry-meta">
				<?php if ( NeeonTheme::$options['blog_author_name'] ) { ?>
				<li class="post-author"><?php esc_html_e( 'by ', 'neeon' );?><?php the_author_posts_link(); ?></li>
				<?php } if ( NeeonTheme::$options['blog_date'] ) { ?>	
				<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>				
				<?php } if ( NeeonTheme::$options['blog_comment_num'] ) { ?>
				<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $neeon_comments_html , 'alltext_allow' );?></a></li>
				<?php } if ( NeeonTheme::$options['blog_length'] && function_exists( 'neeon_reading_time' ) ) { ?>
				<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo neeon_reading_time(); ?></li>
				<?php } if ( NeeonTheme::$options['blog_view'] && function_exists( 'neeon_views' ) ) { ?>
				<li><span class="post-views"><i class="fas fa-signal"></i><?php echo neeon_views(); ?></span></li>
				<?php } ?>
			</ul>
			<?php } ?>
			<?php the_excerpt();?>
			<div class="post-read-more"><a class="button-style-1 btn-common rt-animation-out" href="<?php the_permalink();?>"><?php esc_html_e( 'Read More ', 'neeon' );?><?php echo radius_arrow_shape(); ?></a>
          	</div>		
		</div>
	</div>
</div>
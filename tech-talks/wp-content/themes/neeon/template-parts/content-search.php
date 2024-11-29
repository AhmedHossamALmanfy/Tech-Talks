<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'neeon-size1';

$neeon_has_entry_meta  = ( NeeonTheme::$options['blog_date'] || NeeonTheme::$options['blog_author_name'] || NeeonTheme::$options['blog_comment_num'] || NeeonTheme::$options['blog_length'] && function_exists( 'neeon_reading_time' ) || NeeonTheme::$options['blog_view'] && function_exists( 'neeon_views' ) ) ? true : false;

$neeon_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$neeon_time_html       = apply_filters( 'neeon_single_time', $neeon_time_html );

$neeon_comments_number = number_format_i18n( get_comments_number() );
$neeon_comments_html = $neeon_comments_number == 1 ? esc_html__( 'Comment: ' , 'neeon' ) : esc_html__( 'Comments: ' , 'neeon' );
$neeon_comments_html = $neeon_comments_html . '<span class="comment-number">'. $neeon_comments_number .'</span> ';

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), NeeonTheme::$options['search_excerpt_length'], '' );

if ( empty(has_post_thumbnail() ) ) {
	$img_class ='no_image';
}else {
	$img_class ='show_image';
}

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-2' ); ?>>
	<div class="blog-box <?php echo esc_attr($img_class); ?>">		
		<div class="entry-content">
			<?php if ( NeeonTheme::$options['blog_cats'] && get_the_category($id) ) { ?>
				<span class="entry-categories"><?php echo neeon_category_prepare(); ?></span>
			<?php } ?>
			<h2 class="entry-title title-animation-black-bold"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
		</div>
	</div>
</div>
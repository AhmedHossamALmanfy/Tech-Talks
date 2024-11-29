<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( NeeonTheme::$layout == 'full-width' ) {
	$neeon_layout_class = 'col-sm-12 col-12';
}
else{
	$neeon_layout_class = 'col-xl-9';
}
$neeon_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

$neeon_author_bio      = get_the_author_meta( 'description' );
$subtitle = get_post_meta( get_the_ID(), 'neeon_subtitle', true );
$author = $post->post_author;

$news_author_fb = get_user_meta( $author, 'neeon_facebook', true );
$news_author_tw = get_user_meta( $author, 'neeon_twitter', true );
$news_author_ld = get_user_meta( $author, 'neeon_linkedin', true );
$news_author_pr = get_user_meta( $author, 'neeon_pinterest', true );
$news_author_ins = get_user_meta( $author, 'neeon_instagram', true );
$neeon_author_designation = get_user_meta( $author, 'neeon_author_designation', true );

if( !empty( NeeonTheme::$options['author_bg_image'] ) ) {
	$author_bg = wp_get_attachment_image_src( NeeonTheme::$options['author_bg_image'], 'full', true );
	$author_bg_img = $author_bg[0];
}else {
	$author_bg_img = NEEON_IMG_URL . 'author_bg.jpg';
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<!-- author bio -->
	<?php if ( NeeonTheme::$options['post_author_bio'] == '1' && !empty ( $neeon_author_bio ) ) { ?>
	<div class="author-banner" style="background-image:url(<?php echo esc_html( $author_bg_img ); ?>)">
		<div class="container">			
			<?php if ( !empty ( $neeon_author_bio ) ) { ?>
			<div class="admin-author">
				<div class="author-img">
					<?php echo get_avatar( $author, 150 ); ?>
				</div>
				<div class="author-content">
					<div class="about-author-info">
						<h3 class="author-title"><?php the_author_posts_link();?></h3>
						<div class="author-designation"><?php if ( !empty ( $neeon_author_designation ) ) {	echo esc_html( $neeon_author_designation ); } else {	$user_info = get_userdata( $author ); echo esc_html ( implode( ', ', $user_info->roles ) );	} ?></div>
					</div>
					<?php if ( $neeon_author_bio ) { ?>
					<div class="author-bio"><?php echo esc_html( $neeon_author_bio );?></div>
					<?php } ?>					
				</div>
				<ul class="author-box-social">
					<?php if ( ! empty( $news_author_fb ) ){ ?><li><a href="<?php echo esc_url( $news_author_fb ); ?>"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_tw ) ){ ?><li><a href="<?php echo esc_url( $news_author_tw ); ?>"><i class="fab fa-twitter"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_ld ) ){ ?><li><a href="<?php echo esc_url( $news_author_ld ); ?>"><i class="fab fa-linkedin-in"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_pr ) ){ ?><li><a href="<?php echo esc_url( $news_author_pr ); ?>"><i class="fab fa-pinterest-p"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_ins ) ){ ?><li><a href="<?php echo esc_url( $news_author_ins ); ?>"><i class="fab fa-instagram"></i></a></li><?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>	
	</div>		
	<?php } ?>

	<div class="container">
		<div class="row">
			<?php if ( NeeonTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<div class="<?php echo esc_attr( $neeon_layout_class );?>">
				<main id="main" class="site-main">					
					<?php if ( have_posts() ) : ?>
						<?php
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-author', get_post_format() );
							endwhile;
						?>
						<div class="mt50"><?php NeeonTheme_Helper::pagination();?></div>
					<?php else: ?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
				</main>					
			</div>
			<?php
			if ( NeeonTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
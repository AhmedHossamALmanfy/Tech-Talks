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
	$neeon_layout_class = NeeonTheme_Helper::has_active_widget();
}
$neeon_has_entry_meta  = ( NeeonTheme::$options['post_date'] || NeeonTheme::$options['post_author_name'] || NeeonTheme::$options['post_comment_num'] || ( NeeonTheme::$options['post_length'] && function_exists( 'neeon_reading_time' ) ) || NeeonTheme::$options['post_published'] && function_exists( 'neeon_get_time' ) || ( NeeonTheme::$options['post_view'] && function_exists( 'neeon_views' ) ) ) ? true : false;

$neeon_comments_number = number_format_i18n( get_comments_number() );
$neeon_comments_html = $neeon_comments_number == 1 ? esc_html__( 'Comment' , 'neeon' ) : esc_html__( 'Comments' , 'neeon' );
$neeon_comments_html = '<span class="comment-number">'. $neeon_comments_number .'</span> '. $neeon_comments_html;
$neeon_author_bio = get_the_author_meta( 'description' );

$neeon_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$neeon_time_html       = apply_filters( 'neeon_single_time', $neeon_time_html );
$youtube_link = get_post_meta( get_the_ID(), 'neeon_youtube_link', true );

if ( ! empty(has_post_thumbnail() ) || ( !empty( $neeon_post_gallerys_raw ) && 'gallery' == get_post_format( $id ) ) ) {
	$img_class ='show-image';
}else {
	$img_class ='no-image';
}

if( NeeonTheme::$options['image_blend'] == 'normal' ) {
	$blend = 'normal';
}else {
	$blend = 'blend';
}

?>
<?php get_header(); ?>

<div id="primary" class="content-area <?php echo esc_attr($blend); ?>">
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

	<input type="hidden" id="neeon-cat-ids" value="<?php echo implode(',', wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) ) ); ?>">

	<?php if ( NeeonTheme::$options['post_style'] == 'style1' ) { ?>
		<div id="contentHolder">
			<div class="container">
				<div class="row">				
					<?php if ( NeeonTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
						<div class="<?php echo esc_attr( $neeon_layout_class );?>">
							<main id="main" class="site-main"> 
								<div class="rt-sidebar-sapcer <?php echo ( NeeonTheme::$options['scroll_post_enable'] == 1 ) ? esc_attr( 'ajax-scroll-post' ) : ''; ?>">
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'template-parts/content-single', get_post_format() );?>						
								<?php endwhile; ?> 
								</div> 
							</main>
						</div>
					<?php if ( NeeonTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
				</div>
			</div>
		</div>
	<?php } else if ( NeeonTheme::$options['post_style'] == 'style2' ) { ?>
		<div id="contentHolder">
			<div class="<?php echo ( NeeonTheme::$options['scroll_post_enable'] == 1 ) ? esc_attr( 'ajax-scroll-post' ) : ''; ?>">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content-single-2', get_post_format() );?>
				<?php endwhile; ?>				
			</div>
		</div>
	<?php } else if ( NeeonTheme::$options['post_style'] == 'style3' ) { ?>
	<div id="contentHolder">
		<div class="post-detail-style3">
			<div class="container">
				<div class="entry-thumbnail-area <?php echo esc_attr($img_class); ?>">
					<?php
					$swiper_data=array(
						'slidesPerView' 	=>1,
						'centeredSlides'	=>false,
						'loop'				=>true,
						'spaceBetween'		=>0,
						'slideToClickedSlide' =>true,
						'slidesPerGroup' => 1,
						'autoplay'				=>array(
							'delay'  => 1,
						),
						'speed'      =>500,
						'breakpoints' =>array(
							'0'    =>array('slidesPerView' =>1),
							'576'    =>array('slidesPerView' =>1),
							'768'    =>array('slidesPerView' =>1),
							'992'    =>array('slidesPerView' =>1),
							'1200'    =>array('slidesPerView' =>1),				
							'1600'    =>array('slidesPerView' =>1)				
						),
						'auto'   =>false
					);

					$swiper_data = json_encode( $swiper_data );
					$neeon_post_gallerys_raw = get_post_meta( get_the_ID(), 'neeon_post_gallery', true );
					$neeon_post_gallerys = explode( "," , $neeon_post_gallerys_raw );

					if ( !empty( $neeon_post_gallerys_raw ) && 'gallery' == get_post_format( $id ) ) { ?>
						<div class="rt-swiper-slider gallery-slider rt-swiper-nav-1" data-xld = '<?php echo esc_attr( $swiper_data ); ?>'>
							<div class="swiper-wrapper">
								<?php foreach( $neeon_post_gallerys as $neeon_post_gallery ) { ?>
								<div class="swiper-slide">
									<?php echo wp_get_attachment_image( $neeon_post_gallery, 'full', "", array( "class" => "img-responsive" ) );
									?>
								</div>
								<?php } ?>
							</div>
							<div class="swiper-navigation">
					            <div class="swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
					            <div class="swiper-button-next"><i class="fas fa-chevron-right"></i></div>
					        </div>
						</div>
					<?php } else { ?>
						<?php if ( has_post_thumbnail() && ( NeeonTheme::$options['post_featured_image'] == true ) ) { ?>
							<div class="image-wrap"><?php the_post_thumbnail( 'full' , ['class' => 'img-responsive'] ); ?></div>
						<?php } ?>
						<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
							<div class="rt-video"><a class="rt-play play-btn-white-xl rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
						<?php } ?>

					<?php } ?>

					<div class="entry-header">						
						<?php if ( NeeonTheme::$options['post_cats'] ) { ?><span class="entry-categories"><?php echo neeon_category_prepare(); ?></span><?php } ?>
						<h1 class="entry-title"><?php the_title();?></h1>
						<?php if ( $neeon_has_entry_meta ) { ?>
						<ul class="entry-meta">				
							<?php if ( NeeonTheme::$options['post_author_name'] ) { ?>
							<li class="item-author"><?php esc_html_e( 'by ', 'neeon' );?><?php the_author_posts_link(); ?>
							</li>
							<?php } if ( NeeonTheme::$options['post_date'] ) { ?>	
							<li><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>	
							<?php } if ( NeeonTheme::$options['post_comment_num'] ) { ?>
							<li><i class="far fa-comments"></i><?php echo wp_kses( $neeon_comments_html , 'alltext_allow' ); ?></li>
							<?php } if ( NeeonTheme::$options['post_length'] && function_exists( 'neeon_reading_time' ) ) { ?>
							<li class="meta-reading-time meta-item"><i class="far fa-clock"></i><?php echo neeon_reading_time(); ?></li>
							<?php } if ( NeeonTheme::$options['post_view'] && function_exists( 'neeon_views' ) ) { ?>
							<li><i class="fas fa-signal"></i><span class="meta-views meta-item "><?php echo neeon_views(); ?></span></li>
							<?php } if ( NeeonTheme::$options['post_published'] && function_exists( 'neeon_get_time' ) ) { ?>	
							<li><i class="fas fa-clock"></i><?php echo neeon_get_time(); ?></li>
							<?php } ?>
						</ul>
						<?php } ?>	
					</div>	
					<?php if( get_the_post_thumbnail_caption() ) { ?><figcaption><?php the_post_thumbnail_caption(); ?></figcaption><?php } ?>	
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php if ( NeeonTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
					<div class="<?php echo esc_attr( $neeon_layout_class );?>">
						<main id="main" class="site-main">
							<div class="rt-sidebar-sapcer <?php echo ( NeeonTheme::$options['scroll_post_enable'] == 1 ) ? esc_attr( 'ajax-scroll-post' ) : ''; ?>">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content-single-3', get_post_format() );?>						
							<?php endwhile; ?>
							</div>
						</main>
					</div>
				<?php if ( NeeonTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<?php get_footer(); ?>
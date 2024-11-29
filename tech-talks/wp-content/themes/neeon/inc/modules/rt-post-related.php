<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if( ! function_exists( 'neeon_related_post' )){
	
	function neeon_related_post(){
		$thumb_size = 'neeon-size3';
		$post_id = get_the_id();	
		$number_of_avail_post = '';
		$current_post = array( $post_id );	
		$title_length = NeeonTheme::$options['show_related_post_title_limit'] ? NeeonTheme::$options['show_related_post_title_limit'] : '';
		$related_post_number = NeeonTheme::$options['show_related_post_number'];

		# Making ready to the Query ...
		$query_type = NeeonTheme::$options['related_post_query'];

		$args = array(
			'post__not_in'           => $current_post,
			'posts_per_page'         => $related_post_number,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
		);

		# Checking Related Posts Order ----------
		if( NeeonTheme::$options['related_post_sort'] ){

			$post_order = NeeonTheme::$options['related_post_sort'];

			if( $post_order == 'rand' ){

				$args['orderby'] = 'rand';
			}
			elseif( $post_order == 'views' ){

				$args['orderby']  = 'meta_value_num';
				$args['meta_key'] = 'neeon_views';
			}
			elseif( $post_order == 'popular' ){

				$args['orderby'] = 'comment_count';
			}
			elseif( $post_order == 'modified' ){

				$args['orderby'] = 'modified';
				$args['order']   = 'ASC';
			}
			elseif( $post_order == 'recent' ){

				$args['orderby'] = '';
				$args['order']   = '';
			}
		}


		# Get related posts by author ----------
		if( $query_type == 'author' ){
			$args['author'] = get_the_author_meta( 'ID' );
		}

		# Get related posts by tags ----------
		elseif( $query_type == 'tag' ){
			$tags_ids  = array();
			$post_tags = get_the_terms( $post_id, 'post_tag' );

			if( ! empty( $post_tags ) ){
				foreach( $post_tags as $individual_tag ){
					$tags_ids[] = $individual_tag->term_id;
				}

				$args['tag__in'] = $tags_ids;
			}
		}

		# Get related posts by categories ----------
		else{
			$category_ids = array();
			$categories   = get_the_category( $post_id );

			foreach( $categories as $individual_category ){
				$category_ids[] = $individual_category->term_id;
			}

			$args['category__in'] = $category_ids;
		}

		# Get the posts ----------
		$related_query = new wp_query( $args );
		
		$count_post = $related_query->post_count;
		if ( $count_post < 4 ) {
			$number_of_avail_post = false;
		} else {
			$number_of_avail_post = true;
		}

	
		$swiper_data=array(
			'slidesPerView' 	=>2,
			'centeredSlides'	=>false,
			'loop'				=>true,
			'spaceBetween'		=>20,
			'slideToClickedSlide' =>true,
			'slidesPerGroup' => 1,
			'autoplay'				=>array(
				'delay'  => 1,
			),
			'speed'      =>500,
			'breakpoints' =>array(
				'0'    =>array('slidesPerView' =>1),
				'576'    =>array('slidesPerView' =>2),
				'768'    =>array('slidesPerView' =>2),
				'992'    =>array('slidesPerView' =>2),
				'1200'    =>array('slidesPerView' =>2),				
				'1600'    =>array('slidesPerView' =>3)				
			),
			'auto'   =>false
		);

		$swiper_data = json_encode( $swiper_data );

		?>
		
		<div class="rt-related-post">			
			<div class="rt-swiper-slider related-post" data-xld = '<?php echo esc_attr( $swiper_data ); ?>'>
				<div class="section-title">
					<h3 class="related-title"><?php echo wp_kses( NeeonTheme::$options['related_title'] , 'alltext_allow' ); ?>
						<span class="titledot"></span>
						<span class="titleline"></span>
					</h3>				
					<div class="swiper-button">
		                <div class="swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
		                <div class="swiper-button-next"><i class="fas fa-chevron-right"></i></div>
		            </div>
	            </div>
				<div class="swiper-wrapper">
				<?php
					while ( $related_query->have_posts() ) {
					$related_query->the_post();
					$trimmed_title = wp_trim_words( get_the_title(), $title_length, '' );

					$id = get_the_ID();
					$content = get_the_content();
					$content = apply_filters( 'the_content', $content );
					$content = wp_trim_words( get_the_excerpt(), NeeonTheme::$options['post_content_limit'], '' );

				?>
					<div class="blog-box swiper-slide">
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
												$thumbnail = '<img class="wp-post-image" src="'.NEEON_IMG_URL.'noimage_551X431.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
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
							<h4 class="entry-title title-animation-black-normal"><a href="<?php the_permalink();?>"><?php echo esc_html( $trimmed_title ); ?></a></h4>
							<?php if ( NeeonTheme::$options['blog_date'] ) { ?>
							<div class="entry-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
		<?php
		wp_reset_postdata();
	}
}
?>
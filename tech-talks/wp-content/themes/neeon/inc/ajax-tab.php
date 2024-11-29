<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Neeon_Core;

use NeeonTheme;
use NeeonTheme_Helper;
use \WP_Query;  

/**
 * 
 */
class AjaxTab {
	
	function __construct()
	{
		/*neeon single scroll post*/
		add_action( 'wp_ajax_neeon_single_scroll_post', [$this, 'neeon_single_scroll_post'] ); 
		add_action( 'wp_ajax_nopriv_neeon_single_scroll_post', [$this, 'neeon_single_scroll_post'] );

    	/*neeon addon tab*/
		add_action( 'wp_ajax_rt_ajax_tab', [$this, 'rt_ajax_tab_ajax'] );
		add_action( 'wp_ajax_nopriv_rt_ajax_tab', [$this, 'rt_ajax_tab_ajax'] );
	}

	/*neeon single scroll post*/
	function neeon_single_scroll_post() {
		$current_post = isset( $_POST['current_post'] ) ? absint( $_POST['current_post'] ) : 1;
		$cat_ids = isset( $_POST['cat_ids'] ) ? explode( ',', $_POST['cat_ids'] ) : [];

		ob_start(); 

		$args = [
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 1, 
			'category__in' => $cat_ids, 
			'offset' => $current_post, 
			'ignore_sticky_posts' => 1,
		];

		$query = new WP_Query( $args );
		$temp = NeeonTheme_Helper::wp_set_temp_query( $query );

		global $withcomments; 
		$withcomments = true; 
		$nextUrl = null; 
		while ( $query->have_posts() ) {
			$query->the_post();	
			$nextUrl= get_the_permalink();
			get_template_part( 'template-parts/content-single', get_post_format() );
		}
		NeeonTheme_Helper::wp_reset_temp_query( $temp );
		$nextContent = ob_get_clean(); 
		wp_send_json_success( [
			'nextUrl' => $nextUrl,
			'nextContent'=> $nextContent
		] );
	}

	// Start ajax tab function
	function rt_ajax_tab_ajax() {
		$cat_id = isset( $_POST['cat_id'] ) ? $_POST['cat_id'] : null;
		$layout = isset( $_POST['layout'] ) ? $_POST['layout'] : null;
		$args = isset( $_POST['args'] ) ? $_POST['args'] : [];
		$data = null;
		if ( $layout == 1 ) { 
			$data = $this->rt_ajax_tab_one_main( $cat_id, $args );
		} else if ( $layout == 2 ) {
			$data = $this->rt_ajax_tab_two_main( $cat_id, $args );
		} else if ( $layout == 3 ) {
			$data = $this->rt_ajax_tab_three_main( $cat_id, $args );
		} else if ( $layout == 4 ) {
			$data = $this->rt_ajax_tab_four_main( $cat_id, $args );
		} else if ( $layout == 5 ) {
			$data = $this->rt_ajax_tab_five_main( $cat_id, $args );
		}
		
		wp_send_json_success( $data );
	}

	//Layout one
	function rt_ajax_tab_one( $cat_id = null, $data = [] ) {
		echo wp_kses( $this->rt_ajax_tab_one_main( $cat_id = null, $data ), 'alltext_allow');
	} 
	function rt_ajax_tab_one_main( $cat_id = null, $data = [] ) {
		ob_start();

		$neeon_has_entry_meta1  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'neeon_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'neeon_views' ) ) ? true : false;

		$neeon_has_entry_meta2  = ( $data['small_post_author'] == 'yes' || $data['small_post_date'] == 'yes' || $data['small_post_comment'] == 'yes' || $data['small_post_length'] == 'yes' && function_exists( 'neeon_reading_time' ) || $data['small_post_view'] == 'yes' && function_exists( 'neeon_views' ) ) ? true : false;

		$thumb_size = ( $data['image_thumb_size'] == 'thumb' ) ? 'neeon-size10' : 'full';

		$posts_not_in = isset( $data['posts_not_in'] ) ? $data['posts_not_in'] : [];
		$p_ids = array();
		foreach ( $posts_not_in as $p_idsn ) {
			$p_ids[] = $p_idsn['post_not_in'];
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit']['size'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'offset' 	 	 	=> $data['number_of_post_offset'],
			'ignore_sticky_posts' => $data['sticky_posts'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
		);

		if( $data['post_orderby'] == 'popular' ){
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			$args['meta_key'] = 'neeon_views';
		}

		$cat_ids = $data['catid'];
		if ( $cat_id ) {
			$cat_ids = [$cat_id];
		}
		if(!empty( $cat_ids )){
			$all_btn = ( $data['all_button'] == 'show' );
			if ( !$all_btn ) {
				$cat_ids = $cat_ids[0];
			}
			if( $data['query_type'] == 'category'){
			    $args['tax_query'] = [
			        [
			            'taxonomy' => 'category',
			            'field' => 'term_id',
			            'terms' =>  $cat_ids,                    
			        ],
			    ];

			}
		}
		if(!empty($data['postid'])){
			if( $data['query_type'] == 'posts'){
			    $args['post__in'] = $data['postid'];
			}
		}

		$query = new WP_Query( $args );
		$temp = NeeonTheme_Helper::wp_set_temp_query( $query );
		$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col']}";

		$i = $data['delay']; $j = $data['duration'];
			if ( $query->have_posts() ) {				
				while ( $query->have_posts() ) {
				$query->the_post();
				$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
				$neeon_comments_number = number_format_i18n( get_comments_number() );
				$neeon_comments_html = $neeon_comments_number == 1 ? esc_html__( 'Comment' , 'neeon' ) : esc_html__( 'Comments' , 'neeon' );
				$neeon_comments_html = '<span class="comment-number">'. $neeon_comments_number . '</span> ' . $neeon_comments_html;	
				$id = get_the_ID();
				$youtube_link = get_post_meta( get_the_ID(), 'neeon_youtube_link', true );
				$item_terms = get_the_terms( get_the_ID(), 'category' ); 
				$term_links = array(); 
				$terms_of_item = '';
				foreach ( $item_terms as $term ) {
					$terms_of_item .= 'tab-'.$term->slug . ' ';
				} 
			?>
		<div class="<?php echo esc_attr( $col_class ); ?>">
			<div class="rt-item rt-item-list <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
				<div class="rt-image">
				<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
					<div class="rt-video"><a class="rt-play <?php echo esc_attr( $data['small_video_layout'] );?> rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
				<?php } ?>
				<a href="<?php the_permalink(); ?>">
					<?php
						if ( has_post_thumbnail() ){
							the_post_thumbnail( $thumb_size );
						}
						else {
							if ( !empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
								echo wp_get_attachment_image( NeeonTheme::$options['no_preview_image']['id'], $thumb_size );
							}
							else {
								echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage_220X175.jpg' ) . '" alt="'.get_the_title().'">';
							}
						}
					?>
				</a>										
			</div>
			<div class="entry-content">
				<?php if ( $data['post_category'] == 'yes' ) { ?>
					<?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
					<div class="post-terms"><?php echo neeon_category_prepare(); ?></div>
					<?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
					<div class="post-terms rt-cat"><?php echo the_category( ', ' );?></div>
					<?php } elseif ( $data['cat_layout'] == 'cat_layout3' ) { ?>
					<div class="post-terms rt-cat rt-cat-3"><?php echo the_category();?></div>
					<?php } ?>
				<?php } ?>	
				<<?php echo esc_attr( $data['heading_tag'] ); ?> class="entry-title small-title <?php echo esc_attr( $data['under_line'] );?>"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></<?php echo esc_attr( $data['heading_tag'] ); ?>>
				<?php if ( $neeon_has_entry_meta1 ) { ?>
				<ul class="entry-meta">
					<?php if ( $data['post_author'] == 'yes' ) { ?>
					<li class="post-author"><?php esc_html_e( 'by ', 'neeon' );?><?php the_author_posts_link(); ?></li>
					<?php } if ( $data['post_date'] == 'yes' ) { ?>	
					<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>				
					<?php } if ( $data['post_comment'] == 'yes' ) { ?>
					<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $neeon_comments_html , 'alltext_allow' );?></a></li>
					<?php } if ( ( $data['post_length'] == 'yes' ) && function_exists( 'neeon_reading_time' ) ) { ?>
					<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo neeon_reading_time(); ?></li>
					<?php } if ( ( $data['post_view'] == 'yes' ) && function_exists( 'neeon_views' ) ) { ?>
					<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo neeon_views(); ?></span></li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
			</div>
		</div>	
		<?php  $i = $i + 0.2; $j = $j + 0.2; } ?>
		<?php } NeeonTheme_Helper::wp_reset_temp_query( $temp );

		return ob_get_clean(); 
	}

	//Layout two
	function rt_ajax_tab_two( $cat_id = null, $data = [] ) {
		echo wp_kses( $this->rt_ajax_tab_two_main( $cat_id = null, $data ), 'alltext_allow');
	} 
	function rt_ajax_tab_two_main( $cat_id = null, $data = [] ) {
		ob_start();

		$neeon_has_entry_meta1  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'neeon_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'neeon_views' ) ) ? true : false;

		$neeon_has_entry_meta2  = ( $data['small_post_author'] == 'yes' || $data['small_post_date'] == 'yes' || $data['small_post_comment'] == 'yes' || $data['small_post_length'] == 'yes' && function_exists( 'neeon_reading_time' ) || $data['small_post_view'] == 'yes' && function_exists( 'neeon_views' ) ) ? true : false;

		$thumb_size1 = ( $data['image_thumb_size'] == 'thumb' ) ? 'neeon-size3' : 'full';
		$thumb_size2 = ( $data['image_thumb_size'] == 'thumb' ) ? 'neeon-size10' : 'full';

		$posts_not_in = isset( $data['posts_not_in'] ) ? $data['posts_not_in'] : [];
		$p_ids = array();
		foreach ( $posts_not_in as $p_idsn ) {
			$p_ids[] = $p_idsn['post_not_in'];
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit']['size'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'offset' 	 	 	=> $data['number_of_post_offset'],
			'ignore_sticky_posts' => $data['sticky_posts'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
		);

		if( $data['post_orderby'] == 'popular' ){
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			$args['meta_key'] = 'neeon_views';
		}

		$cat_ids = $data['catid'];
		if ( $cat_id ) {
			$cat_ids = [$cat_id];
		}		
		if(!empty( $cat_ids )){
			$all_btn = ( $data['all_button'] == 'show' );
			if ( !$all_btn ) {
				$cat_ids = $cat_ids[0];
			}
			if( $data['query_type'] == 'category'){
			    $args['tax_query'] = [
			        [
			            'taxonomy' => 'category',
			            'field' => 'term_id',
			            'terms' =>  $cat_ids,                    
			        ],
			    ];

			}
		}
		if(!empty($data['postid'])){
			if( $data['query_type'] == 'posts'){
			    $args['post__in'] = $data['postid'];
			}
		}

		$query = new WP_Query( $args );
		$temp = NeeonTheme_Helper::wp_set_temp_query( $query );

		$count = 1; $i = $data['delay']; $j = $data['duration'];
			if ( $query->have_posts() ) {				
				while ( $query->have_posts() ) {
				$query->the_post();					

				$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
				$small_title = wp_trim_words( get_the_title(), $data['small_title_count'], '' );
				$neeon_comments_number = number_format_i18n( get_comments_number() );
				$neeon_comments_html = $neeon_comments_number == 1 ? esc_html__( 'Comment' , 'neeon' ) : esc_html__( 'Comments' , 'neeon' );
				$neeon_comments_html = '<span class="comment-number">'. $neeon_comments_number . '</span> ' . $neeon_comments_html;		

				$id = get_the_ID();
				$youtube_link = get_post_meta( get_the_ID(), 'neeon_youtube_link', true );
				?>

				<?php if ( $count == 1 ) { ?>
					<div class="col-lg-6">
						<div class="rt-item rt-item-left <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
							<div class="rt-image">
								<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
									<div class="rt-video"><a class="rt-play <?php echo esc_attr( $data['large_video_layout'] );?> rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
								<?php } ?>
								<a href="<?php the_permalink(); ?>">
									<?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( $thumb_size1 );
										}
										else {
											if ( !empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
												echo wp_get_attachment_image( NeeonTheme::$options['no_preview_image']['id'], $thumb_size1 );
											}
											else {
												echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage.jpg' ) . '" alt="'.get_the_title().'">';
											}
										}
									?>
								</a>
							</div>

							<div class="entry-content">
								<?php if ( $data['post_category'] == 'yes' ) { ?>
									<div class="post-terms"><?php echo neeon_category_prepare(); ?></div>
								<?php } ?>	
								<<?php echo esc_attr( $data['heading_tag'] ); ?> class="entry-title big-title title-animation-white-bold"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></<?php echo esc_attr( $data['heading_tag'] ); ?>>
								<?php if ( $neeon_has_entry_meta1 ) { ?>
								<ul class="entry-meta">
									<?php if ( $data['post_author'] == 'yes' ) { ?>
									<li class="post-author"><?php esc_html_e( 'by ', 'neeon' );?><?php the_author_posts_link(); ?></li>
									<?php } if ( $data['post_date'] == 'yes' ) { ?>	
									<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>				
									<?php } if ( $data['post_comment'] == 'yes' ) { ?>
									<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $neeon_comments_html , 'alltext_allow' );?></a></li>
									<?php } if ( ( $data['post_length'] == 'yes' ) && function_exists( 'neeon_reading_time' ) ) { ?>
									<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo neeon_reading_time(); ?></li>
									<?php } if ( ( $data['post_view'] == 'yes' ) && function_exists( 'neeon_views' ) ) { ?>
									<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo neeon_views(); ?></span></li>
									<?php } ?>
								</ul>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>

				<?php if ( $count == 2 ) { ?>
				<div class="col-lg-6">
					<div class="row <?php echo esc_attr( $data['item_space'] );?>">
				<?php } ?>

				<?php if ( $count > 1 ) { ?>
					<div class="col-12 <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
						<div class="rt-item rt-item-list">
							<div class="rt-image">
							<?php if ( ( $data['small_post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
								<div class="rt-video"><a class="rt-play <?php echo esc_attr( $data['small_video_layout'] );?> rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
							<?php } ?>
							<a href="<?php the_permalink(); ?>">
								<?php
									if ( has_post_thumbnail() ){
										the_post_thumbnail( $thumb_size2 );
									}
									else {
										if ( !empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
											echo wp_get_attachment_image( NeeonTheme::$options['no_preview_image']['id'], $thumb_size2 );
										}
										else {
											echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage_220X175.jpg' ) . '" alt="'.get_the_title().'">';
										}
									}
								?>
							</a>										
						</div>
						<div class="entry-content">
							<?php if ( $data['small_post_category'] == 'yes' ) { ?>
								<?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
								<div class="post-terms"><?php echo neeon_category_prepare(); ?></div>
								<?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
								<div class="post-terms rt-cat"><?php echo the_category( ', ' );?></div>
								<?php } elseif ( $data['cat_layout'] == 'cat_layout3' ) { ?>
								<div class="post-terms rt-cat rt-cat-3"><?php echo the_category();?></div>
								<?php } ?>
							<?php } ?>	
							<<?php echo esc_attr( $data['heading_tag'] ); ?> class="entry-title small-title <?php echo esc_attr( $data['under_line'] );?>"><a href="<?php the_permalink();?>"><?php echo esc_html( $small_title );?></a></<?php echo esc_attr( $data['heading_tag'] ); ?>>
							<?php if ( $neeon_has_entry_meta2 ) { ?>
							<ul class="entry-meta">
								<?php if ( $data['small_post_author'] == 'yes' ) { ?>
								<li class="post-author"><?php esc_html_e( 'by ', 'neeon' );?><?php the_author_posts_link(); ?></li>
								<?php } if ( $data['small_post_date'] == 'yes' ) { ?>	
								<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>				
								<?php } if ( $data['small_post_comment'] == 'yes' ) { ?>
								<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $neeon_comments_html , 'alltext_allow' );?></a></li>
								<?php } if ( ( $data['small_post_length'] == 'yes' ) && function_exists( 'neeon_reading_time' ) ) { ?>
								<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo neeon_reading_time(); ?></li>
								<?php } if ( ( $data['small_post_view'] == 'yes' ) && function_exists( 'neeon_views' ) ) { ?>
								<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo neeon_views(); ?></span></li>
								<?php } ?>
							</ul>
							<?php } ?>
						</div>
						</div>	
					</div>
				<?php } ?>
				<?php $count++; $i = $i + 0.2; $j = $j + 0.2; } ?>
					</div>
				</div>
		<?php } NeeonTheme_Helper::wp_reset_temp_query( $temp );

		return ob_get_clean(); 
	}

	//Layout three
	function rt_ajax_tab_three( $cat_id = null, $data = [] ) {
		echo wp_kses( $this->rt_ajax_tab_three_main( $cat_id = null, $data ), 'alltext_allow');
	} 
	function rt_ajax_tab_three_main( $cat_id = null, $data = [] ) {
		ob_start();

		$neeon_has_entry_meta1  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'neeon_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'neeon_views' ) ) ? true : false;
		$neeon_has_entry_meta2  = ( $data['small_post_author'] == 'yes' || $data['small_post_date'] == 'yes' || $data['small_post_comment'] == 'yes' || $data['small_post_length'] == 'yes' && function_exists( 'neeon_reading_time' ) || $data['small_post_view'] == 'yes' && function_exists( 'neeon_views' ) ) ? true : false;

		$thumb_size1 = ( $data['image_thumb_size'] == 'thumb' ) ? 'neeon-size5' : 'full';
		$thumb_size2 = ( $data['image_thumb_size'] == 'thumb' ) ? 'neeon-size10' : 'full';

		$posts_not_in = isset( $data['posts_not_in'] ) ? $data['posts_not_in'] : [];
		$p_ids = array();
		foreach ( $posts_not_in as $p_idsn ) {
			$p_ids[] = $p_idsn['post_not_in'];
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit']['size'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'offset' 	 	 	=> $data['number_of_post_offset'],
			'ignore_sticky_posts' => $data['sticky_posts'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
		);

		if( $data['post_orderby'] == 'popular' ){
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			$args['meta_key'] = 'neeon_views';
		}

		$cat_ids = $data['catid'];
		if ( $cat_id ) {
			$cat_ids = [$cat_id];
		}
		if(!empty( $cat_ids )){
			$all_btn = ( $data['all_button'] == 'show' );
			if ( !$all_btn ) {
				$cat_ids = $cat_ids[0];
			}
			if( $data['query_type'] == 'category'){
			    $args['tax_query'] = [
			        [
			            'taxonomy' => 'category',
			            'field' => 'term_id',
			            'terms' =>  $cat_ids,                    
			        ],
			    ];

			}
		}
		if(!empty($data['postid'])){
			if( $data['query_type'] == 'posts'){
			    $args['post__in'] = $data['postid'];
			}
		}

		$query = new WP_Query( $args );
		$temp = NeeonTheme_Helper::wp_set_temp_query( $query );

		$count = 1; $i = $data['delay']; $j = $data['duration'];
			if ( $query->have_posts() ) {				
				while ( $query->have_posts() ) {
				$query->the_post();					

				$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
				$small_title = wp_trim_words( get_the_title(), $data['small_title_count'], '' );
				$neeon_comments_number = number_format_i18n( get_comments_number() );
				$neeon_comments_html = $neeon_comments_number == 1 ? esc_html__( 'Comment' , 'neeon' ) : esc_html__( 'Comments' , 'neeon' );
				$neeon_comments_html = '<span class="comment-number">'. $neeon_comments_number . '</span> ' . $neeon_comments_html;		

				$id = get_the_ID();
				$youtube_link = get_post_meta( get_the_ID(), 'neeon_youtube_link', true );
				?>

				<?php if ( $count == 1 ) { ?>
					<div class="col-lg-7">
						<div class="rt-item rt-item-left <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
							<div class="rt-image">
								<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
									<div class="rt-video"><a class="rt-play <?php echo esc_attr( $data['large_video_layout'] );?> rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
								<?php } ?>
								<a href="<?php the_permalink(); ?>">
									<?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( $thumb_size1 );
										}
										else {
											if ( !empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
												echo wp_get_attachment_image( NeeonTheme::$options['no_preview_image']['id'], $thumb_size1 );
											}
											else {
												echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage.jpg' ) . '" alt="'.get_the_title().'">';
											}
										}
									?>
								</a>
							</div>

							<div class="entry-content">
								<?php if ( $data['post_category'] == 'yes' ) { ?>
									<div class="post-terms"><?php echo neeon_category_prepare(); ?></div>
								<?php } ?>		
								<<?php echo esc_attr( $data['heading_tag'] ); ?> class="entry-title big-title title-animation-white-bold"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></<?php echo esc_attr( $data['heading_tag'] ); ?>>
								<?php if ( $neeon_has_entry_meta1 ) { ?>
								<ul class="entry-meta">
									<?php if ( $data['post_author'] == 'yes' ) { ?>
									<li class="post-author"><?php esc_html_e( 'by ', 'neeon' );?><?php the_author_posts_link(); ?></li>
									<?php } if ( $data['post_date'] == 'yes' ) { ?>	
									<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>				
									<?php } if ( $data['post_comment'] == 'yes' ) { ?>
									<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $neeon_comments_html , 'alltext_allow' );?></a></li>
									<?php } if ( ( $data['post_length'] == 'yes' ) && function_exists( 'neeon_reading_time' ) ) { ?>
									<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo neeon_reading_time(); ?></li>
									<?php } if ( ( $data['post_view'] == 'yes' ) && function_exists( 'neeon_views' ) ) { ?>
									<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo neeon_views(); ?></span></li>
									<?php } ?>
								</ul>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>

				<?php if ( $count == 2 ) { ?>
					<div class="col-lg-5">
					<div class="row number-counter <?php echo esc_attr( $data['item_space'] );?>">
				<?php } ?>

				<?php if ( $count > 1 ) { ?>
					<div class="col-12 <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
						<div class="rt-item rt-item-list">
							<div class="entry-content">
								<?php if ( $data['small_post_category'] == 'yes' ) { ?>
									<?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
									<div class="post-terms"><?php echo neeon_category_prepare(); ?></div>
									<?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
									<div class="post-terms rt-cat"><?php echo the_category( ', ' );?></div>
									<?php } elseif ( $data['cat_layout'] == 'cat_layout3' ) { ?>
									<div class="post-terms rt-cat rt-cat-3"><?php echo the_category();?></div>
									<?php } ?>
								<?php } ?>	
								<<?php echo esc_attr( $data['heading_tag'] ); ?> class="entry-title small-title <?php echo esc_attr( $data['under_line'] );?>"><a href="<?php the_permalink();?>"><?php echo esc_html( $small_title );?></a></<?php echo esc_attr( $data['heading_tag'] ); ?>>
								<?php if ( $neeon_has_entry_meta2 ) { ?>
								<ul class="entry-meta">
									<?php if ( $data['small_post_author'] == 'yes' ) { ?>
									<li class="post-author"><?php esc_html_e( 'by ', 'neeon' );?><?php the_author_posts_link(); ?></li>
									<?php } if ( $data['small_post_date'] == 'yes' ) { ?>	
									<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>				
									<?php } if ( $data['small_post_comment'] == 'yes' ) { ?>
									<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $neeon_comments_html , 'alltext_allow' );?></a></li>
									<?php } if ( ( $data['small_post_length'] == 'yes' ) && function_exists( 'neeon_reading_time' ) ) { ?>
									<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo neeon_reading_time(); ?></li>
									<?php } if ( ( $data['small_post_view'] == 'yes' ) && function_exists( 'neeon_views' ) ) { ?>
									<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo neeon_views(); ?></span></li>
									<?php } ?>
								</ul>
								<?php } ?>
							</div>
							<div class="rt-image">
								<?php if ( ( $data['small_post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
									<div class="rt-video"><a class="rt-play <?php echo esc_attr( $data['small_video_layout'] );?> rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
								<?php } ?>
								<a href="<?php the_permalink(); ?>">
									<?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( $thumb_size2 );
										}
										else {
											if ( !empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
												echo wp_get_attachment_image( NeeonTheme::$options['no_preview_image']['id'], $thumb_size2 );
											}
											else {
												echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage_220X175.jpg' ) . '" alt="'.get_the_title().'">';
											}
										}
									?>
								</a>										
							</div>
						</div>	
					</div>
				<?php } ?>
			<?php  $count++; $i = $i + 0.2; $j = $j + 0.2; } ?>
			</div>
			</div>
		<?php } NeeonTheme_Helper::wp_reset_temp_query( $temp );

		return ob_get_clean(); 
	}

	//Layout four
	function rt_ajax_tab_four( $cat_id = null, $data = [] ) {
		echo wp_kses( $this->rt_ajax_tab_four_main( $cat_id = null, $data ), 'alltext_allow');
	} 
	function rt_ajax_tab_four_main( $cat_id = null, $data = [] ) {
		ob_start();

		$neeon_has_entry_meta1  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'neeon_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'neeon_views' ) ) ? true : false;
		$neeon_has_entry_meta2  = ( $data['small_post_author'] == 'yes' || $data['small_post_date'] == 'yes' || $data['small_post_comment'] == 'yes' || $data['small_post_length'] == 'yes' && function_exists( 'neeon_reading_time' ) || $data['small_post_view'] == 'yes' && function_exists( 'neeon_views' ) ) ? true : false;

		$thumb_size1 = ( $data['image_thumb_size'] == 'thumb' ) ? 'neeon-size5' : 'full';
		$thumb_size2 = ( $data['image_thumb_size'] == 'thumb' ) ? 'neeon-size10' : 'full';

		$posts_not_in = isset( $data['posts_not_in'] ) ? $data['posts_not_in'] : [];
		$p_ids = array();
		foreach ( $posts_not_in as $p_idsn ) {
			$p_ids[] = $p_idsn['post_not_in'];
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit']['size'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'offset' 	 	 	=> $data['number_of_post_offset'],
			'ignore_sticky_posts' => $data['sticky_posts'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
		);

		if( $data['post_orderby'] == 'popular' ){
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			$args['meta_key'] = 'neeon_views';
		}

		$cat_ids = $data['catid'];
		if ( $cat_id ) {
			$cat_ids = [$cat_id];
		}
		if(!empty( $cat_ids )){
			$all_btn = ( $data['all_button'] == 'show' );
			if ( !$all_btn ) {
				$cat_ids = $cat_ids[0];
			}
			if( $data['query_type'] == 'category'){
			    $args['tax_query'] = [
			        [
			            'taxonomy' => 'category',
			            'field' => 'term_id',
			            'terms' =>  $cat_ids,                    
			        ],
			    ];

			}
		}
		if(!empty($data['postid'])){
			if( $data['query_type'] == 'posts'){
			    $args['post__in'] = $data['postid'];
			}
		}

		$query = new WP_Query( $args );
		$temp = NeeonTheme_Helper::wp_set_temp_query( $query );

		$count = 1; $i = $data['delay']; $j = $data['duration'];
			if ( $query->have_posts() ) {				
				while ( $query->have_posts() ) {
				$query->the_post();					

				$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
				$small_title = wp_trim_words( get_the_title(), $data['small_title_count'], '' );
				$neeon_comments_number = number_format_i18n( get_comments_number() );
				$neeon_comments_html = $neeon_comments_number == 1 ? esc_html__( 'Comment' , 'neeon' ) : esc_html__( 'Comments' , 'neeon' );
				$neeon_comments_html = '<span class="comment-number">'. $neeon_comments_number . '</span> ' . $neeon_comments_html;		

				$id = get_the_ID();
				$youtube_link = get_post_meta( get_the_ID(), 'neeon_youtube_link', true );
				?>

				<?php if ( $count == 1 ) { ?>
					<div class="col-lg-4">
						<div class="rt-item rt-item-left <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
							<div class="rt-image">
								<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
									<div class="rt-video"><a class="rt-play <?php echo esc_attr( $data['large_video_layout'] );?> rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
								<?php } ?>
								<a href="<?php the_permalink(); ?>">
									<?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( $thumb_size1 );
										}
										else {
											if ( !empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
												echo wp_get_attachment_image( NeeonTheme::$options['no_preview_image']['id'], $thumb_size1 );
											}
											else {
												echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage_537X512.jpg' ) . '" alt="'.get_the_title().'">';
											}
										}
									?>
								</a>
							</div>

							<div class="entry-content">
								<?php if ( $data['post_category'] == 'yes' ) { ?>
									<div class="post-terms"><?php echo neeon_category_prepare(); ?></div>
								<?php } ?>	
								<<?php echo esc_attr( $data['heading_tag'] ); ?> class="entry-title big-title title-animation-white-bold"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></<?php echo esc_attr( $data['heading_tag'] ); ?>>
								<?php if ( $neeon_has_entry_meta1 ) { ?>
								<ul class="entry-meta">
									<?php if ( $data['post_author'] == 'yes' ) { ?>
									<li class="post-author"><?php esc_html_e( 'by ', 'neeon' );?><?php the_author_posts_link(); ?></li>
									<?php } if ( $data['post_date'] == 'yes' ) { ?>	
									<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>				
									<?php } if ( $data['post_comment'] == 'yes' ) { ?>
									<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $neeon_comments_html , 'alltext_allow' );?></a></li>
									<?php } if ( ( $data['post_length'] == 'yes' ) && function_exists( 'neeon_reading_time' ) ) { ?>
									<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo neeon_reading_time(); ?></li>
									<?php } if ( ( $data['post_view'] == 'yes' ) && function_exists( 'neeon_views' ) ) { ?>
									<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo neeon_views(); ?></span></li>
									<?php } ?>
								</ul>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>

				<?php if ( $count == 2  ) { ?>
					<div class="col-lg-8">
						<div class="row <?php echo esc_attr( $data['item_space'] );?>">
							<?php } ?>

							<?php if ( $count > 1 && $count < 5 ) { ?>
							<div class="col-lg-6">
								<div class="col-12 <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
									<div class="rt-item rt-item-list">
										<div class="rt-image">
										<?php if ( ( $data['small_post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
											<div class="rt-video"><a class="rt-play <?php echo esc_attr( $data['small_video_layout'] );?> rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
											<?php } ?>
											<a href="<?php the_permalink(); ?>">
												<?php
													if ( has_post_thumbnail() ){
														the_post_thumbnail( $thumb_size2 );
													}
													else {
														if ( !empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
															echo wp_get_attachment_image( NeeonTheme::$options['no_preview_image']['id'], $thumb_size2 );
														}
														else {
															echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage_220X175.jpg' ) . '" alt="'.get_the_title().'">';
														}
													}
												?>
											</a>										
										</div>
										<div class="entry-content">
											<?php if ( $data['small_post_category'] == 'yes' ) { ?>
												<?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
												<div class="post-terms"><?php echo neeon_category_prepare(); ?></div>
												<?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
												<div class="post-terms rt-cat"><?php echo the_category( ', ' );?></div>
												<?php } elseif ( $data['cat_layout'] == 'cat_layout3' ) { ?>
												<div class="post-terms rt-cat rt-cat-3"><?php echo the_category();?></div>
												<?php } ?>
											<?php } ?>	
											<<?php echo esc_attr( $data['heading_tag'] ); ?> class="entry-title small-title <?php echo esc_attr( $data['under_line'] );?>"><a href="<?php the_permalink();?>"><?php echo esc_html( $small_title );?></a></<?php echo esc_attr( $data['heading_tag'] ); ?>>
											<?php if ( $neeon_has_entry_meta2 ) { ?>
											<ul class="entry-meta">
												<?php if ( $data['small_post_author'] == 'yes' ) { ?>
												<li class="post-author"><?php esc_html_e( 'by ', 'neeon' );?><?php the_author_posts_link(); ?></li>
												<?php } if ( $data['small_post_date'] == 'yes' ) { ?>	
												<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>				
												<?php } if ( $data['small_post_comment'] == 'yes' ) { ?>
												<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $neeon_comments_html , 'alltext_allow' );?></a></li>
												<?php } if ( ( $data['small_post_length'] == 'yes' ) && function_exists( 'neeon_reading_time' ) ) { ?>
												<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo neeon_reading_time(); ?></li>
												<?php } if ( ( $data['small_post_view'] == 'yes' ) && function_exists( 'neeon_views' ) ) { ?>
												<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo neeon_views(); ?></span></li>
												<?php } ?>
											</ul>
											<?php } ?>
										</div>
									</div>	
								</div>
							</div>
							<?php } elseif ( $count > 4 ) { ?>
								<div class="col-lg-6">
									<div class="col-12 <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
										<div class="rt-item rt-item-list">
											<div class="rt-image">
												<?php if ( ( $data['small_post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
													<div class="rt-video"><a class="rt-play <?php echo esc_attr( $data['small_video_layout'] );?> rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
												<?php } ?>
												<a href="<?php the_permalink(); ?>">
													<?php
														if ( has_post_thumbnail() ){
															the_post_thumbnail( $thumb_size2 );
														}
														else {
															if ( !empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
																echo wp_get_attachment_image( NeeonTheme::$options['no_preview_image']['id'], $thumb_size2 );
															}
															else {
																echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage_220X175.jpg' ) . '" alt="'.get_the_title().'">';
															}
														}
													?>
												</a>										
											</div>
											<div class="entry-content">
												<?php if ( $data['small_post_category'] == 'yes' ) { ?>
													<?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
													<div class="post-terms"><?php echo neeon_category_prepare(); ?></div>
													<?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
													<div class="post-terms rt-cat"><?php echo the_category( ', ' );?></div>
													<?php } elseif ( $data['cat_layout'] == 'cat_layout3' ) { ?>
													<div class="post-terms rt-cat rt-cat-3"><?php echo the_category();?></div>
													<?php } ?>
												<?php } ?>	
												<<?php echo esc_attr( $data['heading_tag'] ); ?> class="entry-title small-title <?php echo esc_attr( $data['under_line'] );?>"><a href="<?php the_permalink();?>"><?php echo esc_html( $small_title );?></a></<?php echo esc_attr( $data['heading_tag'] ); ?>>
												<?php if ( $neeon_has_entry_meta2 ) { ?>
												<ul class="entry-meta">
													<?php if ( $data['small_post_author'] == 'yes' ) { ?>
													<li class="post-author"><?php esc_html_e( 'by ', 'neeon' );?><?php the_author_posts_link(); ?></li>
													<?php } if ( $data['small_post_date'] == 'yes' ) { ?>	
													<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>				
													<?php } if ( $data['small_post_comment'] == 'yes' ) { ?>
													<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $neeon_comments_html , 'alltext_allow' );?></a></li>
													<?php } if ( ( $data['small_post_length'] == 'yes' ) && function_exists( 'neeon_reading_time' ) ) { ?>
													<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo neeon_reading_time(); ?></li>
													<?php } if ( ( $data['small_post_view'] == 'yes' ) && function_exists( 'neeon_views' ) ) { ?>
													<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo neeon_views(); ?></span></li>
													<?php } ?>
												</ul>
												<?php } ?>
											</div>
										</div>	
									</div>
								</div>
								<?php } ?>								
							<?php  $count++; $i = $i + 0.2; $j = $j + 0.2; } ?>
						</div>
					</div>
		<?php } NeeonTheme_Helper::wp_reset_temp_query( $temp );
		return ob_get_clean(); 
	}

	//Layout Five
	function rt_ajax_tab_five( $cat_id = null, $data = [] ) {
		echo wp_kses( $this->rt_ajax_tab_five_main( $cat_id = null, $data ), 'alltext_allow');
	} 
	function rt_ajax_tab_five_main( $cat_id = null, $data = [] ) {
		ob_start();

		$neeon_has_entry_meta1  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'neeon_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'neeon_views' ) ) ? true : false;

		$neeon_has_entry_meta2  = ( $data['small_post_author'] == 'yes' || $data['small_post_date'] == 'yes' || $data['small_post_comment'] == 'yes' || $data['small_post_length'] == 'yes' && function_exists( 'neeon_reading_time' ) || $data['small_post_view'] == 'yes' && function_exists( 'neeon_views' ) ) ? true : false;

		$thumb_size1 = ( $data['image_thumb_size'] == 'thumb' ) ? 'neeon-size3' : 'full';
		$thumb_size2 = ( $data['image_thumb_size'] == 'thumb' ) ? 'neeon-size10' : 'full';

		$posts_not_in = isset( $data['posts_not_in'] ) ? $data['posts_not_in'] : [];
		$p_ids = array();
		foreach ( $posts_not_in as $p_idsn ) {
			$p_ids[] = $p_idsn['post_not_in'];
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit']['size'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'offset' 	 	 	=> $data['number_of_post_offset'],
			'ignore_sticky_posts' => $data['sticky_posts'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
		);

		if( $data['post_orderby'] == 'popular' ){
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			$args['meta_key'] = 'neeon_views';
		}

		$cat_ids = $data['catid'];
		if ( $cat_id ) {
			$cat_ids = [$cat_id];
		}		
		if(!empty( $cat_ids )){
			$all_btn = ( $data['all_button'] == 'show' );
			if ( !$all_btn ) {
				$cat_ids = $cat_ids[0];
			}
			if( $data['query_type'] == 'category'){
			    $args['tax_query'] = [
			        [
			            'taxonomy' => 'category',
			            'field' => 'term_id',
			            'terms' =>  $cat_ids,                    
			        ],
			    ];

			}
		}
		if(!empty($data['postid'])){
			if( $data['query_type'] == 'posts'){
			    $args['post__in'] = $data['postid'];
			}
		}

		$query = new WP_Query( $args );
		$temp = NeeonTheme_Helper::wp_set_temp_query( $query );

		$count = 1; $i = $data['delay']; $j = $data['duration'];
			if ( $query->have_posts() ) {				
				while ( $query->have_posts() ) {
				$query->the_post();					

				$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
				$small_title = wp_trim_words( get_the_title(), $data['small_title_count'], '' );
				$neeon_comments_number = number_format_i18n( get_comments_number() );
				$neeon_comments_html = $neeon_comments_number == 1 ? esc_html__( 'Comment' , 'neeon' ) : esc_html__( 'Comments' , 'neeon' );
				$neeon_comments_html = '<span class="comment-number">'. $neeon_comments_number . '</span> ' . $neeon_comments_html;		

				$id = get_the_ID();
				$youtube_link = get_post_meta( get_the_ID(), 'neeon_youtube_link', true );
				?>

				<?php if ( $count == 1 ) { ?>
					<div class="col-lg-6">
						<div class="rt-item rt-item-box <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
							<div class="rt-image">
								<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
									<div class="rt-video"><a class="rt-play <?php echo esc_attr( $data['large_video_layout'] );?> rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
								<?php } ?>
								<a href="<?php the_permalink(); ?>">
									<?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( $thumb_size1 );
										}
										else {
											if ( !empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
												echo wp_get_attachment_image( NeeonTheme::$options['no_preview_image']['id'], $thumb_size1 );
											}
											else {
												echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage.jpg' ) . '" alt="'.get_the_title().'">';
											}
										}
									?>
								</a>
							</div>

							<div class="entry-content">
								<?php if ( $data['post_category'] == 'yes' ) { ?>
									<div class="post-terms"><?php echo neeon_category_prepare(); ?></div>
								<?php } ?>	
								<<?php echo esc_attr( $data['heading_tag'] ); ?> class="entry-title big-title title-animation-black-bold"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></<?php echo esc_attr( $data['heading_tag'] ); ?>>
								<?php if ( $neeon_has_entry_meta1 ) { ?>
								<ul class="entry-meta">
									<?php if ( $data['post_author'] == 'yes' ) { ?>
									<li class="post-author"><?php esc_html_e( 'by ', 'neeon' );?><?php the_author_posts_link(); ?></li>
									<?php } if ( $data['post_date'] == 'yes' ) { ?>	
									<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>				
									<?php } if ( $data['post_comment'] == 'yes' ) { ?>
									<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $neeon_comments_html , 'alltext_allow' );?></a></li>
									<?php } if ( ( $data['post_length'] == 'yes' ) && function_exists( 'neeon_reading_time' ) ) { ?>
									<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo neeon_reading_time(); ?></li>
									<?php } if ( ( $data['post_view'] == 'yes' ) && function_exists( 'neeon_views' ) ) { ?>
									<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo neeon_views(); ?></span></li>
									<?php } ?>
								</ul>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>

				<?php if ( $count == 2 ) { ?>
				<div class="col-lg-6">
					<div class="row <?php echo esc_attr( $data['item_space'] );?>">
				<?php } ?>

				<?php if ( $count > 1 ) { ?>
					<div class="col-12 <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1.2s" data-wow-duration="0.5s">
						<div class="rt-item rt-item-list">
							<div class="rt-image">
							<?php if ( ( $data['small_post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
								<div class="rt-video"><a class="rt-play <?php echo esc_attr( $data['small_video_layout'] );?> rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
							<?php } ?>
							<a href="<?php the_permalink(); ?>">
								<?php
									if ( has_post_thumbnail() ){
										the_post_thumbnail( $thumb_size2 );
									}
									else {
										if ( !empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
											echo wp_get_attachment_image( NeeonTheme::$options['no_preview_image']['id'], $thumb_size2 );
										}
										else {
											echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage_220X175.jpg' ) . '" alt="'.get_the_title().'">';
										}
									}
								?>
							</a>										
						</div>
						<div class="entry-content">
							<?php if ( $data['small_post_category'] == 'yes' ) { ?>
								<?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
								<div class="post-terms"><?php echo neeon_category_prepare(); ?></div>
								<?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
								<div class="post-terms rt-cat"><?php echo the_category( ', ' );?></div>
								<?php } elseif ( $data['cat_layout'] == 'cat_layout3' ) { ?>
								<div class="post-terms rt-cat rt-cat-3"><?php echo the_category();?></div>
								<?php } ?>
							<?php } ?>	
							<<?php echo esc_attr( $data['heading_tag'] ); ?> class="entry-title small-title <?php echo esc_attr( $data['under_line'] );?>"><a href="<?php the_permalink();?>"><?php echo esc_html( $small_title );?></a></<?php echo esc_attr( $data['heading_tag'] ); ?>>
							<?php if ( $neeon_has_entry_meta2 ) { ?>
							<ul class="entry-meta">
								<?php if ( $data['small_post_author'] == 'yes' ) { ?>
								<li class="post-author"><?php esc_html_e( 'by ', 'neeon' );?><?php the_author_posts_link(); ?></li>
								<?php } if ( $data['small_post_date'] == 'yes' ) { ?>	
								<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>				
								<?php } if ( $data['small_post_comment'] == 'yes' ) { ?>
								<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $neeon_comments_html , 'alltext_allow' );?></a></li>
								<?php } if ( ( $data['small_post_length'] == 'yes' ) && function_exists( 'neeon_reading_time' ) ) { ?>
								<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo neeon_reading_time(); ?></li>
								<?php } if ( ( $data['small_post_view'] == 'yes' ) && function_exists( 'neeon_views' ) ) { ?>
								<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo neeon_views(); ?></span></li>
								<?php } ?>
							</ul>
							<?php } ?>
						</div>
						</div>	
					</div>
				<?php } ?>
				<?php $count++; $i = $i + 0.2; $j = $j + 0.2; } ?>
					</div>
				</div>
		<?php } NeeonTheme_Helper::wp_reset_temp_query( $temp );

		return ob_get_clean(); 
	}
}

new AjaxTab();
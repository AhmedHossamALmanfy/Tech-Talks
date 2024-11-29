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
class AjaxLoadMore {
	
	function __construct()
	{
		add_action( 'wp_ajax_load_more_blog', array(&$this, 'neeon_load_more_func' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog', array(&$this, 'neeon_load_more_func' ));

    	add_action( 'wp_ajax_load_more_list_one', array(&$this, 'neeon_list_one_load_more_func' ));
    	add_action( 'wp_ajax_nopriv_load_more_list_one', array(&$this, 'neeon_list_one_load_more_func' ));

    	add_action( 'wp_ajax_load_more_list_five', array(&$this, 'neeon_list_five_load_more_func' ));
    	add_action( 'wp_ajax_nopriv_load_more_list_five', array(&$this, 'neeon_list_five_load_more_func' ));

    	add_action( 'wp_ajax_load_more_grid_one', array(&$this, 'neeon_grid_one_load_more_func' ));
    	add_action( 'wp_ajax_nopriv_load_more_grid_one', array(&$this, 'neeon_grid_one_load_more_func' ));
	}

	/* - Ajax Loadmore Function for Bolg Layout 1
	--------------------------------------------------------*/
	public function neeon_load_more_func() {

	    $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
	    $load_more_limit =  NeeonTheme::$options['load_more_limit'];

		query_posts(array(
			'post_type' => 'post',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $page,
			'post__not_in' => get_option( 'sticky_posts')
		)); 

		$ul_class = $post_classes = '';

		$thumb_size = 'neeon-size4';

		$neeon_has_entry_meta  = ( NeeonTheme::$options['blog_date'] || NeeonTheme::$options['blog_author_name'] || NeeonTheme::$options['blog_comment_num'] || NeeonTheme::$options['blog_length'] && function_exists( 'neeon_reading_time' ) || NeeonTheme::$options['blog_view'] && function_exists( 'neeon_views' ) ) ? true : false;

		$neeon_comments_number = number_format_i18n( get_comments_number() );
		$neeon_comments_html = $neeon_comments_number == 1 ? esc_html__( 'Comment' , 'neeon' ) : esc_html__( 'Comments' , 'neeon' );
		$neeon_comments_html = '<span class="comment-number">'. $neeon_comments_number .'</span> ' . $neeon_comments_html;

		$thumbnail = false;

		$wow = NeeonTheme::$options['blog_animation'];
		$effect = NeeonTheme::$options['blog_animation_effect'];

		if (  NeeonTheme::$layout == 'right-sidebar' || NeeonTheme::$layout == 'right-sidebar' ){
			$post_classes = array( 'col-md-6 col-sm-6 col-12 blog-layout-1 ' . $wow . ' ' . $effect );
			$ul_class = 'side_bar';
		} else {
			$post_classes = array( 'col-lg-6 col-md-6 col-12 blog-layout-1 ' . $wow . ' ' . $effect );
			$ul_class = '';
		}

		if ( empty( has_post_thumbnail() ) ) {
			$img_class ='no-image';
		}else {
			$img_class ='show-image';
		}

		if( NeeonTheme::$options['display_no_preview_image'] == '1' ) {
			$preview = 'show-preview';
		}else {
			$preview = 'no-preview';
		}

		if( NeeonTheme::$options['image_blend'] == 'normal' ) {
			$blend = 'normal';
		}else {
			$blend = 'blend';
		}

		$id = get_the_ID();
		$youtube_link = get_post_meta( get_the_ID(), 'neeon_youtube_link', true );

	    if(have_posts()) : while(have_posts()) : the_post();
	    ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?> data-wow-duration="1.5s">
			<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
				<div class="blog-img-holder">
					<div class="blog-img <?php echo esc_attr($blend); ?>">
						<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
							<div class="rt-video"><a class="rt-play play-btn-white-lg rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
						<?php } ?>
						<a href="<?php the_permalink(); ?>" class="img-opacity-hover"><?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail( $thumb_size, ['class' => 'img-responsive'] ); ?>
								<?php } else {
								if ( NeeonTheme::$options['display_no_preview_image'] == '1' ) {
									if ( !empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
										$thumbnail = wp_get_attachment_image( NeeonTheme::$options['no_preview_image']['id'], $thumb_size );						
									}
									elseif ( empty( NeeonTheme::$options['no_preview_image']['id'] ) ) {
										$thumbnail = '<img class="wp-post-image" src="'.NEEON_IMG_URL.'noimage_480X504.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
									}
									echo wp_kses( $thumbnail , 'alltext_allow' );
								}
							}
							?>
						</a>
					</div>
				</div>
				<div class="entry-content">
					<?php if ( NeeonTheme::$options['blog_cats'] ) { ?>
						<span class="entry-categories"><?php echo neeon_category_prepare(); ?></span>
					<?php } ?>	
					<h3 class="entry-title title-animation-white-bold"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
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
						<li><span class="post-views meta-item "><i class="fas fa-signal"></i><?php echo neeon_views(); ?></span></li>
						<?php } ?>
					</ul>
					<?php } ?>			
				</div>
			</div>
		</div> 

	    <?php endwhile; endif;
	      wp_reset_query();
	      die();
	}

	/* - Ajax Loadmore Function for addon list layout 01
	--------------------------------------------------------*/
	public function neeon_list_one_load_more_func() {
		$data = $_POST['query_data'] ;
		$page_number = isset( $_POST['pageNumber'] ) ? $_POST['pageNumber'] : 0 ;

		$neeon_has_entry_meta  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'neeon_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'neeon_views' ) ) ? true : false;

		$thumb_size = ( $data['image_thumb_size'] == 'thumb' ) ? 'neeon-size3' : 'full';

		$p_ids = array();
		if(!empty($data['posts_not_in'])){
			foreach ( $data['posts_not_in'] as $p_idsn ) {
				$p_ids[] = $p_idsn['post_not_in'];
			}
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'paged'				=> $page_number,
		);

		if( $data['post_orderby'] == 'popular' ){
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			$args['meta_key'] = 'neeon_views';
		}
		
		if(!empty($data['number_of_post_offset']) && $offset = absint($data['number_of_post_offset'])){
			$args['offset'] = $offset;
		}

		if(!empty($data['catid'])){
			if( $data['query_type'] == 'category'){
			    $args['tax_query'] = [
			        [
			            'taxonomy' => 'category',
			            'field' => 'term_id',
			            'terms' => $data['catid'],                    
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
		?>
		<?php $i = $data['delay']; $j = $data['duration']; 
			if ( $query->have_posts() ) :
				?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php

				$content = NeeonTheme_Helper::get_current_post_content();
				$content = wp_trim_words( get_the_excerpt(), $data['count'], '.' );
				$content = "<p>$content</p>";
				$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
				
				$neeon_comments_number = number_format_i18n( get_comments_number() );
				$neeon_comments_html = $neeon_comments_number == 1 ? esc_html__( 'Comment' , 'neeon' ) : esc_html__( 'Comments' , 'neeon' );
				$neeon_comments_html = '<span class="comment-number">'. $neeon_comments_number . '</span> ' . $neeon_comments_html;			

				$id = get_the_ID();
				$youtube_link = get_post_meta( get_the_ID(), 'neeon_youtube_link', true );

				?>
				<div class="<?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
					<div class="rt-item <?php echo esc_attr( $data['list_border'] );?>">
						<div class="rt-image">
							<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
								<div class="rt-video"><a class="rt-play <?php echo esc_attr( $data['video_layout'] );?> rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
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
											echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage_551X431.jpg' ) . '" alt="'.get_the_title().'">';
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
							<<?php echo esc_attr( $data['heading_tag'] ); ?> class="entry-title title-animation-black-bold"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></<?php echo esc_attr( $data['heading_tag'] ); ?>>
							<?php if ( $data['content_display'] == 'yes' ) { ?>
								<div class="post_excerpt"><?php echo wp_kses_post( $content );?></div>
							<?php } ?>
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
							<?php if ( $data['post_read'] == 'yes' ) { ?>
							<div class="post-read-more"><a class="button-style-1 btn-common rt-animation-out" href="<?php the_permalink();?>"><?php echo wp_kses_post( $data['read_more_text'] ); ?><?php echo radius_arrow_shape(); ?></a>
					        </div>
					    	<?php } ?>
						</div>
					</div>
				</div>
			<?php $i = $i + 0.2; $j = $j + 0.1; endwhile;?>
		<?php endif; ?>
	<?php 
		wp_reset_postdata(); 
		wp_die();
	}


	/* - Ajax Loadmore Function for addon list layout 05
	--------------------------------------------------------*/
	public function neeon_list_five_load_more_func() {
		$data = $_POST['query_data'] ;
		$page_number = isset( $_POST['pageNumber'] ) ? $_POST['pageNumber'] : 0 ;

		$neeon_has_entry_meta  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'neeon_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'neeon_views' ) ) ? true : false;

		if( $data['image_size'] == 'size_one') {
			$thumb_size = ( $data['image_thumb_size'] == 'thumb' ) ? 'neeon-size11' : 'full';
		}else {
			$thumb_size = ( $data['image_thumb_size'] == 'thumb' ) ? 'neeon-size2' : 'full';
		}

		$p_ids = array();
		if(!empty($data['posts_not_in'])){
			foreach ( $data['posts_not_in'] as $p_idsn ) {
				$p_ids[] = $p_idsn['post_not_in'];
			}
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'paged'				=> $page_number,
		);

		if( $data['post_orderby'] == 'popular' ){
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			$args['meta_key'] = 'neeon_views';
		}

		if(!empty($data['number_of_post_offset']) && $offset = absint($data['number_of_post_offset'])){
			$args['offset'] = $offset;
		}

		if(!empty($data['catid'])){
			if( $data['query_type'] == 'category'){
			    $args['tax_query'] = [
			        [
			            'taxonomy' => 'category',
			            'field' => 'term_id',
			            'terms' => $data['catid'],                    
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

		?>
		<?php $i = $data['delay']; $j = $data['duration']; 
			if ( $query->have_posts() ) :?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php

				$content = NeeonTheme_Helper::get_current_post_content();
				$content = wp_trim_words( get_the_excerpt(), $data['count'], '.' );
				$content = "<p>$content</p>";
				$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
				
				$neeon_comments_number = number_format_i18n( get_comments_number() );
				$neeon_comments_html = $neeon_comments_number == 1 ? esc_html__( 'Comment' , 'neeon-core' ) : esc_html__( 'Comments' , 'neeon-core' );
				$neeon_comments_html = '<span class="comment-number">'. $neeon_comments_number . '</span> ' . $neeon_comments_html;

				$id = get_the_ID();
				$youtube_link = get_post_meta( get_the_ID(), 'neeon_youtube_link', true );

				?>

				<div class="<?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
					<div class="rt-item <?php echo esc_attr( $data['list_border'] );?>">
						<div class="rt-image">
							<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
								<div class="rt-video"><a class="rt-play <?php echo esc_attr( $data['video_layout'] );?> rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
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
											echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage_752X878.jpg' ) . '" alt="'.get_the_title().'">';
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
							<<?php echo esc_attr( $data['heading_tag'] ); ?> class="entry-title title-animation-black-bold"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></<?php echo esc_attr( $data['heading_tag'] ); ?>>
							<?php if ( $data['content_display'] == 'yes' ) { ?>
								<div class="post_excerpt"><?php echo wp_kses_post( $content );?></div>
							<?php } ?>
							<?php if ( $neeon_has_entry_meta ) { ?>
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
							<?php if ( $data['post_read'] == 'yes' ) { ?>
							<div class="post-read-more"><a class="button-style-1 btn-common rt-animation-out" href="<?php the_permalink();?>"><?php echo wp_kses_post( $data['read_more_text'] ); ?><?php echo radius_arrow_shape(); ?></a>
					        </div>
					    	<?php } ?>
						</div>
					</div>
				</div>
			<?php $i = $i + 0.2; $j = $j + 0.1; endwhile;?>
		<?php endif;?>
		<?php
		wp_reset_postdata(); 
		wp_die();

	}


	/* - Ajax Loadmore Function for addon post grid layout 01
	--------------------------------------------------------*/
	public function neeon_grid_one_load_more_func() {
		$data = $_POST['query_data'] ;
		$page_number = isset( $_POST['pageNumber'] ) ? $_POST['pageNumber'] : 0 ;

		$neeon_has_entry_meta  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'neeon_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'neeon_views' ) ) ? true : false;

		$thumb_size = ( $data['image_thumb_size'] == 'thumb' ) ? 'neeon-size3' : 'full';

		$p_ids = array();
		if(!empty($data['posts_not_in'])){
			foreach ( $data['posts_not_in'] as $p_idsn ) {
				$p_ids[] = $p_idsn['post_not_in'];
			}
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'paged'				=> $page_number,
		);

		if( $data['post_orderby'] == 'popular' ){
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			$args['meta_key'] = 'neeon_views';
		}

		if(!empty($data['number_of_post_offset']) && $offset = absint($data['number_of_post_offset'])){
			$args['offset'] = $offset;
		}

		if(!empty($data['catid'])){
			if( $data['query_type'] == 'category'){
			    $args['tax_query'] = [
			        [
			            'taxonomy' => 'category',
			            'field' => 'term_id',
			            'terms' => $data['catid'],                    
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
		$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col']}";
		?>
		
		<?php $i = $data['delay']; $j = $data['duration']; 
		if ( $query->have_posts() ) :?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
			<?php

			$content = NeeonTheme_Helper::get_current_post_content();
			$content = wp_trim_words( get_the_excerpt(), $data['count'], '.' );
			$content = "<p>$content</p>";
			$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
			
			$neeon_comments_number = number_format_i18n( get_comments_number() );
			$neeon_comments_html = $neeon_comments_number == 1 ? esc_html__( 'Comment' , 'neeon-core' ) : esc_html__( 'Comments' , 'neeon-core' );
			$neeon_comments_html = '<span class="comment-number">'. $neeon_comments_number . '</span> ' . $neeon_comments_html;

			$id = get_the_ID();
			$youtube_link = get_post_meta( get_the_ID(), 'neeon_youtube_link', true );

			?>
			<div class="<?php echo esc_attr( $col_class );?> <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
				<div class="rt-item">
					<div class="rt-image">
						<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
							<div class="rt-video"><a class="rt-play <?php echo esc_attr( $data['video_layout'] );?> rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
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
										echo '<img class="wp-post-image" src="' . NeeonTheme_Helper::get_img( 'noimage_551X431.jpg' ) . '" alt="'.get_the_title().'">';
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
							<?php } ?>
						<?php } ?>
						<<?php echo esc_attr( $data['heading_tag'] ); ?> class="entry-title title-animation-black-normal"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></<?php echo esc_attr( $data['heading_tag'] ); ?>>
						<?php if ( $data['content_display'] == 'yes' ) { ?>
							<div class="post_excerpt"><?php echo wp_kses_post( $content );?></div>
						<?php } ?>
						<?php if ( $neeon_has_entry_meta ) { ?>
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
		<?php $i = $i + 0.2; $j = $j + 0.1; endwhile;?>
		<?php endif;?>

		<?php
		wp_reset_postdata(); 
		wp_die();

	}
	
}

new AjaxLoadMore();
<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Magezix
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function magezix_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'magezix_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function magezix_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'magezix_pingback_header' );

/**
 * Category Badge With Color
 *
 * @return loop
 */
function magezix_category_name(){
    $catgorys = get_the_category();
    foreach( $catgorys as $key => $category):
		$meta = get_term_meta($category->term_id, 'magezix_cate_meta', true);

		$catColor = !empty( $meta['cate-color'] )? $meta['cate-color'] : '#ff184e';
        ?>
        <a class="post-cat cat-style-1 mb-20" style="background-color:<?php echo esc_attr($catColor);?>" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
        	<?php esc_html_e( '#', 'magezix' ); echo esc_html($category->cat_name); ?>
        </a>
    <?php endforeach;
}

/**
 * Category Badge Style Twor
 *
 * @return loop
 */
function magezix_category_badge_sm(){
    $catgorys = get_the_category();
    foreach( $catgorys as $key => $category):
		$meta = get_term_meta($category->term_id, 'magezix_cate_meta', true);

		$catColor = !empty( $meta['cate-color'] )? $meta['cate-color'] : '#ff184e';
        ?>
        <a class="post-cat post-cat--xs br-20" style="background-color:<?php echo esc_attr($catColor);?>" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
        	<?php echo esc_html($category->cat_name); ?>
        </a>
    <?php endforeach;
}
/**
 * Category Badge Style Round
 *
 * @return loop
 */
function magezix_category_badge_round(){
    $catgorys = get_the_category();
    foreach( $catgorys as $key => $category):
		$meta = get_term_meta($category->term_id, 'magezix_cate_meta', true);

		$catColor = !empty( $meta['cate-color'] )? $meta['cate-color'] : '#ff184e';
        ?>
        <a class="post-cat post-cat--xs br-20" style="background-color:<?php echo esc_attr($catColor);?>" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
        	<?php echo esc_html($category->cat_name); ?>
        </a>
    <?php endforeach;
}

/**
 * Category Badge Style Twor
 *
 * @return loop
 */
function magezix_category_badge_sm2(){
    $catgorys = get_the_category();
    foreach( $catgorys as $key => $category):
		$meta = get_term_meta($category->term_id, 'magezix_cate_meta', true);

		$catColor = !empty( $meta['cate-color'] )? $meta['cate-color'] : '#ff184e';
        ?>
        <a class="post-cat post-cat--sm cat-style-7 mb-10" style="background-color:<?php echo esc_attr($catColor);?>" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
        	<?php echo esc_html($category->cat_name); ?>
        </a>
    <?php endforeach;
}
/**
 * Category Item
 *
 * @return loop
 */
function magezix_category_pl(){
    $catgorys = get_the_category();
    foreach( $catgorys as $key => $category):
        ?>
        <a class="cat" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
        	<?php echo esc_html($category->cat_name); ?>
        </a>
    <?php endforeach;
}

/**
 * Authore Avater
 */
function magezix_main_author_avatars($size) {
    echo get_avatar(get_the_author_meta('email'), $size);
}

add_action('genesis_entry_header', 'magezix_post_author_avatars');

/**
 * Post Read Time
 */
function magezix_reading_time() {
	global $post;
	$content = get_post_field( 'post_content', $post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);
	if ($readingtime == 1) {
	$timer = esc_html__(" min read", 'magezix');
	} else {
	$timer = esc_html__(" min read", 'magezix');
	}
	$totalreadingtime = $readingtime . $timer;
	return $totalreadingtime;
}

/**
 * post Pagination
 */
function magezix_pagination() {
    global $wp_query;
    $links = paginate_links( array(
    'current'   => max( 1, get_query_var( 'paged' ) ),
    'total'     => $wp_query->max_num_pages,
    'type'      => 'list',
    'mid_size'  => 3,
    'prev_text' => '<i class="fal fa-angle-double-left"></i>',
    'next_text' => '<i class="fal fa-angle-double-right"></i>',
    ) );

    echo wp_kses_post( $links );
}

/**
 * Comment Message Box
 */
function magezix_comment_reform( $arg ) {

	$arg['title_reply']   = esc_html__( 'Leave a comment', 'magezix' );
	$arg['comment_field'] = '<div class="comments-form"><div class="col-md-12"><div class="field-item"><textarea id="comment" class="form_control" name="comment" cols="77" rows="3" placeholder="' . esc_attr__( "Comment", "magezix" ) . '" aria-required="true"></textarea></div></div></div>';

	return $arg;

}
add_filter( 'comment_form_defaults', 'magezix_comment_reform' );
/**
 * Comment Form Field
 */

function magezix_modify_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );

	$fields['author'] = '<div class="comments-form"><div class="row"><div class="col-md-6"><div class="field-item"><input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . esc_attr__( "Name", "magezix" ) . '" size="22" tabindex="1"' . ( $req ? 'aria-required="true"' : '' ) . ' class="form_control" /></div></div>';

	$fields['email'] = '<div class="col-md-6"><div class="field-item"><input type="email" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="' . esc_attr__( "Email", "magezix" ) . '" size="22" tabindex="2"' . ( $req ? 'aria-required="true"' : '' ) . ' class="form_control"  /></div></div>';

	$fields['url'] = '<div class="col-md-12"><div class="field-item"><input type="url" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( "Website", "magezix" ) . '" size="22" tabindex="2"' . ( $req ? 'aria-required="false"' : '' ) . ' class="form_control"  /></div></div></div></div>';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'magezix_modify_comment_form_fields' );

// comment Move Field
function magezix_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'magezix_move_comment_field_to_bottom' );


/**
 * Comment List Modification
 */
function magezix_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;?>

	<li <?php comment_class('comment');?> id="comment-<?php comment_ID()?>">
        <div class="comments-box">
            <?php if ( get_avatar( $comment ) ) {?>
                <div class="comments-avatar">
                    <?php echo get_avatar( $comment, 100 ); ?>
                </div>
            <?php }?>

            <div class="comments-text">
				<div class="avatar-name">
					<h5 class="name"><?php comment_author_link()?></h5>
					<span class="comment-date"><?php echo esc_html( get_comment_date( 'dS M Y' ) ); ?></span>
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => wp_kses('<i class="fal fa-reply"></i> Reply', true) ) ) );?>
				</div>
                <?php if ( $comment->comment_approved == '0' ): ?>
                    <p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'magezix' );?></em></p>
                <?php endif;?>
                <?php comment_text();?>
            </div>
        </div>
	</li>


<?php
}

function magezix_the_breadcrumb() {
	global $wp_query;
	$queried_object = get_queried_object();
	$breadcrumb     = '';
	$delimiter      = ' / ';
	$before         = '<li class="magezixbcrumb-item magezixbcrumb-begin">';
	$after          = '</li>';
	if ( ! is_front_page() ) {
		$breadcrumb .= $before . '<a href="' . home_url( '/' ) . '">' . esc_html__( 'Home', 'magezix' ) . ' &nbsp;</a>' . $after;
		/** If category or single post */
		if ( is_category() ) {
			$cat_obj       = $wp_query->get_queried_object();
			$this_category = get_category( $cat_obj->term_id );
			if ( $this_category->parent != 0 ) {
				$parent_category = get_category( $this_category->parent );
				$breadcrumb      .= get_category_parents( $parent_category, true, $delimiter );
			}
			$breadcrumb .= $before . '<a href="' . get_category_link( get_query_var( 'cat' ) ) . '">' . single_cat_title( '', false ) . '</a>' . $after;
		} elseif ( $wp_query->is_posts_page ) {
			$breadcrumb .= $before . $queried_object->post_title . $after;
		} elseif ( is_tax() ) {
			$breadcrumb .= $before . '<a href="' . get_term_link( $queried_object ) . '">' . $queried_object->name . '</a>' . $after;
		} elseif ( is_page() ) /** If WP pages */ {
			global $post;
			if ( $post->post_parent ) {
				$anc = get_post_ancestors( $post->ID );
				foreach ( $anc as $ancestor ) {
					$breadcrumb .= $before . '<a href="' . get_permalink( $ancestor ) . '">' . get_the_title( $ancestor ) . ' &nbsp;</a>' . $after;
				}
				$breadcrumb .= $before . '' . get_the_title( $post->ID ) . '' . $after;
			} else {
				$breadcrumb .= $before . '' . get_the_title() . '' . $after;
			}
		} elseif ( is_singular() ) {
			if ( $category = wp_get_object_terms( get_the_ID(), array( 'category', 'location', 'tax_feature' ) ) ) {
				if ( ! is_wp_error( $category ) ) {
					$breadcrumb .= $before . '<a href="' . get_term_link( magezix_set( $category, '0' ) ) . '">' . magezix_set( magezix_set( $category, '0' ), 'name' ) . '&nbsp;</a>' . $after;
					$breadcrumb .= $before . '' . get_the_title() . '' . $after;
				} else {
					$breadcrumb .= $before . '' . get_the_title() . '' . $after;
				}
			} else {
				$breadcrumb .= $before . '' . get_the_title() . '' . $after;
			}
		} elseif ( is_tag() ) {
			$breadcrumb .= $before . '<a href="' . get_term_link( $queried_object ) . '">' . single_tag_title( '', false ) . '</a>' . $after;
		} /**If tag template*/
		elseif ( is_day() ) {
			$breadcrumb .= $before . '<a href="#">' . esc_html__( 'Archive for ', 'magezix' ) . get_the_time( 'F jS, Y' ) . '</a>' . $after;
		} /** If daily Archives */
		elseif ( is_month() ) {
			$breadcrumb .= $before . '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . __( 'Archive for ', 'magezix' ) . get_the_time( 'F, Y' ) . '</a>' . $after;
		} /** If montly Archives */
		elseif ( is_year() ) {
			$breadcrumb .= $before . '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . __( 'Archive for ', 'magezix' ) . get_the_time( 'Y' ) . '</a>' . $after;
		} /** If year Archives */
		elseif ( is_author() ) {
			$breadcrumb .= $before . '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '">' . __( 'Archive for ', 'magezix' ) . get_the_author() . '</a>' . $after;
		} /** If author Archives */
		elseif ( is_search() ) {
			$breadcrumb .= $before . '' . esc_html__( 'Search Results for ', 'magezix' ) . get_search_query() . '' . $after;
		} /** if search template */
		elseif ( is_404() ) {
			$breadcrumb .= $before . '' . esc_html__( '404 - Not Found', 'magezix' ) . '' . $after;
			/** if search template */
		} elseif ( is_post_type_archive( 'product' ) ) {
			$shop_page_id = wc_get_page_id( 'shop' );
			if ( get_option( 'page_on_front' ) !== $shop_page_id ) {
				$shop_page = get_post( $shop_page_id );
				$_name     = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
				if ( ! $_name ) {
					$product_post_type = get_post_type_object( 'product' );
					$_name             = $product_post_type->labels->singular_name;
				}
				if ( is_search() ) {
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link( 'product' ) . '">' . $_name . '</a>' . $delimiter . esc_html__( 'Search results for &ldquo;', 'magezix' ) . get_search_query() . '&rdquo;' . $after;
				} elseif ( is_paged() ) {
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link( 'product' ) . '">' . $_name . '</a>' . $after;
				} else {
					$breadcrumb .= $before . $_name . $after;
				}
			}
		} else {
			$breadcrumb .= $before . '<a href="' . get_permalink() . '">' . wp_title() . '</a>' . $after;
		}
		/** Default value */
	}

	return $breadcrumb;
}

/**
 * magezix Single Post Nav
 */
function magezix_single_post_pagination(){
    $magezix_prev_post = get_previous_post();
    $magezix_next_post = get_next_post();
?>
	<div class="row post-nav">
		<div class="col-lg-6 col-md-6">
			<div class="post-nav__wrap left-post">
				<a class="post-nav__link" href="<?php echo esc_url(get_the_permalink($magezix_prev_post));?>">
					<i class="far fa-angle-left"></i>
				</a>
				<div class="post-nav__item tx-post ul_li">
					<?php if(has_post_thumbnail($magezix_prev_post)):?>
					<div class="post-thumb">
						<a href="<?php echo esc_url(get_the_permalink($magezix_prev_post));?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url($magezix_prev_post, 'thumbnail'));?>" alt="<?php the_title_attribute();?>"></a>
					</div>
					<?php endif;?>
					<div class="post-content">
						<h2 class="post-title border-effect-2"><a href="<?php echo esc_url(get_the_permalink($magezix_prev_post));?>"><?php echo esc_html(wp_trim_words( get_the_title($magezix_prev_post), 7, '' ));?></a></h2>
						<div class="post-meta post-meta--2 ul_li mt-6">
							<div class="post-meta__author ul_li">
								<div class="avatar">
									<?php magezix_main_author_avatars(22);?>
								</div>
								<span><?php the_author()?></span>
							</div>
							<span class="date"><i class="far fa-calendar-alt"></i>
								<?php
									$date_format = get_option('date_format');
									$current_date = get_the_date($date_format, $magezix_next_post);
									$translated_date = translate($current_date, 'text-domain');
									echo wp_kses($translated_date, true);
								?>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="post-nav__wrap right-post">
				<a class="post-nav__link" href="<?php echo esc_url(get_the_permalink($magezix_next_post));?>">
					<i class="far fa-angle-right"></i>
				</a>
				<div class="post-nav__item tx-post ul_li">
					<?php if(has_post_thumbnail($magezix_next_post)):?>
					<div class="post-thumb">
						<a href="<?php echo esc_url(get_the_permalink($magezix_next_post));?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url($magezix_next_post, 'thumbnail'));?>" alt="<?php the_title_attribute();?>"></a>
					</div>
					<?php endif;?>
					<div class="post-content">
						<h2 class="post-title border-effect-2"><a href="<?php echo esc_url(get_the_permalink($magezix_next_post));?>"><?php echo esc_html(wp_trim_words( get_the_title($magezix_next_post), 7, '' ));?></a></h2>
						<div class="post-meta post-meta--2 ul_li mt-6">
							<div class="post-meta__author ul_li">
								<div class="avatar">
									<?php magezix_main_author_avatars(22);?>
								</div>
								<span><?php the_author()?></span>
							</div>
							<span class="date">
								<i class="far fa-calendar-alt"></i>
								<?php
									$date_format = get_option('date_format');
									$current_date = get_the_date($date_format, $magezix_next_post);
									$translated_date = translate($current_date, 'text-domain');
									echo wp_kses($translated_date, true);
								?>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}


/**
 * Search Widget
 */
function magezix_search_widgets( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="widget__search" action="' . home_url( '/' ) . '" >
    <input class="form_control" placeholder="' .esc_attr__( 'Search..', 'magezix' ) . '" type="text"  value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit"><i class="far fa-search"></i></button>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'magezix_search_widgets', 100 );

/**
 * Archive Count Markup
 */
function magezix_archive_html($links) {
    $links = str_replace('</a>&nbsp;(', '<span class="cat-number">(', $links);
    $links = str_replace(')', ')</span><span class="arrow-icon"><i class="fal fa-long-arrow-right"></i></span></a>', $links);
    return $links;
}

add_filter('get_archives_link', 'magezix_archive_html');

/**
 * Category Count Markup
 */
function magezix_category_html( $links ) {
    $links = str_replace( '</a> (', '<span class="cat-number">(', $links );
    $links = str_replace( ')', ')</span><span class="arrow-icon"><i class="fal fa-long-arrow-right"></i></span></a>', $links );
    return $links;
}
add_filter( 'wp_list_categories', 'magezix_category_html' );
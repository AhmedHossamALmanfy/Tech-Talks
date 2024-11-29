<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


//ticker start
function neeon_news_ticker() { ?>
	<ul id="rt-js-news" class="js-hidden">
	<?php
		$no_duplicate_post = array();
			$post_number = NeeonTheme::$options['ticker_post_number'];			
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => $post_number,
				'post__not_in' => $no_duplicate_post
			);
			
			$the_query = new WP_Query( $args );
			
			while ( $the_query->have_posts() ) {

				$the_query->the_post();
				
				$no_duplicate_post[] = get_the_ID();
			?>
				<li class="news-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php }
		wp_reset_postdata();
	 ?>

	</ul>
<?php }
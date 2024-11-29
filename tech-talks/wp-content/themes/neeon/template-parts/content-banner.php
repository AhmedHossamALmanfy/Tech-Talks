<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( is_404() ) {
	$neeon_title = "Error Page";
}
elseif ( is_search() ) {
	$neeon_title = esc_html__( 'Search Results for : ', 'neeon' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$neeon_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$neeon_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'neeon' ) );
	}
}
elseif ( is_archive() ) {
	$neeon_title = get_the_archive_title();
} elseif (is_single()) {
	$neeon_title  = get_the_title();

} else {
	$neeon_title = get_the_title();	                   
}

if ( class_exists( 'WooCommerce' ) ) {
	if (is_shop()) {
		$neeon_title = esc_html__( 'Shop', 'neeon' );
	} else {
		$neeon_title = $neeon_title;
	}
}
?>

<?php if ( NeeonTheme::$has_banner == 1 || NeeonTheme::$has_banner == 'on' ) { ?>
	<div class="entry-banner">
		<div class="container">
			<div class="entry-banner-content">
				<?php if ( NeeonTheme::$has_breadcrumb == 1 && function_exists( 'neeon_breadcrumbs' ) ) { ?>
					<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
				<?php } else {
					echo wp_kses( $neeon_title , 'alltext_allow' );
				} ?>
			</div>
		</div>
	</div>
<?php } ?>
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
$neeon_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

if ( is_post_type_archive( "neeon_team" ) || is_tax( "neeon_team_category" ) ) {
		get_template_part( 'template-parts/archive', 'team' );
	return;
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( NeeonTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $neeon_layout_class );?>">
				<main id="main" class="site-main">
					<div class="rt-sidebar-sapcer">
					<?php
					if ( have_posts() ) { ?>
						<?php
						if ( $neeon_is_post_archive && NeeonTheme::$options['blog_style'] == 'style1' ) {
							echo '<div class="row g-4 loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $neeon_is_post_archive && NeeonTheme::$options['blog_style'] == 'style2' ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
						} else if ( $neeon_is_post_archive && NeeonTheme::$options['blog_style'] == 'style3' ) {
							echo '<div class="row g-4 rt-masonry-grid">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-3', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $neeon_is_post_archive && NeeonTheme::$options['blog_style'] == 'style4' ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-4', get_post_format() );
							endwhile;
						} else if ( $neeon_is_post_archive && NeeonTheme::$options['blog_style'] == 'style5' ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-5', get_post_format() );
							endwhile;
						} else if ( $neeon_is_post_archive && NeeonTheme::$options['blog_style'] == 'style6' ) {
							echo '<div class="row g-4 rt-masonry-grid">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-6', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( class_exists( 'Neeon_Core' ) ) {
							if ( is_tax( 'neeon_portfolio_category' ) ) {
								echo '<div class="row rt-masonry-grid">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-1', get_post_format() );
								endwhile;
								echo '</div>';
							}							
						}
						else {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
						}

						?>

						<?php if( NeeonTheme::$options['blog_loadmore'] == 'loadmore' && NeeonTheme::$options['blog_style'] == 'style1' ) { ?> 
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore" class="loadMore"><?php esc_html_e( 'Load More', 'neeon' ) ?></a>
						    </div> 
						<?php } else { ?>
							<?php NeeonTheme_Helper::pagination(); ?>
						<?php } ?>  

					<?php } else {?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php } ?>
					</div>					
				</main>
			</div>
			<?php
			if( NeeonTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magezix
 */

get_header();
magezix_breadcrumb();
$magezixPostClass = '';
if(is_active_sidebar('sidebar-1')){
	$magezixPostClass = 'col-xl-9 col-lg-8 sticky-coloum-item';
}else{
	$magezixPostClass = 'col-lg-10 offset-lg-1 no-active-sidebar';
}
?>
<div class="magezix-main-blog-wrap pb-120">
	<div class="container">
		<div class="row mt-none-50 sticky-coloum-wrap">
			<div class="<?php echo esc_attr($magezixPostClass);?>">
				<div class="blog-post-wrap">
					<?php magezix_archive_loop();?>
				</div>					
			</div>			
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php
get_sidebar();
get_footer();

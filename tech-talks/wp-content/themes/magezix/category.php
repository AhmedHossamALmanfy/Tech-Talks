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
$magezix_cate_meta = get_term_meta( get_queried_object_id(), 'magezix_cate_meta', true );
$mzx_cat_layout = !empty( $magezix_cate_meta['mzx_cat_layout'] )? $magezix_cate_meta['mzx_cat_layout'] : '';
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
                    <?php if (have_posts() ): ?>
                    <?php 
                        $mzx_global_cat = cs_get_option( 'mgx_cat_global_layout' );
                        if( is_category() && !empty( $magezix_cate_meta  ) ) {
                            get_template_part( 'template-parts/category-layout/'.$mzx_cat_layout.'' );
                        }elseif( class_exists( 'CSF' ) && !empty( $mzx_global_cat ) ){
                            get_template_part( 'template-parts/category-layout/'.$mzx_cat_layout.'' );
                        }else{
                            get_template_part( 'template-parts/category-layout/cat-layout', 'one' );
                        }
                    ?>
                    <div class="pagination_wrap pt-50">
                        <?php magezix_pagination();?>
                    </div>
                    <?php  else: ?>
                        
                        <?php get_template_part( 'template-parts/content', 'none');?>
                    <?php endif; ?>
				</div>			
			</div>			
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php
get_footer();
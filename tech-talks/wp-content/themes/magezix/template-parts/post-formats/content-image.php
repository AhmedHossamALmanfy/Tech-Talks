<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magezix
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('tx-post-item tx-post format-standard mt-50'); ?>>
	<div class="post-thumb">
		<a href="<?php the_permalink();?>">
			<?php 
			if(has_post_thumbnail()){
				the_post_thumbnail('magezix-991x524');
			}        
		?>
        </a>
		<div class="post-date">
			<?php echo wp_kses( get_the_date('d'), true ); ?>
			<br> <span><?php echo wp_kses( get_the_date('M'), true ); ?></span>
			
		</div>
	</div>
	<?php get_template_part('template-parts/common/post-summery'); ?>
	
</article><!-- #post-<?php the_ID(); ?> -->

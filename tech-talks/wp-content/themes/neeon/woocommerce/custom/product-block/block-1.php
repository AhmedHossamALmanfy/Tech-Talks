<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $product;
$product_id  = $product->get_id();

?>
<div class="rt-product-block rt-product-block-1">
	<div class="rt-thumb-wrapper">
		<div class="rt-thumb">
			<?php woocommerce_template_loop_product_thumbnail(); ?>
		</div>
		<?php woocommerce_show_product_loop_sale_flash();?>
		<div class="rt-buttons-area">
			<div class="rt-buttons">				
				<div class="btn-icons">
					<?php
						if ( NeeonTheme::$options['wc_shop_quickview_icon'] ) WC_Functions::print_quickview_icon();
						if ( NeeonTheme::$options['wc_shop_compare_icon'] ) WC_Functions::print_compare_icon();
						if ( NeeonTheme::$options['wc_shop_cart_icon'] ) WC_Functions::print_add_to_cart_icon( $product_id, true, true );
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="price-title-box">
		<div class="rt-title-area">
			<h3 class="rt-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		</div>
		<?php if ( NeeonTheme::$options['wc_shop_rating'] == 1 ) { ?>
		<div class="rating-custom">
			<?php wc_get_template( 'rating.php' ); ?>
		</div>
		<?php } ?>
		<div class="rt-price-area">
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<div class="rt-price"><?php echo wp_kses_post( $price_html ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

while ( have_posts() ) : the_post();

	global $product;
	?>

	<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

		<div class="single-product-top">
			<div class="rt-left">
				<?php
					woocommerce_show_product_sale_flash();
					woocommerce_show_product_images();
				?>
			</div>
			<div class="rt-right">
				<?php
					woocommerce_template_single_title();
					woocommerce_template_single_rating();
					woocommerce_template_single_price();
					woocommerce_template_single_excerpt();
					woocommerce_template_single_add_to_cart();
					woocommerce_template_single_meta();
				?>
			</div>
		</div>

	</div>

<?php endwhile; // end of the loop.
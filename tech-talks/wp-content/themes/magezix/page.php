<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magezix
 */

get_header();
magezix_breadcrumb();
?>
	<div class="magezix_main_content pb-90">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php magezix_page_loop();?>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();

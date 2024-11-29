<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Magezix
 */

get_header();
magezix_breadcrumb();

?>


<?php

	//Single Blog Template

	$mzx_global_layout = cs_get_option( 'post_single_post_layout' ); //for globally
	$mzx_single_post_style = get_post_meta( get_the_ID(),'magezix_post_meta', true );

	$theme_post_meta_single = isset($mzx_single_post_style['post_single_post_layout']) && !empty($mzx_single_post_style['post_single_post_layout']) ? $mzx_single_post_style['post_single_post_layout'] : '';

	if( is_single() && !empty( $mzx_single_post_style  ) ) {

		get_template_part( 'template-parts/single/'.$theme_post_meta_single.'' );

	} elseif ( class_exists( 'CSF' ) && !empty( $mzx_global_layout ) ) {

		get_template_part( 'template-parts/single/'.$mzx_global_layout.'' );

	} else {

		get_template_part( 'template-parts/single/single-one' );

	}

	?>



<?php
get_footer();

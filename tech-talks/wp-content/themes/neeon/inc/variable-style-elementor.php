<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$primary_color     = NeeonTheme::$options['primary_color']; // #2962ff
$primary_rgb       = NeeonTheme_Helper::hex2rgb( $primary_color ); // 41, 98, 255
$secondary_color   = NeeonTheme::$options['secondary_color']; // #0034c2
$secondary_rgb     = NeeonTheme_Helper::hex2rgb( $secondary_color ); // 0, 52, 194

/*---------------------------------    
INDEX
===================================
#. EL: Section Title
#. EL: Nav and Dot
#. EL: Slider
#. EL: Text/image With Button
#. EL: Post addon
#. EL: Team Layout
#. EL: Widget
#. EL: Others
----------------------------------*/

/*-----------------------
#. EL: Section Title
------------------------*/
?>
.section-title .related-title .titledot,
.rt-section-title.style1 .entry-title .titledot,
.rt-section-title.style4 .entry-title .titledot,
.rt-section-title.style2 .sub-title:before,
.rt-section-title.style3 .sub-title:before {
	background: <?php echo esc_html($primary_color); ?>;
}
.rt-section-title .entry-title span {
	color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-----------------------
#. EL: Slider
------------------------*/
?>
.rt-swiper-nav-1 .swiper-navigation > div:hover,
.rt-swiper-nav-2 .swiper-navigation > div,
.rt-swiper-nav-3 .swiper-navigation > div:hover,
.rt-swiper-nav-2 .swiper-pagination .swiper-pagination-bullet,
.rt-swiper-nav-1 .swiper-pagination .swiper-pagination-bullet-active,
.rt-swiper-nav-3 .swiper-pagination .swiper-pagination-bullet-active,
.audio-player .mejs-container .mejs-controls {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-swiper-nav-2 .swiper-navigation > div:hover,
.rt-swiper-nav-2 .swiper-pagination .swiper-pagination-bullet-active,
.audio-player .mejs-container .mejs-controls:hover {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*-----------------------
#. EL: Slider
------------------------*/
?>
.banner-slider .slider-content .sub-title:before {
    background: <?php echo esc_html( $primary_color );?>;
}
<?php
/*------------------------------
#. EL: Text/image With Button
-------------------------------*/
?>
.title-text-button ul.single-list li:after,
.title-text-button ul.dubble-list li:after {
	color: <?php echo esc_html($primary_color); ?>;
}
.title-text-button .subtitle {
	color: <?php echo esc_html($primary_color); ?>;
}
.title-text-button.text-style1 .subtitle:after {
	background: <?php echo esc_html($secondary_color); ?>;
}
.about-image-text .about-content .sub-rtin-title {
	color: <?php echo esc_html($primary_color); ?>;
}
.about-image-text ul li:before {
	color: <?php echo esc_html($primary_color); ?>;
}
.about-image-text ul li:after {
	color: <?php echo esc_html($primary_color); ?>;
}
.image-style1 .image-content,
.rt-title-text-button.barshow .entry-subtitle::before,
.rt-progress-bar .progress .progress-bar {
	background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*------------------------------
#. EL: Post addon
--------------------------------*/
?>
.rt-category .rt-item .rt-cat-name a:hover,
.rt-post-tab-style3 .rt-item-list .rt-image::after,
.rt-post-grid-default .rt-item .post-terms a:hover,
.rt-post-list-default .rt-item .post-terms a:hover,
.rt-post-overlay-default .rt-item .post-terms a:hover,
.rt-post-tab-default .post-terms a:hover,
.rt-post-slider-default .rt-item .post-terms a:hover,
.rt-post-grid-default ul.entry-meta li a:hover,
.rt-post-tab-default .rt-item-left ul.entry-meta li a:hover, 
.rt-post-tab-default .rt-item-list ul.entry-meta li a:hover,
.rt-post-tab-default .rt-item-box ul.entry-meta li a:hover,
.rt-post-slider-default ul.entry-meta li a:hover,
.rt-post-overlay-default .rt-item-list ul.entry-meta .post-author a:hover,
.rt-post-overlay-style12.rt-post-overlay-default .rt-item .post-author a:hover,
.rt-post-box-default ul.entry-meta li a:hover,
.rt-post-box-default .rt-item-list ul.entry-meta .post-author a:hover,
.rt-thumb-slider-horizontal-4 .post-content .audio-player .mejs-container .mejs-button {
	color: <?php echo esc_html($primary_color); ?>;
}
.rt-post-list-default ul.entry-meta li a:hover,
.rt-post-overlay-default ul.entry-meta li a:hover {
	color: <?php echo esc_html($primary_color); ?> !important;
}
.header__switch,
.rt-post-grid-style3 .count-on:hover .rt-image::after,
.rt-post-list-style3 .count-on:hover .rt-image::after,
.rt-post-tab .post-cat-tab a.current, 
.rt-post-tab .post-cat-tab a:hover {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-post-grid-default .rt-item .post-terms .category-style,
.rt-post-box-default .rt-item .post-terms .category-style,
.rt-post-list-default .rt-item .post-terms .category-style,
.rt-post-overlay-default .rt-item .post-terms .category-style,
.rt-post-tab-default .post-terms .category-style,
.rt-post-slider-default .rt-item .post-terms .category-style,
.rt-thumb-slider-default .rt-item .post-terms .category-style,
.rt-category-style5.rt-category .rt-item .rt-cat-name a:after,
.rt-thumb-slider-horizontal .rt-thumnail-area .swiper-pagination .swiper-pagination-progressbar-fill,
.rt-thumb-slider-horizontal-3 .rt-thumnail-area .swiper-pagination .swiper-pagination-progressbar-fill,
.rt-thumb-slider-horizontal-4 .rt-thumnail-area .swiper-pagination .swiper-pagination-progressbar-fill,
.rt-thumb-slider-vertical .rt-thumnail-area .swiper-pagination .swiper-pagination-progressbar-fill,
.rt-thumb-slider-horizontal-4 .post-content .audio-player .mejs-container .mejs-controls:hover {
	background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*------------------------------
#. EL: Team Layout
--------------------------------*/
?>
.team-single .team-info a:hover,
.team-default .team-content .team-title a:hover,
.team-multi-layout-2 .team-social li a {
	color: <?php echo esc_html( $primary_color );?>;
}
.team-multi-layout-1 .team-item .team-social li a:hover,
.team-multi-layout-2 .team-social li a:hover,
.team-single .team-single-content .team-content ul.team-social li a:hover,
.rt-skills .rt-skill-each .progress .progress-bar {
	background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*------------------------------
#. EL: Widget
--------------------------------*/
?>
.elementor-category .rt-category-style2 .rt-item a:hover .rt-cat-name,
.fixed-sidebar-left .elementor-widget-wp-widget-nav_menu ul > li > a:hover,
.fix-bar-bottom-copyright .rt-about-widget ul li a:hover, 
.fixed-sidebar-left .rt-about-widget ul li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.header__switch__main,
.element-side-title h5:after {
    background: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*------------------------------
#. EL: Others
--------------------------------*/
?>
.rtin-address-default .rtin-item .rtin-icon,
.rtin-story .story-layout .story-box-layout .rtin-year,
.apply-item .apply-footer .job-meta .item .primary-text-color,
.apply-item .job-button .button-style-2 {
	color: <?php echo esc_html( $primary_color );?>;
}
.apply-item .button-style-2.btn-common path.rt-button-cap {
    stroke: <?php echo esc_html( $primary_color );?>;
}
.img-content-left .title-small,
.img-content-right .title-small,
.multiscroll-wrapper .ms-social-link li a:hover,
.multiscroll-wrapper .ms-copyright a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.ms-menu-list li.active,
.rt-contact-info .rt-icon {
	background: <?php echo esc_html( $primary_color );?>;
}
.rtin-contact-info .rtin-text a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}




<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

/*-------------------------------------
INDEX
=======================================
#. Container
#. Typography
#. Top Bar
#. Header
#. Banner
#. Footer
#. Widgets
#. Error 404
#. comment
#. Buttons
#. Single Content
#. Archive Contents
#. Pagination
#. Fluent form
#. Miscellaneous
#. woocommerce
#. Dark mode
-------------------------------------*/

$primary_color         = NeeonTheme::$options['primary_color']; // #2962ff
$primary_rgb           = NeeonTheme_Helper::hex2rgb( $primary_color ); // 41, 98, 255
$secondary_color       = NeeonTheme::$options['secondary_color']; // #0034c2
$secondary_rgb         = NeeonTheme_Helper::hex2rgb( $secondary_color ); // 0, 52, 194

$container_width	   = NeeonTheme::$options['container_width']; // Grid Container width
$logo_width	   		   = NeeonTheme::$options['logo_width']; // Grid Container width
$mobile_logo_width	   = NeeonTheme::$options['mobile_logo_width']; // Grid Container width

$menu_color            = NeeonTheme::$options['menu_color'];
$menu_color_tr         = NeeonTheme::$options['menu_color_tr'];
$black_bag_menu_color  = NeeonTheme::$options['black_bag_menu_color'];
$menu_hover_color      = NeeonTheme::$options['menu_hover_color'];
$submenu_color         = NeeonTheme::$options['submenu_color'];
$submenu_bgcolor       = NeeonTheme::$options['submenu_bgcolor'];
$submenu_hover_color   = NeeonTheme::$options['submenu_hover_color'];
$submenu_hover_bgcolor = NeeonTheme::$options['submenu_hover_bgcolor'];

$neeon_typo_body     = NeeonTheme::$options['typo_body'];
$neeon_typo_h1       = NeeonTheme::$options['typo_h1'];
$neeon_typo_h2       = NeeonTheme::$options['typo_h2'];
$neeon_typo_h3       = NeeonTheme::$options['typo_h3'];
$neeon_typo_h4       = NeeonTheme::$options['typo_h4'];
$neeon_typo_h5       = NeeonTheme::$options['typo_h5'];
$neeon_typo_h6       = NeeonTheme::$options['typo_h6'];


/* = Body Typo Area
=======================================================*/
$typo_body = json_decode( NeeonTheme::$options['typo_body'], true );
if ($typo_body['font'] == 'Inherit') {
	$typo_body['font'] = 'Roboto';
} else {
	$typo_body['font'] = $typo_body['font'];
}

/* = Menu Typo Area
=======================================================*/
$typo_menu = json_decode( NeeonTheme::$options['typo_menu'], true );
if ($typo_menu['font'] == 'Inherit') {
	$typo_menu['font'] = 'Spartan';
} else {
	$typo_menu['font'] = $typo_menu['font'];
}

$typo_sub_menu = json_decode( NeeonTheme::$options['typo_sub_menu'], true );
if ($typo_sub_menu['font'] == 'Inherit') {
	$typo_sub_menu['font'] = 'Spartan';
} else {
	$typo_sub_menu['font'] = $typo_sub_menu['font'];
}

/* = Heading Typo Area
=======================================================*/
$typo_heading = json_decode( NeeonTheme::$options['typo_heading'], true );
if ($typo_heading['font'] == 'Inherit') {
	$typo_heading['font'] = 'Spartan';
} else {
	$typo_heading['font'] = $typo_heading['font'];
}
$typo_h1 = json_decode( NeeonTheme::$options['typo_h1'], true );
if ($typo_h1['font'] == 'Inherit') {
	$typo_h1['font'] = 'Spartan';
} else {
	$typo_h1['font'] = $typo_h1['font'];
}
$typo_h2 = json_decode( NeeonTheme::$options['typo_h2'], true );
if ($typo_h2['font'] == 'Inherit') {
	$typo_h2['font'] = 'Spartan';
} else {
	$typo_h2['font'] = $typo_h2['font'];
}
$typo_h3 = json_decode( NeeonTheme::$options['typo_h3'], true );
if ($typo_h3['font'] == 'Inherit') {
	$typo_h3['font'] = 'Spartan';
} else {
	$typo_h3['font'] = $typo_h3['font'];
}
$typo_h4 = json_decode( NeeonTheme::$options['typo_h4'], true );
if ($typo_h4['font'] == 'Inherit') {
	$typo_h4['font'] = 'Spartan';
} else {
	$typo_h4['font'] = $typo_h4['font'];
}
$typo_h5 = json_decode( NeeonTheme::$options['typo_h5'], true );
if ($typo_h5['font'] == 'Inherit') {
	$typo_h5['font'] = 'Spartan';
} else {
	$typo_h5['font'] = $typo_h5['font'];
}
$typo_h6 = json_decode( NeeonTheme::$options['typo_h6'], true );
if ($typo_h6['font'] == 'Inherit') {
	$typo_h6['font'] = 'Spartan';
} else {
	$typo_h6['font'] = $typo_h6['font'];
}

?>
<?php
/*-------------------------------------
#. Container
---------------------------------------*/
?>
@media ( min-width:1400px ) {
	.container {
		max-width: <?php echo esc_html( $container_width ); ?>px;
	}
}
a {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.primary-color {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.secondary-color {
	color: <?php echo esc_html( $secondary_color ); ?>;
}
#preloader {
	background-color: <?php echo esc_html( NeeonTheme::$options['preloader_bg_color'] ); ?>;
}
.loader .cssload-inner.cssload-one,
.loader .cssload-inner.cssload-two,
.loader .cssload-inner.cssload-three {
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
.scroll-wrap:after {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.scroll-wrap svg.scroll-circle path {
    stroke: <?php echo esc_html( $primary_color ); ?>;
}
.site-header .site-branding a,
.mean-container .mean-bar .mobile-logo,
.additional-menu-area .sidenav .additional-logo a {
	color: <?php echo esc_html( $primary_color ); ?>;
}
<?php if ( $logo_width ) { ?>
	.site-header .site-branding a img,
	.header-style-11 .site-header .site-branding a img {
		max-width: <?php echo esc_html( $logo_width ); ?>px;
	}
<?php } ?>
<?php if ( $mobile_logo_width ) { ?>
	.mean-container .mean-bar img {
		max-width: <?php echo esc_html( $mobile_logo_width ); ?>px;
	}
<?php } ?>
<?php
/*-------------------------------------
#. Typography
---------------------------------------*/
?>
body {
	color: <?php echo esc_html( NeeonTheme::$options['body_color'] ); ?>;
	font-family: '<?php echo esc_html( $typo_body['font'] ); ?>', sans-serif !important;
	font-size: <?php echo esc_html( NeeonTheme::$options['typo_body_size'] ) ?>;
	line-height: <?php echo esc_html( NeeonTheme::$options['typo_body_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_body['regularweight'] ) ?>;
	font-style: normal;
}
h1,h2,h3,h4,h5,h6 {
	font-family: '<?php echo esc_html( $typo_heading['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_heading['regularweight'] ); ?>;
}

<?php if (!empty($typo_h1['font'])){ ?>
h1 {
	font-family: '<?php echo esc_html( $typo_h1['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h1['regularweight'] ); ?>;
}
<?php } ?>
h1 {
	font-size: <?php echo esc_html( NeeonTheme::$options['typo_h1_size'] ); ?>;
	line-height: <?php echo esc_html(  NeeonTheme::$options['typo_h1_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h2['font'])) { ?>
h2 {
	font-family: '<?php echo esc_html( $typo_h2['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h2['regularweight'] ); ?>;
}
<?php } ?>
h2 {
	font-size: <?php echo esc_html( NeeonTheme::$options['typo_h2_size'] ); ?>;
	line-height: <?php echo esc_html( NeeonTheme::$options['typo_h2_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h3['font'])) { ?>
h3 {
	font-family: '<?php echo esc_html( $typo_h3['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h3['regularweight'] ); ?>;
}
<?php } ?>
h3 {
	font-size: <?php echo esc_html( NeeonTheme::$options['typo_h3_size'] ); ?>;
	line-height: <?php echo esc_html(  NeeonTheme::$options['typo_h3_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h4['font'])) { ?>
h4 {
	font-family: '<?php echo esc_html( $typo_h4['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h4['regularweight'] ); ?>;
}
<?php } ?>
h4 {
	font-size: <?php echo esc_html( NeeonTheme::$options['typo_h4_size'] ); ?>;
	line-height: <?php echo esc_html(  NeeonTheme::$options['typo_h4_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h5['font'])) { ?>
h5 {
	font-family: '<?php echo esc_html( $typo_h5['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h5['regularweight'] ); ?>;
}
<?php } ?>
h5 {
	font-size: <?php echo esc_html( NeeonTheme::$options['typo_h5_size'] ); ?>;
	line-height: <?php echo esc_html(  NeeonTheme::$options['typo_h5_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h6['font'])) { ?>
h6 {
	font-family: '<?php echo esc_html( $typo_h6['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h6['regularweight'] ); ?>;
}
<?php } ?>
h6 {
	font-size: <?php echo esc_html( NeeonTheme::$options['typo_h6_size'] ); ?>;
	line-height: <?php echo esc_html(  NeeonTheme::$options['typo_h6_height'] ); ?>;
	font-style: normal;
}

<?php
/*-------------------------------------
#. Top Bar
---------------------------------------*/
?>
.topbar-style-1 .header-top-bar {
	background-color: <?php echo esc_html( NeeonTheme::$options['top_bar_bgcolor'] ); ?>;
	color: <?php echo esc_html( NeeonTheme::$options['top_bar_color'] ); ?>;
}
.ticker-title {
	color: <?php echo esc_html( NeeonTheme::$options['top_bar_color'] ); ?>;
}
.topbar-style-1 .tophead-social li a i,
.topbar-style-1 .header-top-bar .social-label,
.topbar-style-1 .header-top-bar a {
	color: <?php echo esc_html( NeeonTheme::$options['top_bar_color'] ); ?>;
}
.topbar-style-1 .header-top-bar i,
.topbar-style-1 .header-top-bar a:hover,
.topbar-style-1 .tophead-social li a:hover i {
	color: <?php echo esc_html( NeeonTheme::$options['top_baricon_color'] ); ?>;
}

.topbar-style-2 .header-top-bar {
	background-color: <?php echo esc_html( NeeonTheme::$options['top_bar_bgcolor_2'] ); ?>;
	color: <?php echo esc_html( NeeonTheme::$options['top_bar_color_2'] ); ?>;
}
.topbar-style-2 .header-top-bar a {
	color: <?php echo esc_html( NeeonTheme::$options['top_bar_color_2'] ); ?>;
}
.topbar-style-2 .tophead-left i,
.topbar-style-2 .tophead-right i {
	color: <?php echo esc_html( NeeonTheme::$options['top_baricon_color_2'] ); ?>;
}

.topbar-style-3 .header-top-bar {
	background-color: <?php echo esc_html( NeeonTheme::$options['top_bar_bgcolor_3'] ); ?>;
	color: <?php echo esc_html( NeeonTheme::$options['top_bar_color_3'] ); ?>;
}
.topbar-style-3 .header-top-bar .social-label {
	color: <?php echo esc_html( NeeonTheme::$options['top_bar_color_3'] ); ?>;
}
.topbar-style-3 .header-top-bar a {
	color: <?php echo esc_html( NeeonTheme::$options['top_bar_color_3'] ); ?>;
}
.topbar-style-3 .tophead-left i,
.topbar-style-3 .tophead-right i {
	color: <?php echo esc_html( NeeonTheme::$options['top_baricon_color_3'] ); ?>;
}

.topbar-style-4 .header-top-bar {
	background-color: <?php echo esc_html( NeeonTheme::$options['top_bar_bgcolor_4'] ); ?>;
	color: <?php echo esc_html( NeeonTheme::$options['top_bar_color_4'] ); ?>;
}
.topbar-style-4 .header-top-bar .social-label {
	color: <?php echo esc_html( NeeonTheme::$options['top_bar_color_4'] ); ?>;
}
.topbar-style-4 .header-top-bar a {
	color: <?php echo esc_html( NeeonTheme::$options['top_bar_color_4'] ); ?>;
}
.topbar-style-4 .tophead-left i,
.topbar-style-4 .tophead-right i {
	color: <?php echo esc_html( NeeonTheme::$options['top_baricon_color_4'] ); ?>;
}

.topbar-style-5 .header-top-bar {
	background-color: <?php echo esc_html( NeeonTheme::$options['top_bar_bgcolor_5'] ); ?>;
}
.topbar-style-5 .header-top-bar .social-label {
	color: <?php echo esc_html( NeeonTheme::$options['top_bar_color_5'] ); ?>;
}
.topbar-style-5 .tophead-right .search-icon a,
.topbar-style-5 .tophead-social li a {
	color: <?php echo esc_html( NeeonTheme::$options['top_baricon_color_5'] ); ?>;
}
.topbar-style-5 .tophead-right .search-icon a:hover,
.topbar-style-5 .tophead-social li a:hover {
	color: <?php echo esc_html( NeeonTheme::$options['top_barhov_color_5'] ); ?>;
}
<?php
/*-------------------------------------
#. Header
---------------------------------------*/
?>
<?php // Main Menu ?>
.site-header .main-navigation nav ul li a {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( NeeonTheme::$options['typo_menu_size'] ) ?>;
	line-height: <?php echo esc_html( NeeonTheme::$options['typo_menu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_menu['regularweight'] ) ?>;
	color: <?php echo esc_html( $menu_color ); ?>;
	font-style: normal;
}
.site-header .main-navigation ul li ul li a {
	font-family: '<?php echo esc_html( $typo_sub_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( NeeonTheme::$options['typo_submenu_size'] ) ?>;
	line-height: <?php echo esc_html( NeeonTheme::$options['typo_submenu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_sub_menu['regularweight'] ) ?>;
	color: <?php echo esc_html( $submenu_color ); ?>;
	font-style: normal;
}
.mean-container .mean-nav ul li a {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( NeeonTheme::$options['typo_submenu_size'] ) ?>;
	line-height: <?php echo esc_html( NeeonTheme::$options['typo_submenu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_menu['regularweight'] ) ?>;
	font-style: normal;
}
<?php // Topbar Menu ?>
.rt-topbar-menu .menu li a {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( NeeonTheme::$options['typo_menu_size'] ) ?>;
	line-height: <?php echo esc_html( NeeonTheme::$options['typo_menu_height'] ); ?>;
	color: <?php echo esc_html( NeeonTheme::$options['top_bar_color_4'] ); ?>;
	font-style: normal;
}
<?php if ( NeeonTheme::$options['header_bg_color'] ) { ?>
	.header-area,
	.header-style-9 .rt-sticky {
		background-color: <?php echo esc_html( NeeonTheme::$options['header_bg_color'] ); ?> !important;
	}
<?php } ?>
.site-header .main-navigation ul.menu > li > a:hover {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.site-header .main-navigation ul.menu li.current-menu-item > a,
.site-header .main-navigation ul.menu > li.current > a {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.site-header .main-navigation ul.menu li.current-menu-ancestor > a {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.header-style-1 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a,
.header-style-2 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a,
.header-style-3 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a,
.header-style-4 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a {
	color: <?php echo esc_html( $menu_color ); ?>;
}
.header-style-1 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a:hover,
.header-style-2 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a:hover,
.header-style-3 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a:hover,
.header-style-4 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a:hover {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.site-header .main-navigation nav ul li a.active {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.site-header .main-navigation nav > ul > li > a::before {
	background-color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.header-style-1 .site-header .main-navigation ul.menu > li.current > a:hover,
.header-style-1 .site-header .main-navigation ul.menu > li.current-menu-item > a:hover,
.header-style-1 .site-header .main-navigation  ul li a.active,
.header-style-1 .site-header .main-navigation ul.menu > li.current-menu-item > a,
.header-style-1 .site-header .main-navigation ul.menu > li.current > a  {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.info-menu-bar .cart-icon-area .cart-icon-num,
.header-search-field .search-form .search-button:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.additional-menu-area .sidenav-social span a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.additional-menu-area .sidenav ul li a:hover {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.rt-slide-nav .offscreen-navigation li.current-menu-item > a, 
.rt-slide-nav .offscreen-navigation li.current-menu-parent > a,
.rt-slide-nav .offscreen-navigation ul li > span.open:after {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.rt-slide-nav .offscreen-navigation ul li > a:hover:before {
	background-color: <?php echo esc_html( $menu_hover_color ); ?>;
}
<?php // Submenu ?>
.site-header .main-navigation ul li ul {
	background-color: <?php echo esc_html( $submenu_bgcolor ); ?>;
}
.site-header .main-navigation ul.menu li ul.sub-menu li a:hover {
	color: <?php echo esc_html( $submenu_hover_color );?>;
}
.site-header .main-navigation ul li ul.sub-menu li:hover > a:before {
	background-color: <?php echo esc_html( $submenu_hover_color ); ?>;
}
.site-header .main-navigation ul li ul.sub-menu li.menu-item-has-children:hover:before {
	color: <?php echo esc_html( $submenu_hover_color ); ?>;
}
.site-header .main-navigation ul li ul li:hover {
	background-color: <?php echo esc_html( $submenu_hover_bgcolor ); ?>;
}
<?php // Multi Column Menu ?>
.site-header .main-navigation ul li.mega-menu > ul.sub-menu {
	background-color: <?php echo esc_html( $submenu_bgcolor ); ?>
}
.site-header .main-navigation ul li.mega-menu > ul.sub-menu li:before {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.site-header .main-navigation ul li ul.sub-menu li.menu-item-has-children:before {
	color: <?php echo esc_html( $submenu_color ); ?>;
}
<?php // Mean Menu ?>
.mean-container a.meanmenu-reveal,
.mean-container .mean-nav ul li a.mean-expand {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.mean-container a.meanmenu-reveal span {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.mean-container .mean-nav ul li a:hover,
.mean-container .mean-nav > ul > li.current-menu-item > a {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.mean-container .mean-nav ul li.current_page_item > a,
.mean-container .mean-nav ul li.current-menu-item > a,
.mean-container .mean-nav ul li.current-menu-parent > a {
	color: <?php echo esc_html( $primary_color );?>;
}
<?php // Header icons ?>
.cart-area .cart-trigger-icon > span {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.site-header .search-box .search-text {
	border-color: <?php echo esc_html( $primary_color );?>;
}
<?php // Header Layout 1 ?>
.header-style-1 .site-header .header-top .icon-left,
.header-style-1 .site-header .header-top .info-text a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
<?php // Header Layout 2 ?>
.header-style-2 .header-icon-area .header-search-box a:hover i {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
<?php // Header Layout 3 ?>
.header-style-3 .site-header .info-wrap .info i {
	color: <?php echo esc_html( $primary_color ); ?>;
}
<?php // Header Layout 5 ?>
.header-style-5 .site-header .main-navigation > nav > ul > li > a {
	color: <?php echo esc_html( $menu_color_tr );?>;
}
<?php // Header Layout 6, 8, 10, 13 ?>
.header-style-13 .header-social li a:hover,
.header-style-6 .header-search-six .search-form button:hover,
.header-style-8 .header-search-six .search-form button:hover,
.header-style-10 .header-search-six .search-form button:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.header-style-7 .site-header .main-navigation > nav > ul > li > a,
.header-style-9 .site-header .main-navigation > nav > ul > li > a,
.header-style-12 .site-header .main-navigation > nav > ul > li > a {
	color: <?php echo esc_html( $black_bag_menu_color );?>;
}
<?php // Header option ?>
.header-social li a:hover,
.cart-area .cart-trigger-icon:hover,
.header-icon-area .search-icon a:hover,
.header-icon-area .user-icon-area a:hover,
.menu-user .user-icon-area a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.mobile-top-bar .mobile-social li a:hover,
.additional-menu-area .sidenav .closebtn {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.mobile-top-bar .mobile-top .icon-left,
.mobile-top-bar .mobile-top .info-text a:hover,
.additional-menu-area .sidenav-address span a:hover,
.additional-menu-area .sidenav-address span i {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.header__switch {
    background: <?php echo esc_html( NeeonTheme::$options['color_mode_button_bgcolor'] );?>;
}
.header__switch__main {
    background: <?php echo esc_html( NeeonTheme::$options['color_mode_button_scrollcolor'] );?>;
}
<?php
/*-------------------------------------
#. Banner
---------------------------------------*/
?>
.breadcrumb-area .entry-breadcrumb span a,
.breadcrumb-trail ul.trail-items li a {
	color: <?php echo esc_html( NeeonTheme::$options['breadcrumb_link_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb span a:hover,
.breadcrumb-trail ul.trail-items li a:hover {
	color: <?php echo esc_html( NeeonTheme::$options['breadcrumb_link_hover_color'] );?>;
}
.breadcrumb-trail ul.trail-items li,
.entry-banner .entry-breadcrumb .delimiter,
.entry-banner .entry-breadcrumb .dvdr {
	color: <?php echo esc_html( NeeonTheme::$options['breadcrumb_seperator_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb .current-item {
	color: <?php echo esc_html( NeeonTheme::$options['breadcrumb_active_color'] );?>;
}
.entry-banner:after {
    background: rgba(247, 247, 247, <?php  echo esc_html( NeeonTheme::$options['banner_bg_opacity'] ); ?>);
}
.entry-banner .entry-banner-content {
	padding-top: <?php  echo esc_html( NeeonTheme::$options['banner_top_padding'] ); ?>px;
	padding-bottom: <?php  echo esc_html( NeeonTheme::$options['banner_bottom_padding'] ); ?>px;
}
<?php
/*-------------------------------------
#. Footer
---------------------------------------*/
?>
.footer-area .widgettitle {
	color: <?php echo esc_html( NeeonTheme::$options['footer_title_color'] ); ?>;
}
.footer-top-area .widget a,
.footer-area .footer-social li a,
.footer-top-area .widget ul.menu li a:before,
.footer-top-area .widget_archive li a:before,
.footer-top-area ul li.recentcomments a:before,
.footer-top-area ul li.recentcomments span a:before,
.footer-top-area .widget_categories li a:before,
.footer-top-area .widget_pages li a:before,
.footer-top-area .widget_meta li a:before,
.footer-top-area .widget_recent_entries ul li a:before,
.footer-top-area .post-box-style .post-content .entry-title a {
	color: <?php echo esc_html( NeeonTheme::$options['footer_link_color'] ); ?>;
}
.footer-top-area .widget a:hover,
.footer-top-area .widget a:active,
.footer-top-area ul li a:hover i,
.footer-top-area .widget ul.menu li a:hover:before,
.footer-top-area .widget_archive li a:hover:before,
.footer-top-area .widget_categories li a:hover:before,
.footer-top-area .widget_pages li a:hover:before,
.footer-top-area .widget_meta li a:hover:before,
.footer-top-area .widget_recent_entries ul li a:hover:before,
.footer-top-area .post-box-style .post-content .entry-title a:hover {
	color: <?php echo esc_html( NeeonTheme::$options['footer_link_hover_color'] ); ?>;
}
.footer-top-area .widget_tag_cloud a {
	color: <?php echo esc_html( NeeonTheme::$options['footer_link_color'] ); ?> !important;
}
.footer-top-area .widget_tag_cloud a:hover {
	color: <?php echo esc_html( NeeonTheme::$options['footer_link_hover_color'] ); ?> !important;
}
.footer-top-area .post-box-style .post-box-cat a, 
.footer-top-area .post-box-style .post-box-date,
.footer-top-area .post-box-style .entry-cat a, 
.footer-top-area .post-box-style .entry-date {
	color: <?php echo esc_html( NeeonTheme::$options['footer_color'] ); ?>;
}
.footer-area .footer-social li a:hover {
	background: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .widget ul.menu li a:hover::before,
.footer-top-area .widget_categories ul li a:hover::before,
.footer-top-area .rt-category .rt-item a:hover .rt-cat-name::before {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-box-title-1 span {
	border-top-color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-area .copyright {
	color: <?php echo esc_html( NeeonTheme::$options['copyright_text_color'] ); ?>;
}
.footer-area .copyright a {
	color: <?php echo esc_html( NeeonTheme::$options['copyright_link_color'] ); ?>;
}
.footer-area .copyright a:hover {
	color: <?php echo esc_html( NeeonTheme::$options['copyright_hover_color'] ); ?>;
}

<?php if ( NeeonTheme::$options['copyright_bg_color'] ) { ?>
.footer-area .footer-copyright-area {
	background-color: <?php echo esc_html( NeeonTheme::$options['copyright_bg_color'] ); ?>;
}
<?php } ?>
.footer-style-1 .footer-area {
	background-color: <?php echo esc_html( NeeonTheme::$options['fbgcolor'] ); ?>;
	color: <?php echo esc_html( NeeonTheme::$options['footer_color'] ); ?>;
}
.footer-style-2 .footer-top-area {
	background-color: <?php echo esc_html( NeeonTheme::$options['fbgcolor2'] ); ?>;
	color: <?php echo esc_html( NeeonTheme::$options['footer_color'] ); ?>;
}
.footer-style-3 .footer-area .widgettitle {
    color: <?php echo esc_html( NeeonTheme::$options['footer3_title_color'] ); ?>;
}
.footer-style-3 .footer-top-area {
	background-color: <?php echo esc_html( NeeonTheme::$options['fbgcolor3'] ); ?>;
	color: <?php echo esc_html( NeeonTheme::$options['footer3_color'] ); ?>;
}
.footer-style-3 .footer-area .copyright {
	color: <?php echo esc_html( NeeonTheme::$options['footer3_color'] ); ?>;
}
.footer-style-3 .footer-area .copyright a:hover {
    color: <?php echo esc_html( NeeonTheme::$options['footer3_hover_color'] ); ?>;
}
.footer-style-3 .footer-top-area a,
.footer-style-3 .footer-area .copyright a,
.footer-style-3 .footer-top-area .widget ul.menu li a {
	color: <?php echo esc_html( NeeonTheme::$options['footer3_link_color'] ); ?>;
}
.footer-style-3 .footer-top-area a:hover,
.footer-style-3 .footer-area .copyright a:hover,
.footer-style-3 .footer-top-area .widget ul.menu li a:hover {
	color: <?php echo esc_html( NeeonTheme::$options['footer3_hover_color'] ); ?>;
}
.footer-style-3 .footer-top-area .widget ul.menu li a:after {
    background-color: <?php echo esc_html( NeeonTheme::$options['footer3_hover_color'] ); ?>;
}
.footer-style-4 .footer-area {
	background-color: <?php echo esc_html( NeeonTheme::$options['fbgcolor4'] ); ?>;
	color: <?php echo esc_html( NeeonTheme::$options['footer_color'] ); ?>;
}
.footer-style-5 .footer-area .widgettitle {
    color: <?php echo esc_html( NeeonTheme::$options['footer5_title_color'] ); ?>;
}
.footer-style-5 .footer-area {
	background-color: <?php echo esc_html( NeeonTheme::$options['fbgcolor5'] ); ?>;
	color: <?php echo esc_html( NeeonTheme::$options['footer5_color'] ); ?>;
}
.footer-style-5 .footer-top-area .widget a,
.footer-style-5 .footer-top-area .post-box-style .post-content .entry-title a,
.footer-style-5 .footer-top-area .post-box-style .post-content .entry-title a:hover {
	color: <?php echo esc_html( NeeonTheme::$options['footer5_link_color'] ); ?>;
}
.footer-style-5 .footer-top-area .widget a:hover,
.footer-style-5 .footer-area .copyright a:hover {
	color: <?php echo esc_html( NeeonTheme::$options['footer5_hover_color'] ); ?>;
}
.footer-style-5 .footer-area .copyright,
.footer-style-5 .footer-area .copyright a,
.footer-style-5 .footer-top-area .post-box-style .entry-cat a, 
.footer-style-5 .footer-top-area .post-box-style .entry-date {
    color: <?php echo esc_html( NeeonTheme::$options['footer5_copyright_color'] ); ?>;
}

.footer-style-6 .footer-area .widgettitle,
.footer-style-6 .footer-top-area .post-box-style .post-content .entry-title a,
.footer-style-6 .footer-top-area .post-box-style .post-content .entry-title a:hover {
    color: <?php echo esc_html( NeeonTheme::$options['footer6_title_color'] ); ?>;
}
.footer-style-6 .footer-area {
	background-color: <?php echo esc_html( NeeonTheme::$options['fbgcolor6'] ); ?>;
	color: <?php echo esc_html( NeeonTheme::$options['footer6_color'] ); ?>;
}
.footer-style-6 .footer-area .footer-social li a {
    border-color: <?php echo esc_html( NeeonTheme::$options['footer6_color'] ); ?>;
    color: <?php echo esc_html( NeeonTheme::$options['footer6_color'] ); ?>;
}
.footer-style-6 .footer-top-area .post-box-style .entry-cat a, 
.footer-style-6 .footer-top-area .post-box-style .entry-date {
    color: <?php echo esc_html( NeeonTheme::$options['footer6_color'] ); ?>;
}
.footer-style-6 .footer-top-area .widget a {
	color: <?php echo esc_html( NeeonTheme::$options['footer6_link_color'] ); ?>;
}
.footer-style-6 .footer-area .footer-social li a:hover,
.footer-style-6 .footer-top-area .rt-category .rt-item a:hover .rt-cat-name::before {
	background-color: <?php echo esc_html( NeeonTheme::$options['footer6_hover_color'] ); ?>;
}
.footer-style-6 .footer-top-area .rt-category .rt-item .rt-cat-name::before {
    background-color: <?php echo esc_html( NeeonTheme::$options['footer6_color'] ); ?>;
}
.footer-style-6 .footer-area .copyright,
.footer-style-6 .footer-area .copyright a {
    color: <?php echo esc_html( NeeonTheme::$options['footer6_copyright_color'] ); ?>;
}
.footer-style-6 .footer-top-area .widget a:hover,
.footer-style-6 .footer-area .copyright a:hover {
	color: <?php echo esc_html( NeeonTheme::$options['footer6_hover_color'] ); ?>;
}

.footer-style-7 .footer-area .widgettitle {
    color: <?php echo esc_html( NeeonTheme::$options['footer7_title_color'] ); ?>;
}
.footer-style-7 .footer-top-area {
	background-color: <?php echo esc_html( NeeonTheme::$options['fbgcolor7'] ); ?>;
	color: <?php echo esc_html( NeeonTheme::$options['footer7_color'] ); ?>;
}
.footer-style-7 .footer-area .copyright {
	color: <?php echo esc_html( NeeonTheme::$options['footer7_color'] ); ?>;
}
.footer-style-7 .footer-area .copyright a:hover {
    color: <?php echo esc_html( NeeonTheme::$options['footer7_hover_color'] ); ?>;
}
.footer-style-7 .footer-top-area a,
.footer-style-7 .footer-area .copyright a,
.footer-style-7 .footer-top-area .widget ul.menu li a {
	color: <?php echo esc_html( NeeonTheme::$options['footer7_link_color'] ); ?>;
}
.footer-style-7 .footer-top-area a:hover,
.footer-style-7 .footer-area .copyright a:hover,
.footer-style-7 .footer-top-area .widget ul.menu li a:hover {
	color: <?php echo esc_html( NeeonTheme::$options['footer7_hover_color'] ); ?>;
}
.footer-style-7 .footer-top-area .widget ul.menu li a:after {
    background-color: <?php echo esc_html( NeeonTheme::$options['footer7_hover_color'] ); ?>;
}
.footer-style-8 .footer-area {
	background-color: <?php echo esc_html( NeeonTheme::$options['fbgcolor8'] ); ?>;
	color: <?php echo esc_html( NeeonTheme::$options['footer_color'] ); ?>;
}
<?php
/*-------------------------------------
#. Widgets
---------------------------------------*/
?>
.post-box-style .entry-cat a:hover,
.post-tab-layout .post-tab-cat a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.sidebar-widget-area .widget .widgettitle .titledot,
.rt-category-style2 .rt-item:hover .rt-cat-count,
.sidebar-widget-area .widget_tag_cloud a:hover, 
.sidebar-widget-area .widget_product_tag_cloud a:hover,
.post-box-style .item-list:hover .post-box-img .post-img::after,
.post-tab-layout ul.btn-tab li .active, 
.post-tab-layout ul.btn-tab li a:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-image-style3 .rt-image:after,
.widget_neeon_about_author .author-widget:after {
	background-image: linear-gradient(38deg, #512da8 0%, <?php echo esc_html( $primary_color );?> 100%);
}

<?php
/*-------------------------------------
#. Error 404
---------------------------------------*/
?>
.error-page-content .error-title {
	color: <?php echo esc_html( NeeonTheme::$options['error_text1_color'] ); ?>;
}
.error-page-content p {
	color: <?php echo esc_html( NeeonTheme::$options['error_text2_color'] ); ?>;
}

<?php
/*------------------------------------
#. Buttons
------------------------------------*/
?>
.play-btn-white,
a.button-style-4:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.button-style-2,
.search-form button,
.play-btn-primary,
.button-style-1:hover:before,
a.button-style-3:hover,
.section-title .swiper-button > div:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.play-btn-primary:hover,
.play-btn-white:hover,
.play-btn-white-xl:hover,
.play-btn-white-lg:hover,
.play-btn-transparent:hover,
.play-btn-transparent-2:hover,
.play-btn-transparent-3:hover,
.play-btn-gray:hover,
.search-form button:hover,
.button-style-2:hover:before {
	background-color: <?php echo esc_html( $secondary_color );?>;
}
a.button-style-4.btn-common:hover path.rt-button-cap {
	stroke: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. Single Content
---------------------------------------*/
?>
.entry-header ul.entry-meta li a:hover,
.entry-footer ul.item-tags li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.rt-related-post-info .post-title a:hover,
.rt-related-post-info .post-date ul li.post-relate-date,
.post-detail-style2 .show-image .entry-header ul.entry-meta li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.about-author ul.author-box-social li a:hover,
.rt-related-post .entry-content .entry-categories a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.post-navigation a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.entry-header .entry-meta ul li i,
.entry-header .entry-meta ul li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.single-post .entry-content ol li:before,
.entry-content ol li:before,
.meta-tags a:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-related-post .title-section h2:after,
.single-post .ajax-scroll-post > .type-post:after {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.entry-footer .item-tags a:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.single-post .main-wrap > .entry-content,
.single-post .main-wrap .entry-footer,
.single-post .main-wrap .about-author,
.single-post .main-wrap .post-navigation,
.single-post .main-wrap .rtrs-review-wrap,
.single-post .main-wrap .rt-related-post,
.single-post .main-wrap .comments-area,
.single-post .main-wrap .content-bottom-ad {
	margin-left: <?php  echo esc_html( NeeonTheme::$options['single_post_padding_left'] ); ?>px;
	margin-right: <?php  echo esc_html( NeeonTheme::$options['single_post_padding_right'] ); ?>px;
}
<?php
/*-------------------------------------
#. Archive Contents
---------------------------------------*/
?>
.blog-box ul.entry-meta li a:hover,
.blog-layout-1 .blog-box ul.entry-meta li a:hover,
.blog-box ul.entry-meta li.post-comment a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.entry-categories .category-style,
.admin-author .author-designation::after,
.admin-author .author-box-social li a:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. Comment
---------------------------------------*/
?>
#respond form .btn-send {
	background-color: <?php echo esc_html( $primary_color );?>;
}
#respond form .btn-send:hover {
    background: <?php echo esc_html( $secondary_color );?>;
}
.item-comments .item-comments-list ul.comments-list li .comment-reply {
	background-color: <?php echo esc_html( $primary_color );?>;
}
form.post-password-form input[type="submit"] {
    background: <?php echo esc_html( $primary_color );?>;
}
form.post-password-form input[type="submit"]:hover {
    background: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*-------------------------------------
#. Pagination
---------------------------------------*/
?>
.pagination-area li.active a:hover,
.pagination-area ul li.active a,
.pagination-area ul li a:hover,
.pagination-area ul li span.current {
	background-color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. Fluent form
---------------------------------------*/
?>
.fluentform .subscribe-form h4::after, 
.fluentform .subscribe-form h4::before,
.fluentform .contact-form .ff_btn_style,
.fluentform .subscribe-form .ff_btn_style,
.fluentform .subscribe-form-2 .ff_btn_style,
.fluentform .contact-form .ff_btn_style:hover,
.fluentform .subscribe-form .ff_btn_style:hover,
.fluentform .subscribe-form-2 .ff_btn_style:hover,
.fluentform .footer-subscribe-form .ff_btn_style,
.fluentform .footer-subscribe-form .ff_btn_style:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.fluentform .contact-form .ff_btn_style:hover:before,
.fluentform .subscribe-form .ff_btn_style:hover:before,
.fluentform .subscribe-form-2 .ff_btn_style:hover:before,
.fluentform .footer-subscribe-form .ff_btn_style:hover:before {
	background-color: <?php echo esc_html( $secondary_color );?>;
}
.fluentform .contact-form .ff-el-form-control:focus,
.fluentform .subscribe-form .ff-el-form-control:focus,
.fluentform .subscribe-form-2 .ff-el-form-control:focus,
.fluentform .footer-subscribe-form .ff-el-form-control:focus {
	border-color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*----------------------
#. Miscellaneous
----------------------*/
?>
#sb_instagram #sbi_images .sbi_item .sbi_photo_wrap::before {
    background-color: rgba(<?php echo esc_html( $primary_rgb );?>, 0.7);
}
.topbar-style-1 .ticker-wrapper .ticker-swipe {
	background-color: <?php echo esc_html( NeeonTheme::$options['ticker_swiper_bg_color'] ); ?>;
}
.topbar-style-1 .ticker-content a {
	color: <?php echo esc_html( NeeonTheme::$options['ticker_text_color'] ); ?> !important;
}
.topbar-style-1 .ticker-content a:hover {
	color: <?php echo esc_html( NeeonTheme::$options['ticker_text_hover_color'] ); ?> !important;
}
.topbar-style-5 .ticker-wrapper .ticker-swipe {
	background-color: <?php echo esc_html( NeeonTheme::$options['ticker_swiper_bg5_color'] ); ?>;
}
.topbar-style-5 .ticker-title,
.topbar-style-5 .ticker-content a,
.topbar-style-5 .rt-news-ticker-holder i {
	color: <?php echo esc_html( NeeonTheme::$options['ticker_text5_color'] ); ?> !important;
}
.topbar-style-5 .ticker-content a:hover {
	color: <?php echo esc_html( NeeonTheme::$options['ticker_text5_hover_color'] ); ?> !important;
}
.single .neeon-progress-bar {
    height: <?php echo esc_html( NeeonTheme::$options['scroll_indicator_height'] ); ?>px;
    background: linear-gradient(90deg, <?php echo esc_html( NeeonTheme::$options['scroll_indicator_bgcolor'] ); ?> 0%, <?php echo esc_html( NeeonTheme::$options['scroll_indicator_bgcolor2'] ); ?> 100%);
}
.rt-news-ticker-holder i {
	background-image: linear-gradient(45deg, <?php echo esc_html( $secondary_color );?>, <?php echo esc_html( $primary_color );?>);
}
body .wpuf-dashboard-container .wpuf-pagination .page-numbers.current,
body .wpuf-dashboard-container .wpuf-pagination .page-numbers:hover,
body .wpuf-dashboard-container .wpuf-dashboard-navigation .wpuf-menu-item.active a, 
body .wpuf-dashboard-container .wpuf-dashboard-navigation .wpuf-menu-item:hover a,
.wpuf-login-form .submit > input,
.wpuf-submit > input,
.wpuf-submit > button {
    background: <?php echo esc_html( $primary_color );?>;
}
.wpuf-login-form .submit > input:hover,
.wpuf-submit > input:hover,
.wpuf-submit > button:hover {
    background: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*----------------------
#. woocommerce
----------------------*/
?>
.woocommerce-MyAccount-navigation ul li a:hover,
.woocommerce .rt-product-block .price-title-box .rt-title a:hover,
.woocommerce .product-details-page .product_meta > span a:hover,
.woocommerce-cart table.woocommerce-cart-form__contents .product-name a:hover,
.woocommerce .product-details-page .post-social-sharing ul.item-social li a:hover,
.woocommerce .product-details-page table.group_table td > label > a:hover,
.cart-area .minicart-title a:hover, 
.cart-area .minicart-remove a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce .rt-product-block .rt-buttons-area .btn-icons a:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:before {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce #respond input#submit.alt, 
.woocommerce #respond input#submit, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt, 
.woocommerce button.button, 
.woocommerce a.button.alt, 
.woocommerce input.button, 
.woocommerce a.button,
.cart-btn a.button,
#yith-quick-view-close {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce #respond input#submit.alt:hover, 
.woocommerce #respond input#submit:hover, 
.woocommerce button.button.alt:hover, 
.woocommerce input.button.alt:hover, 
.woocommerce button.button:hover, 
.woocommerce a.button.alt:hover, 
.woocommerce input.button:hover, 
.woocommerce a.button:hover,
.cart-btn a.button:hover,
#yith-quick-view-close:hover {
	background-color: <?php echo esc_html( $secondary_color );?>;
}
.woocommerce-message, 
.woocommerce-info {
    border-top-color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*----------------------
#. Dark mode
----------------------*/
?>
[data-theme="dark-mode"] body,
[data-theme="dark-mode"] .header-area,
[data-theme="dark-mode"] .header-menu,
[data-theme="dark-mode"] .site-content,
[data-theme="dark-mode"] .error-page-area,
[data-theme="dark-mode"] #page .content-area,
[data-theme="dark-mode"] .rt-post-box-style5 .rt-item,
[data-theme="dark-mode"] .rt-post-box-style6 .rt-item,
[data-theme="dark-mode"] .rt-thumb-slider-horizontal-4 .rt-thumnail-area.box-layout,
[data-theme="dark-mode"] .grid-box-layout .rt-item,
[data-theme="dark-mode"] .rt-post-list-style1.list-box-layout .rt-item,
[data-theme="dark-mode"] .rt-post-list-style2.list-box-layout,
[data-theme="dark-mode"] .rt-post-list-style4.list-box-layout,
[data-theme="dark-mode"] .rt-post-list-style7.list-box-layout {
    background-color: <?php echo esc_html( NeeonTheme::$options['dark_mode_bgcolor'] ); ?> !important;
}
[data-theme="dark-mode"] .entry-banner,
[data-theme="dark-mode"] .dark-section2,
[data-theme="dark-mode"] .elementor-background-overlay,
[data-theme="dark-mode"] .topbar-style-1 .header-top-bar,
[data-theme="dark-mode"] .additional-menu-area .sidenav,
[data-theme="dark-mode"] .dark-section2 .fluentform-widget-wrapper,
[data-theme="dark-mode"] .dark-fluentform .elementor-widget-container,
[data-theme="dark-mode"] .dark-section3 .elementor-widget-wrap,
[data-theme="dark-mode"] .dark-section .elementor-widget-container,
[data-theme="dark-mode"] blockquote,
[data-theme="dark-mode"] .neeon-content-table,
[data-theme="dark-mode"] .rt-post-slider-default.rt-post-slider-style4 .rt-item .entry-content,
[data-theme="dark-mode"] .about-author, 
[data-theme="dark-mode"] .rt-cat-description,
[data-theme="dark-mode"] .comments-area,
[data-theme="dark-mode"] .post-audio-player,
[data-theme="dark-mode"] .dark-section1.elementor-section,
[data-theme="dark-mode"] .dark-site-subscribe .elementor-widget-container,
[data-theme="dark-mode"] .sidebar-widget-area .fluentform .frm-fluent-form,
[data-theme="dark-mode"] .rt-post-tab-style5 .rt-item-box .entry-content,
[data-theme="dark-mode"] .rt-thumb-slider-horizontal-4 .rt-thumnail-area,
[data-theme="dark-mode"] .topbar-style-3 .header-top-bar,
[data-theme="dark-mode"] .topbar-style-4 .header-top-bar,
[data-theme="dark-mode"] .rt-news-ticker .ticker-wrapper .ticker-content, 
[data-theme="dark-mode"] .rt-news-ticker .ticker-wrapper .ticker, 
[data-theme="dark-mode"] .rt-news-ticker .ticker-wrapper .ticker-swipe,
[data-theme="dark-mode"] .rt-post-slider-style5 .rt-item .rt-image + .entry-content,
[data-theme="dark-mode"] .rt-post-box-style3 .rt-item-wrap .entry-content,
[data-theme="dark-mode"] .rt-post-box-style4 .rt-item .entry-content {
    background-color: <?php echo esc_html( NeeonTheme::$options['dark_mode_light_bgcolor'] ); ?> !important;
}
[data-theme="dark-mode"] .woocommerce-info,
[data-theme="dark-mode"] .woocommerce-checkout #payment,
[data-theme="dark-mode"] .woocommerce form .form-row input.input-text, 
[data-theme="dark-mode"] .woocommerce form .form-row textarea,
[data-theme="dark-mode"] .woocommerce .rt-product-block .rt-thumb-wrapper,
[data-theme="dark-mode"] .woocommerce-billing-fields .select2-container .select2-selection--single .select2-selection__rendered, 
[data-theme="dark-mode"] .woocommerce-billing-fields .select2-container .select2-selection--single,
[data-theme="dark-mode"] .woocommerce form .form-row .input-text, 
[data-theme="dark-mode"] .woocommerce-page form .form-row .input-text,
[data-theme="dark-mode"] .woocommerce div.product div.images .flex-viewport,
[data-theme="dark-mode"] .woocommerce div.product div.images .flex-control-thumbs li,
[data-theme="dark-mode"] .rt-post-box-style2 .rt-item-wrap .entry-content,
[data-theme="dark-mode"] .rt-post-box-style2 .rt-item-list .list-content {
    background-color: <?php echo esc_html( NeeonTheme::$options['dark_mode_light_bgcolor'] ); ?>;
}
[data-theme="dark-mode"] body,
[data-theme="dark-mode"] .breadcrumb-area .entry-breadcrumb span a,
[data-theme="dark-mode"] .rt-post-grid-default .rt-item .post_excerpt,
[data-theme="dark-mode"] .rt-post-list-default .rt-item .post_excerpt,
[data-theme="dark-mode"] .rt-section-title.style2 .entry-text,
[data-theme="dark-mode"] .rt-title-text-button .entry-content,
[data-theme="dark-mode"] .rt-contact-info .entry-text,
[data-theme="dark-mode"] .rt-contact-info .entry-text a,
[data-theme="dark-mode"] .fluentform .subscribe-form p,
[data-theme="dark-mode"] .additional-menu-area .sidenav-address span a,
[data-theme="dark-mode"] .meta-tags a,
[data-theme="dark-mode"] .entry-content p,
[data-theme="dark-mode"] #respond .logged-in-as a,
[data-theme="dark-mode"] .about-author .author-bio,
[data-theme="dark-mode"] .comments-area .main-comments .comment-text,
[data-theme="dark-mode"] .rt-skills .rt-skill-each .rt-name,
[data-theme="dark-mode"] .rt-skills .rt-skill-each .progress .progress-bar > span,
[data-theme="dark-mode"] .team-single .team-info ul li,
[data-theme="dark-mode"] .team-single .team-info ul li a,
[data-theme="dark-mode"] .error-page-area p,
[data-theme="dark-mode"] blockquote.wp-block-quote cite,
[data-theme="dark-mode"] .rtrs-review-box .rtrs-review-body p,
[data-theme="dark-mode"] .rtrs-review-box .rtrs-review-body .rtrs-review-meta .rtrs-review-date,
[data-theme="dark-mode"] .neeon-content-table a {
	color: <?php echo esc_html( NeeonTheme::$options['dark_mode_color'] ); ?>;
}
[data-theme="dark-mode"] .wpuf-label label, 
[data-theme="dark-mode"] .wpuf-el .wpuf-label,
[data-theme="dark-mode"] body .wpuf-dashboard-container table.items-table,
[data-theme="dark-mode"] body .wpuf-dashboard-container table.items-table a,
[data-theme="dark-mode"] .woocommerce .rt-product-block .price-title-box .rt-title a,
[data-theme="dark-mode"] .woocommerce .product-details-page .product_meta > span a, 
[data-theme="dark-mode"] .woocommerce .product-details-page .product_meta > span span,
[data-theme="dark-mode"] .xs_social_counter_widget .wslu-style-1.wslu-counter-box-shaped li.xs-counter-li a,
[data-theme="dark-mode"] .xs_social_counter_widget .wslu-style-1.wslu-counter-box-shaped li.xs-counter-li .xs-social-follower,
[data-theme="dark-mode"] .xs_social_counter_widget .wslu-style-1.wslu-counter-box-shaped li.xs-counter-li .xs-social-follower-text,
[data-theme="dark-mode"] .xs_social_counter_widget .wslu-style-3.wslu-counter-line-shaped li.xs-counter-li .xs-social-follower-text,
[data-theme="dark-mode"] .xs_social_counter_widget .wslu-style-3.wslu-counter-line-shaped li.xs-counter-li .xs-social-follower {
	color: <?php echo esc_html( NeeonTheme::$options['dark_mode_color'] ); ?>;
}
[data-theme="dark-mode"] .button-style-1,
[data-theme="dark-mode"] .dark-border,
[data-theme="dark-mode"] .dark-border .elementor-element-populated,
[data-theme="dark-mode"] .dark-border .elementor-widget-container,
[data-theme="dark-mode"] .dark-border .elementor-divider-separator,
[data-theme="dark-mode"] .rt-section-title.style1 .entry-title .titleline,
[data-theme="dark-mode"] .rt-section-title.style4 .entry-title .titleline,
[data-theme="dark-mode"] .header-style-4 .header-menu,
[data-theme="dark-mode"] .header-style-10 .header-top,
[data-theme="dark-mode"] .header-style-10 .header-search-six .search-form input,
[data-theme="dark-mode"] .header-style-14 .logo-main-wrap,
[data-theme="dark-mode"] .header-style-15 .menu-full-wrap,
[data-theme="dark-mode"] .post-tab-layout ul.btn-tab li a,
[data-theme="dark-mode"] .rt-post-tab .post-cat-tab a,
[data-theme="dark-mode"] .rt-post-slider-default.rt-post-slider-style4 ul.entry-meta,
[data-theme="dark-mode"] .dark-fluentform .elementor-widget-container,
[data-theme="dark-mode"] .dark-section2 .fluentform-widget-wrapper,
[data-theme="dark-mode"] .additional-menu-area .sidenav .sub-menu,
[data-theme="dark-mode"] .additional-menu-area .sidenav ul li,
[data-theme="dark-mode"] .rt-post-list-style4,
[data-theme="dark-mode"] .rt-post-list-default .rt-item,
[data-theme="dark-mode"] .post-box-style .rt-news-box-widget,
[data-theme="dark-mode"] table th, 
[data-theme="dark-mode"] table td,
[data-theme="dark-mode"] .shop-page-top,
[data-theme="dark-mode"] .woocommerce-cart table.woocommerce-cart-form__contents tr td, 
[data-theme="dark-mode"] .woocommerce-cart table.woocommerce-cart-form__contents tr th,
[data-theme="dark-mode"] .woocommerce div.product .woocommerce-tabs ul.tabs,
[data-theme="dark-mode"] .woocommerce #reviews #comments ol.commentlist li .comment_container,
[data-theme="dark-mode"] .woocommerce-cart table.woocommerce-cart-form__contents,
[data-theme="dark-mode"] .sidebar-widget-area .widget .widgettitle .titleline,
[data-theme="dark-mode"] .section-title .related-title .titleline,
[data-theme="dark-mode"] .meta-tags a,
[data-theme="dark-mode"] .search-form .input-group,
[data-theme="dark-mode"] .post-navigation .text-left,
[data-theme="dark-mode"] .post-navigation .text-right,
[data-theme="dark-mode"] .post-detail-style1 .share-box-area .post-share .share-links .email-share-button, 
[data-theme="dark-mode"] .post-detail-style1 .share-box-area .post-share .share-links .print-share-button,
[data-theme="dark-mode"] .rt-thumb-slider-horizontal-4 .rt-thumnail-area .swiper-pagination,
[data-theme="dark-mode"] .elementor-category .rt-category-style2 .rt-item,
[data-theme="dark-mode"] .rt-post-slider-style4 .swiper-slide,
[data-theme="dark-mode"] .header-style-6 .logo-ad-wrap,
[data-theme="dark-mode"] .apsc-theme-2 .apsc-each-profile a,
[data-theme="dark-mode"] .apsc-theme-3 .apsc-each-profile > a,
[data-theme="dark-mode"] .apsc-theme-3 .social-icon,
[data-theme="dark-mode"] .apsc-theme-3 span.apsc-count,
[data-theme="dark-mode"] .rt-post-box-style1 .rt-item-list .list-content,
[data-theme="dark-mode"] .rt-post-box-style1 .rt-item-wrap .entry-content,
[data-theme="dark-mode"] .rt-post-box-style2 .rt-item-wrap .entry-content,
[data-theme="dark-mode"] .rt-post-box-style2 .rt-item-list .list-content,
[data-theme="dark-mode"] .rt-post-grid-style8 > div > div,
[data-theme="dark-mode"] .loadmore-wrap .before-line,
[data-theme="dark-mode"] .loadmore-wrap .after-line,
[data-theme="dark-mode"] .rt-post-box-style1 .rt-item-list,
[data-theme="dark-mode"] .rt-post-box-style1 .rt-item-wrap .rt-item,
[data-theme="dark-mode"] .xs_social_counter_widget .wslu-style-1.wslu-counter-box-shaped li.xs-counter-li,
[data-theme="dark-mode"] .xs_social_counter_widget .wslu-style-3.wslu-counter-line-shaped li.xs-counter-li,
[data-theme="dark-mode"] .xs_social_counter_widget .wslu-style-3.wslu-counter-line-shaped .xs-counter-li .xs-social-icon,
[data-theme="dark-mode"] .xs_social_counter_widget .wslu-style-3.wslu-counter-line-shaped li.xs-counter-li .xs-social-follower {
	border-color: <?php echo esc_html( NeeonTheme::$options['dark_mode_border_color'] ); ?> !important;
}
[data-theme="dark-mode"] .rt-section-title.style5 .line-top .entry-title:before {
    background-color: <?php echo esc_html( NeeonTheme::$options['dark_mode_border_color'] ); ?>;
}
[data-theme="dark-mode"] .woocommerce-info,
[data-theme="dark-mode"] .woocommerce-checkout #payment,
[data-theme="dark-mode"] .woocommerce form .form-row input.input-text, 
[data-theme="dark-mode"] .woocommerce form .form-row textarea,
[data-theme="dark-mode"] .woocommerce .rt-product-block .rt-thumb-wrapper,
[data-theme="dark-mode"] .woocommerce-billing-fields .select2-container .select2-selection--single .select2-selection__rendered, 
[data-theme="dark-mode"] .woocommerce-billing-fields .select2-container .select2-selection--single,
[data-theme="dark-mode"] .woocommerce form .form-row .input-text, 
[data-theme="dark-mode"] .woocommerce-page form .form-row .input-text,
[data-theme="dark-mode"] .woocommerce div.product div.images .flex-viewport,
[data-theme="dark-mode"] .woocommerce div.product div.images .flex-control-thumbs li {
	border-color: <?php echo esc_html( NeeonTheme::$options['dark_mode_border_color'] ); ?>;
}
[data-theme="dark-mode"] .rtrs-review-wrap.rtrs-affiliate-wrap,
[data-theme="dark-mode"] .rtrs-review-wrap .rtrs-review-form,
[data-theme="dark-mode"] .rtrs-review-wrap .rtrs-review-box .rtrs-each-review {
    background-color: <?php echo esc_html( NeeonTheme::$options['dark_mode_light_bgcolor'] ); ?> !important;
}
[data-theme="dark-mode"] .rtrs-review-box .rtrs-review-body p,
[data-theme="dark-mode"] .rtrs-affiliate .rtrs-rating-category li label,
[data-theme="dark-mode"] .rtrs-affiliate .rtrs-feedback-text p,
[data-theme="dark-mode"] .rtrs-feedback-summary .rtrs-feedback-box .rtrs-feedback-list li {
	color: <?php echo esc_html( NeeonTheme::$options['dark_mode_color'] ); ?>;
}
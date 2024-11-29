<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Magezix
 */

get_header();
magezix_breadcrumb();
?>
<?php magezix_error_page();?>
<?php
get_footer();

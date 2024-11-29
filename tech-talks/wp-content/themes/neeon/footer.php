<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
</div><!--#content-->

<!-- progress-wrap -->
<?php if ( NeeonTheme::$options['back_to_top'] ) { ?>
<div class="scroll-wrap">
  <svg
	class="scroll-circle svg-content"
	width="100%"
	height="100%"
	viewBox="-1 -1 102 102"
  >
	<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
  </svg>
</div>
<?php } ?>

<footer class="<?php echo ( NeeonTheme::$options['footer_sticky'] == 1 ) ? 'footer-sticky' : 'no-sticky'; ?>">
	<div id="footer-<?php echo esc_attr( NeeonTheme::$footer_style ); ?>" class="footer-area">
		<?php
			get_template_part( 'template-parts/footer/footer', NeeonTheme::$footer_style );
		?>
	</div>
</footer>

<?php if ( ( NeeonTheme::$options['scroll_indicator_enable'] == '1' ) && ( NeeonTheme::$options['scroll_indicator_position'] == 'below' ) ){ ?>
<div class="neeon-progress-container bottom">
	<div class="neeon-progress-bar" id="neeonBar"></div>
</div>
<?php } ?>


</div>
<?php wp_footer();?>
</body>
</html>
<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

require_once NEEON_INC_DIR . 'customizer/customizer-default-data.php';
require_once NEEON_INC_DIR . 'customizer/init.php';

if ( class_exists( 'WooCommerce' ) ) {
    require_once NEEON_WOO_DIR . 'custom/functions.php';
}
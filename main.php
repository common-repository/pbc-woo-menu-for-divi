<?php
/*
Plugin Name: Divi WooCommerce Menu
Plugin URI:  https://pagebuildercode.com/divi-woocommerce-menu
Description: A Module to display woocommerce products as a menu
Version:     1.0.1
Author:      Miguras
Author URI:  https://pagebuildercode.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: pbcwm
Domain Path: /languages

*/


if ( ! function_exists( 'pbcwm_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function pbcwm_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/PbcDiviWoocommerceMenu.php';
}
add_action( 'divi_extensions_init', 'pbcwm_initialize_extension' );


endif;

/*========================= REQUIRED FILES ========================*/

if (file_exists(plugin_dir_path( __FILE__ ) . 'functions/functions.php')){
	require_once(plugin_dir_path( __FILE__ ) . 'functions/functions.php');
}

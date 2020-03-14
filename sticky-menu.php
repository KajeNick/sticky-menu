<?php
/**
 * Plugin Name: N-Magnet
 * Plugin URI: https://nsukonny.ru/n-magnet/
 * Description: WooCommerce Extension for parse data from another websites
 * Version: 1.0.0
 * Author: NSukonny
 * Author URI: https://nsukonny.ru
 * Text Domain: n-magnet
 * Domain Path: /languages
 * WC requires at least: 3.0.0
 * WC tested up to: 3.8.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Sticky_Menu' ) ) {

	include_once dirname( __FILE__ ) . '/libraries/class-sticky-menu.php';

}

/**
 * The main function for returning NMagnet instance
 *
 * @since 1.0.0
 *
 * @return object The one and only true NMagnet instance.
 */
function sticky_menu_runner() {

	return Sticky_Menu::instance();
}

sticky_menu_runner();
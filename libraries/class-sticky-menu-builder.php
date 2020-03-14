<?php

/**
 * Make menu from headers
 *
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

class Sticky_Menu_Builder {

	/**
	 * NMagnet_Templates constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

	}

}

function sticky_menu_builder_runner() {

	return new Sticky_Menu_Builder();
}

sticky_menu_builder_runner();
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

		add_shortcode( 'sticky-menu', array( $this, 'create_menu' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts' ) );

	}

	/**
	 * Load scripts and styles
	 *
	 * @since  1.0.0
	 */
	public function add_scripts() {

		wp_enqueue_script(
			'sticky-menu-scripts',
			STICKY_MENU_PLUGIN_URL . 'assets/scripts.js',
			array( 'jquery' ), STICKY_MENU_VERSION,
			true
		);

		wp_enqueue_style(
			'sticky-menu-styles',
			STICKY_MENU_PLUGIN_URL . 'assets/styles.css',
			array(),
			STICKY_MENU_VERSION
		);

	}

	/**
	 * Create menu from all headers
	 *
	 * @since 1.0.0
	 *
	 * @param array $args
	 *
	 * @return string
	 */
	public function create_menu( $args = array() ) {

		$title = !empty($args['title']) ? $args['title'] : 'Inhaltsverzeichnis';
		$html = '<div class="sticky-menu">
				<div class="sticky-menu__title"><h3>' . esc_attr($title) . '</h3></div>
				<ol class="sticky-menu__elements"></ol>
			</div>';

		return $html;
	}

}

function sticky_menu_builder_runner() {

	return new Sticky_Menu_Builder();
}

sticky_menu_builder_runner();
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

		$title = ! empty( $args['title'] ) ? $args['title'] : 'Inhaltsverzeichnis';
		$html  = '	<div class="sticky-menu">
						<div class="sticky-menu__title">
							<svg class="sm-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
							version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 60.1 60.1" 
							style="enable-background:new 0 0 60.1 60.1;" xml:space="preserve"> <g> 
							<path d="M51.8,51.9H16.5c-1.5,0-2.6-1.3-2.6-3s1.2-3,2.6-3h35.2c1.5,0,2.6,1.3,2.6,3S53.2,51.9,51.8,51.9z"></path> 
							<path d="M57.1,33.1H16.9c-1.7,0-3-1.3-3-3s1.3-3,3-3h40.2c1.7,0,3,1.3,3,3C60.1,31.7,58.8,33.1,57.1,33.1z"></path> 
							<path d="M57.1,14.2H16.9c-1.7,0-3-1.3-3-3s1.3-3,3-3h40.2c1.7,0,3,1.3,3,3S58.8,14.2,57.1,14.2z"></path> 
							<circle cx="4" cy="11.5" r="4"></circle> <circle cx="4" cy="30.1" r="4"></circle> 
							<circle cx="4" cy="48.7" r="4"></circle> </g> </svg> 
							<h3>' . esc_attr( $title ) . '</h3>
						</div>
						<ol class="sticky-menu__elements"></ol>
					</div>';

		return $html;
	}

}

function sticky_menu_builder_runner() {

	return new Sticky_Menu_Builder();
}

sticky_menu_builder_runner();
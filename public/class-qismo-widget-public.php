<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ishlah.github.io
 * @since      0.1.0
 *
 * @package    Qismo_Widget
 * @subpackage Qismo_Widget/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Qismo_Widget
 * @subpackage Qismo_Widget/public
 * @author     Muhamad Saad Nurul Ishlah <nurul.ishlah@qiscus.com>
 */
class Qismo_Widget_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_styles() {

	    // Insert required Qismo stylesheets
		wp_enqueue_style( 'qiscus-sdk', 'https://qiscus-sdk.s3-ap-southeast-1.amazonaws.com/web/v2.8.2/qiscus-sdk.2.8.2.css', array(), '2.8.2', 'all' );
		wp_enqueue_style( $this->plugin_name, 'https://s3-ap-southeast-1.amazonaws.com/qiscus-sdk/public/qismo/qismo.css', array(), '1.4.0', 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_scripts() {

	    // Insert required Qismo JavaScript
		wp_enqueue_script( 'qiscus-sdk', 'https://qiscus-sdk.s3-ap-southeast-1.amazonaws.com/web/v2.8.2/qiscus-sdk.2.8.2.js', array( 'jquery' ), '2.8.2', true );
		wp_enqueue_script( $this->plugin_name, 'https://s3-ap-southeast-1.amazonaws.com/qiscus-sdk/public/qismo/qismo.js', array('jquery', 'qiscus-sdk' ), '1.4.0', true );

	}

    /**
     * Include required snippet code to displat Qismo widget
     */
    public function add_qismo_snippet_code()
    {
        include_once ('partials/qismo-widget-public-display.php');
	}

}

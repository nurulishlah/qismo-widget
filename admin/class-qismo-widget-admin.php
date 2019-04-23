<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ishlah.github.io
 * @since      0.1.0
 *
 * @package    Qismo_Widget
 * @subpackage Qismo_Widget/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Qismo_Widget
 * @subpackage Qismo_Widget/admin
 * @author     Muhamad Saad Nurul Ishlah <nurul.ishlah@qiscus.com>
 */
class Qismo_Widget_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Qismo_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Qismo_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/qismo-widget-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Qismo_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Qismo_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/qismo-widget-admin.js', array( 'jquery' ), $this->version, false );

	}

    public function add_plugin_admin_menu()
    {
        add_options_page(
            'Qiscus Multichannel Widget Settings',
            'Qiscus Widget',
            'manage_options',
            $this->plugin_name,
            array($this, 'display_plugin_setup_page')
        );
	}

    public function add_action_links($links)
    {
        $settings_link = array(
            '<a href="' . admin_url('options-general.php?page=' . $this->plugin_name) . '">' . __('Settings', $this->plugin_name) . '</a>',
        );
        return array_merge($settings_link, $links);
	}

    public function display_plugin_setup_page()
    {
        include_once ('partials/qismo-widget-admin-display.php');
	}

    public function options_update()
    {
        register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}

    public function validate($input)
    {
        $valid = array();
        $valid['app_id'] = (isset($input['app_id']) && !empty($input['app_id'])) ? sanitize_text_field($input['app_id']) : '';

        return $valid;
	}

}

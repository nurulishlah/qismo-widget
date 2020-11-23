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
     * Holds the values to be used in the fields callbacks
     *
     * @var array
     */
    private $options;

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

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     */
    public function add_plugin_admin_menu()
    {
        // Add a settings page for this plugin to the Settings menu.
        add_options_page(
            'Qiscus Multichannel Widget Settings',
            'Qiscus Multichannel Widget',
            'manage_options',
            $this->plugin_name,
            array($this, 'display_plugin_setup_page')
        );
	}

    /**
     * Add settings action link to the plugins page.
     *
     * @param $links
     * @return array
     */
    public function add_action_links($links)
    {
        $settings_link = array(
            '<a href="' . admin_url('options-general.php?page=' . $this->plugin_name) . '">' . __('Settings', $this->plugin_name) . '</a>',
        );
        return array_merge($settings_link, $links);
	}

    /**
     * Render the settings page for this plugin.
     */
    public function display_plugin_setup_page()
    {
        include_once ('partials/qismo-widget-admin-display.php');
	}

    /**
     * Register and add settings
     */
    public function options_update()
    {
        register_setting($this->plugin_name, $this->plugin_name, array($this, 'sanitize'));

        add_settings_section(
            'qismo_widget_appid',
            'Qiscus Multichannel App ID & Channel ID',
            array($this, 'print_section_info'),
            $this->plugin_name
        );

        add_settings_field(
            'app_id',
            'App ID',
            array($this, 'appid_callback'),
            $this->plugin_name,
            'qismo_widget_appid'
        );

        add_settings_field(
            'channel_id',
            'Channel ID',
            array($this, 'channelid_callback'),
            $this->plugin_name,
            'qismo_widget_appid'
        );
	}

    /**
     * Validate inputted values. In this case Qiscus App ID
     *
     * @param $input
     * @return array
     */
    public function sanitize($input)
    {
        $valid = array();
        $valid['app_id'] = (isset($input['app_id']) && !empty($input['app_id'])) ? sanitize_text_field($input['app_id']) : '';
        $valid['channel_id'] = (isset($input['channel_id']) && !empty($input['channel_id'])) ? sanitize_text_field($input['channel_id']) : '';

        return $valid;
	}

    /**
     * Section information
     */
    public function print_section_info()
    {
        print '<p>' .
            _e('Please provide your Qiscus Multichannel App ID and Channel ID. You can get your App ID and Channel ID from code snippet in Qiscus Widget Integration page.',
                $this->plugin_name
            ) . '</p>';

	}

    /**
     * Form to gather app_id
     */
    public function appid_callback()
    {
        $this->options = get_option($this->plugin_name);
        $name = $this->plugin_name .'[app_id]';
        $value = isset($this->options['app_id']) ? esc_attr($this->options['app_id']) : '';
        $format = '<input class="regular-text" type="text" id="app_id" name="%s" value="%s" 
                    placeholder="Put your app id here ..." required="required">';
        echo sprintf($format, $name, $value);
    }
    
    public function channelid_callback()
    {
        $this->options = get_option($this->plugin_name);
        $name = $this->plugin_name .'[channel_id]';
        $value = isset($this->options['channel_id']) ? esc_attr($this->options['channel_id']) : '';
        $format = '<input class="regular-text" type="text" id="channel_id" name="%s" value="%s" 
                    placeholder="Put your channel id here ..." required="required">';
        echo sprintf($format, $name, $value);
    }

}

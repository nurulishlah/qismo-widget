<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://ishlah.github.io
 * @since      0.1.0
 *
 * @package    Qismo_Widget
 * @subpackage Qismo_Widget/admin/partials
 */
?>

<!-- Qismo widget settings page -->
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <p>
        <?php
            _e(
                'Please provide your Qiscus Multichannel App ID. You can get your App ID from <a href="https://qismo.qiscus.com/settings#information" target="_blank">App Information page</a>',
                $this->plugin_name
            );
        ?>
    </p>
    <hr>
    <form method="post" action="options.php" name="qismo_options">

        <?php

            //Grab all options
            $options = get_option($this->plugin_name);
            // get app_id
            $app_id = $options['app_id'];
        ?>

        <?php
            settings_fields($this->plugin_name);
            do_settings_sections($this->plugin_name);
        ?>

        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <label for="<?php echo $this->plugin_name; ?>-app_id"><?php esc_attr_e('App ID', $this->plugin_name); ?></label>
                </th>
                <td>
                    <input type="text" name="qismo_app_id" class="regular-text"
                           id="<?php echo $this->plugin_name; ?>-app_id"
                           name="<?php echo $this->plugin_name; ?>[app_id]"
                           placeholder="Put your app id here ..."
                           value="<?php echo (!empty($app_id)) ? $app_id : ''; ?>"
                    />
                </td>
            </tr>
            </tbody>
        </table>
        <?php submit_button('Save changes', 'primary','submit', TRUE); ?>

    </form>
</div>

<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://ishlah.github.io
 * @since      1.0.0
 *
 * @package    Qismo_Widget
 * @subpackage Qismo_Widget/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
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
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <label><?php esc_attr_e('App ID', $this->plugin_name); ?></label>
                </th>
                <td>
                    <input type="text" name="qismo_app_id"
                           id="qismo_app_id"
                           class="regular-text"
                           placeholder="Put your app id here ..."
                           value="<?php
                           echo (isset($data['app_id'])) ? $data['app_id'] : '';
                           ?>"/>
                </td>
            </tr>
            </tbody>
        </table>
        <?php submit_button('Save changes', 'primary','submit', TRUE); ?>

    </form>
</div>

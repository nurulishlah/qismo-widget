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
    <hr>
    <form method="post" action="options.php" name="qismo_options">

        <?php
            settings_fields($this->plugin_name);
            do_settings_sections($this->plugin_name);
            submit_button();
        ?>

    </form>
</div>

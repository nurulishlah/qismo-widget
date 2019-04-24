<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://ishlah.github.io
 * @since      0.1.0
 *
 * @package    Qismo_Widget
 * @subpackage Qismo_Widget/public/partials
 */

// get settings option in regard of app_id
$options = get_option($this->plugin_name);
?>

<!-- Qismo widget snippet code -->
<div id='qiscus-widget'></div>
<script>
    window.qismoConfig = {
        "appID": "<?php echo $options['app_id']; ?>",
        "buttonHasText": true
    }
</script>
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

<!-- Qiscus Multichannel widget code snippet -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var s,t; s = document.createElement('script'); s.type = 'text/javascript';
        s.src = 'https://s3-ap-southeast-1.amazonaws.com/qiscus-sdk/public/qismo/qismo-v4.js'; s.async = true;
        s.onload = s.onreadystatechange = function() { new Qismo("<?php echo $options['app_id']; ?>", { 
                        options: { 
                            channel_id: <?php echo $options['channel_id']; ?>,
                        }
                    }); }
        t = document.getElementsByTagName('script')[0]; t.parentNode.insertBefore(s, t);
    });
</script>

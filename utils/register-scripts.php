<?php

// Register All CSS
wp_register_style("ircp-style", plugin_dir_url( __FILE__ )."../libs/css/ircp-style.css", '', '1.0.0');

// Enqueue all CSS
wp_enqueue_style('ircp-style');

?>
<?php

// Global Variables

//Show Post Types
require('utils/show-post-types.php');

function ircp_plugin_section_text() {
    echo '<p>Here is a list of all available Posts Types on this wordpress installation.</p>';
    print_r(show_post_types());
}



?>
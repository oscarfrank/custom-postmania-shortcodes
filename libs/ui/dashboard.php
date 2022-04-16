<?php


function ircp_add_settings_page() {
    add_options_page( 'Custom PostMania Shortcodes', 'Custom PostMania Shortcodes', 'manage_options', 'ircp-related-custom-posts-plugin', 'ircp_render_plugin_settings_page' );
}
add_action( 'admin_menu', 'ircp_add_settings_page' );


function ircp_render_plugin_settings_page() {

    echo '<h2>Custom PostMania Shortcodes Page</h2>';

}

function ircp_register_settings() {
    register_setting( 'ircp_custom_postmania_shortcodes_plugin_options', 'ircp_custom_postmania_shortcodes_plugin_options', 'ircp_custom_postmania_shortcodes_plugin_options_validate' );
    add_settings_section( 'api_settings', 'API Settings', 'ircp_plugin_section_text', 'ircp_custom_postmania_shortcodes_plugin' );

}
add_action( 'admin_init', 'ircp_register_settings' );


?>
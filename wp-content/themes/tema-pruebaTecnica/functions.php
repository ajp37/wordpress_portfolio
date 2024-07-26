<?php
function my_theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
?>

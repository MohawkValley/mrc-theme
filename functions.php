<?php
function twentyseventeen_custom_enqueue_child_theme_styles() {
	wp_enqueue_style('parent-theme-css', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'twentyseventeen_custom_enqueue_child_theme_styles', 11);
<?php
function twentyseventeen_custom_enqueue_child_theme_styles() {
	wp_enqueue_style('parent-theme-css', get_template_directory_uri() . '/style.css');
	// Activate scrolling plug-in for menu clicks
	// (Source: https://kinsta.com/blog/twenty-seventeen-theme/#svgs)
	if ( is_front_page() ) {
		wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array('jquery'), '1.0', true );
	}
	// Only enque the page slice script on posts of the Standard format
	if ( is_single() && get_post_format( get_the_ID() ) == false ) {
		wp_enqueue_script( 'twentyseventeen-post-pageslice', get_theme_file_uri( '/assets/js/pageslice.js' ), array('jquery'), '1.0', true );
	}
}
add_action('wp_enqueue_scripts', 'twentyseventeen_custom_enqueue_child_theme_styles', 11);

// |-------
//  Including the new custom SVG sprite file to add more icon options for the social media menu
//  Source of solution: https://kinsta.com/blog/twenty-seventeen-theme/#svgs
function childtheme_include_svg_icons() {
	// Define SVG sprite file.
	$custom_svg_icons = get_theme_file_path( '/assets/images/mrc-svg-icons.svg' );
	if ( file_exists( $custom_svg_icons ) ) {
		require_once( $custom_svg_icons );
	}
}
add_action( 'wp_footer', 'childtheme_include_svg_icons', 99999 );

function childtheme_social_links_icons( $social_links_icons ) {
	$social_links_icons['rca.org'] = 'rca';
	return $social_links_icons;
}
add_filter( 'twentyseventeen_social_links_icons', 'childtheme_social_links_icons' );

// -------|
function twentyseventeen_child_setup() {
	add_image_size( 'home-feed-thumbnail', 300, 180, true );
}
add_action( 'after_setup_theme', 'twentyseventeen_child_setup' );
<?php
function twentyseventeen_custom_enqueue_child_theme_styles() {
	wp_enqueue_style('parent-theme-css', get_template_directory_uri() . '/style.css');
	// Activate scrolling plug-in for menu clicks
	// (Source: https://kinsta.com/blog/twenty-seventeen-theme/#svgs)
	if ( is_front_page() ) {
		wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array('jquery'), '1.0', true );
	}
	if ( is_single() && get_post_type( get_the_ID() ) == 'post' ) {
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

// Copying the srouce of the built-in functinon so we can filter for it, using it conditionally instead of the normal the_excerpt
// ---
// function the_manual_excerpt() {
// 	echo apply_filters( 'the_manual_excerpt', get_the_excerpt() );
// }
// function for outputting even manually added excerpts with "Continue reading" links
// Source: https://wordpress.stackexchange.com/questions/134143/how-can-i-create-a-read-more-link-using-the-excerpt-on-a-static-front-page
// ---
// function new_excerpt_more($more) {
// 	return '';
// }
// add_filter('excerpt_more', 'new_excerpt_more', 21);
// function the_excerpt_more_link($excerpt) {
// 	$post = get_post();
// 	$excerpt .= '... <a class="more-link" href="'. get_permalink($post->ID) . '">Continue reading</a><span class="screen-reader-text"> "%s"</span>"';
// 	return $excerpt;
// }
// add_filter('the_manual_excerpt', 'the_excerpt_more_link', 21);
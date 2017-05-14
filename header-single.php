<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

// Declaring the root directory of the child theme right up front, so I can use it throughout this file.
$child_root = get_stylesheet_directory_uri();

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

  <header id="masthead" class="site-header" role="banner">

    <div class="static-header">
      <div class="static-header-media">
        <div id="wp-static-header" class="wp-static-header">
        <img class="site-branding" src="<?php echo $child_root ?>/mrc-static/single-page-header.jpg" alt="A horizontal stretch of the back of a shadowy church sanctuary, showing a section of three tall, narrow windows letting in blue light from outside" />
        </div>
      </div>
    </div>

    <?php if ( has_nav_menu( 'top' ) ) : ?>
      <div class="navigation-top">
        <div class="wrap">
          <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
        </div><!-- .wrap -->
      </div><!-- .navigation-top -->
    <?php endif; ?>

  </header><!-- #masthead -->

  <?php
  // If a regular post or page, and not the front page, show the featured image.
  if ( has_post_thumbnail() && ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) ) :
    echo '<div class="single-featured-image-header">';
    the_post_thumbnail( 'twentyseventeen-featured-image' );
    echo '</div><!-- .single-featured-image-header -->';
  endif;
  ?>

  <div class="site-content-contain">
    <div id="content" class="site-content">

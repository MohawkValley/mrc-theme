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

<?php

  // Only output CSS for bumping up the footer to match raised text content if the format is the default post format (false value)
  if ( is_single() && get_post_format( get_the_ID() ) == false ) {
?>

<style>
  @media screen and (min-width: 1000px) {
    footer {
      position: relative;
      bottom: 232px;
    }
  }
</style>

<?php
  }
?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

  <header id="masthead" class="site-header" role="banner">

    <div class="custom-header static-header">
      <div class="custom-header-media static">
        <div id="wp-custom-header" class="wp-custom-header static">
        <img class="site-branding static" src="<?php echo $child_root ?>/mrc-static/single-page-header.jpg" alt="A horizontal stretch of the back of a shadowy church sanctuary, showing a section of three tall, narrow windows letting in blue light from outside" />
        </div>
      </div>
      <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
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

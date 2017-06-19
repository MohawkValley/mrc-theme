<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Top Menu', 'twentyseventeen' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) ); echo twentyseventeen_get_svg( array( 'icon' => 'close' ) ); _e( 'Menu', 'twentyseventeen' ); ?></button>
	<?php

    if ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) {
      wp_nav_menu( array(
        'theme_location' => 'top',
        'menu_id'        => 'top-menu',
      ) );
    }
    /* This conidtional structure assumes that the only page other than the front page that will ever be seen is the blog feed page. If the website ever needs to accomodate static pages, these conditionals need to be refined in order to output appropriate menus with appropriate links/anchors for the static content pages. */
    else {
      wp_nav_menu( array(
        'theme_location' => 'top',
        'menu'           => 'Blog Menu',
        'menu_id'        => 'top-menu',
      ) );
    }
  ?>

	<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'twentyseventeen' ); ?></span></a>
	<?php endif; ?>
</nav><!-- #site-navigation -->

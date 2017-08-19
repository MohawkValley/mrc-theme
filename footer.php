<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

<?php

  // The child theme stylesheet displaces the text content above the featured image for normal posts, selected by the default
  // 'article.type-post' class structure. However, the relative positioning leaves a gap, so this is conditionally closed by
  // constraining the max-height of the <main> element by the value of the 232px displacement, subtracted from its default height.

  if ( is_single() ) {
    if ( get_post_type( get_the_ID() ) == 'post' ) {
?>

<?php
  // The child theme stylesheet displaces the text content above the featured image for normal posts, selected by the default
  // 'article.type-post' class structure. However, the relative positioning leaves a gap, so this is conditionally closed by
  // constraining the max-height of the <main> element by the value of the 232px displacement, subtracted from its default height.

  if ( is_single() ) {
    if ( get_post_type( get_the_ID() ) == 'post' ) {
?>

<script>
	jQuery(document).ready(function($) {
		if ($(window).width() > 999) {
			var container = $('#page');
			var oldHeight = container.height();
			var newHeight = oldHeight - 232;
			var newHeightString = newHeight + 'px';
			container.css('overflow', 'hidden');
			container.css('max-height', newHeightString);
		}
	});
</script>


<?php
    }
  }
?>


<?php
    }
  }
?>

</body>
</html>

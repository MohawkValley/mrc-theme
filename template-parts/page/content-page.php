<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php twentyseventeen_edit_link( get_the_ID() ); ?>
	</header><!-- .entry-header -->
	<?php
		/* This helper class 'content-wide' forces the 'entry-content' div to 100% width so that different elements can be placed alongside each other.
		   Some pages need the class only when concatenated on the homepage, which comes from the file 'content-front-page-panels.php'. The Contact page
		   needs the class both when concatenated on the homepage and when viewed as an individual page, so its conditional output goes here. */
		if (is_page('contact')) {
			echo "<div class=\"entry-content content-wide\">";
		}
		else {
			echo "<div class=\"entry-content\">";
		}
	?>
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

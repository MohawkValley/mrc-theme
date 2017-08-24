<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		if ( is_front_page() && ! is_home() ) {
			echo "<header class=\"entry-header front-feed\">";
		}
		else {
			echo "<header class=\"entry-header\">";
		}
	?>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
					echo twentyseventeen_time_link();
					twentyseventeen_edit_link();
				?>
			</div><!-- .entry-meta -->
		<?php elseif ( 'page' === get_post_type() && get_edit_post_link() ) : ?>
			<div class="entry-meta">
				<?php twentyseventeen_edit_link(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php if ( is_front_page() && ! is_home() ) {

			// Output the featured image beside the excerpt for posts in the front page section.
			if ( 'post' === get_post_type() && has_post_thumbnail() ) {
				echo "<div class=\"front-post-thumb\">";
				$homeThumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'home-feed-thumbnail', false);
				$homeThumbTxt = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
		?>
			<img src="<?php echo esc_url($homeThumb[0]); ?>" alt="<?php echo $homeThumbTxt; ?>" />
		<?php
				echo "</div>";
				if ( has_post_thumbnail() ) {
					$thumbnail = true;
				}
			}

			// The excerpt is being displayed within a front page section, so it's a lower hierarchy than h2.
			the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
		} else {
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		} ?>
	</header><!-- .entry-header -->

	<?php
		if ( is_front_page() && ! is_home() ) {
			if ( $thumbnail !== true ) {
				echo "<div class=\"entry-summary front-feed no-thumb\">";
			}
			else {
				echo "<div class=\"entry-summary front-feed\">";
			}
		 }
		 else {
		 	echo "<div class=\"entry-summary\">";
		 }
	?>
		<?php
		the_excerpt();
		// Code for custom excerpt inspired by Read More Excerpt Link plug-in
		if ( has_excerpt() ) {
			$continuelink .= '<a class="more-link" href="' . get_permalink( get_the_ID() ) . '">' . 'Continue reading' . '</a>';
			echo $continuelink;
		}
		?>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->

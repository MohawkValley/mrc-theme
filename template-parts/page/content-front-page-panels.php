<?php
/**
 * Template part for displaying pages on front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

global $twentyseventeencounter;

?>

<article id="panel<?php echo $twentyseventeencounter; ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<div class="panel-content">
		<div class="wrap">
		<?php
			// The <header> definition for the blog posts page needs another CSS hook, which can generically be associated with the property of cotaining a button
			if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) {
				echo "<header class=\"entry-header section-header-button\">";		
			}
			else {
				echo "<header class=\"entry-header\">";
			}
		?>
				<?php
					$slug = get_post_field('post_name');
					echo "<h2 class=\"entry-title\" id=\"";
					echo $slug . "\">";
					the_title();
					echo "</h2>"
				?>

				<?php twentyseventeen_edit_link( get_the_ID() ); ?>

				<?php
				// Outbut button-like link leading to the post page in the header of the section for blog posts
				if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) {
					echo "<a href='/blog/' class='button-link' id='home-blog-button'>Open All Posts</a>";
				}
				?>

			</header><!-- .entry-header -->



			<?php
			/* Adding the helper class 'content-wide' for the pages named Welcome, Events and Activities, and Contact. This forces their content to 100%
			   width so that CSS can position different section side-by-side within them.

			   The Community page will probably also need this class, once we decide what to do with it. */
				if (is_page(array('welcome', 'events', 'contact', 'community'))) {
					echo "<div class=\"entry-content content-wide\">";
				}
				else {
					echo "<div class=\"entry-content\">";
				}
				// When outputting the Community page, set a variable that can be referenced in the footer template to output a <script> element that controls some of the behavior of the donate button.
				if (is_page('community')) {
					$donateButton = true;
				}
			?>
				<?php
					/* translators: %s: Name of current post */
					// if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) {
					// 	echo "<a href='/blog/' class='button-link' id='home-blog-button'>Open All Posts</button>";
					// }
					the_content( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						get_the_title()
					) );
				?>
			</div><!-- .entry-content -->

			<?php
			// Show recent blog posts if is blog posts page (Note that get_option returns a string, so we're casting the result as an int).
			if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) : ?>

				<?php // Show four most recent posts.
				$recent_posts = new WP_Query( array(
					'posts_per_page'      => 3,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				) );
				?>

		 		<?php if ( $recent_posts->have_posts() ) : ?>
					<?php
						if ( is_front_page() && ! is_home() ) {
							echo "<div class=\"recent-posts front-feed\">";
						}
						else {
							echo "<div class=\"recent-posts\">";
						}
					?>

						<?php
						while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
							get_template_part( 'template-parts/post/content', 'excerpt' );
						endwhile;
						wp_reset_postdata();
						?>
					</div><!-- .recent-posts -->
				<?php endif; ?>
			<?php endif; ?>

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->

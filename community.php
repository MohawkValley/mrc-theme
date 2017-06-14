<?php
/**
 * Template Name: Facebook Feed Page
 * Description: A normal page with the Facebook API include code for the church's Facebook webpage. Intended to show a timeline feed as a section on the homepage.
 */

get_header(); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php
				// Getting child theme directory.
	            $child_root = get_stylesheet_directory_uri();
	            // This outputs the donate button when displayed in a separate page, but not when concatenated on the homepage. Do output the PayPal button there, it is added condititionally in 'content-front-page-panels.php'.
	        ?>
			<div class="donate-button">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="5Y26NL5W6XS7L">
					<input type="image" src="<?php echo $child_root ?>/mrc-static/mrc-donate.svg" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					<p>This button leads to a PayPal checkout, where donations are processed.</p>
				</form>
			</div>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();

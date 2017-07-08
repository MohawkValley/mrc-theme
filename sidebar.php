<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php
		if ( ! is_single() ) {
			echo "<div><h2 class='widget-title'>Subscribe by email</h2>";
			// Include code provided by 'Email Subscribers' plugin:
			es_subbox($namefield = "YES", $desc = "", $group = "Public");
			echo "</div>";
		}
	?>
</aside><!-- #secondary -->

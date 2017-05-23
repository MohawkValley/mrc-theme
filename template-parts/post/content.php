<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<?php 
  // Inserting the title... I hope this doesn't put it where I don't want it:
  if ( is_home() ) {
?>
  <h2><a href="<?php the_permalink(); ?>">
<?php
    the_title();
    echo "</a></h2>";
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php
    if ( is_sticky() && is_home() ) :
      echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
    endif;
  ?>
  <?php
    if ( is_front_page() ) {
      echo "<header class=\"entry-header\">";
    }
    else {
      echo "<header class=\"entry-header not-front\">";
    }
  ?>
    <?php
      if ( 'post' === get_post_type() ) :
        echo '<div class="entry-meta">';
          if ( is_single() ) :
            twentyseventeen_posted_on();
          else :
            echo twentyseventeen_time_link();
            twentyseventeen_edit_link();
          endif;
        echo '</div><!-- .entry-meta -->';
      endif;

      if ( is_single() ) {
        the_title( '<h1 class="entry-title">', '</h1>' );
      } else {
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
      }
    ?>
  </header><!-- .entry-header -->

  <?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
    <div class="post-thumbnail">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
      </a>
    </div><!-- .post-thumbnail -->
  <?php endif; ?>

  <div class="entry-content">
    <?php
      /* translators: %s: Name of current post */
      the_content( sprintf(
        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
        get_the_title()
      ) );

      wp_link_pages( array(
        'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
      ) );
    ?>
    <?php
      // Adding copyright notice on Pastor's newsletter editorials
      if ( in_category('Pastor\'s editorial') ) {
    ?>
      <div class="post-type-signature">
        <?php
          // Getting child theme directory.
          $child_root = get_stylesheet_directory_uri();
        ?>
        <img src="<?php echo $child_root ?>/mrc-static/pastor-brian-signature.svg" alt="The hand-written, cursive signature of Pastor Brian" />
      </div>
      <div class="post-type-attr">
        <p>These Newsletter entries are written by Pastor Brian Engel. Please do not copy them or use them in any context without contacting him first.</p>
      </div>
    <?php } ?>
  </div><!-- .entry-content -->

  <?php if ( is_single() ) : ?>
    <?php twentyseventeen_entry_footer(); ?>
  <?php endif; ?>

</article><!-- #post-## -->

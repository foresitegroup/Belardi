<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<?php if ( !is_single() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class($bi_class); ?>>
<?php endif; ?>

	<header class="entry-header<?php if ( is_single() ) { echo " black"; } ?>">
		<div class="content-width">
			<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
			<?php twentyfifteen_entry_meta(); ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content content-width<?php if ( !is_single() ) { echo " blog-index"; } ?>">
		<?php
		  if ( is_single() ) :
		  	twentyfifteen_post_thumbnail();

				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s', 'twentyfifteen' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				the_tags( '<span class="tags-links">Tags: ', ', ', '</span>' );
			else :
				the_excerpt();
			  echo "<a href=\"" . get_permalink() . "\">READ MORE</a>";
			endif;

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

<?php if ( !is_single() ) : ?>
</article><!-- #post-## -->
<?php if ($bi_class == "bi-right") echo "<div style=\"clear: both;\"></div>\n"; ?>
<?php endif; ?>
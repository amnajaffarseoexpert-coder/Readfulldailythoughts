<?php
/**
 * FTD archive and category template.
 *
 * @package FTD_Newsup_Child
 */

get_header();

$archive_title = get_the_archive_title();

if ( is_category() ) {
	$archive_title = single_cat_title( '', false );
} elseif ( is_tag() ) {
	$archive_title = single_tag_title( '', false );
} elseif ( is_author() ) {
	$archive_title = get_the_author();
}
?>
<main id="content" class="ftd-main ftd-archive-main">
	<section class="ftd-page-hero">
		<div class="ftd-container">
			<p class="ftd-kicker">Free Thought Daily</p>
			<h1><?php echo esc_html( $archive_title ); ?></h1>
			<?php the_archive_description( '<div class="ftd-page-description">', '</div>' ); ?>
		</div>
	</section>

	<div class="ftd-container ftd-content-layout">
		<section class="ftd-post-list">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/ftd', 'card' ); ?>
				<?php endwhile; ?>
				<?php the_posts_pagination(); ?>
			<?php else : ?>
				<p class="ftd-empty"><?php esc_html_e( 'No stories found in this section yet.', 'ftd-newsup-child' ); ?></p>
			<?php endif; ?>
		</section>
		<?php get_template_part( 'template-parts/ftd', 'sidebar' ); ?>
	</div>
</main>
<?php
get_footer();

<?php
/**
 * FTD search template.
 *
 * @package FTD_Newsup_Child
 */

get_header();
?>
<main id="content" class="ftd-main ftd-archive-main">
	<section class="ftd-page-hero">
		<div class="ftd-container">
			<p class="ftd-kicker">Search</p>
			<h1><?php printf( esc_html__( 'Search results for "%s"', 'ftd-newsup-child' ), esc_html( get_search_query() ) ); ?></h1>
		</div>
	</section>

	<div class="ftd-container ftd-content-layout">
		<section class="ftd-post-list">
			<form class="ftd-search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label class="screen-reader-text" for="ftd-search-field"><?php esc_html_e( 'Search', 'ftd-newsup-child' ); ?></label>
				<input id="ftd-search-field" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search stories', 'ftd-newsup-child' ); ?>">
				<button type="submit"><?php esc_html_e( 'Search', 'ftd-newsup-child' ); ?></button>
			</form>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/ftd', 'card' ); ?>
				<?php endwhile; ?>
				<?php the_posts_pagination(); ?>
			<?php else : ?>
				<p class="ftd-empty"><?php esc_html_e( 'No matching stories found.', 'ftd-newsup-child' ); ?></p>
			<?php endif; ?>
		</section>
		<?php get_template_part( 'template-parts/ftd', 'sidebar' ); ?>
	</div>
</main>
<?php
get_footer();

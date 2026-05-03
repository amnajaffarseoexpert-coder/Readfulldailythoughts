<?php
/**
 * FTD single post template.
 *
 * @package FTD_Newsup_Child
 */

get_header();
?>
<main id="content" class="ftd-main">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class( 'ftd-single' ); ?>>
			<header class="ftd-single__header">
				<div class="ftd-container">
					<p class="ftd-kicker"><?php echo esc_html( ftd_site_primary_category( get_the_ID() ) ); ?></p>
					<h1><?php the_title(); ?></h1>
					<div class="ftd-post-meta">By <?php the_author_posts_link(); ?> | <?php echo esc_html( get_the_date() ); ?></div>
				</div>
			</header>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="ftd-container">
					<figure class="ftd-single__image"><?php the_post_thumbnail( 'large' ); ?></figure>
				</div>
			<?php endif; ?>
			<div class="ftd-container ftd-single__body">
				<div class="ftd-single__content">
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				</div>
				<?php get_template_part( 'template-parts/ftd', 'sidebar' ); ?>
			</div>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();

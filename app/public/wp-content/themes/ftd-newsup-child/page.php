<?php
/**
 * FTD page template.
 *
 * @package FTD_Newsup_Child
 */

get_header();
?>
<main id="content" class="ftd-main">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class( 'ftd-single ftd-page' ); ?>>
			<header class="ftd-single__header">
				<div class="ftd-container">
					<p class="ftd-kicker">Free Thought Daily</p>
					<h1><?php the_title(); ?></h1>
				</div>
			</header>
			<div class="ftd-container ftd-single__body ftd-single__body--narrow">
				<div class="ftd-single__content">
					<?php the_content(); ?>
				</div>
			</div>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();

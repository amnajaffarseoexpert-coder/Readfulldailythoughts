<?php
/**
 * FTD archive card.
 *
 * @package FTD_Newsup_Child
 */
?>
<article <?php post_class( 'ftd-card' ); ?>>
	<a class="ftd-card__image" href="<?php the_permalink(); ?>">
		<img src="<?php echo esc_url( ftd_site_post_image( get_the_ID(), 'medium_large' ) ); ?>" alt="">
	</a>
	<div class="ftd-card__body">
		<p class="ftd-kicker"><?php echo esc_html( ftd_site_primary_category( get_the_ID() ) ); ?></p>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p><?php echo esc_html( ftd_site_excerpt( get_the_ID(), 28 ) ); ?></p>
		<div class="ftd-post-meta">By <?php the_author_posts_link(); ?> | <?php echo esc_html( human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?> ago</div>
	</div>
</article>

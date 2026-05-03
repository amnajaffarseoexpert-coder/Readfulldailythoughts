<?php
/**
 * FTD sidebar.
 *
 * @package FTD_Newsup_Child
 */

$recent_posts = get_posts(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 5,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
);
?>
<aside class="ftd-aside">
	<section class="ftd-widget ftd-widget--search">
		<h2><?php esc_html_e( 'Search', 'ftd-newsup-child' ); ?></h2>
		<form class="ftd-search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="screen-reader-text" for="ftd-sidebar-search"><?php esc_html_e( 'Search', 'ftd-newsup-child' ); ?></label>
			<input id="ftd-sidebar-search" type="search" name="s" placeholder="<?php esc_attr_e( 'Search stories', 'ftd-newsup-child' ); ?>">
			<button type="submit"><?php esc_html_e( 'Search', 'ftd-newsup-child' ); ?></button>
		</form>
	</section>

	<section class="ftd-widget">
		<h2><?php esc_html_e( 'Recent Posts', 'ftd-newsup-child' ); ?></h2>
		<ul class="ftd-recent-list">
			<?php foreach ( $recent_posts as $recent_post ) : ?>
				<li><a href="<?php echo esc_url( get_permalink( $recent_post ) ); ?>"><?php echo esc_html( get_the_title( $recent_post ) ); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</section>

	<section id="ftd-subscribe" class="ftd-widget ftd-aside-subscribe">
		<h2><?php esc_html_e( 'Stay Informed', 'ftd-newsup-child' ); ?></h2>
		<p><?php esc_html_e( 'Get the stories that matter, straight to your inbox.', 'ftd-newsup-child' ); ?></p>
		<a class="ftd-button" href="#"><?php esc_html_e( 'Subscribe', 'ftd-newsup-child' ); ?></a>
	</section>
</aside>

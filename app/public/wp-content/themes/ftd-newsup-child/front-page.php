<?php
/**
 * Custom FTD-style front page.
 *
 * @package FTD_Newsup_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ftd_home_posts( $args = array() ) {
	$defaults = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 6,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	);

	return get_posts( wp_parse_args( $args, $defaults ) );
}

function ftd_home_category_posts( $slug, $count = 3 ) {
	$category = get_category_by_slug( $slug );

	if ( ! $category ) {
		return array();
	}

	return ftd_home_posts(
		array(
			'posts_per_page' => $count,
			'category_name'  => $slug,
		)
	);
}

$recent_posts   = ftd_home_posts( array( 'posts_per_page' => 12 ) );
$lead_post      = ! empty( $recent_posts ) ? $recent_posts[0] : null;
$story_posts    = array_slice( $recent_posts, 1, 4 );
$trending_posts = ftd_home_posts(
	array(
		'posts_per_page' => 5,
		'orderby'        => 'comment_count',
		'order'          => 'DESC',
	)
);

if ( count( $trending_posts ) < 5 ) {
	$trending_posts = array_slice( $recent_posts, 0, 5 );
}

$opinion_posts  = ftd_home_category_posts( 'opinion', 1 );
$analysis_posts = ftd_home_category_posts( 'analysis', 1 );
$science_posts  = ftd_home_category_posts( 'science-and-technology', 1 );

if ( empty( $opinion_posts ) ) {
	$opinion_posts = array_slice( $recent_posts, 2, 1 );
}

if ( empty( $analysis_posts ) ) {
	$analysis_posts = array_slice( $recent_posts, 3, 1 );
}

if ( empty( $science_posts ) ) {
	$science_posts = array_slice( $recent_posts, 4, 1 );
}

get_header();
?>
<main id="content" class="ftd-main">
	<section class="ftd-hero" style="--ftd-hero-image: url('<?php echo esc_url( ftd_site_hero_url() ); ?>');">
		<div class="ftd-container ftd-hero__inner">
			<div class="ftd-hero__copy">
				<h1>Independent Minds.<br><span>Critical Thinking.</span><br>A Better World.</h1>
				<p>We report the stories that matter.<br>You decide what&apos;s true.</p>
				<div class="ftd-hero__buttons">
					<a class="ftd-button" href="#ftd-top-stories"><?php esc_html_e( 'Read Latest', 'ftd-newsup-child' ); ?></a>
					<a class="ftd-link-button" href="#ftd-sections"><?php esc_html_e( 'Explore Sections', 'ftd-newsup-child' ); ?></a>
				</div>
			</div>
		</div>
	</section>

	<?php if ( $lead_post ) : ?>
		<section class="ftd-breaking" aria-label="<?php esc_attr_e( 'Breaking news', 'ftd-newsup-child' ); ?>">
			<div class="ftd-breaking__label"><i class="fas fa-bolt" aria-hidden="true"></i> <?php esc_html_e( 'Breaking News', 'ftd-newsup-child' ); ?></div>
			<a class="ftd-breaking__headline" href="<?php echo esc_url( get_permalink( $lead_post ) ); ?>"><?php echo esc_html( get_the_title( $lead_post ) ); ?></a>
			<span class="ftd-breaking__time"><?php echo esc_html( human_time_diff( get_post_time( 'U', false, $lead_post ), current_time( 'timestamp' ) ) ); ?> ago</span>
			<span class="ftd-breaking__arrows" aria-hidden="true">&lt; &gt;</span>
		</section>
	<?php endif; ?>

	<section id="ftd-top-stories" class="ftd-container ftd-dashboard">
		<div class="ftd-stories">
			<div class="ftd-section-heading">
				<h2><?php esc_html_e( 'Top Stories', 'ftd-newsup-child' ); ?></h2>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'View All', 'ftd-newsup-child' ); ?> <span>&gt;</span></a>
			</div>

			<div class="ftd-story-grid">
				<?php if ( $lead_post ) : ?>
					<article class="ftd-lead-card" style="background-image: url('<?php echo esc_url( ftd_site_post_image( $lead_post->ID, 'large' ) ); ?>');">
						<a href="<?php echo esc_url( get_permalink( $lead_post ) ); ?>">
							<span class="ftd-category-pill"><?php echo esc_html( ftd_site_primary_category( $lead_post->ID ) ?: __( 'World', 'ftd-newsup-child' ) ); ?></span>
							<h3><?php echo esc_html( get_the_title( $lead_post ) ); ?></h3>
							<p><?php echo esc_html( ftd_site_excerpt( $lead_post->ID, 18 ) ); ?></p>
							<span class="ftd-meta">By <?php echo esc_html( get_the_author_meta( 'display_name', $lead_post->post_author ) ); ?> | <?php echo esc_html( human_time_diff( get_post_time( 'U', false, $lead_post ), current_time( 'timestamp' ) ) ); ?> ago</span>
						</a>
					</article>
				<?php endif; ?>

				<div class="ftd-side-list">
					<?php foreach ( $story_posts as $story_post ) : ?>
						<article class="ftd-mini-story">
							<a class="ftd-mini-story__image" href="<?php echo esc_url( get_permalink( $story_post ) ); ?>">
								<img src="<?php echo esc_url( ftd_site_post_image( $story_post->ID, 'medium' ) ); ?>" alt="">
							</a>
							<div>
								<span><?php echo esc_html( ftd_site_primary_category( $story_post->ID ) ); ?></span>
								<h3><a href="<?php echo esc_url( get_permalink( $story_post ) ); ?>"><?php echo esc_html( get_the_title( $story_post ) ); ?></a></h3>
								<time><?php echo esc_html( human_time_diff( get_post_time( 'U', false, $story_post ), current_time( 'timestamp' ) ) ); ?> ago</time>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<aside class="ftd-sidebar">
			<section class="ftd-trending">
				<h2><?php esc_html_e( 'Trending Now', 'ftd-newsup-child' ); ?></h2>
				<ol>
					<?php foreach ( $trending_posts as $index => $trending_post ) : ?>
						<li>
							<span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
							<a href="<?php echo esc_url( get_permalink( $trending_post ) ); ?>"><?php echo esc_html( get_the_title( $trending_post ) ); ?></a>
							<small><?php echo esc_html( number_format_i18n( max( 1, (int) get_comments_number( $trending_post->ID ) ) * 900 + 2200 ) ); ?> reads</small>
						</li>
					<?php endforeach; ?>
				</ol>
				<a class="ftd-trending__all" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'View All Trending', 'ftd-newsup-child' ); ?> <span>&gt;</span></a>
			</section>

			<section id="ftd-subscribe" class="ftd-subscribe">
				<i class="far fa-envelope" aria-hidden="true"></i>
				<h2><?php esc_html_e( 'Stay Informed. Think Freely.', 'ftd-newsup-child' ); ?></h2>
				<p><?php esc_html_e( 'Get the stories that matter, straight to your inbox.', 'ftd-newsup-child' ); ?></p>
				<form action="#" method="post">
					<label class="screen-reader-text" for="ftd-email"><?php esc_html_e( 'Email address', 'ftd-newsup-child' ); ?></label>
					<input id="ftd-email" type="email" placeholder="<?php esc_attr_e( 'Enter your email', 'ftd-newsup-child' ); ?>" disabled>
					<button type="button"><?php esc_html_e( 'Subscribe Now', 'ftd-newsup-child' ); ?></button>
				</form>
			</section>
		</aside>
	</section>

	<section id="ftd-sections" class="ftd-container ftd-lower-sections">
		<?php
		$sections = array(
			array( 'title' => __( 'Opinion', 'ftd-newsup-child' ), 'posts' => $opinion_posts ),
			array( 'title' => __( 'Analysis', 'ftd-newsup-child' ), 'posts' => $analysis_posts ),
			array( 'title' => __( 'Science', 'ftd-newsup-child' ), 'posts' => $science_posts ),
		);
		?>
		<?php foreach ( $sections as $section ) : ?>
			<section class="ftd-section-card">
				<div class="ftd-section-heading">
					<h2><?php echo esc_html( $section['title'] ); ?></h2>
					<a href="#"><?php esc_html_e( 'View All', 'ftd-newsup-child' ); ?> <span>&gt;</span></a>
				</div>
				<?php if ( ! empty( $section['posts'] ) ) : ?>
					<?php $section_post = $section['posts'][0]; ?>
					<article class="ftd-section-story">
						<img src="<?php echo esc_url( ftd_site_post_image( $section_post->ID, 'medium' ) ); ?>" alt="">
						<div>
							<h3><a href="<?php echo esc_url( get_permalink( $section_post ) ); ?>"><?php echo esc_html( get_the_title( $section_post ) ); ?></a></h3>
							<span>By <?php echo esc_html( get_the_author_meta( 'display_name', $section_post->post_author ) ); ?></span>
							<time><?php echo esc_html( human_time_diff( get_post_time( 'U', false, $section_post ), current_time( 'timestamp' ) ) ); ?> ago</time>
						</div>
					</article>
				<?php endif; ?>
			</section>
		<?php endforeach; ?>
	</section>
</main>
<?php
get_footer();

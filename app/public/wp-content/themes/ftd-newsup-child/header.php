<?php
/**
 * Shared FTD header.
 *
 * @package FTD_Newsup_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'ftd-site-page' ); ?>>
<?php wp_body_open(); ?>
<div id="page" class="ftd-site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ftd-newsup-child' ); ?></a>
	<header class="ftd-header">
		<div class="ftd-topbar">
			<div class="ftd-container ftd-topbar__inner">
				<p>Independent Minds. <span>Critical Thinking.</span> A Better World.</p>
				<nav class="ftd-social" aria-label="<?php esc_attr_e( 'Social links', 'ftd-newsup-child' ); ?>">
					<a href="#" aria-label="Facebook">f</a>
					<a href="#" aria-label="X">X</a>
					<a href="#" aria-label="Instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
					<a href="#" aria-label="YouTube"><i class="fab fa-youtube" aria-hidden="true"></i></a>
				</nav>
			</div>
		</div>

		<div class="ftd-mainnav">
			<div class="ftd-container ftd-mainnav__inner">
				<a class="ftd-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Free Thought Daily home', 'ftd-newsup-child' ); ?>">
					<img src="<?php echo esc_url( ftd_site_logo_url() ); ?>" alt="<?php esc_attr_e( 'Free Thought Daily', 'ftd-newsup-child' ); ?>">
				</a>

				<nav class="ftd-menu" aria-label="<?php esc_attr_e( 'Primary sections', 'ftd-newsup-child' ); ?>">
					<a href="<?php echo esc_url( ftd_site_category_url( 'news' ) ); ?>">News</a>
					<a href="<?php echo esc_url( ftd_site_category_url( 'opinion' ) ); ?>">Opinion</a>
					<a href="<?php echo esc_url( ftd_site_category_url( 'analysis' ) ); ?>">Analysis</a>
					<a href="<?php echo esc_url( ftd_site_category_url( 'science-and-technology' ) ); ?>">Science</a>
					<a href="<?php echo esc_url( ftd_site_category_url( 'humanism' ) ); ?>">Humanism</a>
					<a href="<?php echo esc_url( ftd_site_category_url( 'culture' ) ); ?>">Culture</a>
					<a href="<?php echo esc_url( ftd_site_category_url( 'international' ) ); ?>">International</a>
				</nav>

				<div class="ftd-actions">
					<div class="ftd-languages" aria-label="<?php esc_attr_e( 'Languages', 'ftd-newsup-child' ); ?>">
						<a class="is-active" href="#">EN</a>
						<a href="#">Bangla</a>
						<a href="#">Arabic</a>
					</div>
					<a class="ftd-search" href="<?php echo esc_url( home_url( '/?s=' ) ); ?>" aria-label="<?php esc_attr_e( 'Search', 'ftd-newsup-child' ); ?>"><i class="fas fa-search" aria-hidden="true"></i></a>
					<a class="ftd-button ftd-button--small" href="#ftd-subscribe"><?php esc_html_e( 'Subscribe', 'ftd-newsup-child' ); ?></a>
				</div>
			</div>
		</div>
	</header>

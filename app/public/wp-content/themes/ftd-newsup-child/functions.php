<?php
/**
 * FTD Newsup Child theme functions.
 *
 * @package FTD_Newsup_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load the parent theme stylesheet before Newsup's color layer.
 */
function ftd_newsup_child_enqueue_parent_style() {
	wp_enqueue_style(
		'newsup-parent-style',
		get_template_directory_uri() . '/style.css',
		array( 'bootstrap' ),
		defined( 'NEWSUP_THEME_VERSION' ) ? NEWSUP_THEME_VERSION : wp_get_theme( 'newsup' )->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'ftd_newsup_child_enqueue_parent_style', 5 );

/**
 * Load the custom FTD global and homepage stylesheets.
 */
function ftd_newsup_child_enqueue_brand_assets() {
	wp_enqueue_style(
		'ftd-global',
		get_stylesheet_directory_uri() . '/assets/css/ftd-global.css',
		array( 'newsup-parent-style', 'font-awesome-5-all' ),
		wp_get_theme()->get( 'Version' )
	);

	if ( is_front_page() ) {
		wp_enqueue_style(
			'ftd-home',
			get_stylesheet_directory_uri() . '/assets/css/ftd-home.css',
			array( 'ftd-global' ),
			wp_get_theme()->get( 'Version' )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'ftd_newsup_child_enqueue_brand_assets', 30 );

function ftd_site_asset_url( $file ) {
	return content_url( 'uploads/2026/05/' . ltrim( $file, '/' ) );
}

function ftd_site_logo_url() {
	return ftd_site_asset_url( 'WhatsApp_Image_2026-05-01_at_5.47.16_PM__1_-removebg-preview.png' );
}

function ftd_site_hero_url() {
	return ftd_site_asset_url( 'ChatGPT-Image-May-3-2026-02_18_42-AM.png' );
}

function ftd_site_category_url( $slug ) {
	$category = get_category_by_slug( $slug );

	if ( $category ) {
		return get_category_link( $category );
	}

	return '#';
}

function ftd_site_primary_category( $post_id = null ) {
	$categories = get_the_category( $post_id );

	if ( empty( $categories ) || is_wp_error( $categories ) ) {
		return '';
	}

	return $categories[0]->name;
}

function ftd_site_post_image( $post_id = null, $size = 'large' ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$image   = get_the_post_thumbnail_url( $post_id, $size );

	return $image ? $image : ftd_site_hero_url();
}

function ftd_site_excerpt( $post_id = null, $words = 24 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$excerpt = get_the_excerpt( $post_id );

	if ( ! $excerpt ) {
		$excerpt = wp_strip_all_tags( get_post_field( 'post_content', $post_id ) );
	}

	return wp_trim_words( $excerpt, $words, '' );
}

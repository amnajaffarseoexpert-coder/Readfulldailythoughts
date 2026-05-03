<?php
/**
 * Shared FTD footer.
 *
 * @package FTD_Newsup_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	<footer class="ftd-footer">
		<div class="ftd-container ftd-footer__inner">
			<a class="ftd-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo esc_url( ftd_site_logo_url() ); ?>" alt="<?php esc_attr_e( 'Free Thought Daily', 'ftd-newsup-child' ); ?>">
			</a>
			<p>Independent Minds. <span>Critical Thinking.</span> A Better World.</p>
			<nav class="ftd-footer__nav" aria-label="<?php esc_attr_e( 'Footer sections', 'ftd-newsup-child' ); ?>">
				<a href="<?php echo esc_url( ftd_site_category_url( 'news' ) ); ?>">News</a>
				<a href="<?php echo esc_url( ftd_site_category_url( 'opinion' ) ); ?>">Opinion</a>
				<a href="<?php echo esc_url( ftd_site_category_url( 'science-and-technology' ) ); ?>">Science</a>
				<a href="<?php echo esc_url( ftd_site_category_url( 'humanism' ) ); ?>">Humanism</a>
			</nav>
		</div>
		<div class="ftd-footer__bottom">
			<div class="ftd-container">Copyright <?php echo esc_html( gmdate( 'Y' ) ); ?> Free Thought Daily.</div>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>

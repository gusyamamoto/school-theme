<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<nav id="footer-left" class="footer-left">
    		<?php wp_nav_menu( array( 'theme_location' => 'footer-left') ); ?>
		</nav>

		<nav id="footer-right" class="footer-right">
    		<?php wp_nav_menu( array( 'theme_location' => 'footer-right') ); ?>
		</nav>



		<div class="site-info">
		<?php esc_html_e( 'Created by ', 'school-theme' ); ?><a href="<?php echo esc_url( __( 'https://wp.bcitwebdeveloper.ca/', 'school-theme' ) ); ?>"><?php esc_html_e( 'Beata Kozma & Jonathon Leathers.', 'school-theme' ); ?></a>
		<?php esc_html_e( 'Photos courtesy of ', 'school-theme' ); ?><a href="<?php echo esc_url( __( 'https://www.shopify.com/stock-photos', 'school-theme' ) ); ?>"><?php esc_html_e( 'Burst.', 'school-theme' ); ?></a>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

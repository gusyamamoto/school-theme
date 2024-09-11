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
		<?php wp_nav_menu(array('theme_location' => 'footer-left')); ?>
	</nav>

	<nav id="footer-right" class="footer-right">
		<?php wp_nav_menu(array('theme_location' => 'footer-right')); ?>
	</nav>



	<div class="site-info">
		<a href="<?php echo esc_url(__('https://wordpress.org/', 'school-theme')); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(esc_html__('Proudly powered by %s', 'school-theme'), 'WordPress');
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Theme: %1$s by %2$s.', 'school-theme'), 'school-theme', '<a href="https://ghyamamoto.com/school">Gustavo & Laura</a>');
		?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
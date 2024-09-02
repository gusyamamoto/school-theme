<?php
/**
 * The template for displaying the home page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
			?>
				<section class="home-intro"></section>
				<section class="home-block-left"></section>
				<section class="home-block-left"></section>
				<section class="home-image-full-width"></section>
				<section class="paragraph"></section>
				<section class="home-recent-news"></section>
			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

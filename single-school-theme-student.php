<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="entry-content single-student-content">
			<?php
			while ( have_posts() ) :
				the_post();
				the_post_thumbnail( 'single-student' );?>
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'school-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'school-theme' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
		<h3 class="title-other-students">Meet the other students</h3>
		<?php
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-title">%title</span>',
					)
				);


		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

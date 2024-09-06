<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">


		<?php
		while ( have_posts() ) :
			the_post();			
		?>	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<section class="staff-intro">
				<?php
				if ( function_exists( 'get_field' ) ) {
					if ( get_field( 'top_section' ) ) {
						the_field( 'top_section' );
					}
				}
				?>				
			</section>

			<section class="staff-adm">
				<?php
				if ( function_exists( 'get_field' ) ) {
					if ( get_field( 'staff_type_a' ) ) {
						echo '<h2>';
						the_field( 'staff_type_a' );
						echo '</h2>';
					}
				}
				?>

				<div class="staff-adm-left">
				<?php
				if ( function_exists( 'get_field' ) ) {
					if ( get_field( 'staff_type_a_1' ) ) {
						echo '<h3>';
						the_field( 'staff_type_a_1' );
						echo '</h3>';
					}
					if ( get_field( 'staff_type_a_1_description' ) ) {
						echo '<p>';
						the_field( 'staff_type_a_1_description' );
						echo '</p>';
					}
				}
				?>
				</div>
				
				<div class="staff-adm-right">
				<?php
				if ( function_exists( 'get_field' ) ) {
					if ( get_field( 'staff_type_a_2' ) ) {
						echo '<h3>';
						the_field( 'staff_type_a_2' );
						echo '</h3>';
					}
					if ( get_field( 'staff_type_a_2_description' ) ) {
						echo '<p>';
						the_field( 'staff_type_a_2_description' );
						echo '</p>';
					}
				}
				?>
				</div>
			</section>
				
			<section class="staff-fac">
				<div class="staff-fac-left">
					<?php
					if ( function_exists( 'get_field' ) ) {
						if ( get_field( 'staff_type_b_1' ) ) {
							echo '<h3>';
							the_field( 'staff_type_b_1' );
							echo '</h3>';
						}
						if ( get_field( 'staff_type_b_1_description' ) ) {
							echo '<p>';
							the_field( 'staff_type_b_1_description' );
							echo '</p>';
						}
						if ( get_field( 'staff_type_b_1_courses' ) ) {
							echo '<p>';
							the_field( 'staff_type_b_1_courses' );
							echo '</p>';
						}
						if ( get_field( 'staff_type_b_1_site' ) ) {
							echo '<a href="https://google.com" target="blank">';
							the_field( 'staff_type_b_1_site' );
							echo '</a>';
						}
					}
					?>
				</div>
				<div class="staff-fac-right">
					<?php
					if ( function_exists( 'get_field' ) ) {
							if ( get_field( 'staff_type_b_2' ) ) {
								echo '<h3>';
								the_field( 'staff_type_b_2' );
								echo '</h3>';
							}
							if ( get_field( 'staff_type_b_2_description' ) ) {
								echo '<p>';
								the_field( 'staff_type_b_2_description' );
								echo '</p>';
							}
							if ( get_field( 'staff_type_b_2_courses' ) ) {
								echo '<p>';
								the_field( 'staff_type_b_2_courses' );
								echo '</p>';
							}
							if ( get_field( 'staff_type_b_2_site' ) ) {
								echo '<a href="https://google.com" target="blank">';
								the_field( 'staff_type_b_2_site' );
								echo '</a>';
							}
						}
						?>
				</div>
			</section>

			<?php school_theme_post_thumbnail(); ?>

			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'school-theme' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->

			<?php if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'school-theme' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						),
						'<span class="edit-link">',
						'</span>'
					);
					?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</article><!-- #post-<?php the_ID(); ?> -->
							
		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

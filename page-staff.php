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

			

			<div class="entry-content">
				<?php
				the_content();

				$terms = get_terms( 
					array(
						'taxonomy' => 'school-theme-staff-category',
					) 
				);
		
				if ( $terms && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
						
						$args = array(
							'post_type'      => 'school-theme-staff',
							'posts_per_page' => -1,
							'orderby'        => 'title',
							'order'          => 'ASC',
							'tax_query'      => array (
								array (
									'taxonomy' => 'school-theme-staff-category',
									'field'    => 'slug',
									'terms'    => $term->slug
								)
							)
						);
						$query = new WP_Query( $args );
						
						?>
						<h2><?php echo esc_html( $term->name ); ?></h2>
						<?php
						 
						if ( $query->have_posts() ) : ?>
						<article>
							<?php
							while ( $query->have_posts() ) :
								$query->the_post(); 
								?>
								<article id='<?php the_ID(); ?>'>
									<h3><?php the_title(); ?></h3>
									<?php
									if (get_field('biography')) { ?>
										<p><?php the_field('biography'); ?></p>
										<?php
									} else {
										echo '<p>No biography available.</p>';
									};

									if (get_field('courses')) { ?>
										<p>Courses: <?php the_field('courses'); ?></p>
										<?php									
									};

									if (get_field('website')) { ?>
										<a href="<?php the_field('website'); ?>">Instructor Website</a>
										<?php									
									};

									?>											
								</article>
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</article>
						<?php endif;
					}
				}

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
get_footer();

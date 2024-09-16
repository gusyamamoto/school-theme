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

			<?php school_theme_post_thumbnail(); ?>

			<div class="entry-content">
			<?php the_content();

			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'schedule_intro' ) ) {
					the_field( 'schedule_intro' );
				}
			}

			?><br>
			
			<div class="table-title"><?php
			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'table_caption' ) ) {
					the_field( 'table_caption' );
				}
			}	
			?></div><?php

			if( have_rows('weekly_course_schedule') ): ?>
				<table>
					<thead>
						<tr>
							<th>Date</th>
							<th>Course</th>
							<th>Instructor</th>
						</tr>
					</thead>
					<tbody>
					<?php while( have_rows('weekly_course_schedule') ) { the_row(); ?>
						<tr>
							<td><?php the_sub_field('course_schedule_date'); ?></td>
							<td><?php the_sub_field('course_schedule_course'); ?></td>
							<td><?php the_sub_field('course_schedule_instructor'); ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<?php else: ?>
					<p>No schedule available.</p>
				<?php endif; ?>
			</div>



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
				</footer>
			<?php endif; ?>
		</article><?php
		endwhile; 
		?>
	</main>
<?php
get_footer();

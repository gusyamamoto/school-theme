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

		<?php
		while ( have_posts() ) :
			the_post();

			?><header class="entry-header"><?php
			
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
	
			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					school_theme_posted_on();
					school_theme_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<div class="single-student-img"><?php the_post_thumbnail('single-student'); ?></div>
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
		</div><!-- .entry-content -->

			<br>
			<h3>Meet other Students</h3>
			<br><?php

			the_post_navigation(
				array(
					'</span> <span class="nav-title">%title</span>',
					'</span> <span class="nav-title">%title</span>',
				)
			);

			

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			
			$args = array(
    			'post_type'      => 'school-theme-student',
    			'posts_per_page' => -1,
				'tax_query' 	 => array (
					array(
						'taxonomy' => 'school-theme-student-category',
						'field'    => 'slug',
						'terms'    => 'developer'
					)
				)
			);
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				?><section class="students-wrapper"><?php
				
   				while( $query->have_posts() ) {
        			$query->the_post(); 
					?>
					<article>
						<a href="<?php the_permalink( ); ?>">
							<h2><?php the_title(  ); ?></h2>
						</a>
							<?php the_post_thumbnail( 'large' ); ?>
						<?php the_excerpt(  ); ?>
						<p>Specialty: <?php the_terms( get_the_ID(), 'school-theme-student-category', '', ', ', '' ); ?></p>
					</article>
					<?php
				}
				wp_reset_postdata();
				echo '</section>';
			}
			?>
			</section>
			<?php
			$args = array(
    			'post_type'      => 'school-theme-student',
    			'posts_per_page' => -1,
				'tax_query' 	 => array (
					array(
						'taxonomy' => 'school-theme-student-category',
						'field'    => 'slug',
						'terms'    => 'designer'
					)
				)
			);
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				?><section class="works-wrapper"><?php

				
   				while( $query->have_posts() ) {
        			$query->the_post(); 
					?>
					<article>
						<a href="<?php the_permalink( ); ?>">
							<h2><?php the_title(  ); ?></h2>
						</a>
						<?php the_post_thumbnail( 'large' ); ?>
						<?php the_excerpt(  ); ?>
						<p>Specialty: <?php the_terms( get_the_ID(), 'school-theme-student-category', '', ', ', '' ); ?></p>
					</article>
					<?php
				}
				wp_reset_postdata();
				echo '</section>';
			}
			?>
			</section>
			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();

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
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
			?>
				<article>
					<a href="<?php the_permalink(); ?>">
						<h2><?php the_title(); ?></h2>
					</a>
					<div class="taxonomy-student-img">
						<?php the_post_thumbnail('taxonomy-students')?>
					</div>
					<?php the_content();?>
				</article>
			<?php
			endwhile;

	the_posts_navigation();

	else :

	get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

	</main><!-- #main -->

<?php
get_footer();

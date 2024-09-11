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

<div class="home-news-wrap">
				<?php
				$args = array( 
					'post_type'      => 'post',
					'posts_per_page' => 3,
						
					
				);
				$blog_query = new WP_Query( $args );
				if ( $blog_query -> have_posts() ) {
					while ( $blog_query -> have_posts() ) {
						$blog_query -> the_post();
						?>
						<article class="home-recent-news">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'recent-news-home' ) ?>
                				<h3><?php the_title(); ?></h3>
            				</a>
						</article>
						<?php
					}
					wp_reset_postdata();
				}
				?>
				</div>

			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

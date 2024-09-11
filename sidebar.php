<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

if ( ! is_home() ) {
    return; // Do not display the sidebar if it's not the blog page
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->

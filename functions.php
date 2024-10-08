<?php
/**
 * School Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package School_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function school_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on School Theme, use a find and replace
		* to change 'school-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'school-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// add_theme_support( 'menus' );

	add_theme_support( 'align-wide' );

	// Cropping to Recent News in the Home Page
	add_image_size( 'recent-news-home', 300, 200, true ); 

	// Cropping to single page (student)
	add_image_size( 'single-student', 300, 257, true ); 
	
	// Cropping to archive type student
	add_image_size( 'taxonomy-students', 200, 300, true ); 

	// Cropping to blog index
	add_image_size( 'blog-main', 1000, 300, true ); 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header-menu' => esc_html__( 'Header Menu', 'school-theme' ),
			'menu-1' => esc_html__( 'Primary', 'school-theme' ),
			'footer-left' => esc_html__( 'Footer - Left Side', 'school-theme' ),
			'footer-right' => esc_html__( 'Footer - Right Side', 'school-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'school_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'school_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function school_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'school_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'school_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function school_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'school-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'school-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'school_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function school_theme_scripts() {
	wp_enqueue_style( 
		'school-theme-googlefonts', 
		'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap',
		array(),
		null // Set null if loading multiple Google Fonts from their CDN
	);

	wp_enqueue_style( 'school-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'school-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'school-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'school_theme_scripts' );


// Hiding Comment in the backend

function remove_comments_menu() {
    remove_menu_page('edit-comments.php'); // Remove Comments menu
}
add_action('admin_menu', 'remove_comments_menu');

//Change excerpt length to 20 words
function fwd_excerpt_length( $length ) {
	return 25;
	}
	add_filter( 'excerpt_length', 'fwd_excerpt_length', 999 );

// Function to customize the "Read more about the student…" text (ChatGPT)
function fwd_excerpt_more( $more ) {
    return '... <a href="' . get_permalink() . '">Read more about the student…</a>';
}
add_filter( 'excerpt_more', 'fwd_excerpt_more' );	

//Function to change the Taxonomy title (ChatGPT)
function modify_taxonomy_title( $title ) {
    if ( is_tax( 'school-theme-student-category' ) ) {
        $term = get_queried_object();
        $title = $term->name . ' Student';
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'modify_taxonomy_title' );


add_filter( 'get_the_archive_title', function( $title ) {
    if ( is_post_type_archive( 'single-school-theme-student-category' ) ) {
        // Remove the "Archive: " prefix from the title
        $title = post_type_archive_title( '', false );
    }
    return $title;
});

//Function to delete the word "Archive from Student page
add_filter( 'get_the_archive_title', function( $title ) {
    if ( is_post_type_archive( 'school-theme-student' ) ) {
        // Remove the "Archive: " prefix from the title
        $title = post_type_archive_title( '', false );
    }
    return $title;
});

//AOS enqueue

function enqueue_aos_scripts() {
    // Enqueue AOS CSS
    wp_enqueue_style( 'aos-css', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css' );

    // Enqueue AOS JavaScript
    wp_enqueue_script( 'aos-js', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array(), null, true );

    // Initialize AOS
    wp_add_inline_script( 'aos-js', 'AOS.init();' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_aos_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Post Types and Taxonomies.
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

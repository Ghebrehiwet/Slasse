<?php
/**
 * Slasse functions and definitions
 *
 * @package Slasse
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600; /* pixels */
}

if ( ! function_exists( 'slasse_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function slasse_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Slasse, use a find and replace
	 * to change 'slasse' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'slasse', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'slasse' ),
		'social' => __( 'Social Menu', 'slasse' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	/*add_theme_support( 'custom-background', apply_filters( 'slasse_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );*/
}
endif; // slasse_setup
add_action( 'after_setup_theme', 'slasse_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function slasse_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'slasse' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'slasse' ),
		'description'	=> __( 'Footer widgets area appear in the footer of the site', 'slasse' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'slasse_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function slasse_scripts() {
	wp_enqueue_style( 'slasse-style', get_stylesheet_uri() );
	
	wp_enqueue_style ('slasse-content-sidebar', get_template_directory_uri() . '/layouts/content-sidebar.css');
	
	wp_enqueue_style ('slasse-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:100,400,900,400italic,900italic|PT+Serif:400,700,400italic,700italic');
	
	wp_enqueue_style ('slasse-fontawesome', 'http//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');

	wp_enqueue_script( 'slasse-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20150104', true );
	
	wp_enqueue_script( 'slasse-hide-search', get_template_directory_uri() . '/js/hide-search.js', array(), '20150104', true );
	
	wp_enqueue_script( 'slasse-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('slasse-superfish'), '20150104', true );
	
	wp_enqueue_script( 'slasse-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'slasse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20150104', true );
	
	wp_enqueue_script( 'slasse-masonry', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry'), '20150104', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'slasse_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

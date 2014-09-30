<?php
/**
 * Make Custom Tags Available Anywhere
 */
include_once get_template_directory() . '/inc/custom-template-tags.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'assignement_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function assignement_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on assignement, use a find and replace
	 * to change 'assignement' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'assignement', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'assignement' ),
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

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'assignement_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // assignement_setup
add_action( 'after_setup_theme', 'assignement_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function assignement_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'assignement' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'assignement_widgets_init' );


function remove_admin_bar() {
    if( ! current_user_can('administrator') && ! is_admin()) {
        show_admin_bar(false);
    }
}

add_action('after_setup_theme', 'remove_admin_bar');


/**
 * Redirect to homepage upon logout
 */
function go_home(){
  wp_redirect( home_url() );
  exit();
}

add_action('wp_logout','go_home');


/**
 * Enqueue scripts and styles.
 */
function assignement_scripts() {
    
        /**
         * Implement Boostrap
         */       
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );

        /**
         * Implement style from Bootstrap blog
         */
        wp_enqueue_style( 'blog-css', get_template_directory_uri() . '/css/blog.css' );        
        
        /**
         * Implement custom css
         */
        wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/css/custom.css' );
        

        /**
         * Implement styles for jQuery UI plugins
         */
        wp_enqueue_style( 'jQueryUIstyle', get_template_directory_uri() . '/css/jQueryUIstyle.css' );
        
        /**
         * Implement jQuery
         */      
        wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/js/jquery-2.1.1.min.js', array(), '20140920', true );
        
        /**
         * Implement jQuery UI plugins
         */
        wp_enqueue_script( 'jQueryUI', get_template_directory_uri() . '/js/jquery-ui.js', array('jQuery'), '20140920', true );
        
        /**
         * Implement custom script dependent on jQuery
         */
        wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', array('jQuery', 'jQueryUI'), '20140920', true );

	/**
         * Undescores.me scripts
         */
        wp_enqueue_script( 'assignement-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'assignement-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'assignement_scripts' );

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

/**
 * Load the voting script
 */
require get_template_directory() . '/inc/voting-script.php';

/**
 * Load custom class that handles validation
 */
require get_template_directory() . '/classes/Validation.php';

/**
 * Load a controller to handle user operations
 */
require get_template_directory() . '/controllers/userController.php';

/**
 * Load a controller to handle posting
 */
require get_template_directory() . '/controllers/postController.php';
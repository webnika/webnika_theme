<?php
/**
 * Be The Change functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Be_The_Change
 */

if ( ! function_exists( 'webnika_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function webnika_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'bethechange_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'webnika_theme', get_template_directory() . '/languages' );

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

	add_image_size( 'webnika_theme-featured-image', 640, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Top', 'webnika_theme' ),
		) );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 200,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'webnika_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'webnika_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function webnika_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'webnika_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'webnika_theme_content_width', 0 );

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function webnika_theme_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function webnika_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'webnika_theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'webnika_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function webnika_theme_scripts() {
	wp_enqueue_style( 'webnika_theme-style', get_template_directory_uri() . '/style.min.css' );

	wp_enqueue_script( 'webnika_theme-navigation', get_template_directory_uri() . '/js/main.min.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'webnika_theme_scripts' );

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
 * Register Google API KEY
 */
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyAO0MicGLloGVIL7-6Q36MZCtfdVBKq0Q4');
}

add_action('acf/init', 'my_acf_init');

	// ADD TAXONOMY FILTER
	/* Add taxonomy filter in custom post type */
	function rudr_posts_taxonomy_filter() {
		global $typenow; // this variable stores the current custom post type
		if( $typenow == 'naucne_stezky'){ // choose one or more post types to apply taxonomy filter for them if( in_array( $typenow  array('post','games') )
			$taxonomy_names = array('zastaveni');
			foreach ($taxonomy_names as $single_taxonomy) {
				$current_taxonomy = isset( $_GET[$single_taxonomy] ) ? $_GET[$single_taxonomy] : '';
				$taxonomy_object = get_taxonomy( $single_taxonomy );
				$taxonomy_name = strtolower( $taxonomy_object->labels->name );
				$taxonomy_terms = get_terms( $single_taxonomy );
				if(count($taxonomy_terms) > 0) {
					echo "<select name='$single_taxonomy' id='$single_taxonomy' class='zastaveni'>";
					echo "<option value=''>All kategorie</option>";
					foreach ($taxonomy_terms as $single_term) {
						echo '<option value='. $single_term->slug, $current_taxonomy == $single_term->slug ? ' selected="selected"' : '','>' . $single_term->name .' (' . $single_term->count .')</option>'; 
					}
					echo "</select>";
				}
			}
		}
	}
	add_action( 'restrict_manage_posts', 'rudr_posts_taxonomy_filter' );


	// SET CUSTOM STYLE TO TINY MCE EDITOR
	//add custom styles to the WordPress editor
	function my_custom_styles( $init_array ) {  
	 
	    $style_formats = array(  
	        // These are the custom styles
	        array(  
	            'title' => 'Tlačítko - červené',  
	            'block' => 'span',  
	            'classes' => 'btn btn-primary',
	            'wrapper' => true,
	        ),  
	        array(  
	            'title' => 'Tlačítko - černé',  
	            'block' => 'span',  
	            'classes' => 'btn btn-default',
	            'wrapper' => true,
	        ),
	        array(  
	            'title' => 'Tlačítko - bílé',  
	            'block' => 'span',  
	            'classes' => 'btn btn-light',
	            'wrapper' => true,
	        ),
	        array(  
	            'title' => 'sloupec - 50%',  
	            'block' => 'div',  
	            'classes' => 'col-md-6 col-sm-6',
	            'wrapper' => true,
	        ),
	        array(  
	            'title' => 'čistící prvek',  
	            'block' => 'div',  
	            'classes' => 'clearfix',
	            'wrapper' => true,
	        ),
	    );  
	    // Insert the array, JSON ENCODED, into 'style_formats'
	    $init_array['style_formats'] = json_encode( $style_formats );  
	    
	    return $init_array;  
	  
	} 
	// Attach callback to 'tiny_mce_before_init' 
	add_filter( 'tiny_mce_before_init', 'my_custom_styles' );

	function my_theme_add_editor_styles() {
	    add_editor_style( 'custom-editor-style.css' );
	}
	add_action( 'init', 'my_theme_add_editor_styles' );


	/**
	   SEARCH 
	 * Add HTML5 theme support.
	 */

	   	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	function wpdocs_after_setup_theme() {
	    add_theme_support( 'html5', array( 'search-form' ) );
	}
	add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );

	/* DISABLE WP JQUERY */
	function wpdocs_dequeue_script() {
	        wp_dequeue_script( 'jquery' ); 
	} 
	add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 100 );

	/* PAGINATION WITH NUMBERS */
function wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

// DISABLE COMMENTS
//Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');

add_action('init', 'start_session', 1);

function start_session() {
if(!session_id()) {
session_start();
}
}


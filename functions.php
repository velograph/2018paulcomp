<?php
/**
 * Paul Component 2018 Update functions and definitions
 *
 * @package Paul Component 2018 Update
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'basis_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function basis_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Paul Component 2018 Update, use a find and replace
	 * to change 'Paul Component 2018 Update' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'paulcomponent2018update', get_template_directory() . '/languages' );

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
		'primary' => __( 'Primary Menu', 'paulcomponent2018update' ),
		'footer-utility' => __( 'Footer Utility', 'paulcomponent2018update' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}
endif; // basis_setup
add_action( 'after_setup_theme', 'basis_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function basis_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'paulcomponent2018update' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'basis_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function basis_scripts() {
	wp_enqueue_style( 'basis-style', get_stylesheet_directory_uri() . '/css/style.css', false, filemtime(get_stylesheet_directory() . '/css/style.css') );

	wp_enqueue_script( 'basis-jQuery', '//code.jquery.com/ui/1.11.4/jquery-ui.js', false, true );

	wp_enqueue_script( 'basis-matchHeight', get_template_directory_uri() . '/js/matchHeight.min.js', array(), '20130115', true );

	wp_enqueue_script( 'basis-site-scripts', get_template_directory_uri() . '/js/site-scripts.js', array(), '20130115', true );

	wp_enqueue_script( 'basis-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'basis_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Declare Woocommerce support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_image_size( 'portal-mobile', '480', '360', 'true' );
add_image_size( 'portal-tablet', '768', '576', 'true' );
add_image_size( 'portal-desktop', '1280', '960', 'true' );
add_image_size( 'portal-retina', '2400', '1800', 'true' );

add_image_size( 'page-banner-mobile', '480', '400', 'true' );
add_image_size( 'page-banner-tablet', '768', '356', 'true' );
add_image_size( 'page-banner-desktop', '1280', '580', 'true' );
add_image_size( 'page-banner-retina', '2400', '800', 'true' );

add_image_size( 'story-banner-mobile', '480', '480', 'true' );
add_image_size( 'story-banner-tablet', '768', '556', 'true' );
add_image_size( 'story-banner-desktop', '1280', '780', 'true' );
add_image_size( 'story-banner-retina', '2400', '900', 'true' );

add_image_size( 'mailing-banner-mobile', '768', '460', 'true' );
add_image_size( 'mailing-banner-desktop', '1280', '380', 'true' );

add_image_size( 'category-banner-mobile', '480', '300', 'true' );
add_image_size( 'category-banner-desktop', '1280', '150', 'true' );
add_image_size( 'category-banner-retina', '2400', '300', 'true' );


// Remove Woo styling
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Disable reviews on products
add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
 unset($tabs['reviews']);
 return $tabs;
}

/**
 * Apply a different tax rate based on the user role.
 *
 * @param $tax_class
 * @param $product
 *
 * @return string
 */
function woo_diff_rate_for_user( $tax_class, $product ) {

    $current_user = wp_get_current_user();
    $roles = $current_user->roles;
    $current_user_role = $roles[0];

    $not_taxed_roles = array("wholesale_customer");

    if (is_user_logged_in() && in_array($current_user_role, $not_taxed_roles)) {

        $tax_class = "Zero Rate";
    }
    return $tax_class;
}
add_filter( "woocommerce_product_get_tax_class", "woo_diff_rate_for_user", 1, 2 );
add_filter( "woocommerce_product_variation_get_tax_class", "woo_diff_rate_for_user", 1, 2 );

add_filter('woocommerce_show_variation_price', function() {
	return TRUE;}
);

/**
 * Disable out of stock variations
 * https://github.com/woocommerce/woocommerce/blob/826af31e1e3b6e8e5fc3c1004cc517c5c5ec25b1/includes/class-wc-product-variation.php
 * @return Boolean
 */
function wcbv_variation_is_active( $active, $variation ) {
	if( ! $variation->is_in_stock() ) {
		return false;
	}
	return $active;
}
add_filter( 'woocommerce_variation_is_active', 'wcbv_variation_is_active', 10, 2 );

add_filter( 'woocommerce_ajax_variation_threshold', 'wc_ajax_threshold_increase' );
function wc_ajax_threshold_increase() {
    return 150;
}
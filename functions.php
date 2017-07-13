<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 770; /* pixels */
}

/**
 * Include the main Beyond.
 */
include_once( 'include/class-beyond.php' );

/**
 * Define basic properties in the Avada class.
 */
Beyond::$template_dir_path   = get_template_directory();
Beyond::$template_dir_url    = get_template_directory_uri();
Beyond::$stylesheet_dir_path = get_stylesheet_directory();
Beyond::$stylesheet_dir_url  = get_stylesheet_directory_uri();

/*
 * Include mobile detection
 */
require_once( 'include/class-beyond-mobiledetect.php' );

/*
 * Class Breadcrumbs
 */
include_once( 'include/class-beyond-breadcrumbs.php' );

/**
 * Instantiates the Beyond class.
 * Make sure the class is properly set-up.
 * The Beyond class is a singleton
 * so we can directly access the one true Beyond object using this function.
 *
 * @return object Beyond
 */
function Beyond() {
	return Beyond::get_instance();
}

/*
 * Instantiates the Breadcrumbs class.
 */
function breadcrumbs( $sep = ' » ', $l10n = array(), $args = array() ){
	$bc = new Breadcrumbs;
	echo $bc->get_crumbs( $sep, $l10n, $args );
}

/**
 * Filters the URI of the current theme stylesheet.
 */
function get_custom_stylesheet() {
	$stylesheet_uri = Beyond::$stylesheet_dir_url . '/assets/css/style.css';
	return apply_filters( 'stylesheet_uri', $stylesheet_uri, Beyond::$stylesheet_dir_url );
}

/**
 * Connection scripts and styles
 */
function set_scripts() {

    // StyleSheet
    wp_enqueue_style( 'Roboto-style', '//fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,500,700&subset=cyrillic', array(), Beyond()->get_theme_version(), all );
    //wp_enqueue_style( 'RobotoSlab-style', '//fonts.googleapis.com/css?family=Roboto+Slab:400,700&amp;subset=cyrillic', array(), Beyond()->get_theme_version(), all );
    wp_enqueue_style( 'theme-style', get_custom_stylesheet(), array(), Beyond()->get_theme_version(), all );

    // JavaScript
    wp_enqueue_script( 'jquery' );
    $api_key = ld_options('googlemap-apikey');
    wp_enqueue_script( 'googleapis', '//maps.googleapis.com/maps/api/js?key='.$api_key.'&callback=initMap', array('jquery'), Beyond()->get_theme_version(), true );
    wp_enqueue_script( 'scripts', Beyond::$template_dir_url . '/assets/js/scripts.min.js', array(), Beyond()->get_theme_version(), true );

}
add_action( 'wp_enqueue_scripts', 'set_scripts' );

/**
 * Register supports
 */
if ( !function_exists( 'set_setup' ) ) {
    function set_setup() {

        // Localisation Support
        load_theme_textdomain('html5blank', get_template_directory() . '/languages');

    	// Let WordPress manage the document title.
    	add_theme_support( 'title-tag' );

    	// Add default posts and comments RSS feed links to head.
    	add_theme_support( 'automatic-feed-links' );

    	// Enable support for Post Thumbnails on posts and pages.
    	add_theme_support( 'post-thumbnails' );
    	add_image_size( 'thumbnail-once', 200, 200, true );

    	// This theme uses wp_nav_menu() in one location.
    	register_nav_menus( array(
    		'theme_menu' => __( 'Menu', 'ld' ),
    	) );

    	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
    	add_theme_support( 'html5', array(
    		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    	) );

        // Post formats
        add_theme_support( 'post-formats', array(
            'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'chat', 'audio'
        ) );

        // Register support woocommerce
        add_theme_support( 'woocommerce' );

    }
}
add_action( 'after_setup_theme', 'set_setup' );


// Theme customizer
include_once( 'include/dynamic_css.php' );

// duplicate-post-page
include_once( 'include/duplicate-post-page.php' );

// Post type
include_once( 'include/gratitude.php' );

// schema.org
include_once( 'include/schema.org.php' );

// Translit
include_once( 'include/translit.php' );


/*
 * Connection additions
 */
// Redux Framework - theme options
if ( !class_exists( 'reduxframework' ) && file_exists( dirname( __FILE__ ) . '/include/redux-framework/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/include/redux-framework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/include/redux-config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/include/redux-config.php' );
}

// Advanced custom fields pro

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
	// update path
	$path = Beyond::$stylesheet_dir_path . '/include/advanced-custom-fields/';
	// return
	return $path;
}

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
	// update path
	$dir = Beyond::$stylesheet_dir_url . '/include/advanced-custom-fields/';
	// return
	return $dir;
}

// Hide ACF field group menu item
// add_filter('acf/settings/show_admin', '__return_false');

// Include ACF
include_once( Beyond::$stylesheet_dir_path . '/include/advanced-custom-fields/acf.php' );

// ACF options
// include_once( Beyond::$stylesheet_dir_path . '/include/acf-config.php' );

function my_acf_init() {
    $api_key = ld_options('googlemap-apikey');
	acf_update_setting('google_api_key', $api_key);
}
add_action('acf/init', 'my_acf_init');


add_filter( 'wpcf7_load_css', '__return_false' );


function misha_filter_function(){
    parse_str($_POST['query'], $params);

	$args = array(
        'post_type' => 'post',
		'cat' => array($params['brand']),
        'posts_per_page' => 9999,
	);

	$query = new WP_Query( $args );

    echo '<div class="slider-style">';
	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
            get_template_part( 'template-parts/content' );
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;
    echo '</div>';

?>
        <script>
        jQuery(document).ready(function($){
            $('.slider-style').slick({
              dots: false,
              arrows: true,
              autoplay: false,
              autoplaySpeed: 3000,
              infinite: false,
              speed: 500,
              slidesToShow: 4,
              responsive: [
                {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 3,
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 576,
                  settings: {
                    slidesToShow: 1,
                    centerMode: true,
                    initialSlide: 1,
                    focusOnSelect: true,
                    arrows: false,
                  }
                },
              ]
            });


            var windowWidth = window.innerWidth || $(window).width();

            if(windowWidth >= 576) {
                $('.assortment__slider .slid').click(function() {
                    $('.assortment__slider .slid').removeClass('current').eq($(this).index()).addClass('current');
                }).eq(0).addClass('current');
            } else {
                $('.assortment__slider .slid').click(function() {
                    $('.assortment__slider .slid').removeClass('current').eq($(this).index()).addClass('current');
                }).eq(1).addClass('current');
            }


            /* Slider Custom */
            function attrSrc(idAssort) {
                var input = '.color-shingles',
                    checked = ':checked',
                    inputChec = input + idAssort + checked,
                    inputDataImg = $(inputChec).data('img'),
                    inputDataColor = $(inputChec).data('color'),
                    img = '.img',
                    imgId = img + idAssort;

                $(imgId).css('backgroundImage', 'url(' + inputDataImg + ')');
                $('.roof').css('backgroundImage', 'url(' + inputDataImg + ')');
            };

            function cengAssort(idPost) {
                var input = '.color-shingles',
                    checked = ':checked',
                    inputId = input + idPost,
                    inputChec = inputId + checked;

                if(inputChec) {
                    attrSrc(idPost);
                }

            	$(inputId).on('change', function() {
                    attrSrc(idPost);
            	});
            };
        <?php
        while ( $query->have_posts() ) { $query->the_post(); ?>
            cengAssort(<?php the_ID(); ?>);
        <?php } wp_reset_postdata(); ?>
        });
        </script>
<?php
	wp_die();
}


add_action('wp_ajax_myfilter', 'misha_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');



/**
 * Load Enqueued Scripts in the Footer
 */
function set_remove() {
remove_action( 'wp_head', 'wp_print_scripts' );
remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'wp_enqueue_scripts', 'set_remove' );

?>
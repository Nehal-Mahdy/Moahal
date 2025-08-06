<?php
/**
 * Bathe functions
 *
 * @package Bathe
 */

/**
 * Set up theme defaults and registers support for various WordPress feaures.
 */


//Required Acf Blocks
require_once('acf-blocks.php');

//Required Product Post Type
require_once get_template_directory() . '/inc/post-type/product.php';

/**
 * WhatsApp Configuration
 * You can change this number to your business WhatsApp number
 */
function get_whatsapp_number() {
    // Replace with your actual WhatsApp business number (with country code, without + or spaces)
    // Example: For Saudi Arabia +966 500 000 000, use '966500000000'
    // For Egypt +20 0128 297 3213, use '201282973213'
    return '201282973213'; // Change this to your WhatsApp number (no + or spaces)
}

/**
 * Add WhatsApp number to JavaScript
 */
function add_whatsapp_config_to_js() {
    if (is_singular('product')) {
        echo '<script>const WHATSAPP_NUMBER = "' . esc_js(get_whatsapp_number()) . '";</script>';
    }
}
add_action('wp_head', 'add_whatsapp_config_to_js');



add_action(
    'after_setup_theme',
    function () {
        load_theme_textdomain( 'bathe', get_theme_file_uri( 'languages' ) );

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );
        add_theme_support(
            'post-formats',
            array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
            )
        );
        add_theme_support(
            'custom-background',
            apply_filters(
                'bathe_custom_background_args',
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
                'height'      => 200,
                'width'       => 50,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        register_nav_menus(
            array(
                'primary' => __( 'Primary Menu', 'bathe' ),
            )
        );

        
    }
);

// Register Primary Menu Location
function moahal_register_menus() {
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'moahal'), // Custom menu location
        )
    );
}
add_action('after_setup_theme', 'moahal_register_menus');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
add_action(
    'after_setup_theme',
    function () {
        $GLOBALS['content_width'] = apply_filters( 'bathe_content_width', 960 );
    },
    0
);

/**
 * Register widget area.
 */
add_action(
    'widgets_init',
    function () {
        register_sidebar(
            array(
                'name'          => __( 'Sidebar', 'bathe' ),
                'id'            => 'sidebar-1',
                'description'   => '',
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }
);

/**
 * Enqueue scripts and styles.
 */

add_action( 'wp_enqueue_scripts', function () {
    // Enqueue stylesheets
    wp_enqueue_style( 'bathe', get_theme_file_uri( 'assets/css/main.css' ), array(), '3.0.1' );
    wp_enqueue_style( 'tailwind', get_theme_file_uri( 'assets/css/tailwind.css' ), array(), '3.3.2' );
    wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0' );
    wp_enqueue_style( 'roboto-font', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap', array(), null );

    // Enqueue the main script
    wp_enqueue_script( 'bathe', get_theme_file_uri( 'assets/js/main.js' ), array(), '3.0.1', true );

    // Enqueue custom.js as a module
    wp_enqueue_script( 'custom-js', get_theme_file_uri( 'src/js/main.js' ), array(), '1.0.0', true );

    // Ensure it's treated as a module
    wp_script_add_data( 'custom-js', 'type', 'module' );

      // Pass home URL to the JS file
    wp_localize_script('custom-js', 'myThemeVars', array(
        'homeUrl' => home_url(),
    ));
    // Enqueue external JS libraries (Flowbite, Swiper, AOS)
    wp_enqueue_script( 'flowbite', 'https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.0/flowbite.min.js', array(), '2.1.0', true );
    wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true );
    wp_enqueue_script( 'aos', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(), '2.3.4', true );

    // Ensure comment-reply.js is loaded when needed for threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
  }
);


function moahal_enqueue_styles() {
    wp_enqueue_style('tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', [], null);
}
add_action('wp_enqueue_scripts', 'moahal_enqueue_styles');


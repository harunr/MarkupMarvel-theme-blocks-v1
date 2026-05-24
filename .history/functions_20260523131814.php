<?php

// Enable native WordPress Menu UI in the dashboard
add_theme_support( 'menus' );

register_nav_menus( array(
    'primary' => __( 'Primary Main Menu', 'markupmarvel' ),
    'footer'  => __( 'Footer Menu', 'markupmarvel' ),
) );

/**
 * MarkupMarvel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MarkupMarvel
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function markupmarvel_setup() {
    /*
     * Make theme available for translation.
     */
    load_theme_textdomain( 'markupmarvel', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );

    /*
     * Switch default core markup to output valid HTML5.
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
            'markupmarvel_custom_background_args',
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

    // Menus Registration
    register_nav_menus(
        array(
            'menu-1'         => esc_html__( 'Primary Menu', 'markupmarvel' ),
            'footer-company' => esc_html__( 'Footer: Company', 'markupmarvel' ),
            'footer-project' => esc_html__( 'Footer: Project', 'markupmarvel' ),
            'footer-support' => esc_html__( 'Footer: Support', 'markupmarvel' ),
        )
    );
}
add_action( 'after_setup_theme', 'markupmarvel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function markupmarvel_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'markupmarvel_content_width', 640 );
}
add_action( 'after_setup_theme', 'markupmarvel_content_width', 0 );

/**
 * Register widget area.
 */
function markupmarvel_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'markupmarvel' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'markupmarvel' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'markupmarvel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function markupmarvel_scripts() {
    // ==========================================
    // 1. CSS FILES
    // ==========================================
    
    // Core theme style (Required by WP)
    wp_enqueue_style( 'markupmarvel-style', get_stylesheet_uri(), array(), _S_VERSION );

    // Slick Core (Loads first)
    wp_enqueue_style( 'markupmarvel-slick', get_template_directory_uri() . '/assets/css/slick.min.css', array(), '1.8.1' );
    
    // Slick Theme (Depends on Slick Core)
    wp_enqueue_style( 'markupmarvel-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.min.css', array('markupmarvel-slick'), '1.8.1' );
    
    wp_enqueue_style( 'magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css' );
    
    // Main Custom Style (Loads last so it can override styles)
    wp_enqueue_style( 'markupmarvel-custom-style', get_template_directory_uri() . '/assets/css/style.css', array('markupmarvel-slick-theme'), _S_VERSION );

    wp_style_add_data( 'markupmarvel-style', 'rtl', 'replace' );

    // ==========================================
    // 2. JAVASCRIPT FILES
    // ==========================================

    // Safely replace default WordPress jQuery (Frontend only)
    if ( ! is_admin() ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.5.1.min.js', array(), '3.5.1', true );
        wp_enqueue_script( 'jquery' );
    }

    // GSAP Core
    wp_enqueue_script( 'markupmarvel-gsap', get_template_directory_uri() . '/assets/js/gsap.min.js', array(), '3.12', true );

    // jQuery Plugins (These depend on 'jquery' to load first)
    wp_enqueue_script( 'markupmarvel-marquee', get_template_directory_uri() . '/assets/js/jquery.marquee.min.js', array('jquery'), '1.5.0', true );
    wp_enqueue_script( 'markupmarvel-slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.8.1', true );

    // GSAP Plugins (This depends on 'markupmarvel-gsap' to load first)
    wp_enqueue_script( 'markupmarvel-scrolltrigger', get_template_directory_uri() . '/assets/js/ScrollTrigger.min.js', array('markupmarvel-gsap'), '3.12', true );

    // Standalone Libraries
    wp_enqueue_script( 'markupmarvel-splitting', get_template_directory_uri() . '/assets/js/splitting.min.js', array(), '1.0', true );
    wp_enqueue_script( 'markupmarvel-lenis', get_template_directory_uri() . '/assets/js/lenis.js', array(), '1.0', true );
    wp_enqueue_script( 'magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array('jquery'), null, true );

    // Common Scripts (Loads dead last)
    wp_enqueue_script( 
        'markupmarvel-common-scripts', 
        get_template_directory_uri() . '/assets/js/common-scripts.js', 
        array(
            'jquery', 
            'markupmarvel-gsap', 
            'markupmarvel-slick-js', 
            'markupmarvel-scrolltrigger', 
            'markupmarvel-marquee',
            'markupmarvel-splitting',
            'markupmarvel-lenis'
        ), 
        _S_VERSION, 
        true 
    );

    // Default Underscores navigation
    wp_enqueue_script( 'markupmarvel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'markupmarvel_scripts' );

/**
 * Structural Includes
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

// ==========================================
// ACF CUSTOM BLOCKS REGISTRATION
// ==========================================
add_action('acf/init', 'markupmarvel_acf_init_block_types');

function markupmarvel_acf_init_block_types() {
    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'hero-banner',
            'title'             => __('Hero Banner'),
            'description'       => __('A custom hero section with animated patterns.'),
            'render_template'   => 'template-parts/blocks/hero.php',
            'category'          => 'layout',
            'icon'              => 'cover-image',
            'keywords'          => array( 'hero', 'banner', 'header' ),
        ));
        
        acf_register_block_type(array(
            'name'              => 'find-us',
            'title'             => __('Find Us (Logos)'),
            'description'       => __('A video thumbnail and a repeatable list of company logos.'),
            'render_template'   => 'template-parts/blocks/find-us.php',
            'category'          => 'layout',
            'icon'              => 'images-alt2',
            'keywords'          => array( 'logos', 'video', 'partners', 'find us' ),
        ));

        acf_register_block_type(array(
            'name'              => 'home-about',
            'title'             => __('Home About Us'),
            'description'       => __('An about section with a heading, image, and text content.'),
            'render_template'   => 'template-parts/blocks/home-about.php',
            'category'          => 'layout',
            'icon'              => 'id-alt',
            'keywords'          => array( 'about', 'info', 'content' ),
        ));

        acf_register_block_type(array(
            'name'              => 'our-services',
            'title'             => __('Our Services'),
            'description'       => __('A grid of services with icons and links.'),
            'render_template'   => 'template-parts/blocks/our-services.php',
            'category'          => 'layout',
            'icon'              => 'grid-view',
            'keywords'          => array( 'services', 'grid', 'offerings' ),
        ));

        acf_register_block_type(array(
            'name'              => 'our-projects',
            'title'             => __('Our Projects'),
            'description'       => __('A grid of featured projects with a CTA button.'),
            'render_template'   => 'template-parts/blocks/our-projects.php',
            'category'          => 'layout',
            'icon'              => 'portfolio',
            'keywords'          => array( 'projects', 'portfolio', 'work' ),
        ));

        acf_register_block_type(array(
            'name'              => 'testimonials',
            'title'             => __('Testimonials'),
            'description'       => __('A repeatable list of client testimonials.'),
            'render_template'   => 'template-parts/blocks/testimonials.php',
            'category'          => 'layout',
            'icon'              => 'testimonial',
            'keywords'          => array( 'testimonials', 'reviews', 'quotes' ),
        ));

        acf_register_block_type(array(
            'name'              => 'home-blog',
            'title'             => __('Home Blog'),
            'description'       => __('A curated grid of featured blog posts.'),
            'render_template'   => 'template-parts/blocks/home-blog.php',
            'category'          => 'layout',
            'icon'              => 'welcome-write-blog',
            'keywords'          => array( 'blog', 'news', 'articles' ),
        ));

        acf_register_block_type(array(
            'name'              => 'home-cta',
            'title'             => __('Call To Action (CTA)'),
            'description'       => __('A bottom banner with a heading and a button to drive conversions.'),
            'render_template'   => 'template-parts/blocks/home-cta.php',
            'category'          => 'layout',
            'icon'              => 'megaphone',
            'keywords'          => array( 'cta', 'contact', 'banner' ),
        ));

        acf_register_block_type(array(
            'name'              => 'about-hero',
            'title'             => __('About: Hero'),
            'description'       => __('The top hero section for the about page.'),
            'render_template'   => 'template-parts/blocks/about-hero.php',
            'category'          => 'layout',
            'icon'              => 'admin-users',
        ));

        acf_register_block_type(array(
            'name'              => 'about-counter',
            'title'             => __('About: Counter'),
            'description'       => __('Image and statistics counter.'),
            'render_template'   => 'template-parts/blocks/about-counter.php',
            'category'          => 'layout',
            'icon'              => 'chart-bar',
        ));

        acf_register_block_type(array(
            'name'              => 'about-exist',
            'title'             => __('About: Why We Exist'),
            'description'       => __('Image and text section detailing the company mission.'),
            'render_template'   => 'template-parts/blocks/about-exist.php',
            'category'          => 'layout',
            'icon'              => 'info',
        ));

        acf_register_block_type(array(
            'name'              => 'about-clients',
            'title'             => __('About: Clients'),
            'description'       => __('Grid of satisfied client logos.'),
            'render_template'   => 'template-parts/blocks/about-clients.php',
            'category'          => 'layout',
            'icon'              => 'grid-view',
        ));

        acf_register_block_type(array(
            'name'              => 'about-team',
            'title'             => __('About: Team'),
            'description'       => __('Grid of team members with social links.'),
            'render_template'   => 'template-parts/blocks/about-team.php',
            'category'          => 'layout',
            'icon'              => 'groups',
        ));

        acf_register_block_type(array(
            'name'              => 'about-process',
            'title'             => __('About: Process'),
            'description'       => __('Step-by-step process list.'),
            'render_template'   => 'template-parts/blocks/about-process.php',
            'category'          => 'layout',
            'icon'              => 'networking',
        ));

        acf_register_block_type(array(
            'name'              => 'work-hero',
            'title'             => __('Work: Hero'),
            'description'       => __('Hero section for Work and Service pages.'),
            'render_template'   => 'template-parts/blocks/work-hero.php',
            'category'          => 'layout',
            'icon'              => 'cover-image',
        ));

        acf_register_block_type(array(
            'name'              => 'work-featured',
            'title'             => __('Work: Featured Item'),
            'description'       => __('Large featured item with an image and text.'),
            'render_template'   => 'template-parts/blocks/work-featured.php',
            'category'          => 'layout',
            'icon'              => 'star-filled',
        ));

        acf_register_block_type(array(
            'name'              => 'work-grid',
            'title'             => __('Work: Grid'),
            'description'       => __('Grid of items for services or portfolio.'),
            'render_template'   => 'template-parts/blocks/work-grid.php',
            'category'          => 'layout',
            'icon'              => 'grid-view',
        ));

        acf_register_block_type(array(
            'name'              => 'contact-tabs',
            'title'             => __('Contact: Forms & Tabs'),
            'description'       => __('Tabbed interface for contact and project inquiry forms.'),
            'render_template'   => 'template-parts/blocks/contact-tabs.php',
            'category'          => 'layout',
            'icon'              => 'email',
        ));

        acf_register_block_type(array(
            'name'              => 'contact-info',
            'title'             => __('Contact: Info Grid'),
            'description'       => __('Company logo and contact details grid.'),
            'render_template'   => 'template-parts/blocks/contact-info.php',
            'category'          => 'layout',
            'icon'              => 'location',
        ));

        acf_register_block_type(array(
            'name'              => 'pricing-plans',
            'title'             => __('Pricing: Plans Grid'),
            'render_template'   => 'template-parts/blocks/pricing-plans.php',
            'category'          => 'layout',
            'icon'              => 'money-alt',
        ));

        acf_register_block_type(array(
            'name'              => 'client-logos',
            'title'             => __('Pricing: Client Logos'),
            'render_template'   => 'template-parts/blocks/client-logos.php',
            'category'          => 'layout',
            'icon'              => 'images-alt2',
        ));

        acf_register_block_type(array(
            'name'              => 'faq-accordion',
            'title'             => __('Pricing: FAQ Accordion'),
            'render_template'   => 'template-parts/blocks/faq-accordion.php',
            'category'          => 'layout',
            'icon'              => 'editor-help',
        ));

        acf_register_block_type(array(
            'name'              => 'pricing-testimonials',
            'title'             => __('Pricing: Testimonials Masonry'),
            'render_template'   => 'template-parts/blocks/pricing-testimonials.php',
            'category'          => 'layout',
            'icon'              => 'format-quote',
        ));

        acf_register_block_type(array(
            'name'              => 'career-info',
            'title'             => __('Career: Info & Stats'),
            'render_template'   => 'template-parts/blocks/career-info.php',
            'category'          => 'layout',
            'icon'              => 'chart-bar',
        ));

        acf_register_block_type(array(
            'name'              => 'career-positions',
            'title'             => __('Career: Open Positions'),
            'render_template'   => 'template-parts/blocks/career-positions.php',
            'category'          => 'layout',
            'icon'              => 'businessperson',
        ));

        acf_register_block_type(array(
            'name'              => 'career-benefits',
            'title'             => __('Career: Perks & Benefits'),
            'render_template'   => 'template-parts/blocks/career-benefits.php',
            'category'          => 'layout',
            'icon'              => 'heart',
        ));

        acf_register_block_type(array(
            'name'              => 'career-mission',
            'title'             => __('Career: Mission'),
            'render_template'   => 'template-parts/blocks/career-mission.php',
            'category'          => 'layout',
            'icon'              => 'flag',
        ));

        acf_register_block_type(array(
            'name'              => 'services-grid',
            'title'             => __('Services: Listing Grid'),
            'description'       => __('A dynamic grid that automatically displays up to 12 of your newest service posts.'),
            'render_template'   => 'template-parts/blocks/services-grid.php',
            'category'          => 'formatting',
            'icon'              => 'grid-view',
            'align'             => 'full',
            'mode'              => 'edit',
            'supports'          => array(
                'align' => false,
                'mode'  => false,
            ),
        ));
    }
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'icon_url'      => 'dashicons-admin-customizer',
        'position'      => 30
    ));
}

// ==========================================
// CUSTOM POST TYPES WITH GRAPHQL EXPOSURE
// ==========================================

// Register Careers CPT
function markupmarvel_career_cpt() {
    register_post_type('careers', array(
        'labels' => array('name' => 'Careers', 'singular_name' => 'Job'),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-businessperson',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'show_in_graphql' => true,
        'graphql_single_name' => 'career',
        'graphql_plural_name' => 'careers',
    ));
}
add_action('init', 'markupmarvel_career_cpt');

// Register Work CPT
function markupmarvel_work_cpt() {
    $labels = array(
        'name'                  => 'Works',
        'singular_name'         => 'Work',
        'menu_name'             => 'Works',
        'add_new'               => 'Add New Project',
        'add_new_item'          => 'Add New Project',
        'edit_item'             => 'Edit Project',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
        'rewrite'            => array('slug' => 'work'), 
        'show_in_graphql'    => true,
        'graphql_single_name' => 'work',
        'graphql_plural_name' => 'works',
    );

    register_post_type('work', $args);

    // Register Category for Works
    register_taxonomy('work_category', 'work', array(
        'label'        => 'Work Categories',
        'rewrite'      => array('slug' => 'work-category'),
        'hierarchical' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'markupmarvel_work_cpt');

// Register Services CPT
function markupmarvel_services_cpt() {
    $labels = array(
        'name'                  => 'Services',
        'singular_name'         => 'Service',
        'menu_name'             => 'Services',
        'add_new'               => 'Add New Service',
        'add_new_item'          => 'Add New Service',
        'edit_item'             => 'Edit Service',
        'all_items'             => 'All Services',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-admin-tools',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
        'rewrite'            => array('slug' => 'services'), 
        'show_in_graphql'    => true,
        'graphql_single_name' => 'service',
        'graphql_plural_name' => 'services',
    );

    register_post_type('services', $args);
}
add_action('init', 'markupmarvel_services_cpt');

// Register a highly stable native GraphQL field for the Service Icon
add_action( 'graphql_register_types', function() {
    register_graphql_field( 'Service', 'serviceIcon', [
        'type'        => 'String', // Returns the direct ready-to-use URL string
        'description' => __( 'Native headless bridge for the service custom icon URL', 'markupmarvel' ),
        'resolve'     => function( $post ) {
            // Fetch the raw meta field saved by ACF
            $image_id = get_post_meta( $post->databaseId, 'service_icon', true );
            
            if ( ! $image_id ) {
                return null;
            }
            
            // If it's saved as an ID, grab the direct URL string instantly
            if ( is_numeric( $image_id ) ) {
                return wp_get_attachment_url( $image_id );
            }
            
            // Fallback: If ACF saved the raw image URL directly as a string
            return $image_id;
        }
    ]);
});

// =========================================================================
// ACF JSON SETTINGS
// =========================================================================
add_filter('acf/settings/save_json', 'markupmarvel_theme_acf_json_save_point');
function markupmarvel_theme_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

add_filter('acf/settings/load_json', 'markupmarvel_theme_acf_json_load_point');
function markupmarvel_theme_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

add_filter('acf/settings/save_json', '__return_false');
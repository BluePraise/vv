<?php
/*
*  Functions built by Mayconnect.
*/

add_action('after_setup_theme','launch_this_theme');

// Setup contet
if ( ! isset( $content_width ) )
  $content_width = 960;

function launch_this_theme() {

  remove_filter( 'excerpt_more', 'twentyeleven_auto_excerpt_more' );
  remove_filter( 'get_the_excerpt', 'twentyeleven_custom_excerpt_more' );
  remove_filter( 'excerpt_length', 'custom_excerpt_length' );
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
  remove_filter( 'excerpt_length', 'front_page_excerpt_length' );
  add_filter( 'excerpt_length', 'front_page_excerpt_length', 999 );
}

remove_action( 'wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action( 'wp_head', 'feed_links_extra'); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links'); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version

function remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

function disable_version() {
   return '';
}

add_filter( 'style_loader_src', 'remove_wp_ver_css_js', 9999 ); // remove WP version from css
add_filter( 'script_loader_src', 'remove_wp_ver_css_js', 9999 ); // remove WP version from scripts
add_filter('the_generator','disable_version');

// Deregistering styles and scripts that might be in the wp core.
// Registering all kinds of cool styles and scripts.
function scripts_and_styles() {
  global $wp_styles;

    wp_deregister_script('jquery');
    wp_deregister_style( 'functions-style-css');
    wp_deregister_style( 'twentythirteen-style-css');
    wp_deregister_style( 'open-sans-css');

    if ( ! is_page( 'contact' ) ) {
      wp_deregister_style( 'contact-form-7' );
    }

    // register main stylesheets
    wp_register_style( 'stylesheet', get_stylesheet_directory_uri() . '/stylesheets/style.css', array(), '', 'all' );

    wp_register_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', array(), '', false );
    // wp_register_script( 'html5-script', get_stylesheet_directory_uri() . '/js/html5.js', array( 'jquery' ), '', false );
    wp_register_script( 'vv-script', get_stylesheet_directory_uri() . '/js/vv-script.js', array( 'jquery' ), '', false );

    // comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

    // enqueue styles and scripts
    wp_enqueue_style( 'stylesheet' );
    wp_enqueue_script( 'jquery' );
    // wp_enqueue_script( 'html5-script' );
    wp_enqueue_script( 'vv-script' );

}

function deregister_contact_form() {
    if ( ! is_page( 'contact' ) ) {
        remove_action('wp_enqueue_scripts', 'wpcf7_enqueue_scripts');
    }
}

add_action('wp_enqueue_scripts', 'scripts_and_styles', 999);
add_action( 'wp', 'deregister_contact_form');

// This theme uses a custom image size for featured images, displayed on "standard" posts.
add_theme_support( 'post-thumbnails' );
// set_post_thumbnail_size( 1040, 332  ); // Unlimited height, soft crop
add_image_size( 'slider_size', 1040, 333 , true );
// add_image_size( 'featured_image', 649, 150, true );
//
add_theme_support( 'html5', array( 'search-form' ) );


// the top menu
function vv_top_menu(){
  $topmenu =
    array(
      'theme_location'  => 'top-menu',
      'menu'            => 'top-menu',
      'container'       => false,
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'top-menu',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul>%3$s</ul>',
      'depth'           => 0,
      'walker'          => ''
    );
      wp_nav_menu( $topmenu );
  }

// the main menu
function vv_main_menu(){
  $mainmenu =
    array(
      'theme_location'  => 'main-menu',
      'menu'            => 'main-menu',
      'container'       => false,
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'main-menu',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul>%3$s</ul>',
      'depth'           => 0,
      'walker'          => ''
    );
      wp_nav_menu( $mainmenu );
  }

function vv_side_menu() {
  $sidemenu =
    array(
      'theme_location'  => 'side-menu',
      'menu'            => 'side-menu',
      'container'       => false,
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'side-menu',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => '',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul>%3$s</ul>',
      'depth'           => 0,
      'walker'          => ''
    );
  wp_nav_menu( $sidemenu );
}

function register_vv_menu() {
  register_nav_menus(array( // Using array to specify more menus if needed
    'top-menu' => __('Top Menu', 'vv'), // Top Navigation
    'main-menu' => __('Main Menu', 'vv'), // Main Navigation
    'side-menu' => __('Side Menu', 'vv'), // Sidebar Navigation
  ));
}
add_action( 'init', 'register_vv_menu' );

function vv_sidebar() {
  register_sidebar( array(
    'name'          => __( 'Sidebar Sitewide', 'vv' ),
    'id'            => 'sidebar-sitewide',
    'description'   => __( 'Sidebar for the whole site', 'text_domain' ),
    'before_widget' => '<div id="%1$s" class="sidebar-sitewide widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="pagelink orange">',
    'after_title'   => '</div>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Nieuws Pagina Sidebar', 'vv' ),
    'id'            => 'sidebar-news',
    'description'   => __( 'Nieuws Pagina Sidebar', 'text_domain' ),
    'before_widget' => '<div id="%1$s" class="sidebar-news widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="pagelink orange">',
    'after_title'   => '</div>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Blog Pagina Sidebar', 'vv' ),
    'id'            => 'sidebar-blog',
    'description'   => __( 'Blog Pagina Sidebar', 'text_domain' ),
    'before_widget' => '<div id="%1$s" class="sidebar-blog widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="pagelink">',
    'after_title'   => '</div>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Activiteiten Pagina Sidebar', 'vv' ),
    'id'            => 'sidebar-activity',
    'description'   => __( 'Sidebar voor de Activiteiten Pagina', 'text_domain' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
  ) );
  register_sidebar( array(
    'name'          => __( 'Second Left Sidebar', 'vv' ),
    'id'            => 'second-left-sidebar',
    'description'   => __( 'Sidebar Links Midden', 'text_domain' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<div class="pagelink blue">',
    'after_title'   => '</div>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Midden', 'vv' ),
    'id'            => 'sidebar-footer-address',
    'description'   => __( 'Sidebar voor de "Footer Midden', 'text_domain' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Sitemap', 'vv' ),
    'id'            => 'sidebar-footer-sitemap',
    'description'   => __( 'Sidebar voor de "Footer Sitemap', 'text_domain' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Links', 'vv' ),
    'id'            => 'sidebar-footer-links',
    'description'   => __( 'Sidebar voor de "Footer Links', 'text_domain' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'vv_sidebar' );

function custom_excerpt_length( $length ) {
  return 20;
}

function page_overview_excerpt_length( $length ) {
  return 40;
}
add_filter( 'excerpt_length', 'page_overview_excerpt_length', 999 );

function front_page_excerpt_length( $length ) {
  return 10;
}

// Replaces the excerpt "more" text by a link
function overview_excerpt_more($more) {
  global $post;
  return '<a class="pagelink moretag" href="'. get_permalink($post->ID) . '"> Lees meer</a>';
}
add_filter('excerpt_more', 'overview_excerpt_more');

function vv_search_form( $form ) {
  $form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
  <label>
    <span class="screen-reader-text"></span>
  <span class="search-icon"></span>
  <input type="search" class="search-field" placeholder="'. esc_attr__( 'Zoeken…', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label' ) . '" />
  <input type="submit" class="search-submit" value='. esc_attr__( 'Search', 'submit button'). '" />
  </form>';

  return $form;
}

add_filter( 'get_search_form', 'vv_search_form' );

?>

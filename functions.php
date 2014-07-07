<?php
/*
*  Functions built by Mayconnect.
*/

add_action('after_setup_theme','launch_this_theme');

// Setup contet
if ( ! isset( $content_width ) )
  $content_width = 960;

function launch_this_theme() {

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
add_filter( 'style_loader_src', 'remove_wp_ver_css_js', 9999 ); // remove WP version from css
add_filter( 'script_loader_src', 'remove_wp_ver_css_js', 9999 ); // remove Wp version from scripts

function disable_version() {
   return '';
}
add_filter('the_generator','disable_version');


// Deregistering styles and scripts that might be in the wp core.
// Registering all kinds of cool styles and scripts.
function scripts_and_styles() {
  global $wp_styles;
  if (!is_admin()) {

    wp_deregister_script('jquery');
    wp_deregister_style( 'functions-style-css');
    wp_deregister_style( 'twentythirteen-style-css');

    // register main stylesheets
    wp_register_style( 'stylesheet', get_stylesheet_directory_uri() . '/stylesheets/style.css', array(), '', 'all' );
    // wp_register_style( 'genericons', get_stylesheet_directory_uri() . '/stylesheets/genericons/genericons.css', array(), '', 'all' );

    // comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
    wp_register_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', array(), '', false );
    // wp_register_script( 'html5-script', get_stylesheet_directory_uri() . '/js/html5.js', array( 'jquery' ), '', false );
    // wp_register_script( 'classy-script', get_stylesheet_directory_uri() . '/js/classy-script.js', array( 'jquery' ), '', false );

    // enqueue styles and scripts
    wp_enqueue_style( 'stylesheet' );
    wp_enqueue_script( 'jquery' );
    // wp_enqueue_script( 'html5-script' );
    // wp_enqueue_script( 'classy-script' );
  }
}

add_action('wp_enqueue_scripts', 'scripts_and_styles', 999);

// This theme uses a custom image size for featured images, displayed on "standard" posts.
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 736, 328  ); // Unlimited height, soft crop
add_image_size( 'artikel_middle_view', 585, 328 , false );
add_image_size( 'artikel_large_view', 905, 328 , true );

// add_image_size( 'featured_image', 649, 150, true );


// the main menu
function vv_menu(){
  wp_nav_menu(
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
    ));
  } /* end mayconnect main nav */

function register_vv_menu() {
  register_nav_menus(array( // Using array to specify more menus if needed
    'main-menu' => __('Main Menu', 'classy'), // Main Navigation
    // 'sidebar-menu' => __('Sidebar Menu', 'classy'), // Sidebar Navigation
    // 'extra-menu' => __('Extra Menu', 'classy') // Extra Navigation if needed (duplicate as many as you need!)
  ));
}
add_action( 'init', 'register_vv_menu' );

function vv_sidebar() {
  register_sidebar( array(
    'name'          => __( 'Single Post Sidebar', 'vv' ),
    'id'            => 'sidebar-single-post',
    'description'   => __( 'Sidebar that goes on the article view', 'text_domain' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class=" h5 widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Activity Sidebar', 'vv' ),
    'id'            => 'sidebar-activity',
    'description'   => __( 'Sidebar voor de activiteiten', 'text_domain' ),
    'before_widget' => '<div class="section-header red">Meest recente activiteiten</div><div class="activity-list red">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => '',
  ) );

  register_sidebar( array(
    'name'          => __( 'Zet Ons In  Sidebar', 'vv' ),
    'id'            => 'sidebar-zetonsin-page',
    'description'   => __( 'Sidebar voor de "Zet Ons In" pagina', 'text_domain' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Adres', 'vv' ),
    'id'            => 'sidebar-footer-address',
    'description'   => __( 'Sidebar voor de "Footer Links', 'text_domain' ),
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
    'name'          => __( 'Footer Legal Stuff', 'vv' ),
    'id'            => 'sidebar-footer-legalstuff',
    'description'   => __( 'Sidebar voor de "Footer Legal Stuff', 'text_domain' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'vv_sidebar' );


// Replaces the excerpt "more" text by a link
function activity_overview_excerpt_more($more) {
  global $post;
  return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Lees meer...</a>';
}
add_filter('excerpt_more', 'activity_overview_excerpt_more');
?>

<?php
require get_theme_file_path('/inc/search-route.php');

function caixola_files() {
  wp_enqueue_style('google_fonts', '//fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
  wp_enqueue_style('bootstrap_css', '//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
  wp_enqueue_style('bootstrap_ext', get_theme_file_uri('/css/bootstrap_ext.css'));
  wp_enqueue_style('main_style', get_theme_file_uri('/css/main.css'));
  wp_enqueue_script('bootstrap_js', '//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', NULL, '1.0', true);
  wp_enqueue_script('main_js', get_theme_file_uri('/build/index.js'), NULL, '1.0', true);

  wp_localize_script('main_js', 'data', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ));
}
add_action('wp_enqueue_scripts', 'caixola_files');

function caixola_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'caixola_features');

//Redirection user subscribers to home
add_action('wp_init', 'redirectToHome');
function redirectToHome() {
  $curentUser = wp_get_current_user();
  if (count($curentUser->roles) == 1 AND $curentUser->roles[0] == 'subscriber') {
    wp_redirect(site_url('/'));
    exit;
  }
}

//Remove admin bar for subscribers
add_action('wp_loaded', 'noSubsAdminBar');
function noSubsAdminBar() {
  $curentUser = wp_get_current_user();
  if (count($curentUser->roles) == 1 AND $curentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }
}

// CUSTOM LOGIN SCREEN

// Change logo url
add_filter('login_headerurl', 'HeaderUrl');
function HeaderUrl() {
  return esc_url(site_url('/'));
}

// custom css
add_action('login_enqueue_scripts', 'LoginCSS');
function LoginCSS() {
  wp_enqueue_style('google_fonts', '//fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
  wp_enqueue_style('bootstrap_css', '//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
  wp_enqueue_style('bootstrap_ext', get_theme_file_uri('/css/bootstrap_ext.css'));
  wp_enqueue_style('wp_login_style', get_theme_file_uri('/css/wp_login_screen.css'));
}

// Change title
add_filter('login_headertitle', 'LoginTitle');
function LoginTitle() {
  return get_bloginfo('name');
}
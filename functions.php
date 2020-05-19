<?php

function ibaspEstilos()
{
  //css
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap-4.4.1.min.css', array(), '4.4.1');
  wp_enqueue_style('swiper', get_stylesheet_directory_uri() . '/css/swiper-5.4.0.min.css', array(), '5.4.0');
  wp_enqueue_style('master', get_stylesheet_directory_uri() . '/css/master.css', array(), '5.1.5');

  //js
  wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/js/jquery-3.3.1.slim.min.js', '3.5.1', true);
  wp_enqueue_script('bootstrapjs', get_stylesheet_directory_uri() . '/js/bootstrap-4.4.1.min.js', '4.4.1', true);
  wp_enqueue_script('lazysizes', get_stylesheet_directory_uri() . '/js/lazysizes-5.2.0.min.js', '5.2.0', true);
  wp_enqueue_script('swiperjs', get_stylesheet_directory_uri() . '/js/swiper-5.4.0.min.js', '5.4.0', true);
}

add_action('wp_enqueue_scripts', 'ibaspEstilos');

function wpdocs_theme_setup()
{
  add_image_size('mensagens_thumbnail', 286, 161);
  add_image_size('mobile_events', 360, 360);
  add_image_size('mobile_events_retina', 720, 720);
}

add_action('after_setup_theme', 'wpdocs_theme_setup');

function remove_wp_logo($wp_admin_bar)
{
  $wp_admin_bar->remove_node('wp-logo');
  $wp_admin_bar->remove_node('wpseo-menu');
}

add_action('admin_bar_menu', 'remove_wp_logo', 999);

function my_login_logo()
{ ?>
  <style type="text/css">
    body.login {
      background-color: white !important;
    }

    body.login div#login form#loginform {
      background-color: #ECECEC !important;
    }

    body.login div#login form#loginform p label {
      color: black !important;
    }

    body.login div#login form#loginform p.forgetmenot {
      color: black !important;
    }

    body.login div#login form#loginform p.submit {
      color: black !important;
    }

    body.login div#login p#nav a {
      color: black !important;
    }

    body.login div#login p#backtoblog a {
      color: black !important;
    }

    #login h1 a,
    .login h1 a {
      background-image: url('https://www.ibasp.org.br/wp-content/uploads/2018/10/logo_1024x512.jpg');
      height: 97px;
      width: 200px;
      background-size: 200px 97px;
      background-repeat: no-repeat;
      padding-bottom: 15px;
    }
  </style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');

function my_login_logo_url()
{
  return home_url();
}
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title()
{
  return 'Igreja Batista Alemã de São Paulo';
}
add_filter('login_headertitle', 'my_login_logo_url_title');

if (!(is_admin())) {
  function defer_js($url)
  {
    if (FALSE === strpos($url, '.js')) return $url;
    // if ( strpos( $url, 'jquery.js' ) ) return $url;
    return "$url' defer='defer";
  }
  add_filter('clean_url', 'defer_js', 11, 1);
}

// if(!is_admin()) {
  // Move all JS from header to footer
  // remove_action('wp_head', 'wp_print_scripts');
  // remove_action('wp_head', 'wp_print_head_scripts', 9);
  // remove_action('wp_head', 'wp_enqueue_scripts', 1);
  // add_action('wp_footer', 'wp_print_scripts', 5);
  // add_action('wp_footer', 'wp_print_head_scripts', 5);
  // add_action('wp_footer', 'wp_enqueue_scripts', 5);
// }

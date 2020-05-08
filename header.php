<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#fdce02" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125173585-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-125173585-1');
    </script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" <?php customify_site_classes(); ?>>
	<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'customify' ); ?></a>
    <?php
    do_action( 'customify/site-start/before' );
    if ( ! customify_is_e_theme_location( 'header' ) ) {
        do_action( 'customify/site-start' );
    }
    do_action( 'customify/site-start/after' );
    ?>
	<div id="site-content" <?php customify_site_content_class(); ?>>
        <div <?php customify_site_content_container_class(); ?>>
            <div <?php customify_site_content_grid_class(); ?>>
                <main id="main" <?php customify_main_content_class(); ?>>
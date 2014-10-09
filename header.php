<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<!--[if lt IE 9]><script src="<?php echo get_stylesheet_directory_uri(); ?>/js/html5.js"></script><![endif]-->
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->

	<?php if (is_search()) echo '<meta name="robots" content="noindex, nofollow" />'; ?>

	<title><?php wp_title( '|', true, 'right' ); bloginfo('name');?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div id="page" class="hfeed">

		<header role="banner">

				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'classy' ); ?></a>

				<h1 class="site-title">
					<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">Vitale Verbindingen</a>
				</h1>

				<nav class="top-navigation" role="navigation"><?php vv_top_menu(); ?></nav>

			</header><!-- .site-header -->

		<div id="main" class="site-main" role="main">

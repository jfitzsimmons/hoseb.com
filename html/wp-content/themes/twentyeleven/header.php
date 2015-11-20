<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title>
    <?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title( '|', true, 'right' );

        // Add the blog name.
        bloginfo( 'name' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

        ?>
    </title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <?php
        /* We add some JavaScript to pages with the comment form
         * to support sites with threaded comments (when in use).
         */
        if ( is_singular() && get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );

        wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
<header id="branding" role="banner">
    <hgroup>
        <h1><span><a href="#home" class="mainNavLink" rel="home" id="logo"><img src="<?php bloginfo('template_url')?>/images/fitz.png" /></a></span></h1>
        <nav id="access" role="navigation">
            <div id="sun"></div>
            <div id="clouds02"></div>
        </nav>
	<ul class="top-nav">
                    <li><a href="#skills" class="mainNavLink">SKILLS</a></li>
                    <li><a href="#work" class="mainNavLink">WORK</a></li>
                    <li></li>
                    <li><a href="#about" class="mainNavLink">ABOUT</a></li>
                    <li><a href="#contact" class="mainNavLink">CONTACT</a></li>
                </ul>
    </hgroup>
</header>
<div>
    <div>

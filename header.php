<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package assignement
 */

/*
 * Call Global Object Validator to Have Asscess to Validation Messages
 */
global $validator;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="feed site">        
        <div class="blog-masthead">
            <div class="container">              
                <nav class="blog-nav pull-right" role="navigation">                            
                  <?php if ( ! is_user_logged_in() ) : ?>
                    <a class="blog-nav-item" href="<?php echo custom_get_page_permalink('login'); ?>">Login</a>
                    <a class="blog-nav-item" href="<?php echo custom_get_page_permalink('register'); ?>">Register</a>
                  <?php else : ?>
                    <a class="blog-nav-item" href="<?php echo custom_get_page_permalink('profile'); ?>">My profile</a>     
                    <a class="blog-nav-item" href="<?php echo wp_logout_url(); ?>">Logout</a> 
                  <?php endif; ?>
               </nav><!-- #site-navigation -->
            </div><!--#container-->
        </div><!-- #masthead -->     
    </div><!--#feedsite -->
    <div class="container">
        <div class="blog-header">

            <!-- Implement Custom Header -->

            <?php if ( get_header_image() ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
                </a>
            <?php endif; // End header image check. ?>

        </div><!-- blog-header -->
        <div class="alert-info">    
            <?php 
            if ( isset($validator) ) {
                foreach ($validator->custom_messages as $message) {
                    echo '<p class="custom-message">' . $message . '</p>';
                }                                       
            }         
            ?>               
        </div><!-- alert-info -->


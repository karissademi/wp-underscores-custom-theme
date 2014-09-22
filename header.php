<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package assignement
 */

/*
 * Call Global Object Validator to Have Asscess to Errors
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
<div id="page" class="hfeed site">

          
	<div class="blog-masthead">
            <div class="container">              
                    <nav class="blog-nav pull-right" role="navigation">                            
                      <a class="blog-nav-item" href="#">Login</a>
                      <a class="blog-nav-item" href="<?php echo get_page_link(1707); ?>">Register</a>
                      <a class="blog-nav-item" href="#">Profile</a>                  
                   </nav><!-- #site-navigation -->
            </div><!--#container-->
        </div><!-- #masthead -->
        
</div>    
	<div class="container">
            <div class="blog-header">
                
                <!-- Implement Custom Header -->
                
                <?php if ( get_header_image() ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
                    </a>
                <?php endif; // End header image check. ?>
                
            </div>
            <div class="alert-info">               
                <?php 
                /*
                 * Display Validation Errors in a Message Box
                 */                                
                if ( isset ($validator) ) {
                     foreach($validator->errors as $error) {
                         echo $error. '</br>';
                     }
                }                       
                               
                ?>
            </div>

<?php
/**
 * The template for displaying all single posts.
 *
 * @package assignement
 */

get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', 'single' ); ?>

            <?php assignement_post_nav(); ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template for logged-in users			
            if ( comments_open() || '0' != get_comments_number() ) {
                if ( is_user_logged_in() ) {
                    comments_template();
                } else {
                    echo 'You must log in to comment';
                }
            }                                
            ?>

        <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
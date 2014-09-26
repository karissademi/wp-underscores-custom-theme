<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package assignement
 */

define('NUM_OF_POSTS', 5);

get_header(); ?>

<div class="row">
    <div class="col-sm-8 blog-main">

        <!-- First Query: Most Popular -->

        <?php
        $args = array(
            'posts_per_page' => NUM_OF_POSTS,
            'orderby' => 'comment_count',
            'order' => 'DESC',
            'ignore_sticky_posts' => true,
            
        );
        $popular_query = new WP_Query( $args );
        ?>
        <?php if ( $popular_query->have_posts() ) : ?>
        <h2>
            Most Popular

            <!-- Check If There Are More Posts to Display. If Yes, Show Link for More  -->
            <?php   if( $popular_query->found_posts > NUM_OF_POSTS) : ?>

            <a href="<?php echo custom_get_page_permalink('popular') ?>" class="pull-right"><small>See More</small></a>

            <?php endif; ?>

        </h2>
        <div class="post-list">
        <!-- Start the Loop -->
        <?php while ( $popular_query->have_posts() ) : $popular_query->the_post(); ?>
            <ul class="list-unstyled">
                <li>
                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>                                       
                </li>
            </ul>
        <?php endwhile; ?>			
        </div>

        <?php wp_reset_postdata(); ?>

        <?php else : ?>

            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; ?>

        <?php                                            
        /*
         * Second Query: Latest Posts
         */
        $args = array(
            'posts_per_page' => NUM_OF_POSTS,
            'orderby' => 'date',
            'order' => 'DESC',
            
        );
        $date_query = new WP_Query( $args );
        ?>

        <?php if ( $date_query->have_posts() ) : ?>

        <h2>
            Latest

            <!-- Check If There Are More Posts to Display. If Yes, Show Link for More  -->
            <?php   if( $popular_query->found_posts > NUM_OF_POSTS) : ?>

            <a href="<?php echo custom_get_page_permalink('latest') ?>" class="pull-right"><small>See More</small></a>

            <?php endif; ?>

        </h2>
        <div class="post-list">
        <!-- Start the Loop -->
        <?php while ( $date_query->have_posts() ) : $date_query->the_post(); ?>
            <ul class="list-unstyled">
                <li>
                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>                                       
                </li>
            </ul>
        <?php endwhile; ?>			
        </div>

        <?php wp_reset_postdata(); ?>

        <?php else : ?>

            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; ?>                

        <?php                                            
        /*
         * Third Query: Expire Soon Posts
         */

        /*
         * Custom Query for Metadata
         */
        $custom_query = "SELECT $wpdb->posts.* 
                        FROM $wpdb->posts, $wpdb->postmeta
                        WHERE $wpdb->posts.id = $wpdb->postmeta.post_id                                  
                        AND $wpdb->postmeta.meta_key='pw_spe_expiration'
                        ORDER BY $wpdb->postmeta.meta_value
                        DESC"; 

        $custom_results = $wpdb->get_results($custom_query, OBJECT); 

        $num_posts = count($custom_results);

        /*
         * How Many Posts to Display in List
         */
        $posts_to_display = $num_posts < NUM_OF_POSTS ? $num_posts : NUM_OF_POSTS;

        ?>

        <h2>
            Expire soon

            <!-- Check If There Are More Posts to Display. If Yes, Show Link for More  -->
            <?php if( count($custom_results) > NUM_OF_POSTS) : ?>

            <a href="<?php echo custom_get_page_permalink('expire') ?>" class="pull-right"><small>See More</small></a>

            <?php endif; ?>

        </h2>

        <?php

        if ( $custom_results ) {
            global $post;

            for ($i = 0; $i < $posts_to_display; $i++) {
                $post = $custom_results[$i];
                setup_postdata( $post );  ?>

                <ul class="list-unstyled">
                    <li>
                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>                                       
                    </li>
                </ul>
            <?php }
        } ?>                                                      
    </div><!-- #main -->
	

<?php get_sidebar(); ?>
<?php get_footer();
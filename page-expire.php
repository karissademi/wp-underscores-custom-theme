<?php get_header(); ?>

<div class="row">
    <div class="col-sm-8 blog-main">

        <?php                                            
        /*
         * Custom SQL for Expire-Soon Posts
         */
        $custom_query = "SELECT $wpdb->posts.* 
                        FROM $wpdb->posts, $wpdb->postmeta
                        WHERE $wpdb->posts.id = $wpdb->postmeta.post_id                                  
                        AND $wpdb->postmeta.meta_key='pw_spe_expiration'
                        ORDER BY $wpdb->postmeta.meta_value
                        DESC"; 

        $custom_results = $wpdb->get_results($custom_query, OBJECT); 
        $num_posts = count($custom_results);
        ?>
        
        <ul class="list-unstyled">
        <?php
        if ( $custom_results ) {
            global $post;
            
            for ($i = 0; $i < $num_posts; $i++) {
                $post = $custom_results[$i];
                setup_postdata( $post );  ?>           
                    <li>
                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>                                       
                    </li>           
            <?php }
        } ?>  
        </ul>
    </div>
    
<?php get_sidebar(); ?>
    
</div>  

<?php get_footer();
<?php get_header(); ?>

 <?php
                
$current_author_id = get_current_user_id();

$args = array(
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
    'author' => $current_author_id,
  
);
$latest_query = new WP_Query( $args );
?>
<div class="row">
    <div class="col-sm-8 blog-main">
        <div class="post-list">
            <h2>My posts</h2>
        <!-- Start the Loop -->
        <?php while ( $latest_query->have_posts() ) : $latest_query->the_post(); ?>
            <ul class="list-unstyled">
                <li>
                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>                                       
                </li>
            </ul>
        <?php endwhile; ?>			
        </div>
        <?php custom_pagination($latest_query); ?>
    </div>
    
<?php get_sidebar(); ?>
    
</div>

<?php get_footer(); ?>
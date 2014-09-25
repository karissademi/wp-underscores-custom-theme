<?php get_header(); ?>

 <?php
                
$current_author_id = get_current_user_id();

$args = array(
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
    'user_id' => $current_author_id, 
);
//The Query
$comments_query = new WP_Comment_Query( $args );
$comments = $comments_query->query( $args );
?>
<div class="row">
    <div class="col-sm-8 blog-main">
        <div class="post-list">
            <h2>My comments</h2>
            <!-- Start the Loop -->
            <?php
            if($comments) {
                foreach($comments as $comment) {
                    $commentedPost = get_post($comment->comment_post_ID);
                    echo '<p>Post tite: ' . $commentedPost->post_title . '</p>';
                    echo '<p>My comment: <em>' . $comment->comment_content . '</em></p>';
                    echo '<hr />';
                }
            }
            ?>        			
        </div>        
    </div>
    
<?php get_sidebar(); ?>
    
</div>

<?php get_footer(); ?>
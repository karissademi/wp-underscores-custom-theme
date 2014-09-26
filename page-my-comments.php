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
        <!-- Start the Loop, display links to posts and and comments -->
        <?php if($comments) : ?>
            <?php foreach($comments as $comment) : $commentedPost = get_post($comment->comment_post_ID)?>
            <p>Post title: <a href="<?php echo get_permalink($commentedPost); ?>"><?php echo $commentedPost->post_title; ?></a></p>
            <p>My comment: <em><?php echo $comment->comment_content; ?></em></p>
            <hr/>
            <?php endforeach; ?>
        <?php endif; ?>
            
            
        </div>        
    </div>
    
<?php get_sidebar(); ?>
</div>

<?php get_footer();
<?php get_header(); ?>

<?php




if ( isset($_GET) ) {
    $current_post_id = get_the_ID();
    $voteCount = get_post_meta($current_post_id, 'Votes', true);
    
    if ($_GET['action'] == 'up') {
        $newCount = $voteCount + 1;
        update_post_meta($current_post_id, 'Votes', $newCount);
        unset($_GET['action']);

    } 

    if ($_GET['action'] == 'down') {
        $newCount = $voteCount -1;
        update_post_meta($current_post_id, 'Votes', $newCount);
        unset($_GET['action']);
    }    
}

$voteCount = get_post_meta($current_post_id, 'Votes', true);

?>

<div class="row">
    <div class="col-sm-8">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <div class="pull-right">
                        Vote count: <?php echo $voteCount; ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="glyphicon glyphicon-arrow-up pull-right">
                        <a href="<?php echo get_the_permalink() . '&action=up'; ?>" class="">VoteUp</a>
                    </div>
                    <div class="glyphicon glyphicon-arrow-down pull-right">
                        <a href="<?php echo get_the_permalink() . '&action=down'; ?>" class="">VoteDown</a>
                    </div>                    
                    <div class="entry-meta">
                        <?php assignement_posted_on(); ?>

                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php
                            wp_link_pages( array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'assignement' ),
                                    'after'  => '</div>',
                            ) );
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php assignement_entry_footer(); ?>
                </footer><!-- .entry-footer -->
        </article><!-- #post-## -->
    </div>
    <?php get_sidebar(); ?>
</div>
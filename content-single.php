<?php get_header(); ?>

<?php $current_post_id = get_the_ID(); ?>

<?php $voteCount = get_post_meta($current_post_id, 'Votes', true); ?>

<div class="row">
    <div class="col-sm-8">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <div class="pull-right">
                        Vote count: <?php echo $voteCount; ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="voting-form pull-right">
                        <form method="post" />
                            <input type="hidden" name="voting" />
                            <input type="hidden" name="postId" value="<?php echo $current_post_id ?>"/>
                            <div class=" glyphicon glyphicon-arrow-up"></div>
                            <input type="submit" class="btn btn-link" name="voteUp" value="Up Vote"/>                                                   
                            <div class=" glyphicon glyphicon-arrow-down"></div>
                            <input type="submit" class="btn btn-link" name="voteDown" value="Dwon Vote"/>
                        </form>      
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
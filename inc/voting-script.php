<?php

function handle_voting_submission() {
    
    if ( isset($_POST['voting']) ) {
                    
        $current_post_id = $_POST['postId'];
        
        setcookie('voted-' . "$current_post_id", '1');
        
        $voteCount = get_post_meta($current_post_id, 'Votes', true);

        if ($_POST['voteUp'] && ! isset($_COOKIE['voted-' . "$current_post_id"])) {
            $newCount = ++$voteCount;
            update_post_meta($current_post_id, 'Votes', $newCount);
        } 

        if ($_POST['voteDown'] && ! isset($_COOKIE['voted-' . "$current_post_id"])) {
            $newCount = --$voteCount;
            update_post_meta($current_post_id, 'Votes', $newCount);
        }    
    }  
}

add_action('init', 'handle_voting_submission');
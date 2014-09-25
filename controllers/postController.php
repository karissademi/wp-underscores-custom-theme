<?php
if ( isset($_POST['newPost']) ) {
    /**
     * Sanitize user input
     */
    $postTitle = sanitize_text_field($_POST['postTitle']);
    $postContent = sanitize_text_field($_POST['postContent']);
    $tag1 = sanitize_text_field($_POST['tag1']);
    $tag2 = sanitize_text_field($_POST['tag2']);
    $tag3 = sanitize_text_field($_POST['tag3']);
    $postExpire = sanitize_text_field($_POST['exDate']);
    
    /*
     * Convert expiration date into a proper format
     */
    $expirationDate = array_reverse(explode('/', $postExpire)); 
    $expire = implode('-', $expirationDate);

    
    /**
     * Post data
     */
    $postData = array(
        'post_title'    =>  $postTitle,
        'post_content'  =>  $postContent,
        'post_status'   =>  'publish',
        'post_type'     =>  'post',
        'tags_input'    =>  array($tag1, $tag2, $tag3),
    );
    
    /**
     * Add expiration date
     */
    $new_post_id = wp_insert_post( $postData ); 
    update_post_meta($new_post_id, 'pw_spe_expiration', $expire);
    
    /**
     * Display a success message
     */
    global $validator;
    if ( $new_post_id ) {
        $validator->custom_messages[] = 'Post added';
    }
}    
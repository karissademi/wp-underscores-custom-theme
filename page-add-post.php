<?php get_header(); ?>

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
     * Post Data
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
     * Redirect to the new post
     */
    wp_redirect(get_permalink($new_post_id));
}
?>

<form class="form-horizontal" role="form" method="post" action="">
  <div class="form-group">
    <label for="inputTitle" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputTitle" name="postTitle" placeholder="Title of your post">
    </div>
  </div>
  <div class="form-group">
    <label for="inputContent" class="col-sm-2 control-label">Content</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="postContent" rows="3"></textarea>
    </div>
  </div>
  <div class="form-group"> 
    <label for="inputTag1" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
        <input type="text" class="narrow" name="tag1" placeholder="Tag 1"/>
        <input type="text" class="narrow" name="tag2" placeholder="Tag 2"/>
        <input type="text" class="narrow" name="tag3" placeholder="Tag 3"/>
    </div>
  </div>
  <div class="form-group"> 
    <label for="inputTag1" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">    
        <select class="form-control pull-left narrow" name="source" >
            <option>Link</option>                
            <option>Paper issue</option>
        </select>
        <input type="text" class="form-control pull-left narrow" placeholder="Pick an expiration date" name="exDate" id="chooseDate">
        </div> 
    </div>
  <div class="form-group">
    <div class="col-sm-offset-11 col-sm-1">
        <input type="hidden" name="newPost" />
        <button type="submit" class="btn btn-default">Add post</button>
    </div>
  </div>
</form>

<?php get_footer(); ?>
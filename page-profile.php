<?php get_header(); ?>

<?php
//Retrieve current user object
$current_user = wp_get_current_user(); 
$current_user_id = get_current_user_id();

?>

        
<div class="profile-box">
    <h2 class="text-center">Your profile</h2>
    <div class="col-sm-3">
        <img src="<?php echo get_template_directory_uri() . '/uploads/avatar.png'; ?>" class="img-rounded" />
    </div>
    <div class="col-sm-6">
        <form class="form-horizontal" id="profile-form" role="form" action="<?php echo get_permalink(); ?>">
            <div class="form-group">
                <label class="col-sm-5 control-label">Username</label>
                <div class="col-sm-7">
                  <p class="form-control-static"><?php echo $current_user->user_login; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-5 control-label">Location</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="inputPassword" placeholder="<?php echo $current_user->Location; ?>" value="<?php echo $current_user->Location; ?>" name="newLocation" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-5 control-label">Gender</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="inputPassword" placeholder="<?php echo $current_user->Gender; ?>" value="<?php echo $current_user->Gender; ?>" name="newGender" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-5 control-label">Date of birth</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="inputPassword" placeholder="<?php echo $current_user->DOB; ?>" value="<?php echo $current_user->DOB; ?>" name="newDOB" disabled>
                </div>              
            </div>
            <div class="form-group">
                <div class="col-sm-5 col-sm-offset-7">
                  <input type="submit" class="btn btn-default profile-update" id="inputPassword" value="Update profile">
                </div>              
            </div>            
        </form>                       
    </div><!-- #profile-info --> 
</div><!-- #profile-box -->
<div class="profile-box">
    <div class="text-center">
        <a href="<?php echo custom_get_page_permalink('add-post'); ?>" class="btn btn-default pull-left under-button">Add post</a>    
        <a href="<?php echo custom_get_page_permalink('my-posts'); ?>" class="btn btn-default pull-left under-button">My posts</a>
        <a href="<?php echo custom_get_page_permalink('my-comments'); ?>" class="btn btn-default pull-left under-button">My comments</a>
    </div>
</div>

<?php get_footer(); ?>
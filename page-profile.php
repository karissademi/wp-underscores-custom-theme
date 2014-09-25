<?php get_header(); ?>

<?php
//Retrieve current user object
$current_user = wp_get_current_user(); 

/*
 * Calculate user age
 */
$today = getdate();
$current_year = (int) $today['year'];
$user_dob = (int) $current_user->DOB;
$user_age = $current_year - $user_dob;


?>

        
<div class="profile-box">
    <h2 class="text-center">Your profile</h2>
    <div class="col-sm-3">
        <img src="<?php echo get_template_directory_uri() . '/uploads/avatar.png'; ?>" class="img-rounded" />
    </div>
    <div class="col-sm-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-sm-5 control-label">Username</label>
                <div class="col-sm-7">
                  <p class="form-control-static"><?php echo $current_user->user_login; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-5 control-label">Location</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="inputPassword" placeholder="<?php echo $current_user->Location; ?>" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-5 control-label">Gender</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="inputPassword" placeholder="<?php echo $current_user->Gender; ?>" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-5 control-label">Age</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="inputPassword" placeholder="<?php echo $user_age; ?>" disabled>
                </div>
            </div>
        </form>                       
    </div><!-- #profile-info --> 
    <div class="col-sm-3">
        <button class="btn btn-default pull-right profile-button">Edit profile</button>
    </div> 
</div><!-- #profile-box -->
<div class="profile-box">
    <div class="text-center">
        <a href="<?php echo custom_get_page_permalink('add-post'); ?>" class="btn btn-default pull-left under-button">Add post</a>    
        <a href="<?php echo home_url(); ?>" class="btn btn-default pull-left under-button">My posts</a>
        <a href="<?php echo home_url(); ?>" class="btn btn-default pull-left under-button">My comments</a>
    </div>
</div>

<?php get_footer(); ?>
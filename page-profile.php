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
    <div class="profile-avatar pull-left">
        <img src="<?php echo get_template_directory_uri() . '/uploads/avatar.png'; ?>" class="img-rounded" />
    </div>
    <div class="profile-info pull-left">
        <dl class="dl-horizontal">
            <dt>Your username:</dt>
            <dd><?php echo $current_user->user_login; ?></dd>
            <dt>Location:</dt>
            <dd><?php echo $current_user->Location; ?></dd>
            <dt>Gender:</dt>
            <dd><?php echo $current_user->Gender; ?></dd>
            <dt>Age:</dt>
            <dd><?php echo $user_age; ?></dt>
        </dl>                  
    </div><!-- #profile-info -->      
    <button class="btn btn-default pull-right profile-button">Profile settings</button>
</div><!-- #profile-box -->
<div class="profile-buttons">
    <a href="<?php echo custom_get_page_permalink('add-post'); ?>" class="btn btn-default pull-left under-button">Add post</a>    
    <a href="<?php echo home_url(); ?>" class="btn btn-default pull-left under-button">My posts</a>
    <a href="<?php echo home_url(); ?>" class="btn btn-default pull-left under-button">My comments</a>
</div>

<?php get_footer(); ?>
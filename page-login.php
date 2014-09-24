<?php get_header(); ?>

<div class="row">
    <div class="col-sm-4">
        
    </div>
    <div class="col-sm-4">
        <form method="post" action="<?php get_template_directory_uri() . '/controllers/registerController.php' ?>">
            <p><input name="user_login" class="form-control" type="text" placeholder="Login" /></p>
            <p><input name="user_password" class="form-control" type="password" placeholder="Password" /></p>
            <p><input name="login_form" class="form-control" type="hidden"/></p>
            <p><input type="submit" class="btn btn-default" value="Submit" /></p>
        </form>
    </div>
    <div class="col-sm-4">
        
    </div>
</div>

<?php get_footer(); ?>
<?php get_header(); 

?>

<div class="row">
    <div class="col-sm-4">
        
    </div>
    <div class="col-sm-4">
        <?php
        $args = array(
            'redirect' => site_url(),
        );
        if ( wp_login_form($args) ) {

        }
        ?>
    </div>
    <div class="col-sm-4">
        
    </div>
</div>

<?php get_footer(); ?>
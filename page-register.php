<?php get_header(); ?>




<div class="row">
    <div class="col-sm-4">
        
    </div>
    <div class="col-sm-4">
        <form role="form" method="post" action="<?php get_template_directory_uri() . '/controllers/validateController.php' ?>">
          <div class="form-group">
            <label for="InputUsername">Username*</label>
            <input type="text" class="form-control" id="InputUsername" placeholder="Enter username" name="inputUsername">
          </div>
          <div class="form-group">
            <label for="InputEmail">Email*</label>
            <input type="email" class="form-control" id="InputEmail" placeholder="Enter email" name="inputEmail">
          </div>
          <div class="form-group">
            <label for="InputPassword1">Password*</label>
            <input type="password" class="form-control" id="InputPassword1" placeholder="Enter password" name="inputPassword1">
          </div>
          <div class="form-group">
            <label for="InputPassword2">Repeat Password*</label>
            <input type="password" class="form-control" id="InputPassword2" placeholder="Repeat password" name="inputPassword2">
          </div>
          <div class="form-group">
            <label for="InputLocation">Location</label>
            <input type="text" class="form-control" id="InputLocation" placeholder="Enter location" name="inputLocation">
          </div>
          <div class="form-group pull-left">
            <label for="InputDOB">Date of Birth</label>
            <select class="form-control" id="datePicker" name="inputDOB">

            </select>
          </div>
          <div class="form-group pull-right">
            <label for="GenderPicker">Gender</label>
            <select class="form-control" id="GenderPicker" name="inputGender">
                <option>Woman</option>
                <option>Man</option>    
            </select>
          </div>
          <div class="form-group pull-right pull-left">
              
              <?php
              /*
               * Implement Captcha Validation Front-End
               */
                if ( function_exists('cptch_display_captcha_custom') ) {
                    echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />";
                    echo cptch_display_captcha_custom();
                }
              ?>
          </div>
            <div class="clearfix"></div>
          <div class="form-group pull-left">
              <!-- Unique Hidden Field of This Form -->
              <input type="hidden" name="registerForm" />
              <input type="submit" class="btn btn-default" value="Submit">
          </div>

        </form>
    </div>
    <div class="col-sm-4">
        
    </div>
</div>
    
<?php get_footer(); ?>
<?php /* Template Name: page-register */ ?>

<?php get_header(); ?>

<div class="row">
    <div class="col-sm-4">
        
    </div>
    <div class="col-sm-4">
        <form role="form">
          <div class="form-group">
            <label for="InputUsername">Username</label>
            <input type="text" class="form-control" id="InputUsername" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="InputEmail">Email</label>
            <input type="email" class="form-control" id="InputEmail" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="InputPassword1">Password</label>
            <input type="password" class="form-control" id="InputPassword1" placeholder="Enter password">
          </div>
          <div class="form-group">
            <label for="InputPassword2">Repeat Password</label>
            <input type="password" class="form-control" id="InputPassword2" placeholder="Repeat password">
          </div>
          <div class="form-group">
            <label for="InputLocation">Location</label>
            <input type="text" class="form-control" id="InputLocation" placeholder="Enter location">
          </div>
          <div class="form-group pull-left">
            <label for="InputDOB">Date of Birth</label>
            <select class="form-control" id="datePicker">

            </select>
          </div>
          <div class="form-group pull-right">
            <label for="genderPicker">Gender</label>
            <select class="form-control" id="genderPicker">
                <option>Woman</option>
                <option>Man</option>    
            </select>
          </div>
        </form>
    </div>
    <div class="col-sm-4">
        
    </div>
</div>
    
<?php get_footer(); ?>
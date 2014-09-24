<?php get_header(); ?>

<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="inputTitle" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputTitle" placeholder="Title of your post">
    </div>
  </div>
  <div class="form-group">
    <label for="inputContent" class="col-sm-2 control-label">Content</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3"></textarea>
    </div>
  </div>
  <div class="form-group"> 
    <label for="inputTag1" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
        <input type="text" class="narrow" placeholder="Tag 1"/>
        <input type="text" class="narrow" placeholder="Tag 2"/>
        <input type="text" class="narrow" placeholder="Tag 3"/>
    </div>
  </div>
  <div class="form-group"> 
    <label for="inputTag1" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">    
        <select class="form-control pull-left narrow" >
            <option>Whatever</option>                
        </select>
        <input type="text" class="form-control pull-left narrow" placeholder="Pick an expiration date" id="chooseDate">
        </div> 
    </div>
  <div class="form-group">
    <div class="col-sm-offset-11 col-sm-1">
      <button type="submit" class="btn btn-default">Add post</button>
    </div>
  </div>
</form>

<?php get_footer(); ?>
<?php
session_start();
require('db.php');
require_once('includes/header.php');
?>

<div class="col-md-12 ">
  <form action="add_about_post.php" method="POST" enctype="multipart/form-data" style="padding: 30px;">
    <h2>Add About Section</h2><hr>
    <div class="form-group">
      <label>About Part Details</label>
      <textarea name="about_details" class="form-control"  required></textarea>
    </div>
    <div class="form-group">
      <label>About Part Photo</label>
      <input type="file" name="about_photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-info btn-sm">Update</button>
  </form>
</div>

<?php
  require_once('includes/footer.php');
?>

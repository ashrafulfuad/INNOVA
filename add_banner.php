<?php
session_start();
require('db.php');
require_once('includes/header.php');
?>

<div class="col-md-12 ">
  <form action="add_banner_post.php" method="POST" enctype="multipart/form-data" style="padding: 30px;">
    <h2>Add Banner</h2><hr>
    <div class="form-group">
      <label>Banner Name</label>
      <input type="text" name="banner_name" class="form-control" placeholder="Enter Banner Name" required>
    </div>
    <div class="form-group">
      <label>Banner Details</label>
      <textarea name="banner_details" class="form-control"  required></textarea>
    </div>
    <div class="form-group">
      <label>Banner Photo</label>
      <input type="file" name="banner_photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-info btn-sm">Update</button>
  </form>
</div>

<?php
  require_once('includes/footer.php');
?>

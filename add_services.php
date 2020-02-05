<?php
session_start();
require('db.php');
require_once('includes/header.php');
?>

<div class="col-md-12 ">
  <form action="add_services_post.php" method="POST" enctype="multipart/form-data" style="padding: 30px;">
    <h2>Add Service</h2><hr>
    <div class="form-group">
      <label>Service Name</label>
      <input type="text" name="services_name" class="form-control" placeholder="Enter Services Name" required>
    </div>
    <div class="form-group">
      <label>Service Details</label>
      <textarea name="services_details" class="form-control"  required></textarea>
    </div>
    <div class="form-group">
      <label>Service Photo</label>
      <input type="file" name="services_photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-warning btn-sm">Update</button>
  </form>
</div>

<?php
  require_once('includes/footer.php');
?>

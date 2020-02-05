<?php
session_start();
require('db.php');
require_once('includes/header.php');
?>

<div class="col-md-12 ">
  <form action="add_testimonial_post.php" method="POST" enctype="multipart/form-data" style="padding: 30px;">
    <h2>Add Testimonial</h2><hr>
    <div class="form-group">
      <label>Clients Name</label>
      <input type="text" name="testimonial_name" class="form-control" placeholder="Enter Services Name" required>
    </div>
    <div class="form-group">
      <label>Clients Comment</label>
      <textarea name="testimonial_comment" class="form-control"  required></textarea>
    </div>
    <div class="form-group">
      <label>Clients Photo</label>
      <input type="file" name="testimonial_photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-info btn-sm">Update</button>
  </form>
</div>

<?php
  require_once('includes/footer.php');
?>

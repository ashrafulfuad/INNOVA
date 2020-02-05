<?php
session_start();
require('db.php');
require_once('includes/header.php');

if(empty($_GET['id'])){
  header('location: all_banner_list.php');
}

$user_id = $_GET['id'];
$select_data_from_db = "SELECT * FROM about_table WHERE id= '$user_id'";
$query = mysqli_query($db_connect, $select_data_from_db);
$after_assoc = mysqli_fetch_assoc($query);

?>

       <div class="col-md-12 ">
         <form action="edit_about_id_post.php" method="POST" enctype="multipart/form-data" style="padding: 30px;">
           <h2 style="text-aligh: center">Update of About Section</h2><hr>
           <div class="form-group">
             <label>About Details</label>
             <input type="hidden" value="<?php echo $after_assoc['id']; ?>" name="id">
             <textarea name="about_details" class="form-control"><?php echo $after_assoc['about_details']; ?></textarea>
           </div>
           <div class="form-group">
             <label>About Photo</label>
             <input type="file" value="<?php echo $after_assoc['about_photo']; ?>" name="about_photo" class="form-control">
           </div>
           <button type="submit" class="btn btn-warning btn-sm">Update</button>
         </form>
       </div>


<?php
  require_once('includes/footer.php');
?>

<?php
session_start();
require('db.php');
require_once('includes/header.php');

if(empty($_GET['id'])){
  header('location: all_services_list.php');
}

$user_id = $_GET['id'];
$select_data_from_db = "SELECT * FROM services_table WHERE id= '$user_id'";
$query = mysqli_query($db_connect, $select_data_from_db);
$after_assoc = mysqli_fetch_assoc($query);

?>

       <div class="col-md-12 ">
         <form action="edit_services_id_post.php" method="POST" enctype="multipart/form-data" style="padding: 30px;">
           <h2 style="text-aligh: center">Update of<span style="color: green"> <?php echo $after_assoc['services_name']; ?></span></h2><hr>
           <div class="form-group">
             <label>Service Name</label>
             <input type="hidden" value="<?php echo $after_assoc['id']; ?>" name="id">
             <input type="text" value="<?php echo $after_assoc['services_name']; ?>" name="services_name" class="form-control">
           </div>
           <div class="form-group">
             <label>Service Details</label>
             <textarea name="services_details" class="form-control"><?php echo $after_assoc['services_details']; ?></textarea>
           </div>
           <div class="form-group">
             <label>Service Photo</label>
             <input type="file" value="<?php echo $after_assoc['services_photo']; ?>" name="services_photo" class="form-control">
           </div>
           <button type="submit" class="btn btn-info btn-sm">Update</button>
         </form>
       </div>


<?php
  require_once('includes/footer.php');
?>

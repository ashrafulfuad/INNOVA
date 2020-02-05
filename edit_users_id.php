<?php
session_start();
require('db.php');
require_once('includes/header.php');

if(empty($_GET['id'])){
  header('location: all_users_list.php');
}

$user_id = $_GET['id'];
$update = "SELECT * FROM user_table WHERE id= '$user_id'";
$query = mysqli_query($db_connect, $update);
$after_assoc = mysqli_fetch_assoc($query);

?>

       <div class="col-md-12 " style="margin-top: 50px">
         <form action="edit_user_id_post.php" method="POST" enctype="multipart/form-data" style="padding: 30px; border: 1px solid #222;">
           <h2 style="text-aligh: center">Update of<span style="color: green"> <?php echo $after_assoc['username']; ?></span></h2><hr>
           <div class="form-group">
             <label>Name</label>
             <input type="hidden" value="<?php echo $after_assoc['id']; ?>" name="id">
             <input type="text" value="<?php echo $after_assoc['username']; ?>" name="username" class="form-control" placeholder="Enter Name">
           </div>
           <div class="form-group">
             <label>E-mail</label>
             <input type="email" value="<?php echo $after_assoc['email']; ?>" name="email" class="form-control" placeholder="Enter Phone">
           </div>
           <div class="form-group">
             <label>Password</label>
             <input type="text" value="<?php echo $after_assoc['password']; ?>" name="password" class="form-control" placeholder="Enter Address">
           </div>
           <div class="form-group">
             <label>Profile Photo</label>
             <input type="file" value="<?php echo $after_assoc['profile_photo']; ?>" name="profile_photo" class="form-control">
           </div>
           <button type="submit" class="btn btn-warning btn-sm">Update</button>
         </form>
       </div>


<?php

  require_once('includes/footer.php');
?>

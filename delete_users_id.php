<?php
require('db.php');

$user_id = $_GET['id'];

$profile_photo_in_db = "SELECT * FROM user_table WHERE id= $user_id ";
$query = mysqli_query($db_connect, $profile_photo_in_db);
$after_assoc = mysqli_fetch_assoc($query);
$photo_name = $after_assoc['profile_photo'];
$photo_path = "photos/".$photo_name;
if ($photo_name != 'default_profile_photo.jpg') {
  unlink($photo_path);
}
$update = "DELETE FROM user_table WHERE id = $user_id";
mysqli_query($db_connect, $update);
header('location: all_users_list.php');
?>

<?php
require('db.php');

$user_id = $_GET['id'];

$about_photo_in_db = "SELECT * FROM about_table WHERE id= $user_id ";
$query = mysqli_query($db_connect, $about_photo_in_db);
$after_assoc = mysqli_fetch_assoc($query);
$photo_name = $after_assoc['about_photo'];
$photo_path = "photos/about/".$photo_name;
if ($photo_name != 'default_about_photo.jpg') {
  unlink($photo_path);
}
$delete = "DELETE FROM about_table WHERE id= $user_id";
mysqli_query($db_connect, $delete);
header('location: all_about_list.php');
?>

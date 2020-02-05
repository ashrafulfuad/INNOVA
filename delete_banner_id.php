<?php
require('db.php');

$user_id = $_GET['id'];

$banner_photo_in_db = "SELECT * FROM banner_table WHERE id= $user_id ";
$query = mysqli_query($db_connect, $banner_photo_in_db);
$after_assoc = mysqli_fetch_assoc($query);
$photo_name = $after_assoc['banner_photo'];
$photo_path = "photos/banner_photo/".$photo_name;
if ($photo_name != 'banner_default_photo.jpg') {
  unlink($photo_path);
}
$delete = "DELETE FROM banner_table WHERE id= $user_id";
mysqli_query($db_connect, $delete);
header('location: all_banner_list.php');
?>

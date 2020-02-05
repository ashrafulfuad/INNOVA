<?php
require('db.php');

$user_id = $_GET['id'];

$services_photo_in_db = "SELECT * FROM services_table WHERE id= $user_id ";
$query = mysqli_query($db_connect, $services_photo_in_db);
$after_assoc = mysqli_fetch_assoc($query);
$photo_name = $after_assoc['services_photo'];
$photo_path = "photos/services_photo/".$photo_name;
if ($photo_name != 'services_default_photo.jpg') {
  unlink($photo_path);
}
$delete = "DELETE FROM services_table WHERE id= $user_id";
mysqli_query($db_connect, $delete);
header('location: all_services_list.php');
?>

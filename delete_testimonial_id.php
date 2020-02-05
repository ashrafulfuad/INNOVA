<?php
require('db.php');

$user_id = $_GET['id'];

$testimonial_photo_in_db = "SELECT * FROM testimonial_table WHERE id= $user_id ";
$query = mysqli_query($db_connect, $testimonial_photo_in_db);
$after_assoc = mysqli_fetch_assoc($query);
$photo_name = $after_assoc['testimonial_photo'];
$photo_path = "photos/testimonial_photo/".$photo_name;
if ($photo_name != 'testimonial_default_photo.jpg') {
  unlink($photo_path);
}
$delete = "DELETE FROM testimonial_table WHERE id= $user_id";
mysqli_query($db_connect, $delete);
header('location: all_testimonial_list.php');
?>

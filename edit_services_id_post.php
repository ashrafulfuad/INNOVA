<?php
require('db.php');

$user_id = $_POST['id'];
$services_name = $_POST['services_name'];
$services_details = $_POST['services_details'];
$services_photo = $_FILES['services_photo'];

$sql = "UPDATE services_table SET services_name='$services_name', services_details='$services_details' WHERE id = $user_id";
if (mysqli_query($db_connect, $sql)) {
  $calling_all_from_db = "SELECT * FROM services_table WHERE id= $user_id ";
  $query = mysqli_query($db_connect, $calling_all_from_db);
  $after_assoc = mysqli_fetch_assoc($query);
  if ($services_photo['name'] == '') {
    header("location: all_services_list.php");
  }
  if ($after_assoc['services_photo'] != 'services_default_photo.jpg') {
    if($services_photo['name'] != ''){
      $photo_path = "photos/services_photo/".$after_assoc['services_photo'];
      unlink($photo_path);
    }
  }
  $uploading_image_name = $services_photo['name'];
  $afertExplode = explode('.', $uploading_image_name);
  $extention = end($afertExplode);
  $allowd_format = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
  if(!in_array($extention, $allowd_format)){
    echo "This format is not Allowed";
    die;
  }
  $uploading_image_size = $services_photo['size'];
  if($uploading_image_size >= 500000){
    echo "You can not upload Photo more than 5 MB";
    die;
  }
  $new_file_name = $user_id.'.'.$extention;
  $old_photos_location = $services_photo['tmp_name'];
  $new_photos_location = "photos/services_photo/".$new_file_name;
  move_uploaded_file($old_photos_location, $new_photos_location);
  $insert_with_photo = "UPDATE services_table SET services_photo = '$new_file_name' WHERE id = $user_id";
  mysqli_query($db_connect, $insert_with_photo);
  header("location: all_services_list.php");
}else {
  echo "Not Updated";
}

?>

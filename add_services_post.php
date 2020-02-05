<?php
require_once('db.php');

$services_name = $_POST['services_name'];
$services_details = $_POST['services_details'];
$services_photo = $_FILES['services_photo'];

$insert_service = "INSERT INTO services_table (services_name, services_details, services_photo) VALUES ('$services_name', '$services_details', 'services_default_photo.jpg')";
mysqli_query($db_connect, $insert_service);
if (!empty($services_photo['name'])) {
  $uploading_image_name = $services_photo['name'];
  $afertExplode = explode('.', $uploading_image_name);
  $extention = end($afertExplode);
  $user_id = mysqli_insert_id($db_connect);
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
  $update_with_photo = "UPDATE services_table SET services_photo = '$new_file_name' WHERE id = $user_id";
  mysqli_query($db_connect, $update_with_photo);
  header('location: all_services_list.php');
}else{
  header('location: all_services_list.php');
}

?>

<?php
require('db.php');

$user_id = $_POST['id'];
$about_details = $_POST['about_details'];
$about_photo = $_FILES['about_photo'];


$sql = "UPDATE about_table SET about_details='$about_details' WHERE id = $user_id";
if (mysqli_query($db_connect, $sql)) {
  $calling_all_from_db = "SELECT * FROM about_table WHERE id= $user_id ";
  $query = mysqli_query($db_connect, $calling_all_from_db);
  $after_assoc = mysqli_fetch_assoc($query);
  if ($about_photo['name'] == '') {
    header("location: all_about_list.php");
  }
  if ($after_assoc['about_photo'] != 'default_about_photo.jpg') {
    if($banner_photo['name'] != ''){
      $photo_path = "photos/about/".$after_assoc['about_photo'];
      unlink($photo_path);
    }
  }
  $uploading_image_name = $about_photo['name'];
  $afertExplode = explode('.', $uploading_image_name);
  $extention = end($afertExplode);
  $allowd_format = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
  if(!in_array($extention, $allowd_format)){
    echo "This format is not Allowed";
    die;
  }
  $uploading_image_size = $about_photo['size'];
  if($uploading_image_size >= 500000){
    echo "You can not upload Photo more than 5 MB";
    die;
  }
  $new_file_name = $user_id.'.'.$extention;
  $old_photos_location = $about_photo['tmp_name'];
  $new_photos_location = "photos/about/".$new_file_name;
  move_uploaded_file($old_photos_location, $new_photos_location);
  $insert_with_photo = "UPDATE about_table SET about_photo = '$new_file_name' WHERE id = $user_id";
  mysqli_query($db_connect, $insert_with_photo);
  header("location: all_about_list.php");
}else {
  echo "Not Updated";
}

?>

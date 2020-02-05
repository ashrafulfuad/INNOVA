<?php
require_once('db.php');

$about_details = $_POST['about_details'];
$about_photo = $_FILES['about_photo'];

$insert_about_into_db = "INSERT INTO about_table (about_details, about_photo) VALUES ('$about_details', 'default_about_photo.jpg')";
mysqli_query($db_connect, $insert_about_into_db);
if (!empty($about_photo['name'])) {
  $uploading_image_name = $about_photo['name'];
  $afertExplode = explode('.', $uploading_image_name);
  $extention = end($afertExplode);
  $user_id = mysqli_insert_id($db_connect);
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
  $update_with_photo = "UPDATE about_table SET about_photo = '$new_file_name' WHERE id = $user_id";
  mysqli_query($db_connect, $update_with_photo);
  header('location: all_about_list.php');
}else{
  header('location: all_about_list.php');
}

?>

<?php
require_once('db.php');

$banner_name = $_POST['banner_name'];
$banner_details = $_POST['banner_details'];
$banner_photo = $_FILES['banner_photo'];

$insert_banner_into_db = "INSERT INTO banner_table (banner_name, banner_details, banner_photo) VALUES ('$banner_name', '$banner_details', 'banner_default_photo.jpg')";
mysqli_query($db_connect, $insert_banner_into_db);
if (!empty($banner_photo['name'])) {
  $uploading_image_name = $banner_photo['name'];
  $afertExplode = explode('.', $uploading_image_name);
  $extention = end($afertExplode);
  $user_id = mysqli_insert_id($db_connect);
  $allowd_format = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
  if(!in_array($extention, $allowd_format)){
    echo "This format is not Allowed";
    die;
  }
  $uploading_image_size = $banner_photo['size'];
  if($uploading_image_size >= 500000){
    echo "You can not upload Photo more than 5 MB";
    die;
  }
  $new_file_name = $user_id.'.'.$extention;
  $old_photos_location = $banner_photo['tmp_name'];
  $new_photos_location = "photos/banner_photo/".$new_file_name;
  move_uploaded_file($old_photos_location, $new_photos_location);
  $update_with_photo = "UPDATE banner_table SET banner_photo = '$new_file_name' WHERE id = $user_id";
  mysqli_query($db_connect, $update_with_photo);
  header('location: all_banner_list.php');
}else{
  header('location: all_banner_list.php');
}

?>

<?php
require('db.php');

$user_id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$profile_photo = $_FILES['profile_photo'];

$sql = "UPDATE user_table SET username='$username', email='$email', password='$password' WHERE id = $user_id";
if (mysqli_query($db_connect, $sql)) {
  $calling_all_from_db = "SELECT * FROM user_table WHERE id= $user_id ";
  $query = mysqli_query($db_connect, $calling_all_from_db);
  $after_assoc = mysqli_fetch_assoc($query);
  if ($profile_photo['name'] == '') {
    header("location: all_users_list.php");
  }
  if ($after_assoc['profile_photo'] != 'default_profile_photo.jpg') {
    if($profile_photo['name'] != ''){
      $photo_path = "photos/".$after_assoc['profile_photo'];
      unlink($photo_path);
    }
  }
  $uploading_image_name = $profile_photo['name'];
  $afertExplode = explode('.', $uploading_image_name);
  $extention = end($afertExplode);
  $allowd_format = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
  if(!in_array($extention, $allowd_format)){
    echo "This format is not Allowed";
    die;
  }
  $uploading_image_size = $profile_photo['size'];
  if($uploading_image_size >= 500000){
    echo "You can not upload Photo more than 5 MB";
    die;
  }
  $new_file_name = $user_id.'.'.$extention;
  $old_photos_location = $profile_photo['tmp_name'];
  $new_photos_location = "photos/".$new_file_name;
  move_uploaded_file($old_photos_location, $new_photos_location);
  $insert_with_photo = "UPDATE user_table SET profile_photo = '$new_file_name' WHERE id = $user_id";
  mysqli_query($db_connect, $insert_with_photo);
  header("location: all_users_list.php");
}else {
  echo "Not Updated";
}

?>

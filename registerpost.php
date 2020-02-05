<?php
require_once('db.php');

$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$check_email_into_db = "SELECT count(*) as shohan FROM user_table WHERE email='$email'";
$query = mysqli_query($db_connect, $check_email_into_db); 
$after_assoc = mysqli_fetch_assoc($query);

if($after_assoc['shohan'] == 1){
  echo "Use another email!";
}else{
  $uploading_image = $_FILES['profile_photo'];
  if (empty($uploading_image['name'])) {
    $insert_without_photo = "INSERT INTO user_table (username, email, password, profile_photo) VALUES ('$name', '$email','$password', 'default_profile_photo.jpg')";
    mysqli_query($db_connect, $insert_without_photo);
    header('location: login.php');
  }
  $uploading_image_name = $uploading_image['name'];
  $afertExplode = explode('.', $uploading_image_name);
  $extention = end($afertExplode);
  $user_id = mysqli_insert_id($db_connect);
  $allowd_format = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
  if(!in_array($extention, $allowd_format)){
    echo "This format is not Allowed";
    die;
  }
  $uploading_image_size = $uploading_image['size'];
  if($uploading_image_size >= 500000){
    echo "You can not upload Photo more than 5 MB";
    die;
  }
  $insert_into_db = "INSERT INTO user_table (username, email, password) VALUES ('$name', '$email','$password')";
  $query = mysqli_query($db_connect, $insert_into_db);
  $user_id = mysqli_insert_id($db_connect);
  $new_file_name = $user_id.'.'.$extention;
  $old_photos_location = $uploading_image['tmp_name'];
  $new_photos_location = "photos/".$new_file_name;
  move_uploaded_file($old_photos_location, $new_photos_location);
  $insert_with_photo = "UPDATE user_table SET profile_photo = '$new_file_name' WHERE id = $user_id";
  mysqli_query($db_connect, $insert_with_photo);
  header('location: login.php');
}


?>

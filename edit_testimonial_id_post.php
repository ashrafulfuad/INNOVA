<?php
require('db.php');

$user_id = $_POST['id'];
$testimonial_name = $_POST['testimonial_name'];
$testimonial_comment = $_POST['testimonial_comment'];
$testimonial_photo = $_FILES['testimonial_photo'];

$sql = "UPDATE testimonial_table SET testimonial_name='$testimonial_name', testimonial_comment='$testimonial_comment' WHERE id = $user_id";
if (mysqli_query($db_connect, $sql)) {
  $calling_all_from_db = "SELECT * FROM testimonial_table WHERE id= $user_id ";
  $query = mysqli_query($db_connect, $calling_all_from_db);
  $after_assoc = mysqli_fetch_assoc($query);
  if ($testimonial_photo['name'] == '') {
    header("location: all_testimonial_list.php");
  }
  if ($after_assoc['testimonial_photo'] != 'testimonial_default_photo.jpg') {
    if($testimonial_photo['name'] != ''){
      $photo_path = "photos/testimonial_photo/".$after_assoc['testimonial_photo'];
      unlink($photo_path);
    }
  }
  $uploading_image_name = $testimonial_photo['name'];
  $afertExplode = explode('.', $uploading_image_name);
  $extention = end($afertExplode);
  $allowd_format = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
  if(!in_array($extention, $allowd_format)){
    echo "This format is not Allowed";
    die;
  }
  $uploading_image_size = $testimonial_photo['size'];
  if($uploading_image_size >= 500000){
    echo "You can not upload Photo more than 5 MB";
    die;
  }
  $new_file_name = $user_id.'.'.$extention;
  $old_photos_location = $testimonial_photo['tmp_name'];
  $new_photos_location = "photos/testimonial_photo/".$new_file_name;
  move_uploaded_file($old_photos_location, $new_photos_location);
  $insert_with_photo = "UPDATE testimonial_table SET testimonial_photo = '$new_file_name' WHERE id = $user_id";
  mysqli_query($db_connect, $insert_with_photo);
  header("location: all_testimonial_list.php");
}else {
  echo "Not Updated";
}

?>

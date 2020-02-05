<?php
require_once('db.php');

$testimonial_name = $_POST['testimonial_name'];
$testimonial_comment = $_POST['testimonial_comment'];
$testimonial_photo = $_FILES['testimonial_photo'];
// echo "<pre>";
// print_r($testimonial_photo);
// echo "</pre>";


$insert_testimonial = "INSERT INTO testimonial_table (testimonial_name, testimonial_comment, testimonial_photo) VALUES ('$testimonial_name', '$testimonial_comment', 'testimonial_default_photo.jpg')";
mysqli_query($db_connect, $insert_testimonial);
if (!empty($testimonial_photo['name'])) {
  $uploading_image_name = $testimonial_photo['name'];
  $afertExplode = explode('.', $uploading_image_name);
  $extention = end($afertExplode);
  $user_id = mysqli_insert_id($db_connect);
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
  $update_with_photo = "UPDATE testimonial_table SET testimonial_photo = '$new_file_name' WHERE id = $user_id";
  mysqli_query($db_connect, $update_with_photo);
  header('location: all_testimonial_list.php');
}else{
  header('location: all_testimonial_list.php');
}

?>

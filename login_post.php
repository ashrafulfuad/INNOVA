<?php
session_start();
require_once('db.php');

$email = $_POST['email'];
$password = $_POST['password'];

$login_into_db = "SELECT count(*) as  shohan, username, email, profile_photo FROM user_table WHERE email='$email' and password='$password'";

$query = mysqli_query($db_connect, $login_into_db);

$after_assoc = mysqli_fetch_assoc($query);

if($after_assoc['shohan'] == 1){
  $_SESSION['login_ok'] = 'yes';
  $_SESSION['username'] = $after_assoc['username'];
  $_SESSION['email'] = $after_assoc['email'];
  $_SESSION['profile_photo'] = $after_assoc['profile_photo'];
  header('location: profile.php');
}else{
  header('location: login.php');
}

?>

<?php
session_start();
require_once('db.php');

$guest_name = $_POST['guest_name'];
$guest_email = $_POST['guest_email'];
$guest_message = $_POST['guest_message'];

$insert_into_db = "INSERT INTO contact_message_table (guest_name, guest_email, guest_message) VALUES ('$guest_name', '$guest_email','$guest_message')";
$query = mysqli_query($db_connect, $insert_into_db);

$_SESSION['message_sent'] = 'yes';

header('location: index.php#contact');


?>

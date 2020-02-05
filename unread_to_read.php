<?php
require('db.php');

$user_id = $_GET['id'];
$update = "UPDATE contact_message_table SET status = 2 WHERE id = $user_id";
mysqli_query($db_connect, $update);

header('location: all_contact_messages.php');
?>

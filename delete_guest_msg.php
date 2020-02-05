<?php
require('db.php');

$user_id = $_GET['id'];
$update = "DELETE FROM contact_message_table WHERE id = $user_id";
mysqli_query($db_connect, $update);

header('location: all_contact_messages.php');
?>

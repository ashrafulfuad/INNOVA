<?php
session_start();

if(!isset($_SESSION['login_ok'])){
  header('location: login.php');
}
require_once("includes/header.php")

?>

<h1>Welcome You are loged in!</h1>
<form  action="logout.php" method="post">
  <button type="submit" class="btn btn-sm btn-primary">Log Out</button>
</form>




<?php
require_once("includes/footer.php")
?>

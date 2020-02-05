<?php
session_start();
require_once('db.php');
require_once('includes/header.php');

if(!isset($_SESSION['login_ok'])){
  header('location: profile.php');
}

$users_list_from_db = "SELECT * FROM user_table";

$query = mysqli_query($db_connect, $users_list_from_db);

?>

<div class="col-lg-12 mt-5">
  <table class="table table-dark table-bordered">
      <h1>View User <span style="color: green">Profile</span></h1><hr>
      <tr>
        <td>img</td>
        <td>
          <tr>
            <td>name</td>
            <td>email</td>
          </tr>
        </td>
      </tr>
  </table>
</div>



<?php
 require_once('includes/footer.php');
?>

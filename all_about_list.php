<?php
session_start();
require_once('db.php');
require_once('includes/header.php');

if(!isset($_SESSION['login_ok'])){
  header('location: profile.php');
}

$about_list_from_db = "SELECT * FROM about_table order by id desc";
$query = mysqli_query($db_connect, $about_list_from_db);

?>

              <div class="col-lg-12 mt-5">
                <table class="table table-dark table-bordered">
                  <h1>All About List</h1><hr>
                  <thead>
                      <tr>
                      <th scope="col">SL No</th>
                      <th scope="col">About Details</th>
                      <th scope="col">About Photo</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                      foreach ($query as $key => $value) {
                    ?>

                      <tr>
                        <th scope="row"><?php echo $key+1 ?></th>
                        <td><?php echo $value['about_details'] ?></td>
                        <td><img src="photos/about/<?php echo $value['about_photo'] ?>" height="30" width="40"></td>
                        <td>
                          <a href="edit_about_id.php?id=<?= $value['id']?>" class="btn btn-sm btn-info">Edit</a>
                          <a href="delete_about_id.php?id=<?= $value['id']?>" class="btn btn-sm btn-danger">Delete</a>
                          <!-- <a href="view_users_id.php?id=<?= $value['id']?>" class="btn btn-sm btn-success">View</a> -->
                        </td>
                      </tr>

                    <?php
                        }
                    ?>

                  </tbody>
                </table>
              </div>



<?php
 require_once('includes/footer.php');
?>

<?php
session_start();
require_once('db.php');

if(!isset($_SESSION['login_ok'])){
  header('location: profile.php');
}

require_once('includes/header.php');
$contact_messages_from_db = "SELECT * FROM contact_message_table order by id desc";
$query = mysqli_query($db_connect, $contact_messages_from_db);
?>

              <div class="col-lg-12">
                <table id="example" class="table table-dark table-bordered">
                  <h1>All Contact Messages</h1><hr>
                  <thead>
                      <tr>
                      <th scope="col">SL No</th>
                      <th scope="col">Guest Name</th>
                      <th scope="col">Guest E-mail</th>
                      <th scope="col">Guest Messages</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                      foreach ($query as $key => $value) {
                    ?>
                      <tr>
                        <th scope="row"><?php echo $key+1 ?></th>
                        <td><?php echo $value['guest_name'] ?></td>
                        <td><?php echo $value['guest_email'] ?></td>
                        <td><?php echo $value['guest_message'] ?></td>
                        <td>
                          <a href="delete_guest_msg.php?id=<?= $value['id']?>" class="btn btn-sm btn-danger">Delete</a>

                          <?php
                            if ($value['status'] == 1) {
                          ?>
                            <a href="unread_to_read.php?id=<?= $value['id']?>" class="btn btn-sm btn-info">Unread</a>
                          <?php
                            }
                          ?>

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

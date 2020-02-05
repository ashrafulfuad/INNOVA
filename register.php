<?php
session_start();

if(!isset($_SESSION['login_ok'])){
  header('location: login.php');
}
?>


<!doctype html>
<html lang="en">
  <head >
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Register Page</title>
  </head>
  <body style="background-image: url(images/bg-reg-1.jpg); background-position: center; background-repeat: no-repeat; background-size: cover;">



      <div class="container" style="margin-bottom: 200px">
        <div class="row">
          <div class="col-md-6 offset-3 mt-5">
          <form action="registerpost.php" method="post"   style="padding: 30px; background: rgba(0,0,0,0.2)" enctype="multipart/form-data">
              <h1 style="text-align: center; color: #222">Registration</h1><hr>
              <div class="form-group">
                <label><strong>User Name</strong></label>
                <input type="text" name="username" class="form-control" placeholder="Enter Name" required>
              </div>
              <div class="form-group">
                <label><strong>E-mail</strong></label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
              </div>
              <div class="form-group">
                <label><strong>Password</strong></label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
              </div>
              <div class="form-group">
                <label><strong>Photo</strong></label>
                <input type="file" name="profile_photo" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </form>
          </div>
        </div>
      </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

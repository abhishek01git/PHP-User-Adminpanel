<?php
session_start();
include 'connection.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $result = mysqli_query($conn, "SELECT * FROM `tb_login` WHERE email='$email'");
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $hash = password_verify($password, $row['password']);
        $count = mysqli_num_rows($result);

        if ($count == 1 && $hash && $row['type']=="admin") {
            $_SESSION['id'] = $row['id'];
                ?>
                <script>window.location.assign("index.php");</script>
                <?php
            } elseif ($count == 1 && $hash && $row['type']=="user") {
                echo " hi";
                $_SESSION['id']=$row['id'];
              ?>
              <script>window.location.assign("userindex.php");</script>

<?php
            }
            else {
                echo "Invalid email or password"; 
            }
           
        } 
    
    }

?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Login
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit"  name="submit" class="btn btn-primary btn-block">Login</button>
            <a href="forgotpass.php" class="float-end">forgot password</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

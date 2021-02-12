<?php
$showAlert = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'dbconn.php';
  $username =$_POST["username"];
  $Password =$_POST["Password"];
  $Email = $_POST["Email"];
  $exits = false;
  //check account exits 
  $chksql = "SELECT * FROM `info` WHERE email = '$Email'";
  $exsql = mysqli_query($conn,$chksql);
  $chkrow = mysqli_num_rows($exsql);
  if($chkrow > 0){

    $exits = true;
    
    $showerror = true;
    
  } else {
    //do nothing
     if(!$exits){
     $hash = password_hash($Password, PASSWORD_DEFAULT);
     $sql = "INSERT INTO `info` (`email`, `pass`, `des`) VALUES ('$Email', '$hash', '');";
     $reult = mysqli_query($conn,$sql);
     if($reult){
      $showAlert = true;
      header("location: login.php");
      }
    } 
    else {
     
     $showerror = true;
    }
 }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <?php
    require 'loginnavbar.php';
    ?>
    <?php
    if($showAlert){

      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';

    }
    if($showerror){
  
      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';

    }
    ?>
  </head>
  
  <body>
  <div class="container mt-5">
  <h1 class="text-center">Please Signup</h1>
  <!-- Signup form here -->
  <form action="/phpmyproject/loginsystem/signup.php" method="post">
  <div class="mb-3">
    <label for="Email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="Email" name="Email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>

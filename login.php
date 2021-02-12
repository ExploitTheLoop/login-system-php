<?php
$login = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'dbconn.php';
  $Email =$_POST['Email'];
  $Password =$_POST["Password"];
 
  
    $sql ="SELECT * FROM `info` where email='$Email'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($Email == "" && $Password == ""){
      $showerror = true;
      header("location: login.php");
    } else{
      if($num == 1){
        while($row = mysqli_fetch_assoc($result)){
        if(password_verify($Password,$row['pass'])){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['Email'] = $Email;
        header("location: welcome.php");
        }else{
          $showerror = true;

        }
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
     //echo "php here";
     require 'loginnavbar.php';
    ?>
    <?php
      if($login){

        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> you can login
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
  <h1 class="text-center">Please Login</h1>
  <!-- login form here -->
  <form action="/phpmyproject/loginsystem/login.php" method="post">
  <div class="mb-3">
    <label for="Email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" name="Email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
    <!--<h1>implementing navbar</h1> -->
    
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


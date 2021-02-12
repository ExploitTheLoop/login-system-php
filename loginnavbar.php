<?php
if(!isset($_SESSION['Email']) || $_SESSION['Email']!= true){
    
       $loggedin = true;  

} else {
     
        $loggedin = false;
 }
   echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/phpmyproject/loginsystem/welcome.php">BENKKSTUDIO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/phpmyproject/loginsystem/welcome.php">Home</a>
        </li>';

        if($loggedin == true){
       
          echo '<li class="nav-item">
          <a class="nav-link" href="/phpmyproject/loginsystem/signup.php">Signup</a>
          </li>'; 
      }

      if($loggedin == true){
       
        echo '<li class="nav-item">
        <a class="nav-link" href="/phpmyproject/loginsystem/login.php">Login</a>
        </li>'; 
    }
        if($loggedin == false){
        
          echo '<li class="nav-item">
          <a class="nav-link" href="/phpmyproject/loginsystem/logout.php">logout</a>
          </li>';

        }

      echo '</ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>';

?>



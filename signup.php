<?php 
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    include 'partial/dbconnect.php';
    $username =$_POST["username"];
    $password =$_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists=false;
    if(($password==$cpassword) && $exists==false){
        $sql="INSERT INTO `user` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert=true;
        }
    }
    else{
        $showError="Password dont match";
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    
    <title>Hello, world!</title>
    <link rel="stylesheet" href="signupStyle.css">
  </head>
  <body>
    <header>
    <h1><img src="img/durjatra_logo.png" alt="Durjatra logo" width="170" height="40"></h1>
</header>

     
    <?php


    if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';}
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '.$showError.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';}
    ?>

    <div class="container">
        <h1 class="text-center">
            Signup To Durjatra
        </h1>
    

        <form action="/Dur-jatra/signup.php" method="POST">
          <div class="form-group">
            <label for="username">User Name</label><br>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter User name"><br>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="form-group">
            <label for="password">Password</label><br>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
          </div>

          <div class="form-group">
            <label for="cpassword">Confirm Password</label><br>
            <input type="password" class="form-control" id="cpassword" placeholder="Password" name="cpassword">
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="signin.php">Sign in</a>
        </form>
    
</div>
    
   </body>
</html>
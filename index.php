<?php


$server = "localhost";
$username ="root";
$password ="";
$database="project";

$con = mysqli_connect($server, $username,$password,$database);

if(!$con){
    die("connection to the database failed due to".mysqli_connect_error());
}

$err= false;
$showError= false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$mobile=$_POST['mobile'];

if($password == $cpassword){
  $sql = "INSERT INTO `sign up` ( `Full Name`, `email`, `password`,`cpassword`, `Mobile No.`) VALUES ('$name', '$email', '$password','$cpassword', '$mobile');";

  $result= mysqli_query($con,$sql);
  if($result){
         $err = true;
  }
  
}
else{
  $showError= "Passwords do not match";
} 

}

?>


 
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
</head>
<style>
  body{
    background: url(bg.jpg);
    background-size: cover;
  }
  form{
      
      color: aliceblue;
       
      


background-color: #1112128a;
box-shadow: 10px 10px 10px 10px #847d7d;
border-radius: 8px ;

  }
</style>
<body>
  

<form class="form-row  w-50  m-5 p-4" method="POST" >
  <h3 style="color: #2a9bff;">Sign Up</h3>
  
  <?php
   if($err){
    echo " <p style='color: rgb(0, 245, 37);'>Thanks for submitting the form.</p>";
     }
     if($showError){
      echo " <p style='color:red;'>ERROR : Passwords do not match</p>";
       }
  
   ?>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="name"  name="name" required >
    </div>
    
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
      <div id="emailHelp" class="form-text" style="color: #2a9bff;">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" id="exampleInputPassword2" name="cpassword" required>
    </div>
    <div class="mb-3">
      <label for="exampleInputNumber" class="form-label">Mobile No.</label>
      <input type="number" class="form-control" id="exampleInputNumber" name="mobile" required>
      </div>
      
   
    <button type="submit" class="btn btn-primary" name="submit">Submit</button><br>
    Already Registered? <a href="login.php">Login</a>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>



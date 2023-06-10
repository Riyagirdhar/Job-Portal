<?php

$server = "localhost";
$username ="root";
$password ="";
$database = "project";

$conn = mysqli_connect($server, $username, $password, $database);


if(!$conn){
    die("connection to the database failed due to".mysqli_connect_error());
}
$login=false;
$showError=false;


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email= $_POST["email"];
    $password= $_POST["password"];
   
    $sql= "SELECT * FROM `sign up` where email='$email' AND password='$password'";


    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
      $login= true;
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['email']= $email;
      header("location: dashboard.php");
    }
    else{
        $showError="Invalid Credentials";
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
    <title>Login</title>
    <style>
        *{
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }
        body{
            background-color: #82979e6e;
        }
        .row{
            background-color: white;
            border-radius: 30px;
            
        }
        .img-fluid {
 
  height: 530px;
}
        img{
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
            margin-left: -13px;
        }
        .btn{
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color: black;
            color: white;
            font-weight: bold;
            border-radius: 4px;
            
        }
        .btn:hover{
            background-color: rgb(255, 255, 255);
            border: 1px solid;
            color: black;
        }
    </style>
</head>
<style>
 
 
</style>
<body>
    <div class="form my-4 mx-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <img src="img2.jpg" alt="" class="img-fluid" height="700px">
                </div>
                <div class="col-lg-7 px-5 pt-4">
                    <h1 class="font-weight-bold py-3">Login Here</h1>
                    <h3 >Sign into your account</h3>
                  <?php if($showError){
      echo " <p style='color:red;'>ERROR : Invalid Credentials</p>";
       }
       if($login){
        echo " <p style='color:green;'>sucesss</p>";
         }
                  ?>
   
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="email" class="form-control my-3 p-3" id="email"  name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password" class="form-control my-3 p-3" id="password"  name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                        <button class="btn mt-3 mb-5" type="submit" name="submit"  id="submit" >Login</button>
                       
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-7">
            New User?
            <p>Create Account<a href="index.php">Sign Up</a> </p>
            </div></div>
        </div>
                    </form>
                    
                    
                
            </div>
        </div>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
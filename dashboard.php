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

$company=$_POST['company'];
$position=$_POST['position'];
$job=$_POST['job'];
$skills=$_POST['skills'];
$CTC=$_POST['CTC'];

$sql="INSERT INTO `project`.`dashboard` ( `company`, `position`, `job`, `skills`, `CTC`) VALUES ( '$company', '$position', '$job', '$skills', '$CTC');";
 
$result = mysqli_query($con,$sql);
  

if($result){
       $err = true;
}


else{
$showError= "error";
} 
 
}



 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
  .p-4{
    background-color: #1112128a;
box-shadow: 10px 10px 10px 10px #847d7d;

  }
  body{
    background: url(bg2.jpg) no-repeat fixed;
    background-size: cover;
    

  }
    /* The side navigation menu */
.sidebar {
  margin: 0;
  margin-top: 60px;
  padding: 0;
  width: 200px;
  background-color: #000000;
  position: fixed;
  height: 100%;
  overflow: auto;
  
}
.navbar{
  position: fixed;
  background-color: #330003;
  overflow: hidden;
  top: 0px;
  width: 100%;
}

/* Sidebar links */
.sidebar a {
  background-color:  #1112128a;
  display: block;
  color: rgb(252, 250, 250);
  padding: 16px;
  text-decoration: none;
}

/* Active/current link */
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #ffffff;
  color: rgb(11, 11, 11);
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
    <div class="container-fluid">
      <a class="navbar-brand fs-3" href="#">Admin Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
    </div>
  </nav>
    <!-- The sidebar -->
<div class="sidebar">
    <a href="dashboard.php">Jobs</a>
    <a href="candidateForm.php">Candidates Applied</a>
    <a href="contact.php">Contact</a>
    <a href="about.php">About</a>
  </div>
  
  <!-- Page content -->
  <div class="content">
    <div class="container mt-4">
      <a class="btn btn-primary my-lg-5" data-bs-toggle="collapse" href="#collapseExample2">
        Post job
      </a> <br>
     
      <?php
   if($err){
    echo " <p style='color: rgb(0, 245, 37);'>Job Posted Sucessfully.</p>";
     }
     if($showError){
      echo " <p style='color:red;'>ERROR : Job not posted !</p>";
       }
  
   ?>
      
      <div class="collapse mt-4" id="collapseExample2">
        <div class="card card-body p-4">
       
          <!-- form  -->
          <main class="Form" >
            <div class="row">
                <div class="col">
            <form action="dashboard.php" method="POST">
                
                <div class="form-row">
                    <div class="col ">
                      Company Name
                <input type="text" id="company" name="company" class="form-control  my-2 p-2" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
         <div class="form-row">
          Position     
          <input type="text" id="position" name="position" 
                class="form-control  my-2 p-2" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
              Job Description
              <input type="text" id="job" name="job" class="form-control  my-2 p-2">
            </div>
        </div>
        <div class="form-row">
            <div class="col">
              Skills Required
               <input type="text" id="skills" name="skills"  class="form-control  my-2 p-2" required>
            </div>
    
        </div>
        <div class="form-row">
            <div class="col">
              CTC
                <input type="text" id="CTC" name="CTC" class="form-control my-2 p-2 mx-0" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <button type="submit" class="btn btn-primary btn-lg btn-block mt-2 mb-1" name="submit" id="submit">Submit</button>
            </div>
        </div>
   
            </form> 
        </main>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      
               
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th>Sr NO.</th>
            <th>Comapany Name</th>
            <th>Position</th>
            <th>CTC</th>
          </tr>
        </thead>
        
         <?php
         $sql="SELECT  `company`, `position`,`CTC` FROM `dashboard`";
         
         $result=mysqli_query($con,$sql);
        
         $i=0;
         if($result->num_rows>0){
          while
          ($rows=$result->fetch_assoc()){
           
            echo "<tbody>
            <tr>
            <td>". ++$i ."</td>
            <td>".$rows['company']."</td>
            <td>".$rows['position']."</td>
            <td>".$rows['CTC']."</td>
            </tr>
            </tbody>";
          }
         
        }
        else{
          echo "";
        }
        
         ?>
        
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>



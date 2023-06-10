<html>
    <head>
        <title>AppliedCandidates</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    </head>
    <style>
      .col-md-4 {

  border: 5px solid aliceblue;}
      
      .banner{

        margin: 0;
        padding:0;
      }
        .navbar{
  position: fixed;
  
  overflow: hidden;
  top: 0px;
  width: 100%;
 height: auto;
}


    </style>
    
    <?php
    $server = "localhost";
    $username ="root";
    $password ="";
    $database="project";
    
    $con = mysqli_connect($server, $username,$password,$database);
    
    if(!$con){
        die("connection to the database failed due to".mysqli_connect_error());
    }
    if(isset($_POST['submit'])){
      $name=$_POST['name'];
      
      $qualifications=$_POST['qualifications'];
      $apply=$_POST['apply'];
      $year=$_POST['year'];
    
    $sql="INSERT INTO `appliedcandidates` ( `name`, `qualifications`, `apply`, `year`) VALUES ( '$name', '$qualifications', '$apply', '$year');";
    mysqli_query($con,$sql);
  }
    ?>
    <body>
      <div class="container-fluid">

     
   
  <div class="banner">

  <div class="mt-4 p-5 bg-primary text-white rounded ">
  <h1 class="display-4">Job Portal</h1>
  <p class="lead">Best Jobs available matching your skills</p>
</div>
  </div>
  <div class="row">
  <?php

$server = "localhost";
$username ="root";
$password ="";
$database="project";

$con = mysqli_connect($server, $username,$password,$database);

if(!$con){
    die("connection to the database failed due to".mysqli_connect_error());
}
       
         $sql="SELECT  `company`, `position`,`job`,`skills`,`CTC` FROM `dashboard`";
         
         $result=mysqli_query($con,$sql);
        
         $i=0;
         if($result->num_rows>0){
          while
          ($rows=$result->fetch_assoc()){
           
            echo '<div class="col-md-4">
            <div class="jobs">
              <h3 style="text-align:center;">'.$rows['position'].'</h3>
              <h4 style="text-align:center;">'.$rows['company'].'</h4>
              <p style="color-black; text-align:justify; ">'.$rows['job'].'</p>
              <p style="color-black; "> <b>Skills Required:'.$rows['skills'].'</b></p>
              <p style="color-black; "> <b>CTC:'.$rows['CTC'].'</b></p>
              <a class="btn btn-primary my-lg-5" data-bs-toggle="modal" href="#Modal">
              Apply Now
            </a>
          
            </div>
          </div>';
          }
         
        }
        else{
          echo "";
        }
        
         ?>
        <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply For</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Applying For</label>
            <input type="text" class="form-control" id="apply" name="apply">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Qualifications</label>
            <input type="text" class="form-control" id="q" name="qualifications">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Year Pass Out</label>
            <input type="text" class="form-control" id="year" name="year">
      </div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Apply</button>
        </form>
      </div>
    </div>
  </div>
</div>
      </div>
         </div>
  </div>
 

</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<html>
    <head>
        <title>Candidate Form</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
       <style>
        body{
            background-image: url(ss.jpg);
            background-size: cover;
           
           
        
        }
       </style>
    <style>
        
       
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
        background-color: #333;
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
        background-color: #0b0c0c;
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
          <div class="content">
            <div class="container my-lg-5 p-3">
             
              
        
            <table class="table table-#1112128a table-striped my-lg-5 p-5">
                <thead>
                  <tr>
                    <th>Sr NO.</th>
                    <th>Candidate Name</th>
                    <th>Position</th>
                    <th>Year PassOut</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $server = "localhost";
                $username ="root";
                $password ="";
                $database="project";
                
                $con = mysqli_connect($server, $username,$password,$database);
                
                if(!$con){
                    die("connection to the database failed due to".mysqli_connect_error());
                }
         $sql="SELECT  `name`, `apply`,`year` FROM `appliedcandidates`";
         
         $result=mysqli_query($con,$sql);
        
         $i=0;
         if($result->num_rows>0){
          while
          ($rows=$result->fetch_assoc()){
           
            echo "<tbody>
            <tr>
            <td>". ++$i ."</td>
            <td>".$rows['name']."</td>
            <td>".$rows['apply']."</td>
            <td>".$rows['year']."</td>
            </tr>
            </tbody>";
          }
         
        }
        else{
          echo "";
        }
        
         ?>
                 

                  
                </tbody>
              </table>
          </div> </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
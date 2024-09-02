<style>
table,tr,td
{
    /* border: 1px solid black; */
    align-content: center;
    padding: 5% 3%;
    
}

.centre{
 margin-left: auto;
margin-right:auto; 
margin-bottom : 100 px;
background-color: blue;
}

</style>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>WildLife</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    
    <script src="https://kit.fontawesome.com/55d680926a.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>

<body>

  <section id="title">


    <!-- Nav Bar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Wildlove</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#footer">
        Contact
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.html">
        Admin Login
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#testimonials">
        Donation
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#pricing">
        Search
        </a>
      </li>
    </ul>
  </div>
  
</nav>

<div class="container-fluid">
    <!-- Title -->
  <div class="row">
    <div class="title-text col-lg-6">
      <h1>IT's NOT WHETHER ANIMALS WILL SURVIVE,IT's WHETHER MAN HAS WILL TO SAVE THEM</h1>
    </div>
  
    
    <div class="title col-lg-6">

        <div id="title-carousel" class="carousel slide" data-ride="carousel" data-interval="1000">
            <div class="carousel-inner">
              <div class="carousel-item active" >
      
                  <!-- <h2>I no longer have to sniff other dogs for love. I've found the hottest Corgi on TinDog. Woof.</h2> -->
                  <img class="title-image  w-1000" src="titl.jpg" alt="dog-profile">
                  <!-- <em>Pebbles, New York</em> -->
              </div>
      
              <div class="carousel-item" >
      
                <img class="title-image  w-1000" src="title2.jpg" alt="lady-profile">
              </div>
            </div>

      <!-- <img class="title-image" src="images/iphone6.png" alt="iphone-mockup"> -->
    </div> 
  </div>
</div>
  </section>
</body>
</html>


<?php 
$server = "localhost";

$username = "root";

$password = "";

$database ="Wildlife";

$insert = false;
 $con = mysqli_connect($server, $username, $password,$database);
     

 
    if (isset($_GET['fund'])) {
      
        $name = $_GET['name'];
        $state = $_GET['state'];
        $amount=$_GET['donation'];
        $mail=$_GET['Mail'];
        $contact=$_GET['Contact_no'];
    
        $sql = "INSERT INTO `Wildlife`.`funds` (`Name`, `State`, `Amount`, `Contact_no`, `Mail`) VALUES('$name','$state', '$amount','$contact','$mail');";
    
            if($con->query($sql) == true){
            echo "Successfully inserted";
           $insert = true;}
         
    }
    elseif (isset($_GET['submit1'])) {
       $animal_name = $_GET['search1'];
      $sql ="select distinct wildlife_info.wildlife_sanctuary ,national_park_info.`national park name`, state.S_name, species_info1.species_Name , status.status
      from wildlife_info inner join  state on wildlife_info.state_code= state.S_code 
      inner join national_park_info on  national_park_info.`state id` =state.S_code
      inner join  species_info1 on  wildlife_info.species_code=species_info1.species_code 
      inner join status on wildlife_info.species_code=status.ID
      where species_Name = '".$animal_name."' ; ";
       $result =$con->query($sql);
       
       if($result->num_rows > 0){
        echo "<table class='centre' >";
        echo"<tr bgcolor='green'>";
        echo"<th>National Park Name</th>";
        echo"<th>Wildlife Sanctuary Name</th>";
        echo"<th>State Name</th>";
        echo"<th>Species Name</th>";
        echo"<th>Status</th>";
     echo"</tr>";
     
           while($row = $result-> fetch_assoc()){
               echo "<tr><td>" . $row["national park name"] . "</td><td>" . $row["wildlife_sanctuary"].  "</td><td>"  . $row["S_name"] . "</td><td>". $row["species_Name"]."</td><td>". $row["status"]."</td></tr> <br>" ;
          
           }

       }
      
    }
     

    elseif (isset($_GET['submit2'])) {
        $wildlife_name = $_GET['search2'];
        $sql ="SELECT DISTINCT  wildlife_info.wildlife_sanctuary,national_park_info.`national park name`, state.S_Name, status.status
          FROM species_info1 ,(((national_park_info
          INNER JOIN wildlife_info ON national_park_info.`state id` = wildlife_info.state_code)
          INNER JOIN state ON national_park_info.`state id`  = state.S_Code)
          INNER JOIN status ON national_park_info.`sp_code` = status.ID)
           WHERE species_info1.Species_Name=  '".$wildlife_name."'
           ORDER BY state.S_Name ASC;";
         $result =$con->query($sql);
        //  echo"$wildlife_name";
         if($result->num_rows > 0){
          echo "<table class='centre'>";
          echo"<tr>";
          echo"<th>National Park Name</th>";
          echo"<th>Wildlife Sanctuary Name</th>";
          echo"<th>State Name</th>";
          echo"<th>Status</th>";
       echo"</tr>";
       
             while($row = $result-> fetch_assoc()){
                 echo "<tr><td>" . $row["national park name"] . "</td><td>" . $row["wildlife_sanctuary"].  "</td><td>"  . $row["S_Name"] . "</td><td>". $row["status"]."</td></tr> <br>" ;
            
             }
  
         }
    }
    elseif (isset($_GET['submit3'])) {
        $national_name = $_GET['search3'];
        $sql ="SELECT DISTINCT  wildlife_info.wildlife_sanctuary,national_park_info.`national park name`, state.S_Name, status.status
          FROM species_info1 ,(((national_park_info
          INNER JOIN wildlife_info ON national_park_info.`state id` = wildlife_info.state_code)
          INNER JOIN state ON national_park_info.`state id`  = state.S_Code)
          INNER JOIN status ON national_park_info.`sp_code` = status.ID)
           WHERE species_info1.Species_Name=  '".$national_name."'
           ORDER BY state.S_Name ASC;";
         $result =$con->query($sql);
         
         if($result->num_rows > 0){
          echo "<table class='centre'>";
          echo"<tr>";
          echo"<th>National Park Name</th>";
          echo"<th>Wildlife Sanctuary Name</th>";
          echo"<th>State Name</th>";
          echo"<th>Status</th>";
       echo"</tr>";
       
             while($row = $result-> fetch_assoc()){
                 echo "<tr><td>" . $row["national park name"] . "</td><td>" . $row["wildlife_sanctuary"].  "</td><td>"  . $row["S_Name"] . "</td><td>". $row["status"]."</td></tr> <br>" ;
            
             } 
    }
}
elseif(isset($_GET['login'])){
    $sql ="Select * from Funds";
   $result =$con->query($sql);
   
   if($result->num_rows > 0){
    echo "<table class='centre'>";
    echo"<tr>";
    echo"<th>Name</th>";
    echo"<th>State</th>";
    echo"<th>Donation</th>";
    echo"<th>E-Mail</th>";
    echo"<th>Contact</th>";
 echo"</tr>";

 $paisa=0;
 
       while($row = $result-> fetch_assoc()){
           echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["State"].  "</td><td>"  . $row["Amount"] . "</td><td>". $row["Mail"]."</td><td>". $row["Contact_no"]."</td></tr> <br>" ;
           $paisa+=$row['Amount'];
       } 

       echo"TOTOAL FUNDING COLLECTED = ";
       echo $paisa;
}

}
    else{
        echo "No";
        $con->close();
     }



     ?> 
   <!-- </table>' -->

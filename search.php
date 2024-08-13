<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>

    <link href="style.css" rel="stylesheet" type="text/css">

    <style>

 .ButtonSearch:hover{
       background-color: #c08d96;
 }

 .SearchDiv{
  margin-top: 20px;
  margin-bottom: 20px;
  height: auto;
  background-color: white;
  text-align:center ;

  display:grid;
    grid-auto-flow:column;
    grid-auto-columns:28%;
    overflow-x:auto;

 }
          img{
            height: 200px;
            width: 300px;
           
            margin-top: 20px;
        }
        .searhdivPost{
            background-color: #edb5bfa3;
            width: 400px;
            height: 660px;
            color: aliceblue;
            margin-top:40px;
            border:none;
            border-radius:30px;
            
           
        }
        table{
          margin-left:20px;
          margin-top:20px;
          border-color:white;
          border-radius:30px;
        }
        .logo{
    width: 150px;
    height: 90px;
    margin-top:2px;
 }
         

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAHs4mM5foYbIbkd2t_p_M4IvsvqHL-Bm8"></script>

<script>

var searchInput = 'search_input';

$(document).ready(function () {
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        types: ['geocode'],
    });
	
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
        document.getElementById('loc_lat').value = near_place.geometry.location.lat();
        document.getElementById('loc_long').value = near_place.geometry.location.lng();
		
        document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
        document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
    });
});

$(document).on('change', '#'+searchInput, function () {
    document.getElementById('latitude_input').value = '';
    document.getElementById('longitude_input').value = '';
	
    document.getElementById('latitude_view').innerHTML = '';
    document.getElementById('longitude_view').innerHTML = '';
});

</script>


</head>
<body>


  <div class="header">
  <video autoplay loop class="video" muted plays-inline >

       <source src="FullSizeRender.mp4" type="video/mp4">
      
        </video>
    
<nav>
    <img src="IMG_5874[3364].PNG" class="logo"> 
    

    <ul class="nav-link">
        <li>
            <a href="main.php"><ion-icon name="home-outline" style="margin: 5px 5px -1.5px  5px;"></ion-icon>Home</a>

        </li>
        <li>
            <a href="pass.html" ><ion-icon name="log-in-outline" style="margin: 5px 5px -1.5px  5px;"></ion-icon>LogIn</a>
            
            
        </li>
        <li>
            <a href="report.php"><ion-icon name="reader-outline" style="margin: 5px 5px -1.5px  5px;"></ion-icon>Report Pet</a>
            
        </li>
        <li>
            <a href="search.php"><ion-icon name="search-outline" style="margin: 5px 5px -1.5px  5px;"></ion-icon>Search for lost/found</a>
            
        </li>
    </ul>
</nav> 
</div>


  <div>
   
    <form class="modal-content" method="post" acction="" enctype="multipart/form-data">

    <div class="container">
        <br><br>

        <label style="font-size: large;"></label><b>Pet ID OR Name  : </b></label><input type="text" name="petIdORname" placeholder="Pet ID Or Name " > 

      
        <label>   Pet type : </label>   

        <select style="width: 250px; height: 30px;" name="petType">  

       <option value="---">---</option>  

        <option value="Dog">dog</option>  

        <option value="Cat">cat</option>  
        </select>     

      
        <label>   

  &nbsp  &nbsp  &nbsp  Pet status :  

</label> 

<select style="width: 250px; height: 30px;" name="petStatus">  

<option value="---">---</option>  

<option value="lost">Lost</option>  

<option value="found">Found</option>  
</select>   

<br> <br> 

        <!-- Autocomplete location search input --> 
<div class="form-group">
    <label>Location:</label>
    <input type="text" class="form-control" id="search_input" placeholder="Type address..." name="adress" />
    <input type="hidden" id="loc_lat" />
    <input type="hidden" id="loc_long" />
</div>


           
         <br><br>
           <input type="submit"  value = "Search" name ="search" class="ButtonSearch" style="font-size: 20px;"> 





           </div>
</form>

  <div class="SearchDiv">
           <?php

error_reporting(E_ERROR | E_PARSE);


$host= "localhost";
$dbusername="root";
$dbpassword="123456";
$dbname="test";


$conn= new mysqli($host , $dbusername ,$dbpassword ,$dbname ,3308);

$idORname=filter_input(INPUT_POST,'petIdORname');
$petType=filter_input(INPUT_POST,'petType');
$petStatus=filter_input(INPUT_POST,'petStatus');
$adress=filter_input(INPUT_POST,'adress');




if (isset($_POST['search']))
{
    $getid="SELECT * FROM `petsinfo` where petType= '$petType' || petId='$idORname' || petName ='$idORname' || petStat='$petStatus' || addres='$adress' ";
    $getid_run=mysqli_query($conn,$getid);


  

    while ( $row = mysqli_fetch_array( $getid_run))
    {
       $iimg=$row['image'];
         
        echo" 

        
        <div class='searhdivPost'><b><h1 style='color: #47648d;'>".$row['petName']."</h1></b><br><img src='$iimg'style='border-radius:15px;'>
       <br> <h2 style='background-color: #47648d; width: 200px; text-align: center; margin-left:100px;' >".$row['petStat']."</h2>
        <br><h2 style=' color : #99CED3 ;'> ID :  </h2><h3>".$row['petId']."</h3>
      <br><h2 style=' color : #99CED3 ;'>  Last Seen Area : </h2><h3><a href='https://www.google.com/maps/place/".$row['addres']."'>".$row['addres']."</a></h3>
    <br><br> <h2 style=' color : #99CED3 ;'>lost/found Since : </h2><br><h3>".$row['date']."</h3>
    <br><h2 style=' color : #99CED3 ;'> Owner Contact info : </h2><br><h3> Phone :<a href='tel:".$row['phone']."'>".$row['phone']."</a><br> Email :  <a href='mailto:".$row['email']."'>".$row['email']."</a></h3></div>";
    }
    
}



$conn->close();


?>


</div>

</div>











<!-- Div of footer -------------------------------->
<div class="footer-c">

    <h3>Pets Home</h3>
  
     <p class="main">
       Pets Home  is actively helping to search for your lost pets in your local area.
       <br>Report your lost/found pets here and send a free alert instantly.
     </p>
     
  
     <ul class="social">
  
        <li><a href="" class="fa fa-twitter" ><ion-icon name="logo-twitter"></ion-icon></a></li>
        <li><a href="" class="fa fa-google"><ion-icon name="logo-google"></ion-icon></a></li>
        <li><a href="" class="fa fa-youtube"><ion-icon name="logo-youtube"></ion-icon></a></li>
        <li><a href="" class="fa fa-instagram"><ion-icon name="logo-instagram"></ion-icon></a></li>
     </ul>
    
  
    </div>
  
    <!-- Div of copy right-------------------------------->
  
     <div class="copy">
    <p>
        Terms of our Service | Copyright   &copy;2023  Pets Home
        <br>
      
      </p>
      </div>
  
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



    
</body>
</html>
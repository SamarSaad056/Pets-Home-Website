<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Report</title>
    <link href="style.css" rel="stylesheet" type="text/css">

    <style>

 .ButtonSearch:hover{
       background-color: #c08d96;
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

      Pet image : <input type="file" name="file"> 

        <br><br>
        <label> Pet name </label>         

        <input type="text" name="petName" size="15"/> <br>  

        <label> Owner fullname: </label>     

        <input type="text" name="ownerName" size="15"/> <br>  

        <label>   Pet type : </label>   

        <select style="width: 250px; height: 30px;" name="petType">  

       <option value="---">---</option>  

        <option value="Dog">dog</option>  

        <option value="Cat">cat</option>  
        </select>   

        <label>   

                  &nbsp  &nbsp  &nbsp  &nbsp  Pet gender :  

        </label> 

        <select style="width: 250px; height: 30px;" name="petGender">  

         <option value="---">---</option>  

           <option value="male">Male</option>  

         <option value="female">Female</option>  
           </select>   

        

        <label>   

        &nbsp  &nbsp  &nbsp  Pet status :  

</label> 

<select style="width: 250px; height: 30px;" name="petStatus">  

<option value="---">---</option>  

<option value="lost">Lost</option>  

<option value="found">Found</option>  
</select>   
<br><br>


        Phone :  

        </label>  

        <input type="text" name="phone"  style="width: 250px; height: 30px;">   

         <br> <br>




        <!-- Autocomplete location search input --> 
<div class="form-group">
    <label>Location:</label>
    <input type="text" class="form-control" id="search_input" placeholder="Type address..." name="adress"/>
    <input type="hidden" id="loc_lat" />
    <input type="hidden" id="loc_long" />
</div>


      

        
       <br><br> Email:  

        <input type="email" id="email" name="email" style="width: 250px; height: 30px;"/> <br> <br>    

        <input type="submit" value="Submit" name ="submitSearch" class="ButtonSearch" style="font-size: 20px;"/>  

   
        





   <!-- --------------------------------------------------------------php code ----------------------------------------------------------->
   <?php

   error_reporting(E_ERROR | E_PARSE);
  

 $host= "localhost";
 $dbusername="root";
 $dbpassword="123456";
 $dbname="test";


$conn= new mysqli($host , $dbusername ,$dbpassword ,$dbname ,3308);


       
$petid=0;
$petName=filter_input(INPUT_POST,'petName');
$petStat=filter_input(INPUT_POST,'petStatus');
   $ownerName=filter_input(INPUT_POST,'ownerName');
   $petType=filter_input(INPUT_POST,'petType');
   $petGender=filter_input(INPUT_POST,'petGender');
   $phone=filter_input(INPUT_POST,'phone');
   $address=filter_input(INPUT_POST,'adress');
   $email=filter_input(INPUT_POST,'email');
   $date=date('d-m-y h:i:s');

        $img=$_FILES["file"];
        $imgFileName=$img["name"];
        $imgFileTempName=$img["temp_name"];

         $img_saparate=explode('.',$imgFileName);

         $img_extension=strtolower(end( $img_saparate));

         $extension=array('jpeg','jpg','png');
         if(in_array($img_extension,$extension))
         {
            $upload_image='images/'.$imgFileName;
            move_uploaded_file($imgFileTempName, $upload_image);
         }






if (isset($_POST['submitSearch']))
{
if (mysqli_connect_error())
{

die('Connect Error ('. mysqli_connect_errno() .') ' . 
mysqli_connect_error()); 

}
else 
{
 $sql = "INSERT INTO petsinfo values ('$petid','$petName' , '$petStat','$ownerName', ' $petType','$petGender','$phone','$address','$email','$upload_image','$date') ";

 

 if ($conn->query($sql))
 {
    
     echo " Report is posted sucessfully ! ";

 }
 else
 { echo "Error: ". $sql ." ". $conn->error; 
 }

}
}


$conn->close();


?>


</div>

</form>

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
<html>

<head>

<title>Pets Home</title>

<link href="style.css" rel="stylesheet" type="text/css">

<style>
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
            text-align:center ;
           
        }
        table{
          margin-left:20px;
          margin-top:20px;
          border-color:white;
          border-radius:30px;
        }
        .howWorksMain{
    
    height: auto;
    background-color: white;
    text-align:center;

    display:grid;
    grid-auto-flow:column;
    grid-auto-columns:28%;
    overflow-x:auto;
    

}
.SearchDiv{
  margin-top: 10px;
  height: auto;
  background-color: white;
  text-align:center ;

 }
 .logo{
    width: 150px;
    height: 90px;
    margin-top:2px;
   
 }

</style>

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




<div class="content">

    <h1>
        <strong> IS YOUR PET <span style="color:#EDB5BF;">LOST</span>?</strong>
    </h1>
   
    
        
	<br> <h2 class="a1"><ion-icon name="document-text-outline" style="margin: 5px 5px -1.5px  5px;" ></ion-icon> Create Free Listing</h2>
	<br> <h2 class="a2"><ion-icon name="paper-plane-outline" style="margin: 5px 5px -1.5px  5px;"></ion-icon>Send Free Alert Instantly</h2>
	<br> <h2 class="a3"><ion-icon name="add-circle-outline" style="margin: 5px 5px -1.5px  5px;"></ion-icon>Create Free Lost/Found Flyer</h2> 
	 <br> <h2 class="a4"><ion-icon name="people-outline" style="margin: 5px 5px -2px  10px;"></ion-icon>Reach More People In Your Local Area</h2>
     <br><br>
     <button type="submit" class="buttonMain" onclick=" window.location.href='report.php';" >Report Now !
       
     </button>

    

  <br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br>

  
</div>


<div class="howWorks">
    <br> Featured Posts </div>
  <div class="howWorksMain">


    <?php

    error_reporting(E_ERROR | E_PARSE);


$host= "localhost";
$dbusername="root";
$dbpassword="123456";
$dbname="test";


$conn= new mysqli($host , $dbusername ,$dbpassword ,$dbname ,3308);







$getid="SELECT * FROM `petsinfo` ";
$getid_run=mysqli_query($conn,$getid);




while ( $row = mysqli_fetch_array( $getid_run))
{
 $iimg=$row['image'];

   
  echo" 
  <div class='searhdivPost'><b><h1 style='color: #47648d;'>".$row['petName']."</h1></b><br><img src='$iimg' style='border-radius:15px;'>
 <br> <h2 style='background-color: #47648d; width: 200px; text-align: center; margin-left:100px; border-radius: 15px;' >".$row['petStat']."</h2>
  <br><h2 style=' color : #99CED3 ;'> ID :  </h2><h3>".$row['petId']."</h3>
<br><h2 style=' color : #99CED3 ;'>  Last Seen Area : </h2><h3> <a href='https://www.google.com/maps/place/".$row['addres']."'>".$row['addres']."</a></h3>
<br><h2 style=' color : #99CED3 ;'>lost/found Since : </h2><br><h3>".$row['date']."</h3>
<br><h2 style=' color : #99CED3 ;'> Owner Contact info : </h2><br><h3> Phone : <a href='tel:".$row['phone']."'>".$row['phone']."</a><br> Email: <a href='mailto:".$row['email']."'>".$row['email']."</a></h3></div>
";
}





$conn->close();


?>

   



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
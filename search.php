<?php session_start(); 
 require_once('Includes/dbconnect.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ju & Filmat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="style/styles.css" media="all" type="text/css">
    <link rel="icon" href="icon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <script type="text/javascript">
        var image1 = new Image()
        image1.src="./image/MI_slide.jpg" 

        var image2 = new Image()
        image2.src="./image/JW_slide.jpg"

        var image3 = new Image()
        image3.src="./image/HT_slide.jpg"

     </script>

</head>
<body>



	<img class="header_img" src="./image/MI_slide.jpg" name="slide" width="100%">
    <script type="text/javascript">
        var step = 1
        function slideit(){
            document.images.slide.src=eval("image"+step+".src")
        if(step<3)
        step++

        else
        step=1

        setTimeout("slideit()",4000)
        }
        slideit()
        
    </script>
		
		<?php include 'header2.php';
?>


<?php
if(isset($_POST['submit-search'])) {
    $search = mysqli_real_escape_string($connection,$_POST['search']);

    $sql= "SELECT * FROM filmat WHERE titulli LIKE '%$search%' OR aktoret LIKE '%$search%' ";
    $result = mysqli_query($connection,$sql);
    $queryResult = mysqli_num_rows($result);
   


    if ($queryResult> 0) {
         while($row=mysqli_fetch_assoc($result)){

            echo "<br/> Gjenden ".$queryResult." rezultat(e) perputhur me kekimin tuaj!"; 

            echo " <div class='col d-flex align-items-stretch'>
            <div class='card card-block card-body'>
                  
                <img src=image/" .$row['foto']."  alt='MoviePicture' style='width:100%; height:300px  '>
                <div class='cardContainer'>
                  <h5><b>" .$row['titulli']. "</b></h5> <br>
                  
                  <button class='btn btn-primary'>Porosit & Paguaj dorazi</button>
                  
                </div>
                </a>
                <p class='pershkrimi'>Pershkrimi: "  .$row['pershkrimi']. "</p>
                <p class='cmimi'>Cmimi: "  .$row['cmimi']. "leke</p>
                <p class='aktoret'>Aktoret Kryesore: "  .$row['aktoret']. "</p>
                <p class='kohezgjatja'>Kohezgjatja: "  .$row['kohezgjatja']. "minuta</p>
            </div>
        </div>";

         }
    } else {
        echo "<br/> Asnje rezultat nuk perputhet me kerkimin tuaj!";
    }
}
?>
	
	<?php
	include 'footer.php'
	?>	

		

</body>

</html>
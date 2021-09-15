<?php session_start(); ?>
<?php require_once('Includes/dbconnect.php'); ?>

<?php


	$query = "SELECT * FROM filmat 
	ORDER BY RAND()
	LIMIT 3";

	$movies = mysqli_query($connection, $query);

	$num_rows = mysqli_num_rows($movies);



 ?>

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



		<div class="container-fluid text-center ">
	    <div class="row flex-row ">
	   

	    	<?php while ($movie = mysqli_fetch_assoc($movies)) {
	    	
	    	?>
	       <div class="col d-flex align-items-stretch">
	            <div class="card card-block card-body">
	            	 <?php echo "<a class= 'custom-card' href = \"bookings.php?Id_film={$movie['ID_film']}\">"; ?>
	            	<img src=image/<?php echo $movie['foto']; ?> alt="MoviePicture" style="width:100%; height:300px  ">
	                <div class="cardContainer">
					  <h5><b><?php echo $movie['titulli']; ?></b></h5> <br>
					  
					  
					  
	                </div>
					</a>
					<p class="pershkrimi">Pershkrimi: <?php echo $movie['pershkrimi']; ?></p>
	            </div>
	        </div>
	        	    <?php } ?>
	        
	        

	      
	    </div>
</div>

		
	<?php
	include 'footer.php'
	?>	

		

</body>

</html>
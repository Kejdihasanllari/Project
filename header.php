<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style/styles.css" media="all" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="icon" href="icon.ico">

	<style type="text/css">
		
		body{
			background-color:black;
			color:#555;
			font-family:Arial, Helevetica, sans-serif;
			font-size:16px;
			margin-bottom: 120px;
			
		}

		.header-img{
			margin-top: 0;
			padding: 0;
		}

		
		.footer {
			
			background-color:#071229;
        	color: white;
        	margin-bottom: 0px;
        	font-size: 12px;
        	text-align: center;
        	padding-top: 5px;
        	padding-bottom: 5px;
        	
        }
		
		.navbar_override{
			background-color:#071229;
			color: white;
		}

		
       

        .btn-primary{
        	margin-left: 20px;
        }

	</style>
</head>
<body>

	<header>
		
			<nav class="navbar navbar-expand-sm navbar_override">
			  <a class="navbar-brand" href="index.php">
    			<img src="./Image/logo.png" width="120" height="30" alt="">
  			  </a>
			    <ul class="navbar-nav">
			      <li class="nav-item active">
			        <a class="nav-link text-light" href="index.php">Kryefaqja <span class="sr-only">(current)</span></a>
			      </li>
			    
				  <li class="nav-item">
			        <a class="nav-link text-light" href="bookings.php">Porosisni</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-light" href="rrethnesh.php">Rreth Nesh</a>
			      </li>
			      			     
			    </ul>

				<ul class="navbar-nav ml-auto">
			   
			   <?php if( isset($_SESSION['ID_klient']) && !empty($_SESSION['emri'] ) )
				   {
			   ?>

			   <li class="nav-item ">Mireserdhe <?php echo $_SESSION['emri']; ?>  </li>

			 <li class="nav-item ">
				 <a href="logout.php"><button class="btn btn-primary">Dil</button></a>
			 </li></ul>
			 
			  <?php }else{ ?>

				  <li class="nav-item ">Mireserdhe! </li>

			 <li class="nav-item ">
				 <a href="login.php"><button class="btn btn-primary">Hyr</button></a>
			 </li></ul>

			 <?php } ?>
			  
			</nav>
		</header>

</body>
</html>
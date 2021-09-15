<?php session_start(); ?>
<?php require_once('Includes/dbconnect.php'); ?>
<?php 
	if (!isset($_SESSION['ID_klient'])) {
		header('Location: index.php?Duhet_te_regjistroheni_ose_te_hyni ');
	}

	if (isset($_GET['ID_film'])) {

		

		$movie_id = mysqli_real_escape_string($connection, $_GET['ID_film']);
		$query = "SELECT * FROM filmat WHERE ID_film = {$movie_id} LIMIT 1";

		$result_set = mysqli_query($connection, $query);
	

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
			
				$result = mysqli_fetch_assoc($result_set);
				$movie_Name = $result['titulli'];
				
			} else{
				//error
			}
		} else{
			
		}

	 


	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ju & Filmat</title>
	<link rel="stylesheet" href="style/styles.css" media="all" type="text/css">
	<link rel="icon" href="icon.ico">
	<style type="text/css">

.card-header2{
		background-color:#255C99;
		text-align: center;
		color: white;
	}

	.login_cardoverride{
		margin-top: 30px;
	}

	.errmsg{
		color: red;
		text-align: left;
		font-size: 12px;
	}
label{
	color: black;
}
	
	 
</style>
</head>
<body class="adminBody">

	<?php include 'header.php';?>

	<div class="container-fluid row">

	  	
			<div class="col" style="margin-left: 10px;">
			  	<div class="card login_cardoverride">
				  <div class="card-header card-header2" style="background-color:#255C99;">Porosi</div>
				  <div class="card-body card-body2">
				  	
				  	<div class="text-center">
				  		

				  		<br>

				  		<?php 

				  			if (!empty($errors)) {
				  				echo '<div class = "errmsg">';
				  				echo '<b>There were error(s) on your form,</b><br>';
				  				foreach ($errors as $key => $error) {
				  					echo $error . '<br>';

				  				}
				  				echo '</div>';
				  			}

				  		?>
				  		
				  		<form  action="" method="GET" enctype="multipart/form-data">

		  						         <div class="form-group">
                                                   
                                                    <input type="hidden" name="ID_film" class="form-control" id="ID_film" aria-describedby="emailHelp" value= '<?php echo $movie_id; ?>'  >
                                                    <p id="e_error" style="color: red; font-size: small;"></p>
                                        </div>               
	                          
	                                    <div class="form-group">
                                                    <label class="porosia" for="email">Titulli i filmit</label>
                                                    <input type="readonly" name="titulli" class="form-control" id="titulli" aria-describedby="emailHelp" value= '<?php echo $movie_Name; ?>'  >
                                                    <p id="e_error" style="color: red; font-size: small;"></p>
                                        </div>

                                        <div class="form-group">
                                                    <label class="porosia" >Data/Ora</label>
                                                    <input type="readonly" name="date" class="form-control" id="date" aria-describedby="emailHelp"  >
                                                    <p id="e_error" style="color: red; font-size: small;"></p>
                                        </div>

	                                        
	                          
	                            
	                              <input type="submit" id="submit" name="submit" value="Perfundo" class="btn btn-primary">
                                         

                                </form>
				  	</div>

				  	
				  </div> 
				  <div class="card-footer card-header2" style="background-color:#255C99;"></div>
				</div>
			</div>

			

		</div>

			


	<?php include 'footer.php';?>

</body>
</html>
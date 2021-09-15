<?php session_start(); 
 require_once('Includes/dbconnect.php');


	$errors = array();

if (isset($_POST['submit'])) {


	if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
		$errors[] = 'Email i pasakte';
	}

	if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
		$errors[] = 'Password i pasakte';
	}


if (empty($errors)) {
	

	$email = mysqli_real_escape_string($connection, $_POST['email']) ;
	$password = mysqli_real_escape_string($connection, $_POST['password']) ;

	


	$query = "SELECT * FROM perdoruesit 
				WHERE email = '{$email}' AND password = '{$password}'";

	$result_set = mysqli_query($connection, $query);	
	
	if($result_set){
		
		if (mysqli_num_rows($result_set) == 1) {

			$user = mysqli_fetch_assoc($result_set);
			

			$_SESSION['ID_klient'] = $user['ID_klient'];
			$_SESSION['emri'] = $user['emri'];
			
			
			header('Location: index.php?login_successful');
		}else{
			$errors[] = 'Email / password i pasakte';
			
		}

	}else{
		$errors[] = 'Database query failed';
	}		
	
}}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ju & Filmat | Hyr</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

		.cardheader_override{
			background-color:#071229;
			text-align: center;
			color: white;
		}

		.login_cardoverride{
			margin-top: 30px;
		}

		.error{
			color: red;
			padding: 10px;
		}

		

	</style>

</head>
<body>
<?php include 'header3.php';
?>

		<div class="row">

	  		<div class="col"></div>

	  		<div class="col">
			  	<div class="card login_cardoverride">
				  <div class="card-header cardheader_override">Hyr</div>
				  <div class="card-body">
				  	
				  	<div class="text-center">
				  		<img class="card-img-top mx-auto" style="width:50%;" src="./image/login.png" alt="Login Icon" >

				  		<form  action="login.php" method="POST">
				  						<?php
				  							if (isset($errors) && !empty($errors)) {
				  								
				  								echo '<p class = "error">Email/Password i pasakte</p>';	
				  							}
				  						 ?>
				  						
                                                                                
                                        <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Vendos email" >
                                                    <p id="e_error" style="color: red; font-size: small;"></p>
                                        </div>
                                

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
                                            <p id="p_error" style="color: red; font-size: small;"></p>
                                         </div>


                                         <input type="submit" id="submit" name="submit" value="Hyr" class="btn btn-primary"></input>
                                         <span><a href="register.php"><i>&nbsp;&nbsp;&nbsp;</i>Regjistrohu</a></span>

                                </form>
				  	</div>


				  </div>
				  <div class="card-footer cardheader_override"></div>
				</div>
			</div>

			<div class="col"></div>
	  
		</div>

	<?php
	include 'footer.php'
	?>	

	
</body>
</html>

<?php mysqli_close($connection); ?>
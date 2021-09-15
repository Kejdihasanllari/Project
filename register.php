<?php require_once('Includes/dbconnect.php');



	$errors = array();

	if (isset($_POST['submit'])) {
		
		if (empty(trim($_POST['emri']))) {
			$errors[] = 'Duhet emri';
		}
	
		if (empty(trim($_POST['mbiemri']))) {
			$errors[] = 'Duhet mbiemri';
		}
		
		if (empty(trim($_POST['adresa']))) {
			$errors[] = 'Duhet adresa';
		}
		if (empty(trim($_POST['email']))) {
			$errors[] = 'Duhet email-i';
		}
		if (empty(trim($_POST['password']))) {
			$errors[] = 'Duhet password-i';
		}
		if (empty(trim($_POST['password2']))) {
			$errors[] = 'Konfirmo password duhet plotesuar';
		}
		if (trim($_POST['password2']) != trim($_POST['password'])) {
			$errors[] = 'Passwords do not match';
		}

		

	$max_len_fields = array('email' => 200, 'password' => 200, 'password2' => 200 );

	foreach ($max_len_fields as $field => $max_len) {
		if (strlen(trim($_POST[$field])) > $max_len) {
			
			$errors[] = $field . 'must be less than ' . $max_len . ' characters';

		}
	}

	

	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$query  = "SELECT * FROM perdoruesit WHERE email = '{$email}' LIMIT 1";

	$result_set = mysqli_query($connection, $query);

	if ($result_set) {
		if (mysqli_num_rows($result_set) == 1) {
			$errors[] = 'Email-i ekziston';
		}
	}

	if (empty($errors)) {
		
		$emri = mysqli_real_escape_string($connection, $_POST['emri']);
		$mbiemri = mysqli_real_escape_string($connection, $_POST['mbiemri']);
		$adresa = mysqli_real_escape_string($connection, $_POST['adresa']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$password = mysqli_real_escape_string($connection, $_POST['password2']);



		$query = "INSERT INTO perdoruesit ( emri, mbiemri, adresa, email, password ) VALUES ('{$emri}', '{$mbiemri}', '{$adresa}' ,'{$email}', '{$password}')";


		$result = mysqli_query($connection, $query);

		if ($result) {
			header('Location: login.php?registration_successful');
		}
		else{
			$errors[] = 'Failed to add record';
		}
	}

	}

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ju & Filmat | Regjistrohu</title>

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

		.errmsg{
			color: red;
			text-align: left;
			font-size: 12px;
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
				  <div class="card-header cardheader_override">Regjistrohu</div>
				  <div class="card-body">
				  	
				  	<div class="text-center">
				  		<img class="card-img-top mx-auto" style="width:50%;" src="./image/login.png" alt="Login Icon" >

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

				  		<form  action="register.php" method="POST">
                                                                                
                                        <div class="form-group">
                                                    <label for="emri">Emri</label>
                                                    <input type="text" name="emri" class="form-control" id="emri" aria-describedby="emriHelp" placeholder=" Emri" >
                                                    <p id="e_error" style="color: red; font-size: small;"></p>
										</div>
										
										<div class="form-group">
                                                    <label for="mbiemri">Mbiemri</label>
                                                    <input type="text" name="mbiemri" class="form-control" id="mbiemri" aria-describedby="mbiemriHelp" placeholder="Mbiemri" >
                                                    <p id="e_error" style="color: red; font-size: small;"></p>
										</div>
										
										<div class="form-group">
                                                    <label for="adresa">Adresa</label>
                                                    <input type="text" name="adresa" class="form-control" id="adresa" aria-describedby="adresaHelp" placeholder="Adresa" >
                                                    <p id="e_error" style="color: red; font-size: small;"></p>
										</div>
										
										<div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Vendos email" >
                                                    <p id="e_error" style="color: red; font-size: small;"></p>
                                        </div>
                                

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
                                            <p id="p_error" style="color: red; font-size: small;"></p>
                                         </div>

                                         <div class="form-group">
                                            <label for="password">Konfiromo Password-in</label>
                                            <input type="password" name="password2" class="form-control" id="password" placeholder="Password" >
                                            <p id="p_error" style="color: red; font-size: small;"></p>
                                         </div>


                                         <input type="submit" id="submit" name="submit" value="Regjistrohu" class="btn btn-primary"></input>
                                         <span><a href="login.php"><i>&nbsp;&nbsp;&nbsp;</i>Hyr</a></span>

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


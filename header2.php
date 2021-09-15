<?php require_once('Includes/dbconnect.php'); ?>
<?php

if (isset($_GET['ID'])) {	
$idKategori=$_GET['ID'];
   
	$query = "SELECT * FROM filmat WHERE ID_kategori='$idKategori'";

	$movies = mysqli_query($connection, $query);

	$num_rows = mysqli_num_rows($movies);

}

 ?>

<body>

    <header>
		
			<nav class="navbar navbar-expand-sm navbar_override">
			  <a class="navbar-brand" href="index.php">
    			<img src="./image/logo.png" width="120" height="30" alt="">
  			  </a>
			    <ul class="navbar-nav">
			      <li class="nav-item active">
			        <a class="nav-link text-light" href="index.php">Kryefaqja <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        
					<li class="dropdown">
                      <a href="javascript:void(0)" class="dropbtn">Kategorite</a>
                        <div class="dropdown-content">
   
					 <form action="filmat.php" method="GET">
					 <a href="filmat.php?ID=1">Aksion</a>
					 <a href="filmat.php?ID=2">Komedi</a>
					 <a href="filmat.php?ID=3">Drame</a>
					 <a href="filmat.php?ID=4">Horrorr</a>
					 <a href="filmat.php?ID=5">Premiere</a>
					 
					 </form>
                        </div>
                    
				     </li> 
				  <li class="nav-item">
			        <a class="nav-link text-light" href="bookings.php">Porosisni</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-light" href="rrethnesh.php">Rreth Nesh</a>
			      </li>
				  <li class="nav-item">
			        <form action="search.php" method="POST">
					<input class = "kerko" type="text" name="search" placeholder="Kerko">
					<button class="fa fa-search button btn btn-primary" type="submit" name="submit-search"></button>
					</form>
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
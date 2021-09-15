<?php session_start(); ?>


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
        <p class="pg">Njeriu sot jeton ne nje bote "te rremujshme" . Shpeshhere ndodh te biem ne "grackat" e shoqerise :  ndonjehere je i zene deri ne fyt me pune, ndonjehere te kaplon stresi, ndonjhere vetmia , e keshtu me rradhe mund te vazhdohej per nje kohe te gjate. Po e nis me kete paranteze jo me kot , por per t'ju ftuar ju, vizitoreve te faqes, ne ate mjedis qe une kam dashur te krijoj kur mendova fillimisht krijimin e kesaj faqeje. 
    </br>
        Si nje adhurues e vleresues  filmash, e di sesa e rendesishme eshte sot te gjesh nje vend ku mund te kesh filmin tend te preferuar ne duart e tua ne vetem pak caste , gati per ta shijuar.
            Keshtu pikerisht ka lindur dhe ideja e krijimit te kesaj faqeje webi. Kam dashur te krijoj nje faqe ku mund t'ju krijohen lehtesira ne gjetjen e filmit te duhur adhuruesve te filmave dhe jo vetem.
            </br>  Kjo faqe i ngjason nje kolazhi , gati per tu eksploruar nga te gjithe . Permban filma te te gjitha kategorive dhe te gjitha koherave. Nje menu lehtesisht e perdorshme nga te gjithe dhe sigurisht tejet e pasur me informacion.
            Pa u zgjatur me shume , shpresoj te gjeni ketu aktivitetin tuaj te preferuar per te kaluar nje kohe te mire.</p>
</div>

		
	<?php
	include 'footer.php'
	?>	

		

</body>

</html>
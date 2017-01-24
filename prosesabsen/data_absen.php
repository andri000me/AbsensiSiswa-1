<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../asset/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../asset/css/style.css">
</head>
<body>
	
	
	<?php
	
	include "../asset/data_absen.php";
	
	?>
	
	<script src="../asset/js/jquery-1.9.1.min.js"></script>
	<script src="../asset/js/materialize.min.js"></script>
	<script>
		$(document).ready(function(){
			 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
			
    $('select').material_select();
		$("#pesan").click(function(){
        $(".isipesan").slideToggle("slow");
		$(".isisettings").slideUp("slow");
    });
            
		});
	</script>
</body>
</html>
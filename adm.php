<html>
	<head><title>Admin</title><link rel="stylesheet" href="style.css"></head>
	<body>
		<?php include_once("headera.php"); session_start(); unset($_SESSION["ADMIN"]); ?>
		<center style=margin-top:200px>
			<h1>Entrez le mot de passe administrateur</h1>
			<form method=POST>
				<input type=password name=admpass style="border-radius:50px; padding:5px">
				<input type=submit name=activer style="border-radius:50px; background-color:0026FF; padding:5px">
			</form>
			<?php
			 if($_POST['activer']){
				 if($_POST['admpass'] == "123"){
					 $_SESSION["ADMIN"]="OK";
					 header("refresh:1;admin.php");
				 }else{
					 echo "Entrez le mot de passe administrateur";
				 }
			 }
			?>
		</center>
	</body>
</html>

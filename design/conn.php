<?php
	include("con.php");
	$log="SELECT * FROM Client WHERE TEL=".$_POST['tel'];
	$result = $conn->query($log);
	$user = $result->fetch_assoc();
	if($user){
		if($_POST['mp']==$user['MP'] && $_POST['tel']==$user['TEL']){
			session_start();
			$_SESSION["ID"] = $user['IDC'];
			header("location:market.php");
		}else{
			echo "<h1>Numero de téléphone ou mot de passe incorrect</h1>";
			header("refresh:2,location:connexion.php");
		}
	}
	
?>

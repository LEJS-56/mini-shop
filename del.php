<?php
include("con.php");
$d=$_POST['del'];
$da=$_POST['dela'];
$ca=$_POST['cachat'];
$date=date('Y-m-d');

//~ $date->format();
if (isset($_POST['del'])){
	$sql = "DELETE FROM `produit` WHERE `produit`.`ID` = ".$d." ";
	if ($conn->query($sql) === TRUE) {
	  echo "<script>alert('SUPPRESSION EFFECTUÉ AVEC SUCCÈS')</script>";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	header('refresh:0');
	exit();
}
if (isset($_POST['cachat'])){
	$sql = "UPDATE `vente` SET `DATEL` = '".$date."' WHERE `vente`.`IDV` = ".$ca;
	if ($conn->query($sql) === TRUE) {
	  echo "<script>alert('ACHAT VALIDÉ AVEC SUCCÈS')</script>";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	header('refresh:0');
	exit();
}

// Fonction inutile daut l'effacer mais j'ai la flemme
function fuck(){
	echo "<script>alert('".$_POST['del']."')</script>";
}
//~ if (isset($_POST['mod'])){
	//~ $fm=fopen("mm.txt","w") or die("Impossible de créer le fichier");
	//~ fwrite($fm,$_POST['mod']);
	//~ header("location:mod.php");
	//~ header('refresh:1');
	//~ exit();
//~ }

if (isset($_POST['livr'])){
	$sql="UPDATE `Client` SET `Livreur` = '0' WHERE `Client`.`IDC` = ".$_POST['livr'];
	if ($conn->query($sql) === TRUE) {
	  echo "MODIFICATION EFFECTUÉ AVEC SUCCÈS";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	header('refresh:0');
	exit();
}

if (isset($_POST['cli'])){
	$sql="UPDATE `Client` SET `Livreur` = '1' WHERE `Client`.`IDC` = ".$_POST['cli'];
	if ($conn->query($sql) === TRUE) {
	  echo "MODIFICATION EFFECTUÉ AVEC SUCCÈS";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	header('refresh:0');
	exit();
}
?>
    </body>
</html>



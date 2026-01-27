<?php
$date=date('Y-m-d');
include("include.php");
if (isset($_POST['liva'])){
	$sql="UPDATE `livraison` SET `datefin` = '0000-00-00',idlivr=".$_POST['lid']." WHERE `livraison`.`idliv` = ".$_POST['liva'];
    if ($conn->query($sql) === TRUE) {
	  echo "AFFILIATION EFFECTUÉ AVEC SUCCÈS";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	// echo "<cript>alert('".$sql."')</script>";
	// if ($user['Livreur']==1){
	// 	header("refresh:0;liv.php");		
	// }else{
	// 	header("refresh:0;panier.php");
	// }
	include_once("charge.html");
	 echo "<script>setTimeout(()=>{
 history.back();
},1500);
</script>";
}
if (isset($_POST['livd'])){
	$sql="UPDATE `livraison` SET `datefin` = NULL ,idlivr=NULL WHERE `livraison`.`idliv` = ".$_POST['livd'];
    if ($conn->query($sql) === TRUE) {
	  echo "AFFILIATION ANNULÉE AVEC SUCCÈS";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
  }
	$conn->close();
	// echo "<cript>alert('".$sql."')</script>";
    // if ($user['Livreur']==1){
	// 	header("refresh:0;liv.php");		
	// }else{
	// 	header("refresh:0;panier.php");
	// }
	include_once("charge.html");
	 echo "<script>setTimeout(()=>{
 history.back();
},1500);
</script>";
}
if(isset($_POST['convers'])){
    ?>
<html>
	<head><title>Mesage</title></head>
	<body>
		
		<table align=center style="display:flex; justify-content:center; max-height:50vh; overflow:auto">
			<?php
			if ($_SESSION['ID']){
				$sql="SELECT * FROM msg WHERE IDC=".$_SESSION["ID"]." AND recep=".$_POST['convers']." OR IDC=".$_POST['convers']." AND recep=".$_SESSION["ID"];
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if($row['recep']!=$_POST['convers']){
							echo "<tr style='text-align:right;'><td><p style='border:solid 2px #E77D7D; padding:10px; border-radius:30px 30px 0 30px;'>Client: <br>".$row['Cont']."</p><br></td></tr>";
						}else{
							echo "<tr style='text-align:left;'><td><p style='border:solid 2px skyblue; padding:10px; border-radius:30px 30px 30px 0;'>(Vous): <br>".$row['Cont']."</p><br></td></tr>";
					}
					}
				}else{
					echo "<center><h1>Aucun Méssage pour le moment</h1></center>";
				}		
			}else{
				echo "<center><b><h1 style='color:red; display:flex; justify-content:center;'>Veuillez vous connecter</h1></b></center><style>textarea{display:none;}</style>";
			}
			?>
		</table>
		<form method=POST action=envo.php style="position:absolute;bottom:0;width:100%">
		<?php echo "<input type=hidden name=recep value=".$_POST['convers'].">"; ?>	
        <textarea placeholder="Votre message" required style="width:100%;min-height:100px;text-align:center" name=msg></textarea><br><?php if($_SESSION['ID']){?><input type=submit name=envoi value=envoyer style="border-radius:99px;width:100%;height:30px;background-color:#0026FF;color:white;"><?php }else{ ?><b><a href=connexion.php style="border-radius:99px;width:100%;height:30px;background-color:#0026FF;color:white;text-align:center;justify-content:center;align-items:center;">Connectez-vous</a></b><?php }?>
		</form>
	</body>
</html>
<?php
}
if (isset($_POST['dela'])){
	$Nqte=$_POST['prodqte']+1;
	$sql3 = "DELETE FROM `livraison` WHERE `livraison`.`idliv` = ".$_POST['liid']." ";
	$sql2="UPDATE `produit` SET `QTE` = '".$Nqte."' WHERE `produit`.`ID` = ".$_POST['prodid'];

	if ($conn->query($sql2) === TRUE) {
	  echo "<script>alert('SUPPRESSION EFFECTUÉ AVEC SUCCÈS')</script>";
	} else {
	  echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
	if ($conn->query($sql3) === TRUE) {
	  echo "<script>alert('SUPPRESSION EFFECTUÉ AVEC SUCCÈS')</script>";
	} else {
	  echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
	$conn->close();
	include_once("charge.html");
	 echo "<script>setTimeout(()=>{
 history.back();
},1500);
</script>";
	exit();
}
if(isset($_POST['efc'])){
$sql="UPDATE `livraison` SET `datefin` = '".$date."' WHERE `livraison`.`idliv` = ".$_POST['efc'];
echo $sql2;
    if ($conn->query($sql) === TRUE) {
	  echo "AFFILIATION EFFECTUÉ AVEC SUCCÈS";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	include_once("charge.html");
	// echo "<cript>alert('".$sql."')</script>";
     echo "<script>setTimeout(()=>{
 history.back();
},1500);
</script>";
}
if(isset($_POST['fac'])){
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Facture</title>
	</head>
	<body>
		<link rel="stylesheet" href="tables.css">
		<table align=center style="display:flex; justify-content:center; text-align:center;">
			<tr><td></td><td></td><td>Facture N⁰ <span style=color:red><?php echo $_POST['liid']; ?></span></td></tr>
			<tr><td colspan=3>MONSIEUR <?php echo $user['NOMC']." ".$user['PRENOM']; ?></td></tr>
			<tr class=tab><td style="padding:10px 56px 10px 56px;">Designation</td><td style="padding:10px 56px 10px 56px;">Prix</td><td style="padding:10px 56px 10px 56px;">date</td></tr>
			<tr class=table-body><td style="padding:10px 56px 10px 56px;"><?php echo $_POST['prodna']; ?></td><td></td><td></td></tr>
			<tr class=table-body><td style="padding:10px 56px 10px 56px;">Modèle <?php echo $_POST['prodmod']; ?></td><td></td><td></td></tr>
			<tr class=table-body><td style="padding:10px 56px 10px 56px;">Couleur <?php echo $_POST['prodcol']; ?></td><td><?php echo $_POST['prix']; ?> XAF</td><td><?php echo $_POST['date']; ?></td></tr>
			<tr class=table-body><td style="padding:10px 56px 10px 56px;">Composant inclus <?php echo $_POST['prodna']; ?></td><td></td><td></td></tr>
			<tr class=table-body><td style="padding:10px 56px 10px 56px;">Garantie <?php echo $_POST['garan']; ?> (semaine)</td><td></td><td></td></tr>
			<tr class=table-body><td colspan=3 >Les Composants supplémentaire ne sont pas couverts par la garantie <br> et nous ne sommes responsable d'aucun dommage <br> causé par le client sur l'Équipenment</td></tr>
			<tr class=table-body style=color:gray><td style="background-color:skyblue;padding:20px 56px 20px 56px;">Signature (client)</td><td colspan=2>Signature (Vendeur)</td></tr>
		</table>
	</body>
	</html>

<?php
}
?>

<?php
if(isset($_GET['mod'])){
	?>
	<html>
	<head>
		<title>Modification de produit: Section de L'administration</title>
		<meta charset="utf-8">
		<style>
			input[type=text], input[type=number],input[type=submit]{
				width: 100%;
				text-align:center;
			}
			input[type=submit]{
				width: 100%;
				height:5vh;
				border-radius: 30px;
				background-color: #0026ff;
				color: white;
			}
			table{
				display: flex;
				justify-content: center;
			}
			textarea{
				width: 100%;
			}
		</style>
	</head>
	<body>
		<?php require_once "includea.php";?>
		
		<form method=POST action=m.php enctype="multipart/form-data">
			<div class=formd>
				<center><h1>Modification du produit</h1></center>
				<table align=center>
					<?php
					//~ include("m.php"); 
						$sql = "SELECT * FROM produit WHERE ID='".$_GET['mod']."'";
						$result = $conn->query($sql);
						$val = $result->fetch_assoc();
						echo "<input type=hidden value='".$val['IMG']."' name=imageo><input type=hidden value='".$_GET['mod']."' name=ide>
					<tr><td>Nom du produit</td><td><input type=text value='".$val['NOM']."' name=np required></td></tr>
					<tr><td>Prix du produit</td><td><input type=number value='".$val['PRIX']."' name=pp required></td></tr>
					<tr><td>Marque du produit</td><td><input type=text value='".$val['MARQ']."' name=mp required></td></tr>
					<tr><td>Quantité en stock</td><td><input type=number value='".$val['QTE']."' name=qte required></td></tr>
					<tr><td>image d'affiche</td><td><input type=file file='".$val['IMG']."' name=img></td></tr>
					<tr><td>Modèle</td><td><input type=text value='".$val['Modele']."' name=mod required></td></tr>
					<tr><td>Poid</td><td><input type=text value='".$val['Poid']."' placeholder='En gramme' name=poid required></td></tr>
					<tr><td>Couleur(s)</td><td><input type=text value='".$val['Couleur']."' placeholder='Couleurs disponibles' name=colo required></td></tr>
					<tr><td>Baterie(s)</td><td><input type=text value='".$val['Batteries']."' placeholder='Spécificité de(s) batteries ou laisser vide si aucune' name=bat></td></tr>
					<tr><td>Fabricant</td><td><input type=text value='".$val['Fabriquant']."' placeholder='Fabricant d'origine' name=fabri></td></tr>
					<tr><td>Garantie</td><td><input type=text value='".$val['Garantie']."' placeholder='Durrée en semaines' name=garan required></td></tr>
					<tr><td>Connectivité</td><td><input type=text value='".$val['Connectivite']."' placeholder='4G, 3G ...' name=connec required></td></tr>
					<tr><td>Réseau</td><td><input type=text placeholder='Wifi précisement' value='".$val['Technologie_connect']."' name=res required></td></tr>
					<tr><td>Nombre d'utilisateurs</td><td><input type=text value='".$val['NbUser']."' placeholder='Nombre maximal d'utilisateurs simultanées' name=nbu required></td></tr>
					<tr><td>Bande passante</td><td><input type=text value='".$val['Dispositif_compa']."' placeholder='Veuiller Préciser l'unité' name=compa></td></tr>
					".//On vera ça un jours
					// <tr><td>Usage recommandé</td><td><input type=checkbox name=usage>Gaming  <input type=checkbox name=usage>Streaming Lourd (4K)  <input type=checkbox name=usage>Réseaux sociaux  <input type=checkbox name=usage>IPTV  <br><input type=checkbox name=usage>Petits ménages  <input type=checkbox name=usage>Home Bureaux  <input type=checkbox name=usage>Grands ménages  <input type=checkbox name=usage>Large ménage</td></tr>
					"<tr><td>Démarquements</td><td><input value='".$val['Demarquement']."' type=text placeholder='Ce qui fait la force du produit' name=demarq></td></tr>
					<tr><td>Caractéristiques requises</td><td><input value='".$val['Caracteristiques_requises']."' type=text placeholder='spécifications particulière' name=req></td></tr>
					<tr><td>Composants inclus</td><td><input type='text' value='".$val['Composant_inclus']."' placeholder='Liste des composants supplémentaire obtunues à lachat du produit' name=compo></td></tr>
					<tr><td>Connectiques</td><td><input type=text value='".$val['Conectiques']."' placeholder='Liste de connectiqes du produit' name=connecti></td></tr>
					<tr><td>Réparabilité</td><td><input type=text value='".$val['reparabilite']."' placeholder='niveau de réparabilité entre 0 et 9' name=repa required></td></tr>
					<tr><td>Description</td><td><textarea placeholder='Description des fonctionnalités du produit' name=desc required>'".$val['Description']."' </textarea></td></tr>";?>
					<tr><td colspan=2><input type="submit" name=ok></td></tr>	
				</table>
			</div>
		</form>
        <div class="spacerb" style="height:10vh;"></div>
    </body>
</html>
<?php
}
if (isset($_GET['del'])){
	$d=$_GET['del'];
	require_once "includea.php";
	$sql = "DELETE FROM `produit` WHERE `produit`.`ID` = ".$d;
	if ($conn->query($sql) === TRUE) {
	  echo "<script>alert('SUPPRESSION EFFECTUÉ AVEC SUCCÈS')</script>";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	include_once("charge.html");
	header("refresh:0;admin.php");
	/* echo "<script>setTimeout(()=>{
 history.back();
},1500);
</script>";*/
} 
?>

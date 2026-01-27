<html>
	<head>
		<title>Marketplace: Section ACHAT</title>
		<style type="text/css">
			td{
				padding:10px;
			}
		</style>
		<script>
			function sen(){
				a=fo.ntel.value
				if(a.length!=9 || isNaN(a)){
					alert("Veuillez remplir un numéro de télephone valide de 9 caractères")
					return false
				}else{
					return true
				}
			}
		</script>
		<meta charset="utf-8">
	</head>
	<body>
		<?php require "include.php";?>
		<form method=POST name=fo action=buy.php style="border:solid 10px skyblue; border-radius:90px;">
			<div class=liste style=display:inline-block><br><br>
				<center>
					<?php
						$sql = "SELECT * FROM produit WHERE ID=".$_GET["vp"];
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<input type=hidden name=AQTE value='".$row['QTE']."'>
								<div class=elem style=display:inline-table><img class=vu src='prod/".$row["IMG"]."' style='height:50%; border-radius:20px;'><h2>".$row["NOM"]."</h2><h1 style=color:blue;><b><span>".$row["PRIX"]." FCFA</span></b></div><div class=elem style=display:inline-block><table border=2 style='border-collapse:collapse; padding:10px'>
									<tr><td colspan=2 style=text-align:center><b>Spécifications</b></td></tr>
									<tr><td>Marque</td><td>".$row['MARQ']."</td></tr>
									<tr><td>Modèle</td><td>".$row['Modele']."</td></tr>
									<tr><td>Poid</td><td>".$row['Poid']." Grammes</td></tr>
									<tr><td>Couleur(s)</td><td>".$row['Couleur']."</td></tr>
									<tr><td>Baterie(s)</td><td>".$row['Batteries']."</td></tr>
									<tr><td>Fabriquant</td><td>".$row['Fabriquant']."</td></tr>
									<tr><td>Garantie</td><td>".$row['Garantie']." Semaines</td></tr>
									<tr><td>Connectivité</td><td>".$row['Connectivite']."</td></tr>
									<tr><td>Date de mise en ligne</td><td>".$row['Date_dispo']."</td></tr>
									<tr><td>Technologie de connection</td><td>".$row['Technologie_connect']."</td></tr>
									<tr><td>Nombre maximum d'utilisateurs</td><td>".$row['NbUser']." utilisateurs simultanées</td></tr>
									<tr><td>Bande passante</td><td>".$row['Dispositif_compa']."</td></tr>
									<tr><td>Démarquement</td><td>".$row['Demarquement']."</td></tr>
									<tr><td>Caractéristiques requises</td><td>".$row['Caracteristiques_requises']."</td></tr>
									<tr><td>Composant(s) inclus</td><td>".$row['Composant_inclus']."</td></tr>
									<tr><td>Conectiques</td><td>".$row['Conectiques']."</td></tr>
									<tr><td>réparabilité</td><td>".$row['reparabilite']."</td></tr>									
								</table></div><div class=elem style=display:inline-block><br><br></h1><h1><u>Description:</u></h1><span style=font-size:15px>".$row["Description"]."</span></div><br><br><div class=elem style=display:inline-block><h1>À propos de ce produit</h1><span class=propos style=font-size:15px>".$row['Apropos']."</span></div><br><br><u style=text-align:center><h3>Entrez Votre numéro de télephone Avant L'achat ou la commande :</h3></u><br><br><input type=number value=".$user['TEL']." name=ntel style=text-align:center; required><br>";
							//~ <tr><td>Usage recommandé</td><td>".$row['Usages_recommandes']."</td></tr>
							if ($_SESSION['ID']){
								if ($row['QTE']<1){
									echo "<center><b><h1 style='color:red;'>Ce produit n'est pas disponible en stock</h1></b></center><br>";
								}else{
									echo "<br><br><textarea name=lieuliv style='width:100%;text-align:center' placeholder='Veuillez décrire le Lieux de livraison avec exactitude' required></textarea><br><br>
									<button type=submit name=vp value=".$row["ID"]." style='padding:8px 20px; background-color:#0026FF; border-radius:99px; color:#fff;'>Commander</button>";
								}
							}else{
						echo "<center><b><h1 style='color:red;'>Veuillez vous connecter</h1></b></center>";
					}
						}
						}else{
							echo "Aucune information disponible sur le produit";
						}
					?>
					<br><br>
				</center>
			</div>
		</form>
    </body>
</html>

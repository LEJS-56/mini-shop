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
	<body style="padding-bottom: 0;">
		<?php require "include.php";?>
		<form method=POST name=fo action=buy.php><b>
			<div class=liste style=display:inline-block><br><br>
				<center>
					<?php
						$sql = "SELECT * FROM produit WHERE ID=".$_GET["vp"];
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<input type=hidden name=AQTE value='".$row['QTE']."'>
									<table><tr><td rowspan=2><div class='elem image-cover' ><img class=vu src='prod/".$row["IMG"]."' style='height: 60vh;border-radius: 20px;margin-right: 10vh;'><h2>".$row["NOM"]."</h2><h1><b><span>".$row["PRIX"]." FCFA</span></b></div></td><td class=hidea><div class=elem style='border-radius: 1.7rem;'><br><br></h1><h1><u>Description:</u></h1><span style=font-size:15px>".$row["Description"]."</span></div><br><br></td>";
                                // Mec cherche pas trop à comprendre ce j'ai fait ici
                                echo "</tr><tr><td class=hidea>";
                                     if ($_SESSION['ID']){
								if ($row['QTE']<1){
									echo "<center><b><h1 style='color:red;'>Ce produit n'est pas disponible en stock</h1></b></center><br>";
								}else{
									echo "<br><br><input type=text name=lieuliv placeholder='Veuillez décrire le lieux de livraison avec exactitude' style='text-align:center;width:100%; height:50px'><br><br>
									<button type=submit class=button name=vp value=".$row["ID"]." style='border:solid 2px #0a1428;padding:8px 20px; background-color:#0026FF; border-radius:99px; color:#fff;width: 100%;'>Commander</button>";
								}
							}else{
						echo "<b><h1 style='color:red;'>Veuillez vous <a href=connexion.php style=text-decoration:underline> Connecter</a></h1></b>";
							}
                                echo "</td></tr><tr><td colspan=2 class=hide>";
                                if ($_SESSION['ID']){
								if ($row['QTE']<1){
									echo "<center><b><h1 style='color:red;'>Ce produit n'est pas disponible en stock</h1></b></center><br>";
								}else{
									echo "<br><br><input type=text name=lieuliv placeholder='Veuillez décrire le lieux de livraison avec exactitude' style='text-align:center;width:100%; height:50px'><br><br>
									<button type=submit class=button name=vp value=".$row["ID"]." style='border:solid 2px #0a1428;padding:8px 20px; background-color:#0026FF; border-radius:99px; color:#fff;margin-top:3vh'>Commander</button>";
								}
							}else{
						echo "<b><h1 style='color:red;'>Veuillez vous <a href=connexion.php style=text-decoration:underline> Connecter</a></h1></b>";
							}
                                
                                    echo "</td></tr><tr><td colspan=2 class=hide><div class=elem ><br><br></h1><h1><u>Description:</u></h1><span style=font-size:15px>".$row["Description"]."</span></div><br><br></td></tr></table><div class=elem ><table border=2 style='border-collapse:collapse; padding:10px'>
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
								</table></div>
                                    <div class=elem><h1>À propos de ce produit</h1><span class=propos style=font-size:15px>".$row['Apropos']."</span></div><br><br><u style='text-align:center;display:none'><h3>Entrez Votre numéro de télephone Avant L'achat ou la commande :</h3></u><br><br><input type=hidden value=".$user['TEL']." name=ntel style=text-align:center; required><br>";
							//~ <tr><td>Usage recommandé</td><td>".$row['Usages_recommandes']."</td></tr>
							
						}
						}else{
							echo "Aucune information disponible sur le produit";
						}
					?>
					<br><br>
				</center>
			</div>
            </b></form>
    </body>
</html>

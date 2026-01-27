<html>
	<head><title></title></head>
	<body>
		<link rel="stylesheet" href="tables.css">
		<form method=POST action=conver.php>
			<table align=center style="display:flex; justify-content:center; text-align:center;">
				<tr><td colspan=6 style='font-size:30px; text-decoration:underline;'><b>Liste des achats éffectués:</b></td></tr>
				<tr class=tab><td style="padding:10px 56px 10px 56px;">Acheteur</td><td style="padding:0px 56px 0px 56px;">Produit</td><td style="padding:0px 56px 0px 56px;">Prix</td><td style="padding:0px 56px 0px 56px;">Date de commande</td><td style="padding:0px 56px 0px 56px;">Date de reception</td><td style="padding:0px 56px 0px 56px;">Facture</td></tr>
				<?php include("include.php"); ?>
				<?php
					if ($_SESSION['ID']){
						$sql = "SELECT * FROM livraison WHERE idclt=".$_SESSION["ID"];
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						 while($row = $result->fetch_assoc()) {
							$sql2 = "SELECT * FROM produit WHERE ID=".$row["idprod"];
							$result2 = $conn->query($sql2);
							if ($result2->num_rows > 0) {
								while($row2 = $result2->fetch_assoc()) {
									echo"<input type=hidden value='".$row['idprod']."' name=prodid><input type=hidden name=liid value='".$row['idliv']."'> <input type=hidden name=livrai value='".$row['idliv']."'>
									<input type=hidden name=prodna value='".$row2['NOM']."'><input type=hidden name=prodcol value='".$row2['Couleur']."'><input type=hidden name=prodmod value='".$row2['Modele']."'><input type=hidden name=prodincl value='".$row2['Composant_inclus']."'>
									<input type=hidden name=prix value='".$row2['PRIX']."'><input type=hidden name=date value='".$row['datedeb']."'><input type=hidden name=garan value='".$row2['Garantie']."'>
										<tr class=table-body><td>".$user['NOMC']."</td><td>".$row2['NOM']."</td><td><b>".$row2['PRIX']." FCFA</b></td><td>".$row['datedeb']."</td>";
										if ($row['datefin']==NULL)
										{
											echo "<td style='color:red'>Achat non éffectué</td>";
										}else{
											if($row['datefin']=="0000-00-00"){
												echo "<td style='color:gray'>Livraison en cours</td>";
											}else{
												echo "<td>".$row['DATEL']."</td>";
											}
										}
										if ($row['datefin']==NULL)
										{
											echo "<td><button value=".$row['idliv']." name=dela style='block; border:none; background:none; cursor:pointer; color:skyblue;'>Annuler l'achat</button></td></tr>";
										}else{
											if($row['datefin']=="0000-00-00"){
												echo "<td><button name=convers style=margin:0 value=".$row['idliv'].">Conversation</button> <br> <button name=efc value='".$row['idliv']."'>commande effectuée</button</td></tr>";
												echo "<script>alert('votre Livraison est en cours, veuillez rester au lieux de rencontre prévu à cet effet')</script>";
												break;
											}else{
												echo "<td><button name=fac style='block; border:none; background:none; cursor:pointer; color:skyblue;'>Générer</button></td></tr>";
											}
										}
									}
								}
							}
						}else{
							echo"<tr><td colspan=6>Aucun achat éffectué</td></tr>";
						}
					}else{
						echo "<tr><td colspan=6><center><b><h1 style='color:red;'>Veuillez vous connecter</h1></b></center></td></tr>";
					}
					
				?>
			</table>
		</form>
		
	</body>
</html>

<html>
	<head><title></title></head>
	<body>
		<form method=POST action=fac.php>
			<table border=2 align=center style="margin-top:20px; display:flex; justify-content:center; text-align:center; border-collapse:collapse; border:solid 3px skyblue;">
				<tr><td colspan=6 style='font-size:30px; text-decoration:underline;'><b>Liste des commandes:</b></td></tr>
				<tr><td style="padding:10px 56px 10px 56px;">Acheteur</td><td style="padding:0px 56px 0px 56px;">Produit</td><td style="padding:0px 56px 0px 56px;">Prix</td><td style="padding:0px 56px 0px 56px;">Date de commande</td><td style="padding:0px 56px 0px 56px;">Date de reception</td><td style="padding:0px 56px 0px 56px;">Facture</td></tr>
				<?php include("includea.php"); ?>
				<?php
					include("del.php");
					$sql = "SELECT * FROM livraison, Client, produit WHERE livraison.idclt=Client.IDC AND livraison.idclt=produit.ID;";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					 while($row = $result->fetch_assoc()) {
						echo"<tr><td>".$row['NOMC']."</td><td>".$row['NOM']."</td><td><b>".$row['PRIX']." FCFA</b></td><td>".$row['datedeb']."</td>";
							if ($row['datefin']=="0000-00-00"){
								echo "<td style='color:red'><button value=".$row['idliv']." name=cachat style='block; border:none; background:none; cursor:pointer; color:skyblue;'>Confirmer l'achat</button></td>";
							}else{
								echo "<td>".$row['datefin']."</td>";
							}
							if ($row['datefin']=="0000-00-00"){
								echo "<td>Achat non éffectué</td></tr>";
							}else{
								echo "<td><button name=factg style='block; border:none; background:none; cursor:pointer; color:skyblue;'>Générer</button></td></tr>";
						}
					}						
				}else{
						echo"<tr><td colspan=6>Aucun achat éffectué</td></tr>";
					}
				?>
			</table>
		</form>
		
	</body>
</html>


<html>
	<head>
		<title>Marketplace</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php require "include.php";?>
		<section class=produits>
			<div class=tete>
				<h1>Explorez nos produits et faites des achats</h1>
				<p>La liste complète de nos produits sont conposées de produits de meilleur qualité au meilleur pris et avec un service de livraison impécable</p>
				<p>Vous pouvez également consulter votre <a href="panier.php">Historique d'achats</a></p>
			</div>
			<form method=GET action=achats.php>
				<div class=liste>
					<?php
						 	$sql = "SELECT * FROM produit";
						 	$result = $conn->query($sql);
						 	if ($result->num_rows > 0) {
						 	 while($row = $result->fetch_assoc()) {
						 	  echo "
						 	  <div class=produit>
						 	  <img class=vu src='prod/".$row["IMG"]."'>
						 	  <h4>".$row["NOM"]."</h4><span>".$row["PRIX"]." FCFA</span>
						 	  <p>".$row["QTE"]." EN STOCK</p>
						 	  <button name=vp value=".$row["ID"].">voir plus</button>
						 	  </div>";
						 	  }
						 }else {
						 	echo "AUCUN PRODUIT DISPONIBLE";
						 }
						 $conn->close();
					?>
					</div>
			</form>
		</section>
		
	</body>
</html>

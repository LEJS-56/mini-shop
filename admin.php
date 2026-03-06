<html>
	<head>
		<title>section Administration</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php require "includea.php";?>
		<section class=produits>
			<div class=tete>
				<h1>Partie administrateur</h1>
				<p>Vous êtes admistrateur et toute action s'offre à vous<br><a href="ajouter.php"> Ajouter un produit</a>  <a href=sup.php>  Supprimer un produit</a> <!-- Suprimmer n'est plus utile mais je laisse juste pour le fun --> 
<!--
				<a href=com.php>  Liste des commandes</a>
-->
				</p>
			</div>
			<form method=GET action=mod.php>
				<div class=liste>
					<?php
						 	$sql = "SELECT * FROM produit";
						 	$result = $conn->query($sql);
						 	if ($result->num_rows > 0) {
						 	 while($row = $result->fetch_assoc()) {
						 	  echo "
						 	  <div class=produit>
						 	  <img class=vu src='prod/".$row["IMG"]."' >
						 	  <h4>".$row["NOM"]."</h4><span>".$row["PRIX"]." FCFA</span>
						 	  <p>".$row["QTE"]." EN STOCK</p>
						 	  <button value=".$row["ID"]." name=mod>modifier</button><button style='block; border:none; background:none; cursor:pointer; color:red;' name=del value=".$row["ID"].">supprimer</button>
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
		<div class="spacerb" style="height:160vh;"></div>
	</body>
</html>

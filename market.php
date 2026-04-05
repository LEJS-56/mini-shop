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
			</div>
			<form method=GET action=ac.php>
				<div class=liste>
					<?php
						 	$sql = "SELECT * FROM produit";
						 	$result = $conn->query($sql);
						 	if ($result->num_rows > 0) {
						 	 while($row = $result->fetch_assoc()) {
								// Azy j'ai trop la flemme de commenter le code du coup seul le index.php qui est la première page que j'ai fait qui aura un semblant de commentaire.
								// Bonne chance frère
						 	  echo "
						 	  <div class=produit>
						 	  <img class=vu src='prod/".$row["IMG"]."'>
						 	  <h4>".$row["NOM"]."</h4><span>".$row["PRIX"]." FCFA</span>";
                                 if ($row["QTE"] == 0){
                                     echo "<p style=color:red> Stock épuisé </p>";
                                 }else{
                                     echo "<p>".$row["QTE"]." EN STOCK</p>";
                                 }
						 	  echo "<button name=vp style='min-width:100%;min-height:10vh;margin-top: 3vh;' value=".$row["ID"].">voir plus</button>
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
		<?php include "space.php"; ?>
	</body>
</html>

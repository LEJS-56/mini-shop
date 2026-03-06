<html>
	<head>
		<title>Ajout de produit: section de l'Administration</title>
		<meta charset="utf-8">
		<style type="text/css">
			input[type="text"],input[type="number"]{
				width: 100%;
				text-align: center;
			}
			input[type="submit"]{
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
		</style>
	</head>
	<body>
		<?php require "includea.php";?>
		<center><h1>Ajouter un produit</h1></center>
		<form method=POST action="add.php" enctype="multipart/form-data">
			<div class=formd>
				<table align=center>
					<tr><td>Nom du produit*</td><td><input type="text" name=np required></td></tr>
					<tr><td>Prix du produit*</td><td><input type="number" name=pp required></td></tr>
					<tr><td>Marque du produit*</td><td><input type="text" name=mp required></td></tr>
					<tr><td>Quantité en stock*</td><td><input type="number" name=qte required></td></tr>
					<tr><td>image d'affiche*</td><td><input type="file" name=img required></td></tr>
					<tr><td>Modèle*</td><td><input type="text" name=mod required></td></tr>
					<tr><td>Poid*</td><td><input type="text" placeholder="En gramme" name=poid required></td></tr>
					<tr><td>Couleur(s)*</td><td><input type="text" placeholder="Couleurs disponibles" name=colo required></td></tr>
					<tr><td>Baterie(s)</td><td><input type="text" placeholder="Spécificité de(s) batteries ou laisser vide si aucune" name=bat></td></tr>
					<tr><td>Fabricant</td><td><input type="text" placeholder="Fabricant d'origine" name=fabri></td></tr>
					<tr><td>Garantie*</td><td><input type="text" placeholder="Durrée en semaines" name=garan required></td></tr>
					<tr><td>Connectivité*</td><td><input type="text" placeholder="4G, 3G ..." name=connec required></td></tr>
					<tr><td>Réseau*</td><td><input type="text" placeholder="Wifi précisement" name=res required></td></tr>
					<tr><td>Nombre d'utilisateurs*</td><td><input type="text" placeholder="Nombre maximal d'utilisateurs simultanées" name=nbu required></td></tr>
					<tr><td>Bande passante</td><td><input type="text" placeholder="Veuiller Préciser l'unité" name=compa></td></tr>
					<!-- 
					On en reparlera peut être un jour
					<tr><td>Usage recommandé</td><td><input type="checkbox" name=usage>Gaming  <input type="checkbox" name=usage>Streaming Lourd (4K)  <input type="checkbox" name=usage>Réseaux sociaux  <input type="checkbox" name=usage>IPTV  <br><input type="checkbox" name=usage>Petits ménages  <input type="checkbox" name=usage>Home Bureaux  <input type="checkbox" name=usage>Grands ménages  <input type="checkbox" name=usage>Large ménage</td></tr> 
					 -->
					<tr><td>Démarquements</td><td><input type="text" placeholder="Ce qui fait la force du produit" name=demarq></td></tr>
					<tr><td>Caractéristiques requises</td><td><input type="text" placeholder="spécifications particulière" name=req></td></tr>
					<tr><td>Composants inclus</td><td><input type="text" placeholder="Liste des composants supplémentaire obtunues à l'achat du produit" name=compo></td></tr>
					<tr><td>Connectiques</td><td><input type="text" placeholder="Liste de connectiqes du produit" name=connecti></td></tr>
					<tr><td>Réparabilité*</td><td><input type="text" placeholder="niveau de réparabilité entre 0 et 9" name=repa required></td></tr>
					<tr><td>Description*</td><td><input type="text" placeholder="Description des fonctionnalités du produit" name=desc required></td></tr>
<!--
					Devra être généré automatiquement comme la date<tr><td>À propos du produit</td><td><input type="text" placeholder="Ce qu'il y a à savoir sur ce produit" name=pp required></td></tr>
-->
					<tr><td colspan=2><input type="submit" name=ok></td></tr>
				</table>
			</div>
		</form>
    </body>
</html>
 

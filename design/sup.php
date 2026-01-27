<html>
	<head><title>Suppression de produits</title></head>
	<body>
		<form method=POST>
			<table border=2 align=center style="margin-top:20px; display:flex; justify-content:center; text-align:center; border-collapse:collapse; border:solid 3px skyblue;">
				<tr><td>numero</td><td>nom du produit</td><td>prix du produit</td><td>Type</td><td>action</td></tr>
				<?php
					include("del.php");
					include("includea.php");
					$sql = "SELECT * FROM produit";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					 while($row = $result->fetch_assoc()) {
					  echo "<tr><td>".$row["ID"]."</td><td>".$row["NOM"]."</td><td>".$row["PRIX"]."</td><td>".$row["STOCK"]."</td><td><button style='block; border:none; background:none; cursor:pointer; color:red;' name=del value=".$row["ID"].">supprimer</button></td></tr>";
					  }
					}else {
						echo "<tr><td colspan=4>AUCUN PRODUIT DISPONIBLE</td></tr>";
					}
					$conn->close();
				?>
			</table>
		</form>
		
	</body>
</html>

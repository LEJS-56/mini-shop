<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client ou livreur</title>
</head>
<body>
    <?php include("includea.php"); ?>
    <form method=POST>
			<table border=2 align=center style="margin-top:20px; display:flex; justify-content:center; text-align:center; border-collapse:collapse; border:solid 3px skyblue;">
				<tr><td style=padding:20px>numero</td><td style=padding:20px>NOM</td><td style=padding:20px>PRENOM</td><td style=padding:20px>Numero Téléphone</td><td style=padding:20px>Titre</td></tr>
				<?php
					include("del.php");
					$sql = "SELECT * FROM Client WHERE IDC > 0";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					 while($row = $result->fetch_assoc()) {
					  echo "<tr><td>".$row["IDC"]."</td><td>".$row["NOMC"]."</td><td>".$row["PRENOM"]."</td><td>".$row["TEL"]."</td>";
                      if ($row['Livreur']==0){
                        echo "<td><button style='block; border:none; background:none; cursor:pointer; color:red;' name=cli value=".$row["IDC"].">Client</button></td></tr>";
                      }else{
                        echo "<td><button style='block; border:none; background:none; cursor:pointer; color:red;' name=livr value=".$row["IDC"].">Livreur</button></td></tr>";
                      }
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

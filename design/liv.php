<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraisons</title>
</head>
<body>
    <?php include("include.php"); ?>
    <form method=POST action=conver.php>
			<table border=2 align=center style="margin-top:20px; display:flex; justify-content:center; text-align:center; border-collapse:collapse; border:solid 3px skyblue;">
				<tr><td style=padding:20px>numero</td><td style=padding:20px>Date de commande</td><td style=padding:20px>Date de reception</td><td style=padding:20px>Nom du client</td><td style=padding:20px>Numero de Telephone</td><td style=padding:20px>Lieux de rencontre</td><td style=padding:20px>Affiliation</td></tr>
				<?php
					$sql = "SELECT * FROM livraison,Client WHERE `livraison`.idclt=`Client`.`IDC`";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					 while($row = $result->fetch_assoc()) {
                        echo"<input type=hidden name=lid value='".$_SESSION["ID"]."'>";
					  echo "<tr><td style=padding:20px>".$row["idliv"]."</td><td style=padding:20px>".$row["datedeb"]."</td><td>";
                      if($row["datefin"]==NULL){
                        echo "<h2 style=color:red>Pas encore livré </h2></td><td>";
                      }else{
                        if($row["datefin"]=="0000-00-00"){
                            if($row['idlivr']==$_SESSION["ID"]){
                                echo "<span style=color:gray>Vous vous devez d'effectuer la livraison au plus vite</span></td><td>";
                            }else{
                                echo "<span style=color:gray>En cours de livraison</span></td><td>";
                            }
                            
                        }else{
                            echo $row["datefin"]."</td><td>";
                        }
                      }
                      echo $row["NOMC"]." ".$row["PRENOM"]."</td><td>".$row['TEL']."</td><td>".$row['lieux']."</td>";
                      if ($row['idclt']==$_SESSION['ID']){
                        echo "<td> Il s'agit de votre commande à vous </td>";
                      }else{
                        if ($row["datefin"]==NULL){
                        echo "<td><button style='block; border:none; background:none; cursor:pointer; color:red;' name=liva value=".$row["idliv"].">S'affilier</button></td></tr>";
                      }else{
                        if($row["datefin"]=="0000-00-00"){
                            if($row['idlivr']==$_SESSION["ID"]){
                                echo "<td><button name=convers style=margin:0 value=".$row['IDC'].">Conversation</button><br><button name=livd value=".$row["idliv"].">Annuler</button></td></tr>";
                            }else{
                                echo "<span style=color:gray>En cours de livraison</span></td><td>";
                            }
                        }else{
                            echo "<td>Livraison effectué</td></tr>";
                        }
                    }
					  }
                      }
					}else {
						echo "<tr><td colspan=7><h1 style=color:red>AUCUNE LIVRAISON DISPONIBLE</h1></td></tr>";
					}
					$conn->close();
				?>
			</table>
		</form>
</body>
</html>

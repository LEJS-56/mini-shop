<html>
	<head><title>Mesage</title></head>
	<body>
		<?php include("include.php"); ?>
		<table class=conver align=center style="display:flex; justify-content:center; max-height:50vh; overflow:auto">
			<?php
			if ($_SESSION['ID']){
				$sql="SELECT * FROM msg WHERE IDC=".$_SESSION["ID"]." AND recep=".$_GET['convers']." OR IDC=".$_GET['convers']." AND recep=".$_SESSION["ID"];
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if($row['recep']!=$_GET['convers']){
							echo "<tr style='text-align:right;'><td><p style='border:solid 2px #E77D7D; padding:10px; border-radius:30px 30px 0 30px;'>Client: <br>".$row['Cont']."</p><br></td></tr>";
						}else{
							echo "<tr style='text-align:left;'><td><p style='border:solid 2px skyblue; padding:10px; border-radius:30px 30px 30px 0;'>(Vous): <br>".$row['Cont']."</p><br></td></tr>";
					}
					}
				}else{
					echo "<center><h1>Aucun Méssage pour le moment</h1></center>";
				}		
			}else{
				echo "<center><b><h1 style='color:red; display:flex; justify-content:center;'>Veuillez vous connecter</h1></b></center><style>textarea{display:none;}</style>";
			}
			?>
		</table>
		<form method=POST action=envo.php style="position:absolute;bottom:0;width:100%">
		<?php echo "<input type=hidden name=recep value=".$_GET['convers'].">"; ?>	
        <textarea placeholder="Votre message" required style="width:100%;min-height:100px;text-align:center" name=msg></textarea><br><?php if($_SESSION['ID']){?><input type=submit name=envoi value=envoyer style="border-radius:99px;width:100%;height:30px;background-color:#0026FF;color:white;"><?php }else{ ?><b><a href=connexion.php style="border-radius:99px;width:100%;height:30px;background-color:#0026FF;color:white;text-align:center;justify-content:center;align-items:center;">Connectez-vous</a></b><?php }?>
		</form>
		<div class="spacerb" style="height:45vh;"></div>
	</body>
</html>
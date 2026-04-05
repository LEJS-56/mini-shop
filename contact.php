<html>
	<head><title>Mesage</title></head>
	<body style="padding-bottom:0">
		<?php include("include.php"); ?>
		<table class=conver align=center style="display:flex; justify-content:center;">
			<?php
			if ($_SESSION['ID']){
				$sql="SELECT * FROM msg WHERE IDC=".$_SESSION["ID"];
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if($row['recep']==0){
							echo "<tr><td></td><td colspan=2><p style='background-color:skyblue;border:solid 2px #E77D7D; padding:10px; border-radius:30px 30px 0 30px;'>".$user['NOMC']." (Vous): <br>".$row['Cont']."</p><br></td></tr>";
						}else{
							echo "<tr><td colspan=2><p style='background-color:red;border:solid 2px skyblue; padding:10px; border-radius:30px 30px 30px 0;'>Administrateur: <br>".$row['Cont']."</p><br></td><td></td></tr>";
					}
					}
				}else{
					echo "<center><h1>Aucun Méssage pour le moment</h1></center>";
				}
                echo "<form method=POST action=env.php><tr class=hide style='position: fixed;bottom: 65;'><td>
                <textarea required style='text-align:center;width:400px;min-height:100px;' name=msg></textarea></td><td><input type=submit name=envoi value=envoyer style='height:100%;border-radius:99px;width:100%;background-color:#0026FF;color:white;'>
                </td></tr></form>";
			}else{
				echo "<center><b><h1 style='color:red; display:flex; justify-content:center;'>Veuillez vous <a href=connexion.php style=text-decoration:underline> Connecter</a></h1></b></center><style>textarea{display:none;}</style>";
			}
			?>
		</table>
		<form method=POST class=hidea action=env.php style="position:absolute;bottom:0;left:30%;">
			<textarea required style="text-align:center;width:400px;min-height:100px;" name=msg></textarea><br><?php if($_SESSION['ID']){?><input type=submit name=envoi value=envoyer style="border-radius:99px;width:100%;background-color:#0026FF;color:white;"><?php }else{ ?><b><a href=connexion.php style="border-radius:99px;width:100%;height:30px;background-color:#0026FF;color:white;text-align:center;justify-content:center;align-items:center;">Connectez-vous</a></b><?php }?>
                </form>
	</body>
</html>

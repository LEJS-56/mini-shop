<html>
	<head><title>Mesage</title></head>
	<body>
		<?php include("includea.php"); ?>
		<table class=conver align=center style="display:flex; justify-content:center;">
			<?php
				$sql="SELECT msg.recep, msg.Cont, Client.NOMC FROM msg, Client WHERE Client.IDC=msg.IDC AND Client.IDC=".$_POST["client"];
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if($row['recep']==0){
							echo "<tr style='text-align:right;'><td><p style='border:solid 2px #E77D7D; padding:10px; border-radius:30px 30px 0 30px;'>".$row['NOMC'].": <br>".$row['Cont']."</p><br></td></tr>";
						}else{
							echo "<tr style='text-align:left;'><td><p style='border:solid 2px skyblue; padding:10px; border-radius:30px 30px 30px 0;'>Vous: <br>".$row['Cont']."</p><br></td></tr>";
					}
					}
				}else{
					echo "<center><h1>Aucun Méssage pour le moment</h1></center>";
				}		
			?>
		</table>
		<form method=POST action=enva.php style="position:absolute;bottom:0;left:30%;">
			<textarea required style="width:400px;min-height:100px;" name=msg></textarea><br><?php echo "<button name=aenvoi value=".$_POST["client"]." style='border-radius:99px;width:100%;height:30px;background-color:#0026FF;color:white;'>Repondre</button>"; ?></b>
		</form>
	</body>
</html>


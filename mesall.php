<html>
	<head><title>Toutes les discussions</title></head>
	<body>
		<form method=POST action=contacta.php>
			<table border=2 align=center style="margin-top:20px; display:flex; justify-content:center; text-align:center; border-collapse:collapse; padding:40px; border:solid 3px skyblue;">
				<tr><td style=padding:10px>numero</td><td>nom du Client</td><td>action</td></tr>
				<?php
					include("includea.php");
					$sql = "SELECT msg.ID, Client.IDC, Client.NOMC, Client.PRENOM FROM msg, Client WHERE Client.IDC = msg.IDC GROUP BY Client.NOMC";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					 while($row = $result->fetch_assoc()) {
						 if($row["ID"]!=Null){
							echo "<tr><td>".$row["IDC"]."</td><td>".$row["NOMC"]." ".$row["PRENOM"]."</td><td><button style='block; border:none; background:none; cursor:pointer; color:red;' name=client value=".$row["IDC"].">Messages</button></td></tr>";
							 continue;
						 }else{
							echo "<tr><td style=color:red colspan=4>AUCUN MESSAGE DISPONIBLE</td></tr>";
						}
					}
					}else {
						echo "<tr><td style=color:red colspan=4>AUCUN MESAGES DISPONIBLE</td></tr>";
					}
					$conn->close();
				?>
			</table>
		</form>		
	</body>
</html>

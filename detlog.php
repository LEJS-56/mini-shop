<html>
	<head>
		<title>Marketplace</title>
		<meta charset="utf-8">
	</head>
	<body style=background-color:#0076BE>
		<?php require "include.php";?>
<?php
if(isset($_POST['devdet'])){
?>
<form action=detlog.php method=POST style=color:white>
		<?php
			$sql = "SELECT * FROM `devlog` WHERE id=".$_POST['devdet'];
    		$res = $conn->query($sql);
   			$row = $res->fetch_assoc();
			echo "<center><h1 style=font-size:4rem;text-decoration:underline>".$row['label']."</h1>
            <table border=1 style=text-align:center;padding:10px;><tr><td>".$row['date']."</td></tr>
            <tr><td style=padding:10px;>".$row['content']."</td></tr>
            <tr><td><h1>Statut:";
    		if($row['etat']==1){
                echo "<span style=color:#90EE90>Réussis</span>";
            }else{
                echo "<span style=color:red>ÉChec</span>";
            }
   	 		echo "</td></tr>
            </table></form>";
}
if(isset($_POST['devadd'])){
    echo "<form action=addlog.php method=POST>
    <center><h1>Ajouter un DevNote</h1>
    <table border=1 style=text-align:center;padding:10px;>
    <tr><td style=padding:10px;>Titre</td><td><input type=text name=tit required></td></tr>
    <tr><td style=padding:10px;>Date</td><td><input type=date name=date required></td></tr>
    <tr><td style=padding:10px;>Détails</td><td><textarea name=desc required></textarea></td></tr>
    <tr><td style=padding:10px;>Réussi?</td><td><input type=checkbox name=term></td></tr>
    <tr><td colspan=2><button>valider</button></td></tr>
    </table>";
}
		?>
    </body>
</html>

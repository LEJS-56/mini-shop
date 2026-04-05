<html>
	<head>
		<title>Marketplace</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php require "include.php";?>
<form action=detlog.php method=POST>
		<?php
			$sql = "SELECT * FROM `devlog`";
			echo "<center><h1>Liste des DevNotes</h1>
            <form><table border=1 style=text-align:center;padding:10px;><tr><td style=padding:10px;>Titre</td><td style=padding:10px;>Date</td><td style=padding:10px;>Action</td></tr>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0){
                while ($row = $res->fetch_assoc()){
                    echo "<tr><td style=padding:10px;>".$row['label']."</td><td style=padding:10px;>".$row['date']."</td>";
                    if($row['etat']==1){
                        echo "<td style=padding:10px;><button name=devdet style=border-radius:1.5rem;backgroun-color:90EE90; value=".$row['id'].">Details</button></td></tr>";
                    }else{
                        echo "<td style=padding:10px;><button name=devdet style=background-color:red;border-radius:1.5rem value=".$row['id'].">Details</button></td></tr></tr>";
                }
            }
            }else{
                echo "<tr><td colspan=3><h1>Aucun Devlog </h1></td></tr>";
            }
			if($_SESSION["ADMIN"]=="OK"){
                echo "<tr><td colspan=3><button name=devadd style=border-radius:1.5rem>Ajouter un Devlog</button></td></tr>";
            }
		?>
    </body>
</html>

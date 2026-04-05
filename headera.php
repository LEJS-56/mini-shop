<header>
	<div class=logo>
		<h1><span>B<a href=devlog.php style=text-decoration:none;cursor:initial>L</a>UE </span> </span style="color:red;">Admin</h1>
	</div>
	<a href="list.php">Liste des futurs ajouts</a>
	<div class=menu>
		<ul class=menu_list>
			<!--
			Je n'en voit plus l'utilité
			<li><a href="sup.php">Supprimer</a></li>
			-->
			<li><a href="ajouter.php">Ajouter</a></li>
    		<?php
    			$sql = "SELECT msg.ID, MIN(Client.IDC) As IDC, Client.NOMC, Client.PRENOM FROM msg, Client WHERE Client.IDC = msg.IDC AND Client.Interet = 1";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
    		?>
			<li><a href="mesa.php" <?php echo "style='color:red;border:solid 2px red;'"; ?> >Messages <?php echo "($result->num_rows)"; } ?></a></li>
			<li><u><b><a href="admin.php">Admin</a></b></u></li>
			<li><a href="client.php">Clients</a></li>
			<li><b><a href=market.php>Marketplace</a></b></li>
			<li><a href="adm.php" style="background-color:red; color:white">Se Déconnecter</a></li>
		</ul>
		<div style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.3);" class=tel>
		</div>
	</div>
<!--
	Menu responsif
-->
	<div class="menu-responsif">
		
	</div>
</header>
<div class=spacer></div>
<script src=script.js></script>

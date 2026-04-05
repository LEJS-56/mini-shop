<header>
	<div class=logo>
		<h1><span>B<a href=devlog.php style=text-decoration:none;cursor:initial>L</a>UE </span>Market</h1>
	</div>
	<div class=compte>
		<?php
			session_start();			
			if ($_SESSION["ID"]!=""){
				$log="SELECT * FROM Client WHERE IDC=".$_SESSION["ID"];
				$livra="SELECT COUNT(idliv) FROM livraison WHERE datefin=0000-00-00 AND idclt=".$_SESSION["ID"];
				$rs=$conn->query($livra);
				$result = $conn->query($log);
				$user = $result->fetch_assoc();
				$livrai = $rs->fetch_row();
				
				echo $user['NOMC']." <a href=dec.php> Se déconnecter</a>";
				if ($user['Livreur']==1){
					$liva="SELECT COUNT(idliv) FROM livraison WHERE datefin IS NULL";
					$rs=$conn->query($liva);
					$livai = $rs->fetch_row();
					if ($livai[0]>0){
						echo "<br><a class=notif href=liv.php>LIVRAISONS DISPONIBLES</a>";
					}
					echo "<br><a href=liv.php> Livraisons </a>";
				}
			}else{
				echo "Non connecté <a href=connexion.php> Connectez-vous</a>";
			}
			if ($livrai[0]>0){
			echo "<br><a class=notif href=panier.php>LIVRAISON EN COURS</a>";
		}
		?>
	</div>
	<div class=menu>
		<ul class=menu_list>
			<li><a href="index.php" class=tela>Accueil</a></li>
			<li><a href="panier.php" class=tela>Achats</a></li>
			<li><a href=market.php class=tel>MarketPlace</a></li>
			<li><a href="contact.php" class=tela>contactez-nous</a></li>
		</ul>
	</div>
</header>
<div class=spacer></div>
<script>
	 var menu_toggle = document.querySelector('.menu-responsif');
        var menu =  document.querySelector('.menu_list')
        menu_toggle.onclick = function(){
             menu_toggle.classList.toggle('active');
             menu.classList.toggle('responsif');
        }
</script>

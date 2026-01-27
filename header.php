<header>
	<div class=logo>
		<h1><span>BLUE </span>Market</h1>
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
						echo "<marquee style='background-color:red;font-size:2.5rem;border-radius:30rem 0'><a href=liv.php>DES LIVRAISONS SONT DISPONIBLES</a></marquee>";
					}
					echo "<br><a href=liv.php> Livraisons </a>";
				}
			}else{
				echo "Non connecté <a href=connexion.php> Connectez-vous</a>";
			}
			if ($livrai[0]>0){
			echo "<marquee style='background-color:red;font-size:2.5rem;border-radius:30rem 0'><a href=panier.php>VOUS AVEZ UNE LIVRAISON EN COURS</a></marquee>";
		}
		?>
	</div>
	<div class=menu>
		<ul class=menu_list>
			<li><a href="index.php#Accueil">Accueil</a></li>
			<li><a href="index.php#APropos">services</a></li>
			<li><a href="contact.php">contactez-nous</a></li>
		</ul>
		<div style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.3);" class=tel>
			<b><span><a style="text-decoration:none; color:#fff;" href=market.php>Marketplace</a></span></b>
		</div>
		<?php
		
	?>
	</div>
</header>
<script>
	 var menu_toggle = document.querySelector('.menu-responsif');
        var menu =  document.querySelector('.menu_list')
        menu_toggle.onclick = function(){
             menu_toggle.classList.toggle('active');
             menu.classList.toggle('responsif');
        }
</script>

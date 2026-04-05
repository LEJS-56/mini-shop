<html>
	<head>
		<title></title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>
		<link rel=stylesheet href=style.css>
	</head>
	<body class=body style=padding:0>
	<div class="logo conlogo">
		<h1><span>BLUE </span>Market</h1>
	</div>
		<!-- Le fancy border radius
		<div class=bga><br><br><br><br><br><br><br><br><br><h1 style=color:white>Blue Market</h1></div>
		-->
		<div class=con-container>
			<form method=POST action=conn.php>
				<h1>Connexion</h1>
				<div class=con-group>
					<input name=tel type=text required>
					<label>Numero de téléphone</label>
					<span class="material-symbols-outlined">
						email
					</span>
				</div>
				<div class=con-group>
					<input name=mp type=Password required>
					<label>Mot de passe</label>
					<span class="material-symbols-outlined">
						key
					</span>
				</div>
<!--
				<div class=con-op>
					<label><input type=checkbox>Remember me</label>
					<a href="#">Mot de passe</a>
				</div>
-->
				<button type=submit name=ok style="border-radius:1.1rem">Se connecter</button>
				<div class=register>
					<center>
						<p>
							Pas de compte ?
							<b><a href="Inscription.php" style="justify-content:center;align-items:center;">S'inscrire</a></b>
						</p>
					</center>

				</div>
			</form>
		</div>
	</body>
</html>

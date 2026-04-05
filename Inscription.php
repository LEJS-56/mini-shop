<html>
	<head>
		<title>Formulaire inscription</title>
		<meta charset="UTF-8"><link rel="stylesheet" href="style2.css">
		<script type="text/javascript">
			a=fo.pwd.value;
			b=fo.cpwd.value;
			function confi(){
				if (a.length<8){
					alert("Le mot de passe doit avoir au moins 8 caractères");
				}
			}
		</script>
	</head>
	<body>
		<form name=fo onsubmit="confi()" class="form-inscrip" method=POST action=inscrip.php>
			<div class="form-entete">
				<h1 style=color:skyblue>Inscription</h1>
			</div>
			<div class="form-corps">
				<div class="ligne">
					<div class="entree">
						<label>Prenom</label>
						<input type="text" required name="pn">
					</div>
					<div class="entree">
						<label>Nom</label>
						<input type="text" required name="nm">
					</div>
				</div>
				<div class="ligne">
					<div class="entree">
						<label>Numero de telephone</label>
						<input type="number" required name="ntel">
					</div>
				</div>
				<div class="ligne">
					<div class="entree">
						<label>Mot de passe</label>
						<input type="password" required name="pwd">
					</div>
					<div class="entree">
						<label>confirmation</label>
						<input type="password" required name="cpwd">
					</div>
				</div>
				<div class="ligne">
					<div class="entree">
						<label>Sexe</label>
						<div class=entreer><div><input type="radio" name=sx value=M required>Homme</div> <div><input type="radio" name=sx value=F required>Femme</div></div>
					</div>
				</div>
				<div class="ligne">
<!--
					<div class="entree">
						<label>Photo de profile</label>
						<input type=file>
					</div>
-->
					<div class="entree">
						<label>Date de naissance</label>
						<input type=date name=dat required>
					</div>
				</div>
			</div>
			<div class="form-pied">
				<button class="btn">S'inscrire</button>
			</div>
		</form>
		<script>
</html>


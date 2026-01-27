<?php
 //~ mysqli procedural Test (C'est un échec)
 session_start();
 
 $server="localhost";
 $usernam="php";
 $password = "21DWBM5ozO]QPdRi";
 $dbname = "shop";
 include ("include.php");
 //~ $conn=mysqli_connect($server,$usernam,$password,$dbname);
 //~ if(!$conn){
	//~ die ("Erreur de connexion: "); 
 //~ }
 
 $date = date('Y-m-d');
 $prodid = $_POST['vp'];
 $lieu=$_POST['lieuliv'];
 $ses = $_SESSION['ID'];
 $nqte=$_POST['AQTE']-1;
 $sql2= "UPDATE `produit` SET `QTE` = '".$nqte."' WHERE `produit`.`ID` = ".$prodid;
 $sql3="INSERT INTO `livraison` (`idliv`, `datedeb`, `datefin`, `idclt`, `idlivr`, `idprod`, `lieux`) VALUES (NULL, '".$date."', NULL, '".$_SESSION["ID"]."', NULL, '".$prodid."', '".$lieu."');";
 //~ $s=mysqli_query($conn, $sql);
 //~ if ($s) {
	 //~ echo "<script>alert('INSERTION EFFECTUÉ AVEC SUCCÈS')</script>";
 //~ }else{
	//~ echo "ERRRRRR "; 
 //~ }
 
 //~ mysqli_close($conn);
 
 
 
 //~ PDO Test (réussi il fallait juste changer le format de la variable $date)
 try{
	 //~ Création de la Variable de connection
	$conn= new PDO("mysql:host=$server;dbname=$dbname",$usernam,$password);
	//~ Mise en place des attributs d'affichage d'érreurs
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//~ Exexcution de la requête d'isertion
	$conn->exec($sql2);
	
	$conn->exec($sql3);
	//~ Affichage du méssage en cas de réussite
	echo "<script>alert('ACHAT ÉFFECTUÉ')</script>";
 }
 //~ Recupération de l'exception en cas d'érreurs et affichage de celles ci
 catch(PDOException $e){
	echo $sql3 . "<br>" . $e->getMessage();
	echo $sql2 . "<br>" . $e->getMessage();
 }
 //~ Fermeture de la connection
 $conn = null;
 include_once("charge.html");
 echo "<script>setTimeout(()=>{
 history.back();
},1500);
</script>";
?>

<?php
 $nom=$_POST['np'];
 $px=$_POST['pp'];
 $marq=$_POST['mp'];
 
 
 // Importation de l'image
 
 $fileTmpPath=$_FILES['img']['tmp_name'];
 $img=date('M-d-m-Y-s-i-h').$_FILES['img']['name']; // Quelques ajouts pour faire une sorte de nom un peu unique
 $uploadFolder="prod/";
 // Créer le repertoire uploads/ s'il n'existe pas
 if(!is_dir($uploadFolder)){
	mkdir($uploadFolder,0755,true);
 }
 $destination = $uploadFolder.basename($img);
 //Déplacer le fichier de son répertoires dans les fichiers temoraires vers son dossier de destination
 if(move_uploaded_file($fileTmpPath,$destination)){
 	echo "Le fichié a bien été uploadé";
 }else{
 	echo "Une erreur s'est produit lors de la mise en ligne du fichier";
 }
 
 
 
 $connex=$_POST['connec'];
 
 
 $qte=$_POST['qte'];
 
 $mod=$_POST['mod'];
 $poid=$_POST['poid'];
 $coul=$_POST['colo'];
 $bat=$_POST['bat'];
 $fabri=$_POST['fabri'];
 $garan=$_POST['garan'];
 $datedis=date('y-m-d');
 $connectiv=$_POST['connec'];
 $dispocompa=$_POST['compa'];
 $usage=$_POST['usage'];
 $demarq=$_POST['demarq'];
 $requis=$_POST['req'];
 $compos=$_POST['compo'];
 $connectiq=$_POST['connecti'];
 $repar=$_POST['repa'];
 $desp=$_POST['desc'];
 
 
 //Pour la requête SQL (éviter les erreurs)
 $desp=str_replace("'","\'",$desp);
 
 
 $nbuser=$_POST['nbu'];
 $pd;
 $rep;
 if (empty($fabri))
 {
	 $fabri=$marq;
 }
 switch ($repar)
 {
	 case '0':
		 $rep="nulle";
	 break;
	 case '1':
		 $rep="Très Très faibles";
	 break;
	 case '2':
		 $rep="Très faible";
	 break;
	 case '3':
		 $rep="faible";
	 break;
	 case '4':
		 $rep="supportable";
	 break;
	 case '5':
		 $rep="moyenne";
	 break;
	 case '6':
		 $rep="assez bonne";
	 break;
	 case '7':
		 $rep="bonne";
	 break;
	 case '8':
		 $rep="très bonne";
	 break;
	 case '9':
		 $rep="aisé";
	 break;
	 
	 default:
		$rep="Inconue"; 
 }
 
 if (empty($requis))
 {
	 $requis="aucune spécification particulière";
 }
 if (empty($demarq))
 {
	 $demarq="aucun";
 }
 if (empty($compos))
 {
	 $compos="aucun";
 }
 if (empty($connectiq))
 {
	 $connectiq="aucun connectique";
 }
 if (empty($bat))
 {
	 $bat="aucune batterie";
 }
 if ($poid>=600)
 {
	 $pd="plutôt lourd et généralement destiné à être fixe dans un coin de la salle où elle est utilisé";
 }else{
	 $pd="leger facile à tranporter pour emporter partout dans nos déplacement quotidients";
 }
 $propos="Ce ".$nom." De marque ".$marq." Est un produit ".$pd.". Disponible en couleur ".$coul." avec ".$bat." et d\'une réparabilité ".$rep." qu\'il faut prendre en compte avant l\'achat ses connectiques et ses démarquations marqué sur la fiche tout en haut sont tout aussi importantes selon vos besoins";
 
include_once("con.php");
$sql = "INSERT INTO `produit` (`ID`, `NOM`, `PRIX`, `MARQ`, `IMG`, `Modele`, `Poid`, `Couleur`, `Batteries`, `Fabriquant`, `Garantie`,`Connectivite`, `Date_dispo`, `Technologie_connect`,`NbUser`, `Dispositif_compa`, `Usages_recommandes`, `Demarquement`, `Caracteristiques_requises`, `Composant_inclus`, `Conectiques`, `reparabilite`, `Description`, `Apropos`, `QTE`) VALUES (NULL, '".$nom."', '".$px."', '".$marq."', '".$img."', '".$mod."', '".$poid."', '".$coul."', '".$bat."', '".$fabri."', '".$garan."','".$connex."', '".$datedis."', '".$connectiv."','".$nbuser."', '".$dispocompa."', '".$usage."', '".$demarq."', '".$requis."', '".$compos."', '".$connectiq."', '".$rep."', '".$desp."','".$propos."','".$qte."')";
//~ echo $sql;
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('INSERTION EFFECTUÉ AVEC SUCCÈS')</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
include_once("charge.html");
header("refresh:0;ajouter.php");
/* echo "<script>setTimeout(()=>{
 history.back();
},1500);
</script>"; */
?>
 

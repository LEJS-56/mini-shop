<?php

$nom=$_POST['np'];
 $px=$_POST['pp'];
 $marq=$_POST['mp'];
 
 
 // Importation de l'image
 if (empty($_POST['img'])){
	$img = $_POST['imageo'];
}else{
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

include_once("con.php");
	$sql = "UPDATE `produit` SET  `NOM`='".$nom."', `PRIX`='".$px."', `MARQ`='".$marq."', `IMG`='".$img."', `Modele`='".$mod."', `Poid`='".$poid."', `Couleur`='".$coul."', `Batteries`='".$bat."', `Fabriquant`='".$fabri."', `Garantie`='".$garan."',`Connectivite`='".$connex."', `Technologie_connect`='".$connectiv."',`NbUser`='".$nbuser."', `Dispositif_compa`='".$dispocompa."', `Usages_recommandes`='".$usage."', `Demarquement`='".$demarq."', `Caracteristiques_requises`='".$requis."', `Composant_inclus`='".$compos."', `Conectiques`='".$connectiq."', `reparabilite`='".$rep."', `Description`='".$desp."', `QTE`='".$qte."' WHERE `produit`.`ID` =".$_POST['ide']."  ";
	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('MODIFICATION EFFECTUÉ AVEC SUCCÈS')</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
include_once("charge.html");
echo "<script>setTimeout(()=>{
 history.back();
},1500);
</script>";
	//~ echo $sql;
$conn->close();

?>
 

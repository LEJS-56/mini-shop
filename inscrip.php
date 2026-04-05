<?php
 $nom=$_POST['nm'];
 $prenom=$_POST['pn'];
 $sexe=$_POST['sx'];
 $tel=$_POST['ntel'];
 $date=$_POST['dat'];
 $mp=password_hash($_POST['pwd'],PASSWORD_DEFAULT);
include_once("con.php");
$extel = "SELECT * FROM `Client` WHERE TEL = ".$tel;
$res = $conn->query($extel);
$existtel = $res->fetch_assoc();
if (empty($existtel)){
    $sql = "INSERT INTO `Client` (`IDC`, `NOMC`, `PRENOM`, `SEXE`, `TEL`, `DN`, `MP`) VALUES (NULL, '".$nom."', '".$prenom."', '".$sexe."', '".$tel."', '".$date."','".$mp."')";
    if($_POST['pwd'] == $_POST['cpwd']){
        if ($conn->query($sql) === TRUE) {
        	echo "<script>alert('Inscription EFFECTUÉ AVEC SUCCÈS')</script>";
        } else {
          echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        echo "Vous pouvez désormais vous connecter";
        include_once("charge.html");
        header("refresh:0;connexion.php");
        }else{
            echo "Les mots de passes entrées ne correspondent pas";
            header("refresh:2;Inscription.php");
        }
}else{
    echo "Le numero existe dejà dans le site";
    header("refresh:3;Inscription.php");
}
?>

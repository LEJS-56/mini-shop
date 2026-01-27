<?php
 $nom=$_POST['nm'];
 $prenom=$_POST['pn'];
 $sexe=$_POST['sx'];
 $tel=$_POST['ntel'];
 $date=$_POST['dat'];
 $mp=$_POST['pwd'];
include_once("con.php");
$sql = "INSERT INTO `Client` (`IDC`, `NOMC`, `PRENOM`, `SEXE`, `TEL`, `DN`, `MP`) VALUES (NULL, '".$nom."', '".$prenom."', '".$sexe."', '".$tel."', '".$date."','".$mp."')";
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('INSERTION EFFECTUÉ AVEC SUCCÈS')</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
echo "Vous pouvez désormais vous connecter";
include_once("charge.html");
header("refresh:1;connexion.php");
?>

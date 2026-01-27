<?php
 $cont=str_replace("'","-",$_POST['msg']);
include_once("include.php");
$sql = "INSERT INTO `msg` (`ID`, `IDC`, `Cont`, `recep`)  VALUES (NULL, ".$_SESSION["ID"].", '".$cont."', '".$_POST['recep']."')";
$sql2 = "UPDATE `Client` SET `Interet` = 1 WHERE `Client`.`IDC`=".$_SESSION["ID"];
if (($conn->query($sql)) === TRUE && ($conn->query($sql2) === TRUE)) {
  echo "<script>alert('MESSAGE ENVOYÉ')</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
// if ($user['Livreur']==1){
// 		header("refresh:0;liv.php");		
// 	}else{
// 		header("refresh:0;panier.php");
// 	}
include_once("charge.html");
echo "<script>setTimeout(()=>{
 history.back();
},1500);
</script>";
?>

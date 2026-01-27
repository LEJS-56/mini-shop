<?php
 $cont=str_replace("'","-",$_POST['msg']);
include_once("include.php");
$sql = "INSERT INTO `msg` (`ID`, `IDC`, `Cont`, `recep`)  VALUES (NULL, '".$_POST["aenvoi"]."', '".$cont."', '".$_POST["aenvoi"]."')";
$sql2 = "UPDATE `Client` SET `Interet` = '0' WHERE `Client`.`IDC`=".$_POST["aenvoi"];
if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
  echo "<script>alert('MESSAGE ENVOYÉ')</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
include_once("charge.html");
 echo "<script>setTimeout(()=>{
 history.back();
},1500);
</script>";
//~ echo $sql2;
?>

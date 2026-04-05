<?php
    require "include.php";
	if ($_POST['term']=="on"){
        $term = 1;
    }else{
        $term = 0;
    }
	$lab = str_replace("'","\'",$_POST['tit']);
	$des = str_replace("'","\'",$_POST['desc']);
	$sql = "INSERT INTO `devlog` (`id`, `label`, `content`, `date`, `etat`) VALUES (NULL, '".$lab."', '".$des."', '".$_POST['date']."', '".$term."')";
    if($conn->query($sql)==TRUE){
        echo "<h1>Insertion réussis</h1>";
    }
?>
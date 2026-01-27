<?php
 session_start();
 session_destroy();
 include_once("charge.html");
 header("location:market.php");
?>

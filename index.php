<?php
include "function.php";
include "./conn/conn.php";
?>

<?php include "head.php" ?>

<body>

<?php include "header.php" ?>



<?php 
    if(!isset($_SESSION['id'])){
        header('Location: login.php'); 
    }else{
        header('Location: areaRiservata.php'); 
    }
    
    
?>





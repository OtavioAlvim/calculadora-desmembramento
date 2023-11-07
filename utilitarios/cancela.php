<?php
$pdo2 = new PDO('sqlite:../db/desmembramento.db');
$sql2 = "update desmembramento set status ='C'";
$sql2 = $pdo2->prepare($sql2);
$sql2->execute();
header('location: ../verifica_sessao/logout.php');
?>

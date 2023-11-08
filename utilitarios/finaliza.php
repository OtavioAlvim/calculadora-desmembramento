<?php
require'../verifica_sessao/sessao.php';
$pdo2 = new PDO('sqlite:../db/desmembramento.db');
$sql2 = "update desmembramento set status ='F' where sessao = :sessao";
$sql2 = $pdo2->prepare($sql2);
$sql2->bindValue(':sessao',$_SESSION['id']);
$sql2->execute();
header('location: ../verifica_sessao/logout.php');

?>
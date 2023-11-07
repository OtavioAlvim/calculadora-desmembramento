<?php
$pdo2 = new PDO('sqlite:../db/desmembramento.db');

print_r($_GET);
$id_produto = $_GET['id'];

$sql2 = "delete from itens_desmembramento where id=:id";
$sql2 = $pdo2->prepare($sql2);
$sql2->bindValue(':id',$id_produto);
$sql2->execute();
header('location: ../desmembramento.php');
?>
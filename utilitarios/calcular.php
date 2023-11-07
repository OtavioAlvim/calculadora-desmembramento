<?php 
$pdo2 = new PDO('sqlite:../db/desmembramento.db');

$sql = "SELECT sum(quantidade)as peso_itens,peso_total,count(*)as total_registros FROM desmembramento LEFT JOIN itens_desmembramento on desmembramento.id_formula = itens_desmembramento.id_desmembramento where desmembramento.status = 'A'";
$sql = $pdo2->prepare($sql);
$sql->execute();
$peso = $sql->fetchAll(PDO::FETCH_ASSOC);
// print_r($peso);

$peso_item = $peso[0]['peso_itens'];
$peso_total = $peso[0]['peso_total'];
$contagem_registro = $peso[0]['total_registros'];
$perda = $peso_total - $peso_item;
$perda_dividida = round($perda / $contagem_registro,2);


$sql2 = "update desmembramento set perda =:perda";
$sql2 = $pdo2->prepare($sql2);
$sql2->bindValue(':perda',$perda);
$sql2->execute();
?>
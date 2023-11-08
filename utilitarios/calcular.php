<?php
session_start();
$pdo2 = new PDO('sqlite:../db/desmembramento.db');

$sql = "SELECT sum(quantidade)as peso_itens,peso_total,count(*)as total_registros,custo_total FROM desmembramento LEFT JOIN itens_desmembramento on desmembramento.id_formula = itens_desmembramento.id_desmembramento where desmembramento.status = 'A' and sessao =:sessao";
$sql = $pdo2->prepare($sql);
$sql->bindValue(':sessao',$_SESSION['id']);
$sql->execute();
$peso = $sql->fetchAll(PDO::FETCH_ASSOC);

$peso_item = $peso[0]['peso_itens'];
$peso_total = $peso[0]['peso_total'];
$contagem_registro = $peso[0]['total_registros'];
$perda = $peso_total - $peso_item;
$custo_total = $peso[0]['custo_total'];
$perda_dividida = $perda / $contagem_registro;

$sqll = "SELECT itens_desmembramento.* FROM desmembramento LEFT JOIN itens_desmembramento on desmembramento.id_formula = itens_desmembramento.id_desmembramento where desmembramento.status = 'A' and sessao =:sessao";
$sqll = $pdo2->prepare($sqll);
$sqll->bindValue(':sessao',$_SESSION['id']);
$sqll->execute();
$produtos = $sqll->fetchAll(PDO::FETCH_ASSOC);


foreach($produtos as $produtos){
    $valor = $produtos['quantidade'] * 100 / $peso_total;
    $sqlll = "update itens_desmembramento set porcentagem_quantidade =:valor where id=:id_produto";
    $sqlll = $pdo2->prepare($sqlll);
    $sqlll->bindValue(':valor',$valor);
    $sqlll->bindValue(':id_produto',$produtos['id']);
    $sqlll->execute();


}
$sqll = "SELECT itens_desmembramento.* FROM desmembramento LEFT JOIN itens_desmembramento on desmembramento.id_formula = itens_desmembramento.id_desmembramento where desmembramento.status = 'A' and sessao =:sessao";
$sqll = $pdo2->prepare($sqll);
$sqll->bindValue(':sessao',$_SESSION['id']);
$sqll->execute();
$produtoss = $sqll->fetchAll(PDO::FETCH_ASSOC);


foreach($produtoss as $produtoss){
    $valor_custo = ($produtoss['quantidade'] + $perda_dividida)  * 100 / $peso_total;
    $sqlll = "update itens_desmembramento set porcentagem_custo =:valor where id=:id_produto";
    $sqlll = $pdo2->prepare($sqlll);
    $sqlll->bindValue(':valor',$valor_custo);
    $sqlll->bindValue(':id_produto',$produtoss['id']);
    $sqlll->execute();


}

$sqll = "SELECT desmembramento.* FROM desmembramento LEFT JOIN itens_desmembramento on desmembramento.id_formula = itens_desmembramento.id_desmembramento where desmembramento.status = 'A'  and sessao =:sessao";
$sqll = $pdo2->prepare($sqll);
$sqll->bindValue(':sessao',$_SESSION['id']);
$sqll->execute();

$produtos = $sqll->fetchAll(PDO::FETCH_ASSOC);
$perda_porcentagem = $sqll->fetchAll(PDO::FETCH_ASSOC);

$valor_perda = round($perda * 100 / $peso_total,2);
$sql2 = "update desmembramento set perda =:perda where sessao = :sessao and status = 'A'";
$sql2 = $pdo2->prepare($sql2);
$sql2->bindValue(':sessao',$_SESSION['id']);
$sql2->bindValue(':perda',$valor_perda);
$sql2->execute();
header('location: ../desmembramento.php');
?>
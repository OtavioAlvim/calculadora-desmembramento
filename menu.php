<?php
require'./verifica_sessao/sessao.php';
if(!empty($_POST)){

    $pdo2 = new PDO('sqlite:./db/desmembramento.db');
    $nome_formula = $_POST['nome_produto'];
    $custo_produto = $_POST['custo_produto'];
    $peso_produto = $_POST['peso_produto'];
    $sessao = $_POST['sessao'];

    $sql = "INSERT INTO desmembramento (nome_formula,sessao,custo_total, peso_total) VALUES (:nome,:sessao,:custo,:peso)";
    $sql = $pdo2->prepare($sql);
    $sql->bindValue(':nome',$nome_formula);
    $sql->bindValue(':sessao',$sessao);
    $sql->bindValue(':custo',$custo_produto);
    $sql->bindValue(':peso',$peso_produto);
    $sql->execute();
    session_start();
    $_SESSION['meu_loro'] = 'meu loro';
    header('location: ./desmembramento.php');
}
require'./template/header.php';
require'./utilitarios/pagina_inicial.php';
require'./template/footer.php';
?>
<?php 
require'./verifica_sessao/sessao.php';
if(!empty($_POST)){
    $pdo2 = new PDO('sqlite:./db/desmembramento.db');
    $nome = $_POST['nome'];
    $peso_produto = $_POST['peso'];
    $id = $_POST['id'];

    $sql = "INSERT INTO itens_desmembramento (id_desmembramento,nome_produto,quantidade) VALUES (:id,:nome,:peso)";
    $sql = $pdo2->prepare($sql);
    $sql->bindValue(':id',$id);
    $sql->bindValue(':nome',$nome);
    $sql->bindValue(':peso',$peso_produto);
    $sql->execute();
    header('location: ./desmembramento.php');
}
require'./template/header.php';
require'./utilitarios/desmembramento.php';
require'./template/footer.php';
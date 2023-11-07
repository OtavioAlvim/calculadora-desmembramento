<?php
$pdo2 = new PDO('sqlite:./db/desmembramento.db');
$sql = "SELECT * FROM desmembramento LEFT JOIN itens_desmembramento on desmembramento.id_formula = itens_desmembramento.id_desmembramento where desmembramento.status = 'A' and sessao =:sessao";
$sql = $pdo2->prepare($sql);
$sql->bindValue(':sessao',$_SESSION['id']);
$sql->execute();
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<br>
<form class="row g-3">
    <div class="col-md-3">
        <label for="inputEmail4" class="form-label">
            <p><strong>NOME DA FORMULA:</strong><?php echo strtoupper($dados[0]['nome_formula']) ?></p>
        </label>
    </div>
    <div class="col-md-3">
        <label for="inputPassword4" class="form-label">
            <p><strong>CUSTO TOTAL PRODUTO:</strong> R$: <?php echo  number_format($dados[0]['custo_total'], 2, ',', '') ?></p>
        </label>
    </div>
    <div class="col-md-3">
        <label for="inputAddress" class="form-label">
            <p><strong>PESO TOTAL DO PRODUTO:</strong> <?php echo  number_format($dados[0]['peso_total'], 2, ',', '') ?> KG</p>
        </label>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#cancelar">CANCELAR</button>
        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#calcular">CALCULAR</button>
        <?php
        if (!empty($dados[0]['id'])) { ?>
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exportar">EXPORTAR</button>
        <?php } ?>

    </div>
</form>
<h4>ITENS DA FORMULA</h4>
<form class="row g-3" action="" method="post">
    <div class="col-md-8">
        <label for="inputEmail4" class="form-label">NOME DO ITEM DESMEMBRADO</label>
        <input type="text" class="form-control" id="inputEmail4" placeholder="NOME DO ITEM" name="nome" required autofocus>
    </div>
    <div class="col-md-3">
        <label for="inputPassword4" class="form-label">PESO PRODUTO EM KG</label>
        <input type="number" step="0.01" class="form-control" id="inputPassword4" placeholder="PESO TOTAL ITEM" name="peso" required>
    </div>
    <div class="col-md-1">
        <input type="hidden" name="id" value="<?php echo  $dados[0]['id_formula'] ?>">
        <label for="inputEmail4" class="form-label">OPERACAO</label>
        <button type="submit" class="btn btn-primary">INSERIR</button>
    </div>
</form>

<hr>
<?php
if (empty($dados[0]['id'])) {
    echo "<h2>NENHUM PRODUTO INSERIDO<h2>";
} else { ?>
    <p>ITENS PÓS DESMEMBRAMENTO</p>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">QUANTIDADE</th>
                <th scope="col">%QUANTIDADE</th>
                <th scope="col">%CUSTO</th>
                <th scope="col">OPERAÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $n = 1;
            foreach ($dados as $dados) {

            ?>
                <tr>
                    <th scope="row"><?php echo $n++ ?></th>
                    <td><strong><?php echo  $dados['nome_produto'] ?></strong></td>
                    <td><?php echo number_format($dados['quantidade'], 2, ',', '') ?></td>
                    <td><?php echo  number_format($dados['porcentagem_quantidade'], 4, ',', '') ?></td>
                    <td><?php echo  number_format($dados['porcentagem_custo'], 4, ',', '') ?></td>
                    <td><a type="submit" class="btn btn-danger btn-sm" href="./utilitarios/excluir_item.php?id=<?php echo  $dados['id'] ?>">EXCLUIR</a></td>
                </tr>
            <?php    }
            ?>

        </tbody>
    </table>
    <h1 class="text-center mt-3">TOTAL DA PERDA <?php echo  number_format($dados['perda'], 4, ',', '') ?>%</h1>
<?php }
?>
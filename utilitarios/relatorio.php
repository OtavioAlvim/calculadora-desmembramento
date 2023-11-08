<?php
$pdo2 = new PDO('sqlite:./db/desmembramento.db');
$sql = "SELECT * FROM desmembramento LEFT JOIN itens_desmembramento on desmembramento.id_formula = itens_desmembramento.id_desmembramento where desmembramento.status = 'A' and sessao =:sessao";
$sql = $pdo2->prepare($sql);
$sql->bindValue(':sessao', $_SESSION['id']);
$sql->execute();
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="row g-3">
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
        <button type="button" class="btn btn-primary btn-sm" onclick="imprimirPagina()">IMPRIMIR</button>
        <a type="button" class="btn btn-success btn-sm" href="./utilitarios/finaliza.php">FINALZIAR</a>
    </div>

</div>
<p>ITENS PÓS DESMEMBRAMENTO</p>
<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">QUANTIDADE</th>
            <th scope="col">%QUANTIDADE</th>
            <th scope="col">%CUSTO</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $n = 0;
        foreach ($dados as $dados) {

        ?>
            <tr>
                <th scope="row"><?php echo $n++ ?></th>
                <td><strong><?php echo  $dados['nome_produto'] ?></strong></td>
                <td><?php echo number_format($dados['quantidade'], 2, ',', '') ?></td>
                <td><?php echo  number_format($dados['porcentagem_quantidade'], 4, ',', '') ?></td>
                <td><?php echo  number_format($dados['porcentagem_custo'], 4, ',', '') ?></td>
            </tr>
        <?php    }
        ?>

    </tbody>
</table>
<h1 class="text-center mt-3">TOTAL DA PERDA <?php echo  number_format($dados['perda'], 4, ',', '') ?>%</h1>


<script>
    function imprimirPagina() {
        window.print();
    }
</script>
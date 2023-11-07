<?php
$pdo2 = new PDO('sqlite:./db/desmembramento.db');
$sql = "SELECT * FROM desmembramento LEFT JOIN itens_desmembramento on desmembramento.id_formula = itens_desmembramento.id_desmembramento where desmembramento.status = 'A' and sessao =:sessao";
$sql = $pdo2->prepare($sql);
$sql->bindValue(':sessao',$_SESSION['id']);
$sql->execute();
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

if (empty($dados)) { ?>
    <form class="row g-3" action="" method="post">
        <div class="col-md-5">
            <label for="inputEmail4" class="form-label">NOME DA FORMULA</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="NOME DO PRODUTO" name="nome_produto" required autofocus>
        </div>
        <div class="col-md-3">
            <label for="inputPassword4" class="form-label">CUSTO TOTAL PRODUTO</label>
            <input type="number" step="0.01" class="form-control" id="inputPassword4" placeholder="CUSTO PRODUTO" name="custo_produto" required>
        </div>
        <div class="col-md-3">
            <label for="inputAddress" class="form-label">PESO TOTAL DO PRODUTO</label>
            <input type="number" step="0.01" class="form-control" id="inputAddress" placeholder="PESO PRODUTO" name="peso_produto" required>
        </div>
        <div class="col-md-1">
            <input type="hidden" name="sessao" value="<?php echo $_SESSION['id'] ?>">
            <label for="inputEmail4" class="form-label">OPERACAO</label>
            <button type="submit" class="btn btn-primary">INICIAR</button>
        </div>
    </form>
<?php } else { ?>
    <div class="alert alert-danger" role="alert">
        FORMULA EM ABERTO, CLIQUE <a href="./desmembramento.php"><strong>AQUI</strong></a> PARA CONTINUAR DE ONDE PAROU!
    </div>
<?php }
?>
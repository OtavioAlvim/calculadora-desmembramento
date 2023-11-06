<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>gerador de formula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .input-group-text {
            background-color: #EDAB3B;
        }

        .input-group-text:hover {
            background-color: #d8982a;
        }

        tr {
            background-color: blue;
        }
    </style>
</head>

<body class=" m-3">

    <div class="container">
        <div class="container-fluid bg-light" style="height: 100px;">
            <h2 class="text-center mt-10">GERADOR DE DESMEMBRAMENTO</h2>
            <hr>
        </div>
        <!-- <form class="row g-3">
            <div class="col-md-5">
                <label for="inputEmail4" class="form-label">NOME DA FORMULA</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="NOME DO PRODUTO">
            </div>
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">CUSTO TOTAL PRODUTO</label>
                <input type="number" step="0,02" class="form-control" id="inputPassword4" placeholder="CUSTO PRODUTO">
            </div>
            <div class="col-md-3">
                <label for="inputAddress" class="form-label">PESO TOTAL DO PRODUTO</label>
                <input type="number" step="0,02" class="form-control" id="inputAddress" placeholder="PESO PRODUTO">
            </div>
            <div class="col-md-1">
                <label for="inputEmail4" class="form-label">OPERACAO</label>
                <button type="submit" class="btn btn-primary">INICIAR</button>
            </div>
        </form> -->
        <form class="row g-3">
            <div class="col-md-5">
                <label for="inputEmail4" class="form-label">NOME DA FORMULA</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="CORTARAM O ALICATE" disabled>
            </div>
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">CUSTO TOTAL PRODUTO</label>
                <input type="number" step="0,02" class="form-control" id="inputPassword4" placeholder="R$ 200,48" disabled>
            </div>
            <div class="col-md-3">
                <label for="inputAddress" class="form-label">PESO TOTAL DO PRODUTO</label>
                <input type="number" step="0,02" class="form-control" id="inputAddress" placeholder="50KG" disabled>
            </div>
            <div class="col-md-1">
                <label for="inputEmail4" class="form-label">OPERACAO</label>
                <button type="submit" class="btn btn-primary">CANCELAR</button>
            </div>
        </form>
        <br>
        <h4>ITENS DA FORMULA</h4>
        <form class="row g-3">
            <div class="col-md-8">
                <label for="inputEmail4" class="form-label">NOME DO ITEM DESMEMBRADO</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="NOME DO ITEM">
            </div>
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">PESO PRODUTO EM KG</label>
                <input type="number" step="0,02" class="form-control" id="inputPassword4" placeholder="PESO TOTAL ITEM">
            </div>
            <div class="col-md-1">
                <label for="inputEmail4" class="form-label">OPERACAO</label>
                <button type="submit" class="btn btn-primary">INSERIR</button>
            </div>
        </form>

        <hr>
        <p>ITENS PÓS DESMEMBRAMENTO</p>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">%CUSTO</th>
                    <th scope="col">%QUANTIDADE</th>
                    <th scope="col">OPERAÇÃO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>CHICO ALICATE CORTADO</td>
                    <td>3</td>
                    <td>10,3</td>
                    <td>3</td>
                    <td>EXCLUIR</td>
                </tr>
            </tbody>
        </table>
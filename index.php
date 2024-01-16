<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>DESMEMBRAMENTO</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <a data-bs-toggle="modal" data-bs-target="#entrar">

        <div id="loadingDiv" class="text-center">
            <div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100vw; position: fixed; top: 0; left: 0; z-index: 999;">

                <img src="./img/fundo2.png" alt="Carregando..." style="max-width: 1000px; "><br>
                <h4 class="text-center">CLIQUE NA TELA PARA INICIAR UMA FORMULA!</h4>
            </div>
        </div>
    </a>


    <!-- Modal -->
    <div class="modal fade" id="entrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form action="./verifica_sessao/inicia_sessao.php" method="post">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">SEJA BEM VINDO!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">NOME</label>
                                <input type="text" class="form-control" id="inputAddress" name="nome" placeholder="NOME" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">EMPRESA</label>
                                <input type="text" class="form-control" id="inputCity" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">EMAIL</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="DIGITE SEU EMAIL" required>
                            </div>

                            <div class="col-6">
                                <label for="inputAddress2" class="form-label">TELEFONE</label>
                                <input type="number" class="form-control" id="inputAddress2" placeholder="35 9999-9999" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                        <button type="submit" class="btn btn-primary">ENTRAR</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
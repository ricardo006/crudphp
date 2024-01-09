<?php include 'views/header.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Criar Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body class="bg-light">
    <div class="mt-10">
        <div class="ml-4 mr-4 mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="card-title text-center mt-2">Criar Usuário</h6>
                </div>
                <div class="card-body">
                    <a href="read.php" class="btn btn-outline-secondary mb-3">Voltar</a>
                    <form action="create.php" method="post" class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" class="form-control" required
                                    aria-label="Digite seu nome">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="sobrenome">Sobrenome:</label>
                                <input type="text" name="sobrenome" class="form-control" required
                                    aria-label="Digite seu sobrenome">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="usuario">Usuário:</label>
                                <input type="text" name="usuario" class="form-control" required
                                    aria-label="Digite seu usuário">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" required
                                    aria-label="Digite seu email">
                            </div>

                            <div class="form-group col-md-12    ">
                                <label for="senha">Senha:</label>
                                <input type="password" name="senha" class="form-control" required
                                    aria-label="Digite sua senha">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="data_nascimento">Data de Nascimento:</label>
                                <input type="date" name="data_nascimento" class="form-control" required
                                    aria-label="Digite sua data de nascimento">
                            </div>
                        </div>

                        <div class="text-right">
                            <input type="submit" value="Criar Usuário" class="btn btn-primary mt-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
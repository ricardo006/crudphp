<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
    <!-- Inclua o Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Estilos personalizados */
        .card {
            border-radius: 12px;
            box-shadow: 0px 4px 10px 0px rgba(0, 0, 0, 0.1);
        }

        /* Estilize os inputs para ter 6 em cada linha */
        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <a href="read.php" class="btn btn-outline-secondary mb-3">Ir para Listagem</a>

        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="card-title text-center mb-0">Criar Usuário</h6>
            </div>
            <div class="card-body">
                <form action="create.php" method="post">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>

                        <div class="form-group col">
                            <label for="sobrenome">Sobrenome:</label>
                            <input type="text" name="sobrenome" class="form-control" required>
                        </div>

                        <div class="form-group col">
                            <label for="usuario">Usuário:</label>
                            <input type="text" name="usuario" class="form-control" required>
                        </div>

                        <div class="form-group col">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group col">
                            <label for="senha">Senha:</label>
                            <input type="password" name="senha" class="form-control" required>
                        </div>

                        <div class="form-group col">
                            <label for="data_nascimento">Data de Nascimento:</label>
                            <input type="date" name="data_nascimento" class="form-control" required>
                        </div>
                    </div>

                    <div class="text-right">
                        <input type="submit" value="Criar Usuário" class="btn btn-primary mt-3">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Inclua o Bootstrap JS e jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $usuario = $row['usuario'];
        $email = $row['email'];
        $nome = $row['nome'];
        $sobrenome = $row['sobrenome'];
        $data_nascimento = $row['data_nascimento'];
    } else {
        echo "Usuário não encontrado";
        exit();
    }
} else {
    echo "ID do usuário não inserido.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <!-- Inclua o Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0px 4px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 12px 12px 0 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="read.php" class="btn btn-outline-secondary mb-3">Ir para Listagem</a>

        <div class="card">
            <div class="card-header">
                <h6 class="card-title text-center mb-0">Editar Usuário</h6>
            </div>
            <div class="card-body">
                <form action="update.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sobrenome">Sobrenome:</label>
                            <input type="text" name="sobrenome" class="form-control" value="<?php echo $sobrenome; ?>"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuário:</label>
                        <input type="text" name="usuario" class="form-control" value="<?php echo $usuario; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="data_nascimento">Data de Nascimento:</label>
                        <input type="date" name="data_nascimento" class="form-control"
                            value="<?php echo $data_nascimento; ?>" required>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            Atualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>

<?php
$conn->close();
?>
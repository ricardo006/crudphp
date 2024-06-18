<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $url = $_POST['url'];

    $sql = "INSERT INTO videos (titulo, descricao, url) VALUES ('$titulo', '$descricao', '$url')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Vídeo cadastrado com sucesso!');
                window.location.href = 'read.php';
              </script>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Vídeo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    
    <div class="container mt-5">
        <div class="card card-cadastro">
            <div class="justify-content-between">
                <a href="read.php" class="btn btn-voltar ml-2 mt-1">
                    <i class="bi bi-arrow-left mr-1"></i> Voltar
                </a>
            </div>

            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Cadastrar Vídeo</h5>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">URL do Vídeo</label>
                        <input type="url" class="form-control" id="url" name="url" required>
                        <small class="form-text text-muted">Exemplo: https://www.youtube.com/watch?v=VIDEO_ID ou https://youtu.be/VIDEO_ID</small>
                    </div>
                    
                </form>
            </div>
            <div class="card-footer cfooter d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-form-cadastrar">Cadastrar</button>
            </div>
        </div>
    </div>

    <?php include 'scripts.php'; ?>
</body>
</html>

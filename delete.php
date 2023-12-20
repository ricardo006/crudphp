<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM usuarios WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Registro excluído com sucesso!');
                setTimeout(function() {
                    window.location.href = 'read.php'; // Redireciona para a página de listagem
                }, 2000);
              </script>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
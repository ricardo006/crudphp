<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM videos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Vídeo excluído com sucesso!');
                window.location.href = 'list.php';
              </script>";
    } else {
        echo "Erro: " . $conn->error;
    }
}

$conn->close();
?>

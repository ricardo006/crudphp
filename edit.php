<?php
include 'conexao.php';
include 'views/header.php'; // Inclua o header.php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM videos WHERE id=$id";
    $result = $conn->query($sql);
    $video = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $url = $_POST['url'];

    $sql = "UPDATE videos SET titulo='$titulo', descricao='$descricao', url='$url' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Vídeo atualizado com sucesso!');
                window.location.href = 'list.php';
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
    <meta name="viewport" content="width=device-width

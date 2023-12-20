<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nascimento = $_POST['data_nascimento'];

    $sql = "UPDATE usuarios SET usuario='$usuario', email='$email', nome='$nome', sobrenome='$sobrenome', data_nascimento='$data_nascimento' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Usuário editado com sucesso!');
                window.location.href = 'read.php'; // Redireciona para a página de listagem
              </script>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
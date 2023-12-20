<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nascimento = $_POST['data_nascimento'];

    // Note que é altamente recomendável usar funções de hash para armazenar senhas no banco de dados
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (usuario, email, senha, nome, sobrenome, data_nascimento) 
            VALUES ('$usuario', '$email', '$senha_hash', '$nome', '$sobrenome', '$data_nascimento')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Usuário cadastrado com sucesso!');
                window.location.href = 'read.php'; // Redireciona para a página de listagem
              </script>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
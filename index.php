<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
</head>

<body>
    <h1>Criar Usuário</h1>
    <form action="create.php" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome" required><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" required><br>

        <input type="submit" value="Criar Usuário">
    </form>
</body>

</html>
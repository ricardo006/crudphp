<?php
include 'conexao.php';

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Usuários</title>
    <!-- Inclua o Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Listagem de Usuários</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['nome']}</td>";
        echo "<td>{$row['sobrenome']}</td>";
        echo "<td>{$row['data_nascimento']}</td>";
        echo "<td>
                <button class='btn btn-warning mr-2' onclick='editarUsuario({$row['id']})'>
                    <i class='fas fa-edit'></i> Editar
                </button>
                <button class='btn btn-danger' onclick='excluirUsuario({$row['id']})'>
                    <i class='fas fa-trash-alt'></i> Excluir
                </button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Nenhum usuário encontrado.</td></tr>";
}
?>
        </tbody>
    </table>
</div>

<!-- Inclua o Bootstrap JS e jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Inclua os ícones do Bootstrap (FontAwesome) -->
<script src="https://kit.fontawesome.com/SEU_CODIGO_DO_KIT.js" crossorigin="anonymous"></script>

<script>
    function excluirUsuario(id) {
        if (confirm("Tem certeza de que deseja excluir este usuário?")) {
            window.location.href = "delete.php?id=" + id;
        }
    }

    function editarUsuario(id) {
        window.location.href = "edit.php?id=" + id;
    }
</script>

</body>
</html>

<?php
$conn->close();
?>

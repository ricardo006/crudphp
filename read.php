<?php
include 'conexao.php';
include 'views/header.php'; // Inclua o header.php

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Usuários</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class="ml-3 mr-2 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-title mt-2">Listagem de Usuários</h6>
                    <a href="index.php" class="btn btn-success">Cadastrar Usuário</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>Data de Nascimento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>{$row['id']}</td>";
                                echo "<td>{$row['nome']}</td>";
                                echo "<td>{$row['sobrenome']}</td>";
                                echo "<td>{$row['data_nascimento']}</td>";
                                echo "<td>
                                    <button class='btn btn-info mr-2' onclick='editarUsuario({$row['id']})'>
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
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://kit.fontawesome.com/SEU_CODIGO_DO_KIT.js" crossorigin="anonymous"></script>

    <script>
        function excluirUsuario(id) {
            if (confirm("Deseja mesmo excluir este usuário?")) {
                window.location.href = "delete.php?id=" + id;
            }
        }

        function editarUsuario(id) {
            window.location.href = "edit.php?id=" + id;
        }

        function mostrarAlerta() {
            var alerta = $('<div class="alert alert-success alert-dismissible fade show" role="alert">\
                                Cadastro realizado com sucesso!\
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                    <span aria-hidden="true">&times;</span>\
                                </button>\
                            </div>');

            alerta.insertBefore('.container');

            setTimeout(function () {
                alerta.alert('close');
            }, 3000);
        }

        if (window.location.search.indexOf('cadastro') !== -1) {
            mostrarAlerta();
        }
    </script>

</body>

</html>

<?php
$conn->close();
?>
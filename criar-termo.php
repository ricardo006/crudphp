<?php
include 'conexao.php';
include 'views/header.php'; // Inclua o header.php


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Criar Termo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class="mt-10">
        <div class="ml-4 mr-4 mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="card-title text-center mt-2">Criar Termo</h6>
                </div>
                <div class="card-body">
                    <a href="read.php" class="btn btn-outline-secondary mb-3">Voltar</a>
                    <form action="create.php" method="post" class="needs-validation" novalidate>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="select1">Selecione os campos que deseja adicionar no termo:</label>
                                <select id="select1" class="form-control js-example-tokenizer"
                                    placelholder="Nada Selecionado" multiple="multiple">
                                    <option value="" disabled selected hidden>Nada Selecionado</option>
                                    <option>Excellent</option>
                                    <option>Very Good</option>
                                    <option>Good</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <select class="form-control js-example-tokenizer" multiple="multiple">
                                    <option selected="selected">Excellent</option>
                                    <option selected="selected">Very Good</option>
                                    <option selected="selected">Good</option>
                                </select>
                            </div>

                            <div class="text-right">
                                <input type="submit" value="Criar Usuário" class="btn btn-primary mt-3">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".js-example-tokenizer").select2({
                tags: true,
                tokenSeparators: [',', ' '],
                width: '100%'
            });

            // Remove dinamicamente o elemento <option> quando não há itens selecionados
            $(".js-example-tokenizer").on("change", function (e) {
                if ($(this).val() == null || $(this).val().length === 0) {
                    $(this).find('option[value=""]').remove();
                    $(this).prepend('<option value="" disabled selected hidden>Nada Selecionado</option>');
                } else {
                    $(this).find('option[value=""]').remove();
                }
            });
        });
    </script>
</body>

</html>
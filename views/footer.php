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
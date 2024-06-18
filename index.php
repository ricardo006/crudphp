<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Criar Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Ensure this path is correct -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.14/lottie.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif !important;
        }

        .card-personalizate {
            width: 50%;
            margin: 0 auto;
            background-color: #055e63 !important;
            color: white;
            border-radius: 20px;
            box-shadow: 0px 4px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .full-height {
            height: 100vh;
        }

        .card-body {
            background-color: rgb(187, 234, 242);
            border-radius: 0 0 20px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .card-title {
            margin: 0;
        }

        .card-subtitle {
            color: #f8f9fa !important;
            font-size: 14px !important;
            margin-top: 5px;
        }

        .text-send {
            color: #055e63 !important;
            font-size: 1.5rem;
            font-weight: 600;
            text-decoration: none;
        }

        #lottie {
            width: auto;
            height: 100%;
        }
    </style>
</head>

<body class="bg-light">
    <div class="d-flex justify-content-center align-items-center full-height">
        <div class="card card-personalizate" onclick="window.location.href='read.php'">
            <div class="card-header">
                <h6 class="card-title">Ir assistir vídeos em Watch GO</h6>
                <h6 class="card-subtitle text-muted">Desenvolvido por Ricardo Oliveira</h6>
            </div>
            <div class="card-body">
                <div id="lottie"></div>
                <a href="read.php" class="text-center text-send mt-3">
                    Watch GO
                </a>
            </div>
        </div>
    </div>

    <script>
        lottie.loadAnimation({
            container: document.getElementById('lottie'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://lottie.host/647ef12e-a443-4e7c-b22a-97e2c1965fb1/Iu4avbeakR.json'
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>

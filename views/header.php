<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Página</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<nav class="navbar navbar-expand-lg bg-purple bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">N<span>/eva</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('index.php'); ?>" href="index.php">Criar Termo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('features.php'); ?>" href="features.php">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('pricing.php'); ?>" href="pricing.php">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
function isActive($page)
{
    return basename($_SERVER['PHP_SELF']) === $page ? 'active' : '';
}
?>
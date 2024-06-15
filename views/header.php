<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>N</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<nav class="navbar navbar-expand-lg bg-purple bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">N/<span></span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('index.php'); ?>" href="criar-termo.php">Criar Termo</a>
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
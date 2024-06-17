<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Vídeos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css">
    
    <style>
        .card-content-scroll {
            overflow-x: auto;
            white-space: nowrap;
        }

        .video-title {
            word-wrap: break-word;
        }

        .card-items {
            cursor: pointer;
        }

        .header-list {
            background: linear-gradient(45deg, rgba(13, 27, 42, 0), rgba(13, 27, 42, 0.5));
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">RO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Início <span class="sr-only">(atual)</span></a>
                </li>
             
                <li class="nav-item">
                    <a class="nav-link" href="#">Contato</a>
                </li>
            </ul>
            <a href="create.php" class="btn btn-cadastrar btn-success my-2 my-sm-0">
                <i class="bi bi-plus-lg"></i>
                Cadastrar Vídeo
            </a>
        </div>
    </nav>

    <div class="container-custom mt-2">

            <div class="card-content-scroll mt-2 mb-4">
                <button class="btn btn-item1-scroll">Vídeos Padrão</button>
                <button class="btn btn-item2-scroll">Vídeos Cadastrados</button>
                <?php
                    $categories = ['Ao Vivo', 'Música', 'Mix', 'Jogos', 'Notícias', 'E Sports', 'Filmes de Terror', 'Música Pop', 'Eletrônica', 'Assistidos', 'Novidades', 'Alan Walker'];
                    foreach ($categories as $category) {
                        echo '<button class="btn btn-items-scroll">' . $category . '</button>';
                    }
                ?>
            </div>

            <div class="card-content-scroll">
            <?php
                include 'conexao.php';
                $sql = "SELECT * FROM videos";
                $result = $conn->query($sql);

                function getYouTubeVideoId($url) {
                    if (strpos($url, 'youtu.be') !== false) {
                        return substr(parse_url($url, PHP_URL_PATH), 1);
                    } elseif (strpos($url, 'youtube.com') !== false) {
                        parse_str(parse_url($url, PHP_URL_QUERY), $params);
                        return $params['v'] ?? null;
                    }
                    return null;
                }

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $video_url = $row['url'];
                        $video_id = getYouTubeVideoId($video_url);
                        $isYouTube = strpos($video_url, 'youtube') !== false || strpos($video_url, 'youtu.be') !== false;
                        $thumbnail_url = $isYouTube ? "https://img.youtube.com/vi/{$video_id}/0.jpg" : "caminho_para_thumbnail_default.jpg";
                        ?>
                        
                        <!-- <div class="card-horizontal">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <img src="<?= $thumbnail_url ?>" class="img-fluid" alt="..." style="width: auto;">
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="card-body">
                                        <h5 class="card-title" style="text-align: left;"><?= $row['titulo'] ?></h5>
                                        <p class="card-text" style="width: 100%; text-align: justify;">
                                            <?= $row['descricao'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="card-horizontal" style="width: 18rem; height: 350px;">
                            <img src="<?= $thumbnail_url ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['titulo'] ?></h5>
                                <p class="card-text"><?= $row['descricao'] ?> </p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    echo "<p>Nenhum vídeo encontrado.</p>";
                }
            ?>
        </div>
        
        <div class="row">
            <div class="col-md-8 col-sm-12 mb-3 mt-4">
                <div class="card card-selected">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Vídeo Selecionado</h6>
                            </div>
                            <div class="col-md-12 text-right transition-video" style="display: none;">
                                <div class="d-flex align-items-center justify-content-begin">
                                    <i class="fas fa-volume-up icon-sound"></i>
                                    <h6 class="ml-2 mt-2 txt-reproduzindo">&nbsp;Reproduzindo agora:&nbsp;</h6>
                                    <h6 class="mt-2 mr-2 txt-title-video">&nbsp;Texto à direita</>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="video-container"> 
                            <p>Selecione um vídeo na lista para exibi-lo aqui.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 mt-4">
                <div class="card card-list">
                    <div class="card-header header-list sticky-top">
                        <h6>Listagem de Vídeos</h6>
                        <div class="text-left">
                            <button type="button" class="btn btn-secondary btn-padrao" onclick="addPadraoVideos()">
                                <i class="bi bi-list-nested"></i> Padrão
                            </button>
                            <button type="button" class="btn btn-primary btn-cadastrados" onclick="mostrarVideosCadastrados()">
                                <i class="bi bi-display"></i> Vídeos Cadastrados
                            </button>
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: 620px; max-height: 700px; overflow-y: auto;" id="video-list">
                        <?php
                            $sql = "SELECT * FROM videos";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $video_url = $row['url'];
                                    $video_id = getYouTubeVideoId($video_url);
                                    $isYouTube = strpos($video_url, 'youtube') !== false || strpos($video_url, 'youtu.be') !== false;
                                    $thumbnail_url = $isYouTube ? "https://img.youtube.com/vi/{$video_id}/0.jpg" : "caminho_para_thumbnail_default.jpg";
                            ?>
                                    <div class="card card-items mb-2" onclick="exibirVideo('<?= $video_url ?>', <?= $isYouTube ? 'true' : 'false' ?>)">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="<?= $thumbnail_url ?>" class="rounded-start" alt="..." style="width: 100%; height: 100%;">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h6 class="card-title"><?= $row['titulo'] ?></h6>
                                                    <p class="card-text"><?= $row['descricao'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                echo "<p>Nenhum vídeo encontrado.</p>";
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
                            
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <script>
        function addPadraoVideos() {
            fetch('get_videos.php')
                .then(response => response.json())
                .then(videos => {
                    console.log(videos); // Verifica o conteúdo dos vídeos recebidos
                    const videoList = document.getElementById('video-list');
                    videoList.innerHTML = ''; // Limpa a lista de vídeos

                    videos.forEach(video => {
                        let videoCard = document.createElement('div');
                        videoCard.classList.add('card', 'card-items', 'mb-3');
                        videoCard.onclick = () => exibirVideo(video.url, false); // Passa false para indicar que não é um vídeo do YouTube

                        videoCard.innerHTML = `
                            <div class="row g-0">
                                <div class="col-md-4 img-padrao">
                                    <img src="${video.thumbnail}" class="rounded-start" alt="..." style="width: 100%;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h6 class="card-title">${video.titulo}</h6>
                                        <p class="card-text">${video.descricao}</p>
                                    </div>
                                </div>
                            </div>
                        `;

                        videoList.appendChild(videoCard);
                    });
                })
                .catch(error => console.error('Erro ao carregar vídeos:', error));
        }

        function exibirVideo(videoUrl, isYouTube) {
            let videoContainer = document.getElementById('video-container');
            let videoIframe;

            if (isYouTube) {
            let videoId = videoUrl.includes('youtu.be') ? videoUrl.split('youtu.be/')[1] : videoUrl.split('v=')[1];
                videoIframe = `<iframe width="100%" height="100%" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
            } else {
                videoIframe = `<video width="100%" height="100%" class="video-padrao" controls><source src="${videoUrl}" type="video/mp4">Your browser does not support the video tag.</video>`;
            }

            videoContainer.innerHTML = videoIframe;

            // Adiciona a classe 'selected' ao vídeo selecionado
            const videoCards = document.getElementsByClassName('card-items-selected');
            for (let i = 0; i < videoCards.length; i++) {
                videoCards[i].classList.remove('selected');
                videoCards[i].classList.add('card-items');
                videoCards[i].classList.remove('card-items-selected');
            }
            const selectedVideoCard = event.target.closest('.card-items');
            selectedVideoCard.classList.add('selected');
            selectedVideoCard.classList.remove('card-items');
            selectedVideoCard.classList.add('card-items-selected');

            // Adicione o título na classe txt-title-video
            const txtTitleVideo = document.querySelector('.txt-title-video');
            txtTitleVideo.textContent = selectedVideoCard.querySelector('.card-title').textContent;
        }

        function mostrarVideosCadastrados() {
            location.reload(); 
        }

        function exibirVideo(videoUrl, isYouTube) {
            let videoContainer = document.getElementById('video-container');
            let videoIframe;

            if (isYouTube) {
            let videoId = videoUrl.includes('youtu.be') ? videoUrl.split('youtu.be/')[1] : videoUrl.split('v=')[1];
                videoIframe = `<iframe width="100%" height="100%" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
            } else {
                videoIframe = `<video class="video-padrao" controls><source src="${videoUrl}" type="video/mp4">Your browser does not support the video tag.</video>`;
            }

            videoContainer.innerHTML = videoIframe;

            // Adiciona a classe 'selected' ao vídeo selecionado
            const videoCards = document.getElementsByClassName('card-items-selected');
            for (let i = 0; i < videoCards.length; i++) {
                videoCards[i].classList.remove('selected');
                videoCards[i].classList.add('card-items');
                videoCards[i].classList.remove('card-items-selected');
            }
            const selectedVideoCard = event.target.closest('.card-items');
            selectedVideoCard.classList.add('selected');
            selectedVideoCard.classList.remove('card-items');
            selectedVideoCard.classList.add('card-items-selected');

            // Adicione o título na classe txt-title-video
            const txtTitleVideo = document.querySelector('.txt-title-video');
            txtTitleVideo.textContent = selectedVideoCard.querySelector('.card-title').textContent;

            // Mostra a classe transition-video
            const transitionVideo = document.querySelector('.transition-video');
            transitionVideo.style.display = 'block';
        }
        
    </script>
</body>
</html>

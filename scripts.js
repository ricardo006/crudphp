// Adiciona os vídeos padrão ao carregar a página
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

// Função auxiliar para verificar se é um vídeo do YouTube
function isYouTubeVideo(url) {
    return url.includes('youtube.com') || url.includes('youtu.be');
}

function exibirVideo(videoUrl, isYouTube) {
    let videoContainer = document.getElementById('video-container');
    let videoIframe;

    if (isYouTube) {
        let videoId = videoUrl.includes('youtu.be') ? videoUrl.split('youtu.be/')[1] : videoUrl.split('v=')[1];
        videoIframe = `<iframe width="100%" height="100%" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
    } else {
        videoIframe = `<video width="100%" height="100%" class="video-padrao" controls><source src="${videoUrl}" type="video/mp4">Seu navegador não suporta a tag video.</video>`;
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

function mostrarVideosCadastrados() {
    location.reload(); 
}

// Vídeos padão sobre o tema E Sports no sistema em visualização nos cards horizontais
function addVideosPadraoHorizontal() {
    fetch('get_videos.php?type=padrao') // Substitua 'get_videos.php?type=padrao' pelo endpoint correto
        .then(response => response.json())
        .then(videos => {
            const videoListContainer = document.querySelector('.card-content-scroll-cards');
            videoListContainer.innerHTML = ''; // Limpa o conteúdo existente

            videos.forEach(video => {
                let videoCard = document.createElement('div');
                videoCard.classList.add('card-horizontal');
                videoCard.style.width = '18rem'; // Estilo padrão

                let thumbnailUrl = video.thumbnail ? video.thumbnail : 'caminho_para_thumbnail_default.jpg'; // Verifica se há thumbnail

                videoCard.innerHTML = `
                    <img src="${thumbnailUrl}" class="card-img-top" alt="..." style="width: 100%; height: auto;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 18px;">${video.titulo}</h5>
                        <p class="card-text" style="font-size: 14px;">${video.descricao}</p>
                    </div>
                `;

                // Adiciona evento de clique para exibir o vídeo correspondente
                videoCard.addEventListener('click', () => exibirVideo(video.url, isYouTubeVideo(video.url)));

                videoListContainer.appendChild(videoCard); // Adiciona o card à lista
            });
        })
        .catch(error => console.error('Erro ao carregar vídeos padrão:', error));
}

// Vídeos cadastrados no sistema em visualização nos cards horizontais
function addVideosCadastradosHorizontal() {
    const videoListContainer = document.querySelector('.card-content-scroll-cards');
    videoListContainer.innerHTML = '';

    mostrarVideosCadastrados(); // Chama a função para carregar os vídeos cadastrados
}
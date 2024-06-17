<?php
$directory = 'videos-padrao'; // Diretório onde estão os vídeos padrão
$thumbnailPath = $directory . '/thumbnail.png'; // Caminho fixo da miniatura

// Função para obter a lista de vídeos na pasta
function getVideosFromDirectory($directory, $thumbnailPath) {
    $videos = [];
    $files = scandir($directory);
    
    foreach ($files as $file) {
        $filePath = $directory . '/' . $file;
        // Verifica se é um arquivo e se é um tipo de vídeo suportado
        if (is_file($filePath) && in_array(pathinfo($file, PATHINFO_EXTENSION), ['mp4', 'avi', 'mkv', 'webm', 'aac', 'flv', 'ogg', 'wmv'])) {
            // Cria um array associativo com os dados do vídeo
            $videoData = [
                'url' => $filePath, // URL do vídeo
                'titulo' => pathinfo($file, PATHINFO_FILENAME), // Título do vídeo
                'descricao' => 'Descrição do vídeo: ' . pathinfo($file, PATHINFO_FILENAME), // Descrição do vídeo (exemplo)
                'thumbnail' => $thumbnailPath // Caminho fixo da miniatura
            ];

            $videos[] = $videoData;
        }
    }

    return $videos;
}

// Obtém a lista de vídeos
$videos = getVideosFromDirectory($directory, $thumbnailPath);

// Define o cabeçalho como JSON
header('Content-Type: application/json');

// Retorna os vídeos como JSON
echo json_encode($videos);
?>

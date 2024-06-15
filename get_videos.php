<?php
$directory = 'videos-padrao'; // Diretório onde estão os vídeos padrão

// Função para obter a lista de vídeos na pasta
function getVideosFromDirectory($directory) {
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
                'descricao' => 'Descrição do vídeo: ' . pathinfo($file, PATHINFO_FILENAME) // Descrição do vídeo (exemplo)
            ];

            // Gera a miniatura do vídeo usando ffmpegthumbnailer
            $thumbnailPath = generateThumbnail($filePath);
            if ($thumbnailPath) {
                $videoData['thumbnail'] = $thumbnailPath; // Caminho da miniatura do vídeo
            }

            $videos[] = $videoData;
        }
    }

    return $videos;
}

// Função para gerar a miniatura do vídeo
function generateThumbnail($videoPath) {
    $thumbnailPath = 'thumbnails/' . pathinfo($videoPath, PATHINFO_FILENAME) . '.jpg'; // Caminho da miniatura

    // Comando para gerar a miniatura usando ffmpegthumbnailer
    $command = "ffmpegthumbnailer -i $videoPath -o $thumbnailPath -s 0";

    // Executa o comando
    exec($command);

    // Verifica se a miniatura foi gerada com sucesso
    if (file_exists($thumbnailPath)) {
        return $thumbnailPath;
    }

    return false;
}

// Obtém a lista de vídeos
$videos = getVideosFromDirectory($directory);

// Define o cabeçalho como JSON
header('Content-Type: application/json');

// Retorna os vídeos como JSON
echo json_encode($videos);
?>

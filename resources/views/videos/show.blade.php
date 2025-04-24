<x-videos-app-layout>
    <div class="video-container">
        <h1 class="video-title">Títol: {{ $video->title }}</h1>
        <p class="video-description">Descripció: {{ $video->description }}</p>

        @php
            preg_match("/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^\"&?\/\s]{11})/", $video->url, $matches);
            $videoId = $matches[1] ?? null;
            $thumbnailUrl = $videoId ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg" : '';
            $embedUrl = $videoId ? "https://www.youtube.com/embed/{$videoId}" : '';
        @endphp

        @if ($thumbnailUrl)
            <div class="video-frame">
                <img class="thumbnail" src="{{ $thumbnailUrl }}" alt="Miniatura de {{ $video->title }}" onclick="document.getElementById('video-frame').style.display='block'; this.style.display='none';" style="cursor: pointer; width: 100%; max-width: 800px;">
            </div>
        @endif

        <div class="video-frame" id="video-frame" style="display: none;">
            <iframe
                src="{{ $embedUrl }}"
                width="800"
                height="450"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>

        <ul class="video-info">
            <li>Data de publicació: {{ $video->published_at }}</li>
            <li>Anterior vídeo: {{ $video->previous }}</li>
            <li>Següent vídeo: {{ $video->next }}</li>
            <li>ID de la sèrie: {{ $video->series_id }}</li>
        </ul>
    </div>
</x-videos-app-layout>

<style>
    .video-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .video-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }

    .video-description {
        font-size: 16px;
        margin-bottom: 20px;
        color: #555;
    }

    .video-frame {
        margin-bottom: 20px;
        text-align: center;
    }

    .thumbnail {
        border-radius: 8px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .thumbnail:hover {
        transform: scale(1.05);
    }

    .video-info {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .video-info li {
        font-size: 14px;
        margin-bottom: 5px;
        color: #666;
    }
</style>

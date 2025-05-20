<x-videos-app-layout>
    <div class="video-container">
        <h1 class="video-title">{{ $video->title }}</h1>
        <p class="video-description">{{ $video->description }}</p>

        @php
            preg_match("/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^\"&?\/\s]{11})/", $video->url, $matches);
            $videoId = $matches[1] ?? null;
            $embedUrl = $videoId ? "https://www.youtube.com/embed/{$videoId}" : '';
        @endphp

        @if ($embedUrl)
            <div class="video-frame">
                <iframe
                    src="{{ $embedUrl }}"
                    width="800"
                    height="450"
                    frameborder="0"
                    allowfullscreen>
                </iframe>
            </div>
        @endif

        <ul class="video-info">
            <li><strong>Publicat:</strong> {{ $video->published_at }}</li>
            <li><strong>Sèrie:</strong> {{ $video->series_id }}</li>
        </ul>

        @if (auth()->id() === $video->user_id)
            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-warning edit-btn">Editar</a>

                <form action="{{ route('videos.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Estàs segur que vols esborrar aquest vídeo?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn">Esborrar</button>
                </form>
            </div>
        @endif
    </div>

    <style>
        .video-container {
            max-width: 900px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
        }

        .video-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .video-description {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .video-frame {
            margin-bottom: 20px;
            text-align: center;
        }

        .video-info {
            list-style: none;
            padding: 0;
            font-size: 14px;
            color: #555;
        }

        .btn {
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 5px;
            text-transform: uppercase;
        }

        .edit-btn {
            background-color: #ffc107;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .edit-btn:hover {
            background-color: #e0a800;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</x-videos-app-layout>

<x-videos-app-layout>
    <div class="container">
        <div class="card">
            <h1 class="title">⚠️ Confirmar Eliminació</h1>
            <p class="message">Estàs segur que vols eliminar el vídeo: <strong>{{ $video->title }}</strong>?</p>

            <form action="{{ route('videos.manage.destroy', $video->id) }}" method="POST" data-qa="video-delete-form">
                @csrf
                @method('DELETE')

                <div class="btn-group">
                    <button type="submit" class="btn btn-danger">🗑️ Eliminar</button>
                    <a href="{{ route('videos.manage.index') }}" class="btn btn-secondary">❌ Cancel·lar</a>
                </div>
            </form>
        </div>
    </div>

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #f9f9f9, #ececec);
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            color: #d9534f;
            margin-bottom: 15px;
        }

        .message {
            font-size: 16px;
            margin-bottom: 20px;
            color: #333;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn {
            font-size: 16px;
            font-weight: 600;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-danger {
            background-color: #d9534f;
            color: white;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c9302c;
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #545b62;
            transform: scale(1.05);
        }
    </style>
</x-videos-app-layout>

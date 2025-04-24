<x-videos-app-layout>
    <div class="container">
        <div class="card">
            <h1 class="title">✏️ Editar Vídeo</h1>

            <form action="{{ route('videos.manage.update', $video->id) }}" method="POST" data-qa="video-edit-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">📌 Títol</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $video->title }}" required>
                </div>

                <div class="form-group">
                    <label for="description">📝 Descripció</label>
                    <textarea class="form-control" id="description" name="description">{{ $video->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="url">🔗 URL</label>
                    <input type="url" class="form-control" id="url" name="url" value="{{ $video->url }}" required>
                </div>

                <div class="form-group">
                    <label for="published_at">📅 Data de publicació</label>
                    <input type="date" class="form-control" id="published_at" name="published_at" value="{{ \Carbon\Carbon::parse($video->published_at)->format('Y-m-d') }}" required>
                </div>

                <div class="form-group">
                    <label for="previous">⏪ Vídeo anterior</label>
                    <input type="text" class="form-control" id="previous" name="previous" value="{{ $video->previous }}">
                </div>

                <div class="form-group">
                    <label for="next">⏩ Vídeo següent</label>
                    <input type="text" class="form-control" id="next" name="next" value="{{ $video->next }}">
                </div>

                <div class="form-group">
                    <label for="series_id">🎬 Sèrie</label>
                    <input type="number" class="form-control" id="series_id" name="series_id" value="{{ $video->series_id }}">
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-edit-video">✅ Actualitzar Vídeo</button>
                    <a href="{{ route('videos.manage.index') }}" class="btn btn-cancel">❌ Cancel·lar</a>
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
            max-width: 500px;
            width: 100%;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            font-weight: 600;
            font-size: 14px;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-control {
            width: 100%;
            font-size: 14px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            font-size: 16px;
            font-weight: 600;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-edit-video {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-edit-video:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .btn-cancel {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-cancel:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .btn {
                font-size: 14px;
                padding: 8px 12px;
            }

            .form-control {
                font-size: 12px;
                padding: 8px;
            }
        }
    </style>
</x-videos-app-layout>

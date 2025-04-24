<x-videos-app-layout>
    <div class="container">
        <h1>Crear Vídeo</h1>

        <form action="{{ route('videos.manage.store') }}" method="POST" data-qa="video-create-form">
            @csrf
            <div class="form-group">
                <label for="title">Títol</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Descripció</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="url">URL</label>
                <input type="url" class="form-control" id="url" name="url" required>
            </div>

            <div class="form-group">
                <label for="published_at">Data de publicació</label>
                <input type="date" class="form-control" id="published_at" name="published_at" required>
            </div>

            <div class="form-group">
                <label for="previous">Vídeo anterior</label>
                <input type="text" class="form-control" id="previous" name="previous">
            </div>

            <div class="form-group">
                <label for="next">Vídeo següent</label>
                <input type="text" class="form-control" id="next" name="next">
            </div>

            <div class="form-group">
                <label for="series_id">Sèrie</label>
                <input type="number" class="form-control" id="series_id" name="series_id">
            </div>

            <button type="submit" class="btn btn-create-video mt-3">Crear Vídeo</button>
        </form>
    </div>

    <!-- Estils CSS -->
    <style>
        .container {
            max-width: 600px;
            margin: auto;
            padding: 40px;
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            font-size: 14px;
            color: #2c3e50;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            font-size: 14px;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .btn-create-video {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 14px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            display: block;
            width: 100%;
            text-align: center;
            transition: transform 0.3s ease, background 0.3s ease;
            border: none;
        }

        .btn-create-video:hover {
            background: linear-gradient(135deg, #0056b3, #00408a);
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .btn-create-video {
                font-size: 14px;
                padding: 12px;
            }

            .form-control {
                font-size: 13px;
                padding: 10px;
            }
        }
    </style>
</x-videos-app-layout>

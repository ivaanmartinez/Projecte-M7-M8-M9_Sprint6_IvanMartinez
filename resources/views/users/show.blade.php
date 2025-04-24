<x-videos-app-layout>
    <div class="container">
        <div class="card">
            <h1 class="title">Detalls de l'Usuari</h1>
            <div class="user-details">
                <p><strong>Nom:</strong> {{ $user->name }}</p>
                <p><strong>Correu electrònic:</strong> {{ $user->email }}</p>
                <p><strong>Rol:</strong> {{ $user->getRoleNames()->first() }}</p>
            </div>
            <div class="btn-group">
                <a href="{{ route('users.index') }}" class="btn btn-back">Tornar a la llista</a>
            </div>
        </div>
    </div>

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #eef2f3, #dfe9f3);
            padding: 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: #0056b3;
            margin-bottom: 20px;
        }

        .user-details p {
            font-size: 16px;
            margin: 10px 0;
            color: #333;
        }

        .btn-group {
            margin-top: 20px;
        }

        .btn {
            font-size: 16px;
            font-weight: 600;
            padding: 12px 18px;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-back {
            background-color: #007bff;
            color: white;
        }

        .btn-back:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
</x-videos-app-layout>

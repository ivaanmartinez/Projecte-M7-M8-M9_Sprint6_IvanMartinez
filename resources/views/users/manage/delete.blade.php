<!-- resources/views/users/manage/delete.blade.php -->
<x-videos-app-layout>
    <div class="container">
        <h1>❌ Eliminar Usuari</h1>

        <p>Estàs segur que vols eliminar aquest usuari? Aquesta acció no es pot desfer.</p>

        <form action="{{ route('users.manage.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete mt-3" onclick="return confirm('Estàs segur que vols eliminar aquest usuari?')">
                Eliminar Usuari
            </button>
            <a href="{{ route('users.manage.index') }}" class="btn btn-secondary mt-3">Cancel·lar</a>
        </form>
    </div>

    <!-- Estils CSS millorats -->
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

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-delete:hover {
            background-color: #c82333;
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

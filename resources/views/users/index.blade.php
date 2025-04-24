<!-- resources/views/users/index.blade.php -->
<x-users-app-layout>
    <div class="container">
        <h1>👥 Llista d'Usuaris</h1>

        <!-- Barra de cerca -->
        <div class="search-bar">
            <form action="{{ route('users.manage.index') }}" method="GET">
                <input type="text" name="search" class="form-control" placeholder="Cerca per nom d'usuari..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-search">Cercar</button>
            </form>
        </div>

        <!-- Llista d'usuaris -->
        <div class="user-list mt-4">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginació -->
        <div class="pagination-container">
            {{ $users->links() }}
        </div>
    </div>

    <!-- Estils CSS millorats -->
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }

        .search-bar {
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            font-size: 14px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-search {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-search:hover {
            background-color: #0056b3;
        }

        .user-list {
            width: 100%;
            max-width: 800px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .btn-detail {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            text-decoration: none;
        }

        .btn-detail:hover {
            background-color: #218838;
        }

        .pagination-container {
            margin-top: 20px;
        }

        .pagination {
            justify-content: center;
            display: flex;
            gap: 5px;
        }

        .pagination a {
            text-decoration: none;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        .pagination a:hover {
            background-color: #0056b3;
        }
    </style>
</x-users-app-layout>

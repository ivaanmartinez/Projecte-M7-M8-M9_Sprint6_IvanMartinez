<x-videos-app-layout>
    <div class="container">
        <h1>📋 Gestió d'Usuaris</h1>

        <!-- Botó destacat per crear usuari -->
        <a href="{{ route('users.manage.create') }}" class="btn btn-create-user mb-3">
            <i class="fas fa-plus"></i> Crear Usuari
        </a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Taula millorada -->
        <div class="table-responsive">
            <table class="table table-hover mt-3">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Data de Creació</th>
                    <th>Accions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->getRoleNames() as $role)
                                <span class="badge bg-primary">{{ ucfirst($role) }}</span>
                            @endforeach
                        </td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                        <td>
                            <!-- Enllaç per editar -->
                            <a href="{{ route('users.manage.edit', $user->id) }}" class="btn btn-edit">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <!-- Formulari per eliminar -->
                            <form action="{{ route('users.manage.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Segur que vols eliminar aquest usuari?')">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Estils CSS millorats -->
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');

        .container {
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-create-user {
            display: inline-block;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-create-user:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .alert {
            font-size: 14px;
            padding: 12px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .table {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            overflow: hidden;
        }

        .table th {
            background-color: #007bff;
            color: white;
            font-weight: 600;
            text-align: center;
            padding: 12px;
        }

        .table td {
            padding: 12px;
            text-align: center;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s;
        }

        .btn-edit {
            background-color: #ffc107;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        /* Estilos para los badges de roles */
        .badge {
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 12px;
            font-weight: 600;
            margin: 2px;
            display: inline-block;
        }

        .bg-primary {
            background-color: #007bff;
        }

        .bg-success {
            background-color: #28a745;
        }

        .bg-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .bg-danger {
            background-color: #dc3545;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .table {
                font-size: 12px;
            }

            .btn-create-user {
                width: 100%;
                font-size: 14px;
            }

            .btn-edit, .btn-delete {
                padding: 6px 10px;
            }

            .badge {
                font-size: 10px;
                padding: 3px 6px;
            }
        }
    </style>
</x-videos-app-layout>

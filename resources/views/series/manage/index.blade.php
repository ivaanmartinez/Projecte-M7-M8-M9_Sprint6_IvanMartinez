<x-videos-app-layout>
    <div class="container">
        <h1>🎬 Gestió de Sèries</h1>

        <!-- Botó destacat per crear sèrie -->
        <a href="{{ route('series.manage.create') }}" class="btn btn-create-series mb-3" data-qa="create-series">
            <i class="fas fa-plus"></i> Crear Sèrie
        </a>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Taula de sèries -->
        <div class="table-responsive">
            <table class="table table-hover mt-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Títol</th>
                    <th>Descripció</th>
                    <th>Data de Publicació</th>
                    <th>Accions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($series as $serie)
                    <tr>
                        <td>{{ $serie->id }}</td>
                        <td>{{ $serie->title }}</td>
                        <td>{{ \Str::limit($serie->description, 50) }}</td>
                        <td>{{ $serie->published_at ? \Carbon\Carbon::parse($serie->published_at)->format('d-m-Y') : 'No publicat' }}</td>
                        <td>
                            <a href="{{ route('series.manage.edit', $serie) }}" class="btn btn-edit" data-qa="edit-series-{{ $serie->id }}">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('series.manage.destroy', $serie) }}" method="POST" style="display:inline;" data-qa="delete-series-{{ $serie->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Estàs segur que vols eliminar aquesta sèrie? Els vídeos associats també seran desassignats.')">
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

        .btn-create-series {
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

        .btn-create-series:hover {
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

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .table {
                font-size: 12px;
            }

            .btn-create-series {
                width: 100%;
                font-size: 14px;
            }

            .btn-edit, .btn-delete {
                padding: 6px 10px;
            }
        }
    </style>
</x-videos-app-layout>

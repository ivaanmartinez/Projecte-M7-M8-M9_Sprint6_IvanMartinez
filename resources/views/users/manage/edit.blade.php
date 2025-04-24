<x-videos-app-layout>
    <div class="container">
        <div class="card">
            <h1 class="title">✏️ Editar Usuari</h1>

            <form action="{{ route('users.manage.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required data-qa="input-name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required data-qa="input-email">
                </div>

                <div class="form-group">
                    <label for="password">Contrasenya (deixa en blanc per no modificar)</label>
                    <input type="password" id="password" name="password" class="form-control" data-qa="input-password">
                </div>

                <div class="form-group">
                    <label for="role">Rol</label>
                    <select id="role" name="role" class="form-control" required data-qa="select-role">
                        <option value="">Selecciona un rol</option>
                        @foreach($roles as $role)
                            <option value="{{ $role }}" {{ (old('role', $user->getRoleNames()->first()) == $role) ? 'selected' : '' }}>
                                {{ ucfirst($role) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-edit-video" data-qa="button-edit-user">Actualitzar Usuari</button>
                    <a href="{{ route('users.manage.index') }}" class="btn btn-cancel">Cancel·lar</a>
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

        .form-group {
            margin-bottom: 20px;
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
            font-size: 16px;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
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

        .btn-edit-video {
            background-color: #28a745;
            color: white;
        }

        .btn-edit-video:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .btn-cancel {
            background-color: #dc3545;
            color: white;
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
                padding: 10px 14px;
            }

            .form-control {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</x-videos-app-layout>

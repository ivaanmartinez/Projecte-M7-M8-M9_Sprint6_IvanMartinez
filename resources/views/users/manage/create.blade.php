<x-videos-app-layout>
    <div class="container">
        <h1>📢 Crear Nou Usuari</h1>

        <form action="{{ route('users.manage.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required data-qa="input-name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required data-qa="input-email">
            </div>
            <div class="form-group">
                <label for="password">Contrasenya</label>
                <input type="password" id="password" name="password" class="form-control" required data-qa="input-password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirma la Contrasenya</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required data-qa="input-password-confirmation">
            </div>

            <div class="form-group">
                <label for="role">Rol</label>
                <select id="role" name="role" class="form-control" required data-qa="select-role">
                    <option value="" disabled selected>Selecciona un rol</option>
                    @foreach($roles as $role)
                        <option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-create-user mt-3" data-qa="button-create-user">Crear Usuari</button>
        </form>
    </div>

    <!-- Estils CSS millorats -->
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

        .btn-create-user {
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

        .btn-create-user:hover {
            background: linear-gradient(135deg, #0056b3, #00408a);
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .btn-create-user {
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

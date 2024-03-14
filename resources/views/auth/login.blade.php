@extends('components.main')
@section('content')
    <div class="container border p-4 mt-4 col-12 col-md-6 rounded">
        <form method="POST" action="{{ route('login') }}">
            <div class="mb-3">
                <h3 class="text-center">Login</h3>
            </div>
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="login" class="form-label">
                    Usuário / E-mail
                </label>
                <input id="login" class="form-control" type="text" name="login"
                    @if ($errors->any())  @endif value="{{ old('login') }}" required autofocus
                    autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">
                    Senha
                </label>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="align-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm font-bold text-gray-600">Remeber me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>
    </div>
@endsection

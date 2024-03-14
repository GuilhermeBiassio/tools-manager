<div class="container">
    <form method="POST" action="{{ $action }}">
        @csrf

        @if (isset($user))
            @method('PUT')
        @endif

        <!-- ID -->
        <div class="mb-3">
            <label for="id" class="form-label">
                Código funcionário
            </label>
            <input id="id" class="form-control" type="text" name="id"
                @if ($errors->any()) value="{{ old('id') }}" @endif
                @if (isset($user)) value="{{ $user->id }}" @endif required autofocus
                autocomplete="id" />
        </div>

        <div class="mb-3">
            <label for="id" class="form-label">
                Tipo usuário
            </label>
            <select class="form-select" name="is_admin" aria-label="Default select example" required>
                <option selected disabled>Selecione</option>
                <option value="0" @if (($errors->any() && old('type_user') == 0) || (isset($user) && $user->is_admin == 0)) selected @endif>
                    Usuário</option>
                <option value="1" @if (($errors->any() && old('type_user') == 1) || (isset($user) && $user->is_admin == 1)) selected @endif>Admin</option>
                <option value="2" @if (($errors->any() && old('type_user') == 2) || (isset($user) && $user->is_admin == 2)) selected @endif>Super Admin</option>
            </select>
        </div>

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">
                Nome
            </label>
            <input id="name" class="form-control" type="text" name="name"
                @if ($errors->any()) value="{{ old('name') }}" @endif
                @if (isset($user)) value="{{ $user->name }}" @endif required autofocus
                autocomplete="name" />
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">
                Email
            </label>
            <input id="email" class="form-control" type="email" name="email"
                @if ($errors->any()) value="{{ old('email') }}" @endif
                @if (isset($user)) value="{{ $user->email }}" @endif autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">
                Senha
            </label>
            <input id="password" class="form-control" type="password" name="password"
                @if (!isset($user)) required @endif autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password" class="form-label">
                Confirme a Senha
            </label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                @if (!isset($user)) required @endif autocomplete="new-password" />
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

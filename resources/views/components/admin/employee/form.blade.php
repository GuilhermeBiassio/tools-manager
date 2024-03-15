<div class="container">
    <form method="POST" action="{{ $action }}">
        @csrf

        @if (isset($user))
            @method('PUT')
        @endif

        <!-- ID -->
        <div class="mb-3 col-md-6">
            <label for="id" class="form-label">
                Código funcionário
            </label>
            <input id="id" class="form-control" type="text" name="id"
                @if ($errors->any()) value="{{ old('id') }}" @endif
                @if (isset($user)) value="{{ $user->id }}" @endif @required(true) autofocus
                autocomplete="id" />
        </div>

        <!-- Name -->
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">
                Nome
            </label>
            <input id="name" class="form-control" type="text" name="name"
                @if ($errors->any()) value="{{ old('name') }}" @endif
                @if (isset($user)) value="{{ $user->name }}" @endif @required(true) autofocus
                autocomplete="name" />
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

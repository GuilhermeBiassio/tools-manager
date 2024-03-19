<div class="container">
    <form method="POST" action="{{ $action }}">
        @csrf

        @if (isset($tool))
            @method('PUT')
        @endif

        <!-- Name -->
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">
                Nome ferramenta
            </label>
            <input id="name" class="form-control" type="text" name="name"
                @if ($errors->any()) value="{{ old('name') }}" @endif
                @if (isset($tool)) value="{{ $tool->name }}" @endif @required(true) autofocus
                autocomplete="name" />
        </div>

        <!-- Serial number -->
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">
                Nº de série
            </label>
            <input id="name" class="form-control" type="text" name="serial_number"
                @if ($errors->any()) value="{{ old('serial_number') }}" @endif
                @if (isset($tool)) value="{{ $tool->serial_number }}" @endif autofocus
                autocomplete="name" />
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

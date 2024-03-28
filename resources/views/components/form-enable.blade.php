<form method="POST" action="{{ $action }}" class="ms-3">
    @csrf
    @method('PUT')
    <div class="flex items-center justify-end">
        <button type="submit" class="enable-btn btn btn-success">Ativar</button>
    </div>
</form>

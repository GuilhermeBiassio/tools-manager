<form method="POST" action="{{ $action }}" class="ms-3">
    @csrf
    @method('DELETE')
    <div class="flex items-center justify-end">
        <button type="submit" class="delete-btn btn btn-danger">Excluir</button>
    </div>
</form>

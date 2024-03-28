<form method="POST" action="{{ $action }}" class="m-3">
    @csrf
    @method('DELETE')
    <div class="flex items-center justify-end">
        <button type="submit" class="btn btn-danger">Excluir</button>
    </div>
</form>

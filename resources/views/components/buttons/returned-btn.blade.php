<div class="row row-cols-2">
    <form action="{{ route('link.update', $tool) }}" method="post">
        @csrf
        @method('PUT')
        <button type="button" class="change-btn btn btn-info">
            Devolver
        </button>
    </form>
</div>

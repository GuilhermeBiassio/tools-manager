<div class="container border p-4 mt-4 mb-4 col-12 col-lg-8 rounded">
    <form method="POST" action="{{ $action }}">
        <div class="mb-3">
            <h3 class="text-center">{{ $title }}</h3>
        </div>
        @csrf
        {{ $slot }}
        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="btn btn-primary">{{ $btnTitle }}</button>
        </div>
    </form>
</div>

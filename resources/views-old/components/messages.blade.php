@if (session('success.message'))
    <div class="alert alert-success">
        {{ session('success.message') }}
    </div>
@endif

@if (session('error.message'))
    <div class="alert alert-danger">
        {{ session('error.message') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

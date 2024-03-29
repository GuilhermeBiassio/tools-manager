<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tools Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link rel="stylesheet" href="/assets/css/select2-bootstrap4.min.css">
</head>

<body>

    @if (Auth::check())
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <h3 class="navbar-brend"><a class="link-offset-2 link-underline link-underline-opacity-0"
                        href="/">Tools Manager</a></h3>
                <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>
            </div>
        </nav>

        <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
            aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="staticBackdropLabel">Menu</h5>
                <button type="button" class="btn-close btn-lg" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column">
                    <x-buttons.menu-btn :route="route('link.create')" title="Cadastrar empréstimo" />
                    <x-buttons.menu-btn :route="route('link.index')" title="Ferramentas em uso" />
                    <x-buttons.menu-btn :route="route('link.search')" title="Buscar" />
                    @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                        <x-buttons.menu-btn :route="route('employee.index')" title="Listar funcionários" />
                        <x-buttons.menu-btn :route="route('tool.index')" title="Listar ferramentas" />
                    @endif
                    @if (Auth::user()->is_admin == 2)
                        <x-buttons.menu-btn :route="route('profile.index')" title="Listar usuários" />
                    @endif
                </ul>
            </div>

            <hr>

            <div class="w-100 d-flex flex-column align-items-center">
                <h6>{{ Auth::user()->name }}</h6>
                <form class="w-75 m-3 d-grid gap-2" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-danger">Sair</button>
                </form>
            </div>
        </div>
    @endif
    <div class="container py-3">
        @include('components.messages')
        {{ $slot }}
    </div>
    <script src="/assets/js/js.js"></script>
    <script src="/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/assets/js/select2.min.js"></script>
    {{ $js }}
</body>

</html>

<x-main>
    <x-buttons.add-btn route="{{ route('employee.create') }}" name="Adicionar" />
    <div class="overflow-hidden mt-10 d-flex flex-column justify-content-center">
        @if (!$users->isEmpty())
            <h3 class="font-bold text-center">Lista de usuários</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-4">Código</th>
                        <th scope="col" class="px-6 py-4">Nome</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr scope="row">
                            <td>{{ $user->id }}</td>
                            <td><a href="{{ route('link.show', $user->id) }}">{{ $user->name }}</a></td>
                            <td>
                                <div class="row row-cols-2">
                                    <a href="{{ route('employee.edit', $user->id) }}">
                                        <button type="button" class="btn btn-primary">
                                            Editar
                                        </button>
                                    </a>
                                    <form action="{{ route('employee.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="delete-btn btn btn-danger">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h4>Nenhum registro...</h4>
        @endif
    </div>
    <x-slot name="js"></x-slot>
</x-main>

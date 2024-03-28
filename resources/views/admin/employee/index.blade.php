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
                                <div class="d-flex flex-row row-cols-4">
                                    <x-buttons.add-btn route="{{ route('employee.edit', $user->id) }}" name="Editar" />
                                    @if ($user->active == 0)
                                        @if (Auth::user()->is_admin == 2)
                                            <x-form-enable action="{{ route('employee.enable', $user->id) }}" />
                                        @else
                                            <span>Desativado</span>
                                        @endif
                                    @else
                                        <x-form-delete action="{{ route('employee.destroy', $user->id) }}" />
                                    @endif
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

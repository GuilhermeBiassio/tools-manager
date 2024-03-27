<x-main>
    <x-buttons.add-btn route="{{ route('link.create') }}" name="Adicionar" />
    <div class="overflow-hidden mt-10 d-flex flex-column justify-content-center">
        @if (!$datas->isEmpty() && isset($name))
            <h5 class="font-bold text-center">Ferramentas usadas por {{ $name->name }}</h5>
            <div class="table-responsive-md">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-4">Ferramenta</th>
                            <th scope="col" class="px-6 py-4">Data empréstimo</th>
                            <th scope="col" class="px-6 py-4">Data devolução</th>
                            <th scope="col" class="px-6 py-4">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr scope="row">
                                <td>{{ $data->id_tool . ' - ' . $data->name }}</td>
                                <td>{{ date('d/m/Y H:i', strtotime($data->borrowed)) }}</td>
                                <td>
                                    @if ($data->returned != null)
                                        {{ date('d/m/Y H:i', strtotime($data->returned)) }}
                                    @else
                                        Em uso
                                    @endif
                                </td>
                                <td>
                                    @if ($data->returned == null)
                                        <div class="row row-cols-2">
                                            <form action="{{ route('link.update', $data->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="button" class="change-btn btn btn-info">
                                                    Devolver
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h4>Nenhum registro...</h4>
        @endif
    </div>
    <div class="d-flex justify-content-center">
        {{ $datas->links() }}
    </div>
    <x-slot name="js"></x-slot>
</x-main>

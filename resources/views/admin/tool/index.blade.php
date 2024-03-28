<x-main>
    <div class="d-flex flex-row">
        <x-buttons.add-btn route="{{ route('tool.create') }}" name="Adicionar" />
        <x-buttons.add-btn route="{{ route('tool.qr', 'all') }}" name="QR Code geral" target="_blank" />
    </div>
    <div class="overflow-hidden mt-10 d-flex flex-column justify-content-center">
        @if (!$tools->isEmpty())
            <h3 class="font-bold text-center">Lista de ferramentas</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-4">Código</th>
                        <th scope="col" class="px-6 py-4">Nome</th>
                        <th scope="col" class="px-6 py-4">Nº Série</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tools as $tool)
                        <tr scope="row">
                            <td>{{ $tool->id }}</td>
                            <td>{{ $tool->name }}</td>
                            <td>{{ $tool->serial_number }}</td>
                            <td>
                                <div class="d-flex flex-row">
                                    <x-buttons.add-btn route="{{ route('tool.edit', $tool->id) }}" name="Editar" />
                                    <x-form-delete action="{{ route('tool.destroy', $tool->id) }}" />
                                    <x-buttons.add-btn route="{{ route('tool.qr', $tool->id) }}" name="QR Code"
                                        target="_blank" />
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

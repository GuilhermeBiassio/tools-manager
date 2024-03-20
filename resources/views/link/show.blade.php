@extends('components.main')

@section('content')
    <div class="h-screen w-full flex justify-center">
        <div class="flex flex-col w-[60%]">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <a href="{{ route('employee.create') }}" class="self-start">
                        <button type="button" class="btn btn-primary" data-te-ripple-init>
                            <span class="font-bold">Adicionar</span>
                        </button>
                    </a>
                    <div class="overflow-hidden mt-10 d-flex flex-column justify-content-center">
                        @if (!$datas->isEmpty() && isset($name))
                            <h3 class="font-bold text-center">Ferramentas usadas por {{ $name->name }}</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Ferramenta</th>
                                        <th scope="col" class="px-6 py-4">Data empréstimo</th>
                                        <th scope="col" class="px-6 py-4">Data devolução</th>
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h4>Nenhum registro...</h4>
                        @endif
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $datas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

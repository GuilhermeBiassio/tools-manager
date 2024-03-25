@extends('components.main')

@section('content')
    <div class="h-screen w-full flex justify-center">
        <div class="flex flex-col w-[60%]">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <a href="{{ route('link.create') }}" class="self-start">
                        <button type="button" class="btn btn-primary" data-te-ripple-init>
                            <span class="font-bold">Adicionar</span>
                        </button>
                    </a>
                    <div class="overflow-hidden mt-10 d-flex flex-column justify-content-center">
                        @if (!$tools->isEmpty())
                            <h3 class="font-bold text-center">Ferramentas em uso</h3>
                            <div class="table-responsive-md">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Código</th>
                                            <th scope="col" class="px-6 py-4">Ferramenta</th>
                                            <th scope="col" class="px-6 py-4">Nº Série</th>
                                            <th scope="col" class="px-6 py-4">Funcionário</th>
                                            <th scope="col" class="px-6 py-4">Data empréstimo</th>
                                            <th scope="col" class="px-6 py-4">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tools as $tool)
                                            <tr scope="row">
                                                <td>{{ $tool->id }}</td>
                                                <td>{{ $tool->tool_name }}</td>
                                                <td>{{ $tool->serial_number }}</td>
                                                <td>
                                                    <a href="{{ route('link.show', $tool->id_employee) }}">
                                                        {{ $tool->employee_name }}
                                                    </a>
                                                </td>
                                                <td>{{ date('d/m/Y H:i', strtotime($tool->borrowed)) }}</td>
                                                <td>
                                                    <div class="row row-cols-2">
                                                        <form action="{{ route('link.update', $tool->id) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="button" class="change-btn btn btn-info">
                                                                Devolver
                                                            </button>
                                                        </form>
                                                    </div>
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
                </div>
            </div>
        </div>
    </div>
@endsection

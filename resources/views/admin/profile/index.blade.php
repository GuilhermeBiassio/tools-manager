@extends('components.main')
@section('content')
    <div class="h-screen w-full flex justify-center">
        <div class="flex flex-col w-[60%]">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <a href="{{ route('profile.create') }}" class="self-start">
                        <button type="button" class="btn btn-primary" data-te-ripple-init>
                            <span class="font-bold">Adicionar</span>
                        </button>
                    </a>
                    <div class="overflow-hidden mt-10">
                        @if (!$users->isEmpty())
                            <h3 class="font-bold text-center">Lista de usuários</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Nome</th>
                                        <th scope="col" class="px-6 py-4">Email</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr scope="row">
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <div class="row row-cols-2">
                                                    <a href="{{ route('profile.edit', $user->id) }}">
                                                        <button type="button" class="btn btn-primary">
                                                            Editar
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('profile.destroy', $user->id) }}" method="post">
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

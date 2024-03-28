@php
    if (isset($user)) {
        $method = 'PUT';
        $id = $user->id;
        $name = $user->name;
        $operation = 'Alterar';
    } else {
        $method = 'POST';
        $id = '';
        $name = '';
        $operation = 'Cadastrar';
    }
@endphp
<x-main>
    <x-form action="{{ $action }}" title="{{ $operation }} funcionário" btnTitle="Enviar">
        @method($method)
        <!-- ID -->
        <x-input name="id" label="Código funcionário" type="text" value="{{ $id }}" />
        <!-- Name -->
        <x-input name="name" label="Nome" type="text" value="{{ $name }}" />
    </x-form>
    <x-slot name="js"></x-slot>
</x-main>

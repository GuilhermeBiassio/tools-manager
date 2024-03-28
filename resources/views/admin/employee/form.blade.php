@php
    if (isset($user)) {
        $id = $user->id;
        $name = $user->name;
    } elseif ($errors->any()) {
        $id = old('id');
        $name = old('name');
    } else {
        $id = '';
        $name = '';
    }
@endphp
<x-main>
    <x-form action="{{ $action }}" title="Cadastro de funcionário" btnTitle="Enviar">
        @if (isset($user))
            @method('PUT')
        @endif
        <!-- ID -->
        <x-input name="id" label="Código funcionário" type="text" value="{{ $id }}" />
        <!-- Name -->
        <x-input name="name" label="Nome" type="text" value="{{ $name }}" />
    </x-form>
    <x-slot name="js"></x-slot>
</x-main>

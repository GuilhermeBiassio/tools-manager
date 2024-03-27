<x-main>
    <x-form action="{{ $action }}" title="Cadastrar funcionário" btnTitle="Enviar">
        <!-- ID -->
        <x-input name="id" label="Código funcionário" type="text" />
        <!-- Name -->
        <x-input name="name" label="Nome" type="text" />
    </x-form>
    <x-slot name="js"></x-slot>
</x-main>

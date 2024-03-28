<x-main>
    <x-form action="{{ $action }}" title="Cadastro de ferramentas" btnTitle="Enviar">
        <x-input name="name" label="Nome ferramenta" type="text" value="" />
        <x-input name="serial_number" label="N° de série" type="text" value="" />
    </x-form>
    <x-slot name="js"></x-slot>
</x-main>

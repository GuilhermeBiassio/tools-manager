@php
    if (isset($tool)) {
        $name = $tool->name;
        $serial = $tool->serial_number;
    } elseif ($errors->any()) {
        $name = old('name');
        $serial = old('serial_number');
    } else {
        $name = '';
        $serial = '';
    }
@endphp
<x-main>
    <x-form action="{{ $action }}" title="Cadastro de ferramentas" btnTitle="Enviar">
        @if (isset($tool))
            @method('PUT')
        @endif
        <x-input name="name" label="Nome ferramenta" type="text" value="{{ $name }}" />
        <x-input name="serial_number" label="N° de série" type="text" value="{{ $serial }}" />
    </x-form>
    <x-slot name="js"></x-slot>
</x-main>

<x-form action="{{ $action }}" title="Cadastrar funcionário" btnTitle="Enviar">
    <!-- ID -->
    <x-input name="id" label="Código funcionário" type="text"
        @if (isset($user)) :value="{{ $user->id }}" @else :value="" @endif />
    <!-- Name -->
    <x-input name="name" label="Nome" type="text"
        @if (isset($user)) :value="{{ $user->name }}" @else :value="" @endif />
</x-form>

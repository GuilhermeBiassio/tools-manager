@php
    if (isset($user)) {
        $id = $user->id;
        $is_admin = $user->is_admin;
        $name = $user->name;
        $email = $user->email;
    } elseif ($errors->any()) {
        $id = old('id');
        $is_admin = old('is_admin');
        $name = old('name');
        $email = old('email');
    } else {
        $id = '';
        $is_admin = '';
        $name = '';
        $email = '';
    }
@endphp
<x-main>
    <x-form action="{{ $action }}" title="Cadastrar usuário" btnTitle="Enviar">
        @if (isset($user))
            @method('PUT')
        @endif
        <x-input label="Código funcionário" name="id" value="{{ $id }}" type="text" />
        <x-select name="is_admin" label="Tipo usuário">
            <option value="0" @if ($is_admin == 0) selected @endif>Usuário</option>
            <option value="1" @if ($is_admin == 1) selected @endif>Admin</option>
            <option value="2" @if ($is_admin == 2) selected @endif>Super Admin</option>
        </x-select>
        <x-input label="Nome" name="name" value="{{ $name }}" type="text" />
        <x-input label="E-mail" name="email" value="{{ $email }}" type="email" />
        <x-input label="Senha" name="password" value="" type="password" />
        <x-input label="Confirme a senha" name="password_confirmation" value="" type="password" />
    </x-form>
    <x-slot name="js"></x-slot>
</x-main>

<x-main>
    <x-form action="route('login')" title="Login" btnTitle="Entrar">
        <!-- Email Address -->
        <x-input name="login" label="Usuário / E-mail" type="text" />

        <!-- Password -->
        <x-input name="password" label="Senha" type="password" />

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="align-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm font-bold text-gray-600">Remeber me</span>
            </label>
        </div>
    </x-form>
</x-main>

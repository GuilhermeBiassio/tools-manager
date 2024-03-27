<x-main>
    <x-form action="{{ route('link.search') }}" title="Buscar" btnTitle="Buscar">
        <x-input name="start" label="Data inicial" type="date" />
        <x-input name="end" label="Data final" type="date" />
        <x-select name="tool" label=Ferramenta>
            @if (isset($tools))
                @foreach ($tools as $tool)
                    <option value="{{ $tool['id'] }}" @if ($errors->any() && old('tool') == $tool['id']) selected @endif>
                        {{ $tool['name'] }}</option>
                @endforeach
            @endif
        </x-select>
        <x-select name="employee" label="Funcionário">
            @if (isset($employees))
                @foreach ($employees as $employee)
                    <option value="{{ $employee['id'] }}" @if ($errors->any() && old('employee') == $employee['id']) selected @endif>
                        {{ $employee['id'] . ' - ' . $employee['name'] }}</option>
                @endforeach
            @endif
        </x-select>
    </x-form>
    <x-slot name="js">

    </x-slot>
</x-main>

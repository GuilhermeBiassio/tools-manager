<div class="mb-3 input-group-lg">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select id="{{ $name }}" {{ $attributes->merge(['class' => 'form-select']) }} name="{{ $name }}"
        aria-label="Default select example">
        <option selected disabled value="">Selecione</option>
        {{ $slot }}
    </select>
</div>

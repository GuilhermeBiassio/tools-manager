<div {{ $attributes->merge(['class' => 'mb-3']) }}>
    <label for="{{ $name }}" class="form-label">
        {{ $label }}
    </label>
    <input id="{{ $name }}" class="form-control" type="{{ $type }}" name="{{ $name }}"
        value="{{ $value }}" autofocus />
</div>

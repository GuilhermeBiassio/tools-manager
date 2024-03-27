<div {{ $attributes->merge(['class' => 'mb-3']) }}>
    <label for="{{ $name }}" class="form-label">
        {{ $label }}
    </label>
    <input id="{{ $name }}" class="form-control" type="{{ $type }}" name="{{ $name }}"
        @if ($errors->any()) value="{{ old("$name") }}" @endif
        @if (isset($value)) value="{{ $value }}" @endif required autofocus
        autocomplete="username" />
</div>

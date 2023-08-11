<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $id }}"
        placeholder="{{ $placeholder }}" value="{{ old($name) ?? $value }}">
    @error($name)
        <p class="text-danger small">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $id }}" class="form-control">
        {{ $slot }}
    </select>
    @error($name)
        <p class="text-danger small">{{ $message }}</p>
    @enderror
</div>

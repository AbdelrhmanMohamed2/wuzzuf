<div class="form-group">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input class="form-control" type="file" name="{{ $name }}" id="{{ $id }}">
    @error($name)
        <p class="text-danger small">{{ $message }}</p>
    @enderror
</div>

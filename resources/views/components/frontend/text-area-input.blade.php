<div class="row form-group">
    <div class="col-md-12 mb-3 mb-md-0">
        <label for="{{ $id }}">{{ $label }}</label>
        <textarea name="{{ $name }}" class="form-control" id="{{ $id }}" cols="30" rows="5">{{ old($name) ??  $value }}</textarea>
        @error($name)
            <p class="text-danger small">{{ $message }}</p>
        @enderror
    </div>
</div>

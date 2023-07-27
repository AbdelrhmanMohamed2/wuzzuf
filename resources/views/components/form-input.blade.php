<div class="col-sm-{{ $col }}">

    <div class="form-group">
        <label for="{{ $name }}">{{ $label }}</label>
        <input type="{{ $type }}" value="{{ old($name) ?? $value }}" name="{{ $name }}"
            @class([
                'form-control',
                'is-invalid' => $errors->has($name),
                'is-valid' => !$errors->has($name) && old($name),
            ]) id="{{ $name }}" placeholder="{{ $placeholder }}">
        @error($name)
            <span id="{{ $name }}-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

</div>

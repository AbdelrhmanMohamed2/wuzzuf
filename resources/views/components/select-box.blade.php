<div class="col-sm-{{ $col }}">
    <label>{{ $label }}</label>
    <select class="form-control" id="{{ $name }}" name="{{ $name }}" @class([
        'form-control',
        'is-invalid' => $errors->has($name),
        'is-valid' => !$errors->has($name) && old($name),
    ])>

    {{ $slot }}
    </select>
    @error($name)
        <span id="{{ $name }}-error" class="error text-danger" style=" font-size:80%">{{ $message }}</span>
    @enderror
</div>

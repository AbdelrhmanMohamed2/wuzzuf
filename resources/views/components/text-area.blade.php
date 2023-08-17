<div class="col-sm-{{ $col }}">
    <!-- textarea -->
    <div class="form-group">
        <label>{{ $label }}</label>
        <textarea class="form-control" name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}"
            placeholder="{{ $placeholder }}">{{ $value }}</textarea>
    </div>
    @error($name)
        <span id="" class="text-danger small">{{ $message }}</span>
    @enderror
</div>

<div class="col-sm-{{ $col }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="{{ $name }}" id="{{ $name }}">
            <label class="custom-file-label" for="{{ $name }}">Choose file</label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text">Upload</span>
        </div>
    </div>
    @error($name)
        <span id="{{ $name }}-error" class="error text-danger" style=" font-size:80%">{{ $message }}</span>
    @enderror

    @if ($oldimage !== 'null')
        <img src="{{ $oldimage }}" width="200" height="200" class="img-thumbnail">
    @endif
</div>

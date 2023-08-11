<form action="{{ $action }}" method="POST" class="bg-white p-5 contact-form"
    @if ($file) enctype="multipart/form-data" @endif>
    @csrf
    @method($method)
    {{ $slot }}
    <div class="form-group">
        <input type="submit" value="{{ $value }}" class="btn btn-primary py-3 px-5">
    </div>
</form>

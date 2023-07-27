<form action="{{ route($route, $model) }}" method="post" @if ($files) enctype="multipart/form-data" @endif>
    @csrf
    @if ($method)
        @method($method)
    @endif
    <div class="card-body">
            {{ $slot }}
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-info">{{ $btn }}</button>
    </div>
</form>

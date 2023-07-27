<table class="table table-bordered table-hover table-striped">
    <thead class="">
        <tr>
            @foreach ($numberOfColumns as $col)
                <th>{{ $col }}</th>
            @endforeach

        </tr>
    </thead>
    <tbody>

        {{ $slot }}

    </tbody>
</table>

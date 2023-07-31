<div class="row m-4">
    <x-select-box col=3 name="company_size" label='Company Size:'>
        <option selected>Company Size:</option>
        @foreach ($company_sizes as $size)
            <option value="{{ $size->id }}">{{ $size->name }}</option>
        @endforeach
    </x-select-box>

    <x-select-box col=3 name="industry" label='Industry'>
        <option selected>Industry</option>
        @foreach ($industries as $industry)
            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
        @endforeach
    </x-select-box>

    <x-form-input col=6 name='location' type='text' label='Location' placeholder='Enter Location'>
    </x-form-input>

</div>

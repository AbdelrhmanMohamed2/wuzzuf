<div class="row m-4">
    <x-select-box col=2 name="country_id" label='Country'>
        <option selected>Country</option>
        @foreach ($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
        @endforeach
    </x-select-box>

    <x-select-box col=2 name="city_id" label='City'>
        <option selected>City</option>
    </x-select-box>

    <x-select-box col=2 name="area_id" label='Area'>
        <option selected>Area</option>
    </x-select-box>

    <x-select-box col=2 name="job_type" label='Job Type'>
        <option selected>Job Type</option>
        @foreach ($job_types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
    </x-select-box>

    <x-select-box col=2 name="career_level" label='Career Level'>
        <option selected>Career Level</option>
        @foreach ($career_levels as $level)
            <option value="{{ $level->id }}">{{ $level->name }}</option>
        @endforeach
    </x-select-box>

    <x-select-box col=2 name="job_category" label='Job Category'>
        <option selected>Job Category</option>
        @foreach ($job_categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </x-select-box>

</div>

<div class="row">
    <div class="col-6">
        <a href="{{ route('dashboard.settings.create', 'services') }}" class="btn btn-primary">Add New Service</a>
    </div>
</div>

<div class="row">
    @foreach ($all_settings->where('key', 'service') as $service)
        <div class="col-4">
            @php
                $data = json_decode($service->value, false);
            @endphp
            <x-form btn='Update' route='dashboard.settings.update' :model="$service" method='put'>
                <x-form-input name='name' :value="$data->name" placeholder='Enter Setting Value' type='text'
                    label='Sub Card Name'></x-form-input>

                <x-form-input name='icon' :value="$data->icon" placeholder='Enter Setting Value' type='text'
                    label='Sub Card Icon'></x-form-input>

                <x-form-input name='description' :value="$data->description" placeholder='Enter Setting Value' type='text'
                    label='Sub Card Description'></x-form-input>
            </x-form>
            <x-form btn='Delete' route='dashboard.settings.destroy' color='danger' :model="[$service, 'service']" method='delete'>
                @csrf
            </x-form>
        </div>
    @endforeach

</div>

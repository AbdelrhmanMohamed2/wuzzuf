<div class="row">
    <div class="col-6">
        <x-form btn='Update' route='dashboard.settings.update' :model="$all_settings->where('key', 'description')->first()" method='put'>
            <x-form-input name='value' :value="$all_settings->where('key', 'description')->first()->value" placeholder='Enter Setting Value' type='text'
                label='Description'></x-form-input>
        </x-form>
    </div>
    <div class="col-6">
        <x-form btn='Update' route='dashboard.settings.update' :model="$all_settings->where('key', 'address')->first()" method='put'>
            <x-form-input name='value' :value="$all_settings->where('key', 'address')->first()->value" placeholder='Enter Setting Value' type='text'
                label='Address'></x-form-input>
        </x-form>
    </div>

    <div class="col-6">
        <x-form btn='Update' route='dashboard.settings.update' :model="$all_settings->where('key', 'phone')->first()" method='put'>
            <x-form-input name='value' :value="$all_settings->where('key', 'phone')->first()->value" placeholder='Enter Setting Value' type='text'
                label='Phone'></x-form-input>
        </x-form>
    </div>

    <div class="col-6">
        <x-form btn='Update' route='dashboard.settings.update' :model="$all_settings->where('key', 'email')->first()" method='put'>
            <x-form-input name='value' :value="$all_settings->where('key', 'email')->first()->value" placeholder='Enter Setting Value' type='text'
                label='Email'></x-form-input>
        </x-form>
    </div>

    <div class="col-6">
        <x-form btn='Update' route='dashboard.settings.update' :model="$all_settings->where('key', 'copyright')->first()" method='put'>
            <x-form-input name='value' :value="$all_settings->where('key', 'copyright')->first()->value" placeholder='Enter Setting Value' type='text'
                label='Copyright'></x-form-input>
        </x-form>
    </div>
</div>

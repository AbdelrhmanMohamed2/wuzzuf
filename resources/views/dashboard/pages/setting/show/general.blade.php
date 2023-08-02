<div class="col-12">
    <x-form btn='Update' route='dashboard.settings.update' :model="$all_settings->where('key','site_name')->first()" method='put'>
        <x-form-input name='value' :value="$all_settings->where('key','site_name')->first()->value" placeholder='Enter Setting Value' type='text'
            label='Site Name'></x-form-input>
    </x-form>

    <x-form btn='Update' route='dashboard.settings.update' :model="$all_settings->where('key','site_version')->first()" method='put'>
        <x-form-input name='value' :value="$all_settings->where('key','site_version')->first()->value" placeholder='Enter Setting Value' type='text'
            label='Site Version'></x-form-input>
    </x-form>

    <x-form btn='Update' route='dashboard.settings.update' :files="true" :model="$all_settings->where('key','site_logo')->first()" method='put'>
        <x-file-input col=6 name='image' label='Site Logo'></x-file-input>
    </x-form>
</div>

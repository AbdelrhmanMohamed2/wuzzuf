<div class="row">
    <div class="col-6">
        <a href="{{ route('dashboard.settings.create', 'social_links') }}" class="btn btn-primary">Add New Social Link</a>
    </div>
</div>

<div class="row">
    @foreach ($all_settings->where('key', 'social_link') as $account)
        <div class="col-4">
            @php
                $data = json_decode($account->value, false);
            @endphp
            <x-form btn='Update' route='dashboard.settings.update' :model="$account" method='put'>
                <x-form-input name='link' :value="$data->link" placeholder='Enter Setting Value' type='text'
                    label='Social Link'></x-form-input>

                <x-form-input name='icon' :value="$data->icon" placeholder='Enter Setting Value' type='text'
                    label='Social Icon'></x-form-input>

            </x-form>

            <x-form btn='Delete' route='dashboard.settings.destroy' color='danger' :model="[$account, 'social_link']" method='delete'>
                @csrf
            </x-form>

        </div>
    @endforeach
</div>

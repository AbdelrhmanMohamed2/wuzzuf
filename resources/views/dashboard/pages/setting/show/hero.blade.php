<div class="row">
    <div class="col-6">
        <a href="{{ route('dashboard.settings.create', 'hero') }}" class="btn btn-primary">Add New Card</a>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <x-form btn='Update' route='dashboard.settings.update' :model="$all_settings->where('key', 'main_title')->first()" method='put'>
            <x-form-input name='value' :value="$all_settings->where('key', 'main_title')->first()->value" placeholder='Enter Setting Value' type='text'
                label='Main Title'></x-form-input>
        </x-form>
    </div>
    <div class="col-6">
        <x-form btn='Update' route='dashboard.settings.update' :model="$all_settings->where('key', 'sub_title')->first()" method='put'>
            <x-form-input name='value' :value="$all_settings->where('key', 'sub_title')->first()->value" placeholder='Enter Setting Value' type='text'
                label='Sub Title'></x-form-input>
        </x-form>
    </div>
</div>
<hr>
<hr>
<div class="row">
    @foreach ($all_settings->where('key', 'main_cards') as $card)
        @php
            $data = json_decode($card->value, false);
        @endphp
        <div class="col-4">
            <x-form btn='Update' route='dashboard.settings.update' :model="$card" method='put'>
                <x-form-input name='name' :value="$data->name" placeholder='Enter Setting Value' type='text'
                    label='Main Cards Name'></x-form-input>

                <x-form-input name='icon' :value="$data->icon" placeholder='Enter Setting Value' type='text'
                    label='Main Cards Icon'></x-form-input>

                <x-form-input name='number' :value="$data->number" placeholder='Enter Setting Value' type='text'
                    label='Main Cards Number'></x-form-input>


            </x-form>
            <x-form btn='Delete' route='dashboard.settings.destroy' color='danger' :model="[$card, 'main_cards']" method='delete'>
                @csrf
            </x-form>
        </div>
    @endforeach
</div>

<hr>
<hr>


<div class="row">
    @foreach ($all_settings->where('key', 'sub_cards') as $card)
        <div class="col-4">
            @php
                $data = json_decode($card->value, false);
            @endphp
            <x-form btn='Update' route='dashboard.settings.update' :model="$card" method='put'>
                <x-form-input name='name' :value="$data->name" placeholder='Enter Setting Value' type='text'
                    label='Sub Card Name'></x-form-input>

                <x-form-input name='icon' :value="$data->icon" placeholder='Enter Setting Value' type='text'
                    label='Sub Card Icon'></x-form-input>

                <x-form-input name='description' :value="$data->description" placeholder='Enter Setting Value' type='text'
                    label='Sub Card Description'></x-form-input>
            </x-form>
            <x-form btn='Delete' route='dashboard.settings.destroy' color='danger' :model="[$card, 'sub_cards']" method='delete'>
                @csrf
            </x-form>
        </div>
    @endforeach

</div>

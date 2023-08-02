<div class="row">
    <div class="col-12">
        <x-form btn='Add' route='dashboard.settings.store' model='service'>
            <x-form-input name='name' placeholder='Enter Service name' type='text'
                label='Sub Card Name'></x-form-input>

            <x-form-input name='icon' placeholder='Enter Service icon' type='text'
                label='Sub Card Icon'></x-form-input>

            <x-form-input name='description' placeholder='Enter Service Description' type='text'
                label='Sub Card Description'></x-form-input>
        </x-form>
    </div>
</div>

<div class="row">

    <div class="col-12">
        <x-form btn='Add Main Card' route='dashboard.settings.store' model="main_cards">
            <x-form-input name='name' placeholder='Enter Main Cards Name' type='text'
                label='Main Cards Name'></x-form-input>

            <x-form-input name='icon' placeholder='Enter Main Cards icon' type='text'
                label='Main Cards Icon'></x-form-input>

            <x-form-input name='number' placeholder='Enter Main Cards number' type='text'
                label='Main Cards Number'></x-form-input>
        </x-form>
    </div>
</div>

<hr>
<hr>


<div class="row">
    <div class="col-12">

        <x-form btn='Add Sub Card' route='dashboard.settings.store' model="sub_cards">
            <x-form-input name='name' placeholder='Enter Sub Card Name' type='text'
                label='Sub Card Name'></x-form-input>

            <x-form-input name='icon' placeholder='Enter Sub Card icon' type='text'
                label='Sub Card Icon'></x-form-input>

            <x-form-input name='description' placeholder='Enter Sub Card Description' type='text'
                label='Sub Card Description'></x-form-input>
        </x-form>
    </div>

</div>

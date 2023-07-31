<div class="row">
    <x-select-box col=2 label='Degree' name='degree_id'>
        <option value="">Select Degree Level</option>
        @foreach ($degrees as $degree)
            <option value="{{ $degree->id }}">{{ $degree->name }}</option>
        @endforeach
    </x-select-box>

    <x-select-box col=2 label='Grade' name='grade_id'>
        <option value="">Select Grade</option>
        @foreach ($grades as $grade)
            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
        @endforeach
    </x-select-box>

    <x-form-input col=3 name='university' placeholder='Enter University name' type='text' label='University'></x-form-input>

    <x-select-box col=2 label='Language' name='language_id'>
        <option value="">Select Language</option>
        @foreach ($languages as $lang)
            <option value="{{ $lang->id }}">{{ $lang->name }}</option>
        @endforeach
    </x-select-box>

    <x-form-input col=3 name='skill' placeholder='Enter Skill name' type='text' label='Skill'></x-form-input>

</div>

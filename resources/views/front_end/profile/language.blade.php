@extends('front_end.profile.profile-master')

@section('css')
    <style>
        .list-group-item {
            display: flex;
            justify-content: space-between;
            /* Spread content to both ends of the list item */
            align-items: center;
            /* Center align content vertically */
        }

        .delete-form {
            display: inline;
            /* Display the form as inline */
        }

        .delete-button {
            background: none;
            border: none;
            padding: 0;
            color: red;
            cursor: pointer;
        }
    </style>
@endsection
@section('page-title', 'Language')


@section('profile-content')
    <x-frontend.form :file=false :action="route('profile.language.store')" value='Add' method='POST'>
        <x-frontend.text-input value="" id='language' name='name' type='text' label='Language'
            placeholder='Add Language'></x-frontend.text-input>
    </x-frontend.form>
    <div class="col-12">

        <ul class="list-group">
            @forelse ($languages as $language)
                <li class="list-group-item">
                    {{ $language->name }}
                    <form action="{{ route('profile.language.destroy', $language) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </li>
            @empty
                <p class="text-danger small">no languages add yet.</p>
            @endforelse
        </ul>

    </div>
@endsection

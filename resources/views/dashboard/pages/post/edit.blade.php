@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Posts')
@section('page_main_title', 'Posts')
@section('page_name', 'Posts')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">Update Post : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-form btn='Update' method='PUT' route='dashboard.posts.update' :model="$post" :files="true">

                <x-form-input col=12 name='title' placeholder='Enter Post Title' type='text'
                    label='Title' :value="$post->title"></x-form-input>
                <x-text-area col=12 :value="old('body') ?? $post->body" name='body' placeholder='Enter Post Body' rows=3 label='Post Body'>
                </x-text-area>

                <x-form-input col=12 name='reading_time' type='number' label='Reading Time'
                    placeholder='Reading Time in minutes' :value="$post->reading_time">
                </x-form-input>
                <x-select-box col=12 label='Post Category' name='post_category_id'>
                    <option value="">-- Select Post Category --</option>
                    @foreach ($post_categories as $category)
                        <option value="{{ $category->id }}" @selected($category->id == old('post_category_id') || $category->id == $post->post_category_id)>{{ $category->name }}</option>
                    @endforeach
                </x-select-box>
                <x-file-input col=12 name='image' label='Image'></x-file-input>
            </x-form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Company Sizes')
@section('page_main_title', 'Company Sizes')
@section('page_name', 'Company Sizes')

@section('css')
@endsection

@section('content')
    <div class="card card-lightblue">
        <div class="card-header ">
            <h3 class="card-title">All Company Sizes : </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <x-table :numberOfColumns="['#', 'name', 'range', 'actions']">
                @foreach ($company_sizes as $company_size)
                    <tr>

                        <td>{{ $company_sizes->firstItem() + $loop->index }}</td>
                        <td>{{ $company_size->name }}</td>
                        <td>{{ $company_size->range_of_employees }}</td>
                        <td>
                            <a href="{{ route('dashboard.companySizes.edit', $company_size) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button class="btn btn-danger" form="delete-form-{{ $loop->index }}" type="submit"><i
                                    class="fa-solid fa-trash"></i> Delete</button>
                            <form action="{{ route('dashboard.companySizes.destroy', $company_size) }}" method="post"
                                id="delete-form-{{ $loop->index }}">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $company_sizes->links('pagination::custom') }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection

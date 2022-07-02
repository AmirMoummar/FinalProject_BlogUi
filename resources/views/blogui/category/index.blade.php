@extends('blogui.parent')

@section('title' , 'Index')

@section('css')

@endsection

@section('Main-title' , 'Index Category')

@section('sub-title' , '  Category')
@section('content')
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Categories</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categories.create') }}">Add New Category</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>

            <th>Name</th>
            <th>Status</th>

            <th width="280px">Actions</th>
        </tr>
        @foreach ($categories as $category)
            <tr>

                <td>{{ $category->name }}</td>
                <td>{{ $category->status }}</td>

                <td>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('categories.show', $category->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $categories->links() !!}



@endsection

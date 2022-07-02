@extends('blogui.parent')

@section('title' , 'Index')

@section('css')

@endsection

@section('Main-title' , 'Index Post')

@section('sub-title' , '  Post')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <a href="{{ route('posts.create') }}" type="submit" class="btn btn-info">Creat New Post </a>



                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p> {{ $message }}</p>
                    </div>
                @endif
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-bordered table-striped text-nowrap">
                        <thead>
                            <tr>


                                {{-- <th>Name</th> --}}
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>

                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->user->name }}</td>




                                    <td>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">

                                            <a class="btn btn-info" href="{{ route('posts.show', $post->id) }}">Show</a>

                                            <a class="btn btn-primary"
                                                href="{{ route('posts.edit', $post->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>



                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>
    {{ $posts->links() }}
@endsection

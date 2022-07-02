@extends('blogui.parent')

@section('title' , 'Index')

@section('css')

@endsection

@section('Main-title' , 'Index User')

@section('sub-title' , '  User')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <a href="{{ route('users.create') }}" type="submit" class="btn btn-info">Creat New User </a>



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


                                <th>name</th>
                                <th>Email</th>
                                <th>Date</th>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    {{-- <td>{{ $user->id }}</td> --}}


                                    {{-- <td>{{ $user->image }}</td> --}}


                                    {{-- <td>{{ $user->user->mobile }}</td> --}}
                                    {{-- <td>{{ $user->user->gender }}</td> --}}
                                    {{-- <td>{{ $user->user->status }}</td> --}}






                                    {{-- <td><span class="badge bg-primary">{{ $user->country->name }} </span></td> --}}


                                    <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                                            <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>

                                            <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>

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
                {{-- {{ $users->links() }} --}}
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    {!! $users->links() !!}
@endsection

@section('scripts')
    <script></script>


@endsection

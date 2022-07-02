@extends('blogui.parent')

@section('title' , 'Show')

@section('css')

@endsection

@section('Main-title' , 'Show User')

@section('sub-title' , '  User')

@section('content')

<div class="row" style="margin-bottom: 20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Show User</h3>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Price:</strong>
            {{ $user->email }}
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection


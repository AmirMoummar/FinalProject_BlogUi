@extends('blogui.parent')

@section('title' , 'Show')

@section('css')

@endsection

@section('Main-title' , 'Show Post')

@section('sub-title' , '  Post')
@section('content')

<div class="row" style="margin-bottom: 20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Show Post</h3>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {{ $post->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Content:</strong>
            {{ $post->content }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Category Name:</strong>
            {{ $post->category->name }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Category Name:</strong>
            {{ $post->user->name }}
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection


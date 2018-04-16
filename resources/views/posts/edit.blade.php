@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">

            <form action="{{url('posts/update')}}" method="post" class="form-horizontal" role="form">

                {{csrf_field()}}
                <input type="hidden" name="id" id="id" value="{{$post->id}}"/>
                <div class="form-group">
                    <legend>Edit Post: {{$post->title}}</legend>
                </div>

                @if(session('message'))
                    <p class="alert alert-success">{{session('message')}}</p>
                @endif

                <div class="form-group">
                    <span for="inputTitle">Title:</span>
                    <input type="text" name="title" id="inputTitle" class="form-control" value="{{$post->title}}"/>
                </div>

                <div class="form-group">
                    <span for="inputBody">Body:</span>
                    <textarea name="body" id="inputBody" class="form-control" rows="6">{{$post->body}}</textarea>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-ms-offset-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            <form action="">

            </form>
        </div>
    </div>
</div>
@endsection
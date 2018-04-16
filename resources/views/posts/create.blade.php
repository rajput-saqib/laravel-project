@extends('layouts.app')

@section('title', 'Create New Post')

@section('content')
<div class="container">
    <div class="row">

        {{session()->put('token', 'session key not exist set some values...419')}}

        <div class="col-sm-6 col-sm-offset-3">

            <form action="{{url('posts')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">

                {{csrf_field()}}
                <div class="form-group">
                    <legend>Create New Post</legend>
                </div>

               <!-- @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <li class="alert alert-danger">{{$error}}</li>
                    @endforeach
                @endif-->

                @if(session('message'))
                    <p class="alert alert-success">{{session('message')}}</p>
                @endif

                @if(session('flash_msg'))
                    <p class="alert alert-danger">{{session('flash_msg')}}</p>
                @endif

                <div class="form-group">
                    <span for="inputTitle">Title:</span>
                    <input type="text" name="title" id="inputTitle" class="form-control" value="{{old('title')}}"/>

                    @if($errors->has('title'))
                        <span class="help-block">
                            <strong class="alert alert-danger">{{$errors->first('title')}}</strong>
                        </span>
                    @endif

                </div>

                <div class="form-group">
                    <span for="inputBody">Body:</span>
                    <textarea name="body" id="inputBody" class="form-control" rows="6">{{old('body')}}</textarea>

                    @if($errors->has('body'))
                        <span class="help-block">
                            <strong class="alert alert-danger">{{$errors->first('body')}}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <span for="inputThumbnail">Thumbnail:</span>
                    <input type="file" name="thumbnail" id="inputThumbnail" class="form-control" />
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
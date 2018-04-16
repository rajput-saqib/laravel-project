@extends('layouts.app')

@section('title', 'All Posts')
@section('content')
<div class="container">

    @if(session('message'))
        <p class="alert alert-success">{{session('message')}}</p>
    @endif


    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-sm-2 col-sm-offset-2">
                    @if($post->thumbnail)
                        <div class="thumbnail">
                            <img src="{{url('public/images/'.$post->thumbnail)}}" alt="{{url('images/'.$post->thumbnail)}}" style="height: 100px">
                        </div>
                    @endif
                </div>

                <div class="col-sm-8">
                    <h2><a href="{{url('posts/'.$post->id)}}">{{$post->title}}</a></h2>
                    <p>{{$post->body}}</p>

                    <a href="{{url('posts/'.$post->id.'/edit')}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('posts/'.$post->id.'/delete')}}" class="btn btn-primary">Delete</a>
                </div>
            </div>
        @endforeach
    @else
        <p>Posts not found.</p>
    @endif


        <div class="row">
            {{ $posts->links() }}
        </div>
</div>
@endsection
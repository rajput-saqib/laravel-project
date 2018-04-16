@extends('layouts.app')

@section('title', 'Post')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <artical>
                <h1>{{$post->title}}</h1>
                <p>{{$post->body}}</p>
            </artical>
        </div>
    </div>
</div>

@endsection
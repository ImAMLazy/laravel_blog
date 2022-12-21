@extends('layouts.app')
@section('content')
    @include('partials.post-card')
    <h3 class="m-4">Comments</h3>

    <!--@if(auth()->check())
        @endif
        @auth

    <p class="text-start">Add your comment</p>
    <div class="input-group" style="padding-bottom: 5px;">
        <textarea class="form-control" aria-label="With textarea"></textarea>
    </div>
    <button type="button" class="btn btn-primary">Add Comment</button>


@endauth
    <p class="text-start">Add your comment</p>
        <div class="input-group" style="padding-bottom: 5px;">
            <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>
        <a href="{
        {//route('post.comment', ['post'=>$post, 'message' => '123'])}}" class="btn btn-primary">
            Add Comment
        </a>



comment

posts.store


-->
    @if(auth()->check())
    <div class="container">
        <form action="{{route('post.comment', ['post'=>$post])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="body" class="form-label">Write Comment</label>
                <textarea
                    class="form-control @error('body') is-invalid @enderror"
                    id="body"
                    rows="3"
                    name="body">{{old('body')}}</textarea>
                @error('body')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Add Comment">
            </div>
        </form>
    </div>
    @endif


@foreach($post->comments()->latest()->get() as $comment)
    <div class="card mt-2">
        <div class="card-body">
            <p class="card-text">{{$comment->body}}</p>
        </div>
        <div class="card-footer">
            {{$comment->user->name}}<br>
            {{$comment->created_at->diffForHumans()}}
        </div>
    </div>
@endforeach
@endsection

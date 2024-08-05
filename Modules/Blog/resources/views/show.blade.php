@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
    <div class="markdown-body">
        {!! $post->content !!}
    </div>
@endsection

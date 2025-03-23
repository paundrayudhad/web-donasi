@extends('layouts.app')

@section('title', $article->title)

@section('content')
@include('includes.navbar', ['background' => 'white', 'color' => 'dark'])
<div class="container mt-20">
    <img src="{{asset('storage/'.$article->thumbnail)}}" class="img-fluid article-thumbnail" alt="{{$article->title}}" />
    <h1 class="fw-bold mt-5">{{$article->title}}</h1>
    <small class="text-muted">{{$article->articleCategory->title}}</small>
    <article class="mt-3">
        {!! $article->content !!}
    </article>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
@include('includes.navbar', ['background' => 'white', 'color' => 'dark'])
<div class="heading-section">
    <h1>Artikel Kami</h1>
    <p>Baca Semua Artikel yang kami sediakan</p>
</div>
<div class="container mt-5">
    <div class="row">
    @foreach ($articles as $article)
         <div class="col-md-4 mb-3">

           <a href="{{route('article.show', $article->slug)}}" class="card shadow-sm h-100 text-decoration-none">
             <img
               src="{{asset('storage/'.$article->thumbnail)}}"
               class="card-img-top img-article"
               alt="{{$article->title}}" />
             <div class="card-body">
               <small class="text-muted">{{$article->articleCategory->title}}</small>
               <h5 class="mt-2 fw-bold">
                 {{$article->title}}
               </h5>
             </div>
           </a>
         </div>

         @endforeach

         <div class="d-flex justify-content-center">
            {{$articles->links()}}
         </div>
    </div>
</div>
@endsection
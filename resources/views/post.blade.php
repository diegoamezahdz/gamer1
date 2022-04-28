@extends('layouts.layout')

@section('content')


<!-- Contenido -->
<section class="container-fluid content py-5">
    <div class="row justify-content-center">
        <!-- Post -->
        <div class="col-12 col-md-7 text-center">

            <h1>{{$post->title}}</h1>
            <hr>
            <img src="{{asset($post->featured)}}" alt="{{$post->title}}" class="img-fluid">

            <p class="text-left mt-3 post-txt">
                <span>Autor: {{$post->author}}</span>
                <span class="float-right">Publicado: {{$post->created_at->diffForHumans()}}</span>
            </p>
            <p class="text-left">
                {{$post->content}}
            </p>
            <p class="text-left post-txt"><i>Categoría: {{$post->category->name}}</i></p>
        </div>
        
        <!-- Entradas recientes 
        <div class="col-md-3 offset-md-1">
            <p>Últimas entradas</p>
            <div class="row mb-4">
                <div class="col-4 p-0">
                    <a href="#">
                        <img src="images/6.png" class="img-fluid rounded" width="100" alt="">
                    </a>
                </div>
                <div class="col-7 pl-0">
                    <a href="#" class="link-post">Arcade</a>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-4 p-0">
                    <a href="#">
                        <img src="images/7.png" class="img-fluid rounded" width="100" alt="">
                    </a>
                </div>
                <div class="col-7 pl-0">
                    <a href="#" class="link-post">Deportivo</a>
                </div>
            </div>
        </div>-->
        
    </div>
</section>

@endsection
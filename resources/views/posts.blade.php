@extends('layouts.layout')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('images/2.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('images/1.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('images/3.png')}}" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div><hr>


<!-- Contenido -->
<section class="container-fluid content">
    
    <!-- Posts -->
    <div class="row justify-content-center">
        <div class="col-10">            
            <div class="row">                
                <!-- Post 1 -->
                @foreach ($posts as $post)
                <div class="col-md-4 col-12 justify-content-center mb-5">
                    <div class="card m-auto" style="width: 25">
                        <div class="card-body">
                            <img class="card-img-top" src="{{asset($post->featured)}}" alt="{{$post->name}}">
                            <small class="card-txt-category">Categoría: {{$post->category->name}}</small>
                            <h5 class="card-title my-2">{{$post->title}}</h5>
                            <div class="d-card-text module line-clamp">
                                <p>{{$post->content}}</p>
                            </div>
                            <a href="{{route('post', $post->id)}}" class="post-link"><b>Leer más</b></a>
                            <hr>
                            <div class="row">
                                <div class="col-6 text-left">
                                    <span class="card-txt-author">{{$post->author}}</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span class="card-txt-date">{{$post->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-12">
            <!-- Paginador -->

        </div>
    </div>
</section>

@endsection